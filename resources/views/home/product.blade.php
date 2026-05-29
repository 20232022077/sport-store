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

@endsection
