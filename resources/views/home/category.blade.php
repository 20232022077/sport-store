@extends('layouts.front_base')

@php use Illuminate\Support\Facades\Storage; @endphp

@section('title', $category->title . ' - Sport Store')

@section('content')

    {{-- Breadcrumb --}}
    <div class="breadcrumb">
        <a href="{{ route('home') }}">Home</a>
        <span> &rsaquo; </span>
        <span>{{ \App\Models\Category::getParentsTree($category, $category->title) }}</span>
    </div>

    <h2 class="section-title">{{ $category->title }}</h2>

    @if($products->isEmpty())
        <p style="color:#888; padding:20px 0;">No products found in this category.</p>
    @else
        <div class="cards-grid">
            @foreach($products as $product)
                <div class="card">
                    @if($product->image)
                        <img src="{{ Storage::url($product->image) }}" alt="{{ $product->title }}" class="card-img">
                    @else
                        <div class="icon"><i class="fa-solid fa-box"></i></div>
                    @endif
                    <h4>{{ $product->title }}</h4>
                    <p>{{ $product->category ? $product->category->title : '' }}</p>
                    <div class="price">${{ number_format($product->price, 2) }}</div>
                </div>
            @endforeach
        </div>
    @endif

@endsection
