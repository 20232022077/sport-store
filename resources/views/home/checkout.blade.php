@extends('layouts.front_base')

@php use Illuminate\Support\Facades\Storage; @endphp

@section('title', 'Checkout')

@section('content')

    <div class="breadcrumb">
        <a href="{{ route('home') }}">Home</a>
        <span> &rsaquo; </span>
        <a href="{{ route('cart') }}">Cart</a>
        <span> &rsaquo; </span>
        <span>Checkout</span>
    </div>

    <h2 class="section-title">Checkout</h2>

    @if(session('error'))
        <div style="background:#fdedec; border:1px solid #e74c3c; border-radius:6px; padding:12px 16px; margin-bottom:20px; color:#e74c3c; font-size:0.9rem;">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('checkout.place') }}" method="POST">
        @csrf

        <div style="display:flex; gap:24px; align-items:flex-start; flex-wrap:wrap;">

            {{-- Left: Shipping + Payment --}}
            <div style="flex:1; min-width:280px; display:flex; flex-direction:column; gap:20px;">

                {{-- Shipping Info --}}
                <div style="background:#fff; border-radius:8px; padding:24px; box-shadow:0 2px 8px rgba(0,0,0,0.06);">
                    <h3 style="color:#1a1a2e; font-size:1rem; margin-bottom:18px; padding-bottom:10px; border-bottom:2px solid #f0f2f5;">
                        <i class="fa-solid fa-truck"></i> Shipping Information
                    </h3>

                    @if($errors->any())
                        <div style="background:#fdedec; border:1px solid #e74c3c; border-radius:6px; padding:12px; margin-bottom:16px;">
                            <ul style="margin:0; padding-left:18px; color:#e74c3c; font-size:0.88rem;">
                                @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                            </ul>
                        </div>
                    @endif

                    <div style="margin-bottom:14px;">
                        <label style="display:block; font-weight:600; margin-bottom:5px; color:#555; font-size:0.9rem;">Full Name</label>
                        <input type="text" name="shipping_name" value="{{ old('shipping_name', Auth::user()->name) }}"
                            style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.92rem; outline:none; box-sizing:border-box;">
                    </div>

                    <div style="margin-bottom:14px;">
                        <label style="display:block; font-weight:600; margin-bottom:5px; color:#555; font-size:0.9rem;">Address</label>
                        <input type="text" name="shipping_address" value="{{ old('shipping_address') }}"
                            style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.92rem; outline:none; box-sizing:border-box;">
                    </div>

                    <div style="margin-bottom:14px;">
                        <label style="display:block; font-weight:600; margin-bottom:5px; color:#555; font-size:0.9rem;">Phone</label>
                        <input type="text" name="phone" value="{{ old('phone') }}"
                            style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.92rem; outline:none; box-sizing:border-box;">
                    </div>

                    <div>
                        <label style="display:block; font-weight:600; margin-bottom:5px; color:#555; font-size:0.9rem;">Email</label>
                        <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}"
                            style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.92rem; outline:none; box-sizing:border-box;">
                    </div>
                </div>

                {{-- Payment Simulation --}}
                <div style="background:#fff; border-radius:8px; padding:24px; box-shadow:0 2px 8px rgba(0,0,0,0.06);">
                    <h3 style="color:#1a1a2e; font-size:1rem; margin-bottom:18px; padding-bottom:10px; border-bottom:2px solid #f0f2f5;">
                        <i class="fa-solid fa-credit-card"></i> Payment Details
                    </h3>
                    <div style="background:#fef9e7; border:1px solid #f0a500; border-radius:6px; padding:10px 14px; margin-bottom:16px; font-size:0.85rem; color:#888;">
                        <i class="fa-solid fa-circle-info" style="color:#f0a500;"></i> Simulation mode — no real payment is processed.
                    </div>

                    <div style="margin-bottom:14px;">
                        <label style="display:block; font-weight:600; margin-bottom:5px; color:#555; font-size:0.9rem;">Card Number</label>
                        <input type="text" placeholder="1234 5678 9012 3456" maxlength="19"
                            style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.92rem; outline:none; box-sizing:border-box;">
                    </div>

                    <div style="display:flex; gap:14px;">
                        <div style="flex:1;">
                            <label style="display:block; font-weight:600; margin-bottom:5px; color:#555; font-size:0.9rem;">Expiry</label>
                            <input type="text" placeholder="MM/YY" maxlength="5"
                                style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.92rem; outline:none; box-sizing:border-box;">
                        </div>
                        <div style="flex:1;">
                            <label style="display:block; font-weight:600; margin-bottom:5px; color:#555; font-size:0.9rem;">CVV</label>
                            <input type="text" placeholder="123" maxlength="4"
                                style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.92rem; outline:none; box-sizing:border-box;">
                        </div>
                    </div>
                </div>

            </div>

            {{-- Right: Order Summary --}}
            <div style="flex:0 0 300px;">
                <div style="background:#fff; border-radius:8px; padding:24px; box-shadow:0 2px 8px rgba(0,0,0,0.06);">
                    <h3 style="color:#1a1a2e; font-size:1rem; margin-bottom:18px; padding-bottom:10px; border-bottom:2px solid #f0f2f5;">
                        <i class="fa-solid fa-bag-shopping"></i> Order Summary
                    </h3>

                    @foreach($items as $item)
                    <div style="display:flex; gap:10px; align-items:center; margin-bottom:12px; padding-bottom:12px; border-bottom:1px solid #f0f2f5;">
                        @if($item->product?->image)
                            <img src="{{ Storage::url($item->product->image) }}" width="40" height="40" style="border-radius:4px; object-fit:cover;">
                        @endif
                        <div style="flex:1;">
                            <div style="font-size:0.88rem; font-weight:600; color:#1a1a2e;">{{ $item->product?->title }}</div>
                            <div style="font-size:0.82rem; color:#888;">Qty: {{ $item->quantity }}</div>
                        </div>
                        <div style="font-weight:700; color:#f0a500; font-size:0.9rem;">
                            ${{ number_format(($item->product?->price ?? 0) * $item->quantity, 2) }}
                        </div>
                    </div>
                    @endforeach

                    <div style="display:flex; justify-content:space-between; font-weight:700; font-size:1.05rem; color:#1a1a2e; margin-top:10px; padding-top:10px; border-top:2px solid #f0a500;">
                        <span>Total</span>
                        <span style="color:#f0a500;">${{ number_format($total, 2) }}</span>
                    </div>

                    <button type="submit"
                        style="width:100%; background:#f0a500; color:#1a1a2e; padding:13px; border:none; border-radius:6px; font-weight:700; font-size:1rem; cursor:pointer; margin-top:20px;">
                        <i class="fa-solid fa-check"></i> Place Order
                    </button>
                </div>
            </div>

        </div>
    </form>

@endsection
