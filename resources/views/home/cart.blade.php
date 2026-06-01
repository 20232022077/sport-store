@extends('layouts.front_base')

@php use Illuminate\Support\Facades\Storage; @endphp

@section('title', 'Shopping Cart')

@section('content')

    <div class="breadcrumb">
        <a href="{{ route('home') }}">Home</a>
        <span> &rsaquo; </span>
        <span>Shopping Cart</span>
    </div>

    <h2 class="section-title">Shopping Cart</h2>

    @if(session('success'))
        <div style="background:#eafaf1; border:1px solid #2ecc71; border-radius:6px; padding:12px 16px; margin-bottom:20px; color:#27ae60; font-size:0.9rem;">
            {{ session('success') }}
        </div>
    @endif

    @if($items->isEmpty())
        <div style="background:#fff; border-radius:8px; padding:30px; box-shadow:0 2px 8px rgba(0,0,0,0.06); text-align:center; color:#888;">
            <i class="fa-solid fa-cart-shopping" style="font-size:2.5rem; color:#ddd; margin-bottom:14px; display:block;"></i>
            Your cart is empty.
            <a href="{{ route('home') }}" style="color:#f0a500; font-weight:600; margin-left:6px;">Continue Shopping</a>
        </div>
    @else
        <div style="display:flex; gap:24px; align-items:flex-start; flex-wrap:wrap;">

            {{-- Cart Items --}}
            <div style="flex:1; min-width:280px;">
                <div style="background:#fff; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.06); overflow:hidden;">
                    <table style="width:100%; border-collapse:collapse;">
                        <thead>
                            <tr style="background:#f8fafc;">
                                <th style="padding:12px 14px; text-align:left; font-size:0.82rem; text-transform:uppercase; color:#666; font-weight:600;">Product</th>
                                <th style="padding:12px 14px; text-align:left; font-size:0.82rem; text-transform:uppercase; color:#666; font-weight:600;">Price</th>
                                <th style="padding:12px 14px; text-align:left; font-size:0.82rem; text-transform:uppercase; color:#666; font-weight:600;">Quantity</th>
                                <th style="padding:12px 14px; text-align:left; font-size:0.82rem; text-transform:uppercase; color:#666; font-weight:600;">Subtotal</th>
                                <th style="padding:12px 14px; text-align:left; font-size:0.82rem; text-transform:uppercase; color:#666; font-weight:600;">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                            <tr style="border-bottom:1px solid #f0f2f5;">
                                <td style="padding:14px;">
                                    <div style="display:flex; align-items:center; gap:12px;">
                                        @if($item->product?->image)
                                            <img src="{{ Storage::url($item->product->image) }}" width="50" height="50"
                                                style="border-radius:6px; object-fit:cover;">
                                        @endif
                                        <a href="{{ route('product', $item->product_id) }}" style="color:#1a1a2e; font-weight:600; font-size:0.9rem;">
                                            {{ $item->product?->title ?? 'Product' }}
                                        </a>
                                    </div>
                                </td>
                                <td style="padding:14px; color:#f0a500; font-weight:700;">${{ number_format($item->product?->price ?? 0, 2) }}</td>
                                <td style="padding:14px;">
                                    <form action="{{ route('cart.update', $item->id) }}" method="POST" style="display:flex; align-items:center; gap:6px;">
                                        @csrf
                                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1"
                                            style="width:60px; padding:6px; border:1px solid #dde3ec; border-radius:4px; font-size:0.9rem; outline:none; text-align:center;">
                                        <button type="submit" style="background:#3b9eff; color:#fff; padding:6px 10px; border:none; border-radius:4px; cursor:pointer; font-size:0.8rem;">
                                            Update
                                        </button>
                                    </form>
                                </td>
                                <td style="padding:14px; font-weight:700; color:#333;">
                                    ${{ number_format(($item->product?->price ?? 0) * $item->quantity, 2) }}
                                </td>
                                <td style="padding:14px;">
                                    <a href="{{ route('cart.delete', $item->id) }}"
                                       onclick="return confirm('Remove this item?')"
                                       style="color:#dc3545; font-size:1rem;">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div style="margin-top:14px;">
                    <a href="{{ route('cart.clear') }}"
                       onclick="return confirm('Clear entire cart?')"
                       style="background:#f0f2f5; color:#555; padding:10px 20px; border-radius:6px; font-size:0.9rem; font-weight:600;">
                        <i class="fa-solid fa-trash"></i> Clear Cart
                    </a>
                </div>
            </div>

            {{-- Order Summary --}}
            <div style="flex:0 0 260px; background:#fff; border-radius:8px; padding:24px; box-shadow:0 2px 8px rgba(0,0,0,0.06);">
                <h3 style="color:#1a1a2e; font-size:1rem; margin-bottom:18px; padding-bottom:10px; border-bottom:2px solid #f0f2f5;">
                    Order Summary
                </h3>

                <div style="display:flex; justify-content:space-between; margin-bottom:12px; font-size:0.92rem; color:#555;">
                    <span>Items ({{ $items->sum('quantity') }})</span>
                    <span>${{ number_format($total, 2) }}</span>
                </div>

                <div style="border-top:2px solid #f0f2f5; padding-top:14px; display:flex; justify-content:space-between; font-weight:700; font-size:1rem; color:#1a1a2e;">
                    <span>Total</span>
                    <span style="color:#f0a500;">${{ number_format($total, 2) }}</span>
                </div>

                <a href="#" style="display:block; background:#f0a500; color:#1a1a2e; text-align:center; padding:12px; border-radius:6px; font-weight:700; margin-top:20px; font-size:0.95rem;">
                    Proceed to Checkout
                </a>

                <a href="{{ route('home') }}" style="display:block; text-align:center; color:#888; margin-top:12px; font-size:0.88rem;">
                    Continue Shopping
                </a>
            </div>

        </div>
    @endif

@endsection
