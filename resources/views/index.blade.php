@extends('layouts.front_base')

@php use Illuminate\Support\Facades\Storage; @endphp

@section('title', 'Sport Store - Home')

@section('sliders')
    @include('home.sliders')
@endsection

@section('content')

    <h2 class="section-title">New Collection</h2>

    @if($productlist1->isEmpty())
        <p style="color:#888; padding:20px 0;">No products available yet.</p>
    @else
        <div class="cards-grid">
            @foreach($productlist1 as $rs)
                <div class="card">
                    @if($rs->image)
                        <img src="{{ Storage::url($rs->image) }}" alt="{{ $rs->title }}" class="card-img">
                    @else
                        <div class="icon"><i class="fa-solid fa-box"></i></div>
                    @endif
                    <h4>{{ $rs->title }}</h4>
                    <p>{{ $rs->category ? $rs->category->title : '' }}</p>
                    <div class="price">
                        ${{ number_format($rs->price, 2) }}
                        <span style="text-decoration:line-through; color:#aaa; font-size:0.85rem; margin-left:6px; font-weight:400;">
                            ${{ number_format($rs->price * 1.10, 2) }}
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

@endsection
