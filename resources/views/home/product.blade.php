@extends('layouts.front_base')

@php use Illuminate\Support\Facades\Storage; @endphp

@section('title', $data->title . ' - Sport Store')

@section('content')

    {{-- Breadcrumb --}}
    <div class="breadcrumb">
        <a href="{{ route('home') }}">Home</a>
        <span> &rsaquo; </span>
        @if($data->category)
            <a href="{{ route('category.products', $data->category_id) }}">{{ $data->category->title }}</a>
            <span> &rsaquo; </span>
        @endif
        <span>{{ $data->title }}</span>
    </div>

    {{-- Product Detail --}}
    <div class="product-detail">

        {{-- Image Gallery --}}
        <div class="product-gallery">
            <div class="main-image">
                @if($data->image)
                    <img src="{{ Storage::url($data->image) }}" alt="{{ $data->title }}" id="mainImg">
                @else
                    <div style="width:100%; height:300px; background:#f0f2f5; display:flex; align-items:center; justify-content:center; border-radius:8px;">
                        <i class="fa-solid fa-box" style="font-size:3rem; color:#ccc;"></i>
                    </div>
                @endif
            </div>

            @if($images->count() > 0)
                <div class="thumb-gallery">
                    @if($data->image)
                        <img src="{{ Storage::url($data->image) }}" alt="{{ $data->title }}" class="thumb-img active" onclick="document.getElementById('mainImg').src=this.src">
                    @endif
                    @foreach($images as $rs)
                        <img src="{{ Storage::url($rs->image) }}" alt="{{ $data->title }}" class="thumb-img" onclick="document.getElementById('mainImg').src=this.src">
                    @endforeach
                </div>
            @endif
        </div>

        {{-- Product Info --}}
        <div class="product-info">
            <h1 class="product-title">{{ $data->title }}</h1>

            <div class="product-rating">
                @for($i = 1; $i <= 5; $i++)
                    @if($i <= round($avgRate))
                        <i class="fa-solid fa-star"></i>
                    @else
                        <i class="fa-regular fa-star"></i>
                    @endif
                @endfor
                <span class="avg-text">{{ number_format($avgRate, 1) }} / 5</span>
                <span class="count-text">({{ $reviewCount }} {{ $reviewCount == 1 ? 'Review' : 'Reviews' }})</span>
            </div>

            <div class="product-price">
                <span class="price-current">${{ number_format($data->price, 2) }}</span>
                <span class="price-old">${{ number_format($data->price * 1.10, 2) }}</span>
            </div>

            <div class="product-meta">
                @if($data->category)
                    <p><strong>Category:</strong> {{ $data->category->title }}</p>
                @endif
                @if($data->keywords)
                    <p><strong>Keywords:</strong> {{ $data->keywords }}</p>
                @endif
                <p><strong>Availability:</strong>
                    @if($data->quantity > 0)
                        <span style="color:#27ae60;">In Stock ({{ $data->quantity }})</span>
                    @else
                        <span style="color:#e74c3c;">Out of Stock</span>
                    @endif
                </p>
            </div>

            <div class="product-description">
                {{ $data->description }}
            </div>
        </div>

    </div>

    {{-- Product Detail (Rich Text) --}}
    @if($data->detail)
        <div class="product-detail-content">
            <h3 class="section-title">Product Details</h3>
            <div class="rich-content">
                {!! $data->detail !!}
            </div>
        </div>
    @endif

    {{-- Comments Section --}}
    <div style="margin-top:40px;">
        <h3 class="section-title">Customer Reviews ({{ $comments->count() }})</h3>

        {{-- Display Comments --}}
        @forelse($comments as $comment)
            <div style="background:#fff; border-radius:8px; padding:20px; margin-bottom:16px; box-shadow:0 2px 8px rgba(0,0,0,0.06);">
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:10px;">
                    <strong style="color:#1a1a2e;">{{ $comment->user->name ?? 'User' }}</strong>
                    <span style="color:#f0a500; font-size:1rem;">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= $comment->rate)
                                <i class="fa-solid fa-star"></i>
                            @else
                                <i class="fa-regular fa-star"></i>
                            @endif
                        @endfor
                    </span>
                </div>
                <p style="font-weight:600; color:#333; margin-bottom:6px;">{{ $comment->subject }}</p>
                <p style="color:#666; font-size:0.92rem; line-height:1.6;">{{ $comment->review }}</p>
                <small style="color:#aaa;">{{ $comment->created_at->format('Y-m-d') }}</small>
            </div>
        @empty
            <p style="color:#888; padding:16px 0;">No reviews yet. Be the first to review!</p>
        @endforelse

        {{-- Comment Form --}}
        <div style="background:#fff; border-radius:8px; padding:25px; box-shadow:0 2px 8px rgba(0,0,0,0.06); margin-top:24px;">
            <h4 style="color:#1a1a2e; margin-bottom:18px;">Write a Review</h4>

            @auth
                @if(session('success'))
                    <div style="background:#eafaf1; border:1px solid #2ecc71; border-radius:6px; padding:12px; margin-bottom:16px; color:#27ae60; font-size:0.9rem;">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div style="background:#fdedec; border:1px solid #e74c3c; border-radius:6px; padding:12px; margin-bottom:16px;">
                        <ul style="margin:0; padding-left:18px; color:#e74c3c; font-size:0.9rem;">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('storecomment') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $data->id }}">

                    <div style="margin-bottom:16px;">
                        <label style="display:block; font-weight:600; margin-bottom:6px; color:#555; font-size:0.9rem;">Rating</label>
                        <div class="star-rating">
                            @for($i = 5; $i >= 1; $i--)
                                <input type="radio" name="rate" id="star{{ $i }}" value="{{ $i }}" {{ old('rate') == $i ? 'checked' : '' }}>
                                <label for="star{{ $i }}" style="color:#ccc; font-size:1.4rem; cursor:pointer;"><i class="fa-solid fa-star"></i></label>
                            @endfor
                        </div>
                    </div>

                    <div style="margin-bottom:16px;">
                        <label style="display:block; font-weight:600; margin-bottom:6px; color:#555; font-size:0.9rem;">Subject</label>
                        <input type="text" name="subject" value="{{ old('subject') }}" placeholder="Review subject"
                            style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; outline:none; box-sizing:border-box;">
                    </div>

                    <div style="margin-bottom:18px;">
                        <label style="display:block; font-weight:600; margin-bottom:6px; color:#555; font-size:0.9rem;">Review</label>
                        <textarea name="review" rows="4" placeholder="Share your experience..."
                            style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; outline:none; resize:vertical; box-sizing:border-box;">{{ old('review') }}</textarea>
                    </div>

                    <button type="submit"
                        style="background:#f0a500; color:#1a1a2e; padding:11px 28px; border:none; border-radius:6px; font-weight:700; font-size:0.95rem; cursor:pointer;">
                        Submit Review
                    </button>
                </form>
            @else
                <div style="background:#f8fafc; border-radius:6px; padding:20px; text-align:center; color:#666;">
                    <i class="fa-solid fa-lock" style="font-size:1.5rem; color:#f0a500; margin-bottom:10px; display:block;"></i>
                    Please <a href="{{ route('login') }}" style="color:#f0a500; font-weight:600;">login</a> to leave a review.
                </div>
            @endauth
        </div>
    </div>

@endsection

@section('scripts')
<style>
    .star-rating { display:flex; flex-direction:row-reverse; gap:4px; }
    .star-rating input { display:none; }
    .star-rating label { color:#ddd; font-size:1.5rem; cursor:pointer; transition:color 0.2s; }
    .star-rating input:checked ~ label,
    .star-rating label:hover,
    .star-rating label:hover ~ label { color:#f0a500; }
</style>
@endsection
