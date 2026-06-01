@extends('layouts.front_base')

@php use Illuminate\Support\Facades\Storage; @endphp

@section('title', $category->title . ' - Sport Store')

@section('content')

    {{-- Breadcrumb --}}
    <div class="breadcrumb">
        <a href="{{ route('home') }}">Home</a>
        <span> &rsaquo; </span>
        <span>{{ $category->title }}</span>
    </div>

    <h2 class="section-title">{{ $category->title }}</h2>

    @if($products->isEmpty())
        <p style="color:#888; padding:20px 0;">No products found in this category.</p>
    @else
        <div class="cards-grid">
            @foreach($products as $rs)
                <div class="card">
                    <a href="{{ route('product', ['id' => $rs->id]) }}" style="text-decoration:none; color:inherit;">
                    @if($rs->image)
                        <img src="{{ Storage::url($rs->image) }}" alt="{{ $rs->title }}" class="card-img">
                    @else
                        <div class="icon"><i class="fa-solid fa-box"></i></div>
                    @endif
                    <h4>{{ $rs->title }}</h4>
                    @include('home.stars', ['avg' => $rs->comments_avg_rate, 'count' => $rs->comments_count])
                    <div class="price">${{ number_format($rs->price, 2) }}</div>
                    </a>
                    @auth
                    <a href="{{ route('shopcart.add', $rs->id) }}" class="quick-add-btn">
                        <i class="fa-solid fa-cart-plus"></i> Add to Cart
                    </a>
                    @endauth
                </div>
            @endforeach
        </div>
    @endif

@endsection
