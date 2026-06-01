@extends('layouts.userpanel_base')

@php use Illuminate\Support\Facades\Storage; @endphp

@section('title', 'Order #' . $order->id)

@section('content')

    <h2 class="section-title">Order #{{ $order->id }}</h2>

    {{-- Order Info --}}
    <div style="background:#fff; border-radius:8px; padding:20px; box-shadow:0 2px 8px rgba(0,0,0,0.06); margin-bottom:20px;">
        <div style="display:flex; flex-wrap:wrap; gap:20px;">
            <div>
                <div style="font-size:0.8rem; color:#888; margin-bottom:3px;">Order Date</div>
                <div style="font-weight:600; color:#1a1a2e;">{{ $order->created_at->format('Y-m-d H:i') }}</div>
            </div>
            <div>
                <div style="font-size:0.8rem; color:#888; margin-bottom:3px;">Status</div>
                <div><span style="background:#eafaf1; color:#27ae60; padding:3px 10px; border-radius:20px; font-size:0.82rem; font-weight:600;">{{ $order->status }}</span></div>
            </div>
            <div>
                <div style="font-size:0.8rem; color:#888; margin-bottom:3px;">Shipping Name</div>
                <div style="font-weight:600; color:#1a1a2e;">{{ $order->shipping_name }}</div>
            </div>
            <div>
                <div style="font-size:0.8rem; color:#888; margin-bottom:3px;">Address</div>
                <div style="font-weight:600; color:#1a1a2e;">{{ $order->shipping_address }}</div>
            </div>
            <div>
                <div style="font-size:0.8rem; color:#888; margin-bottom:3px;">Phone</div>
                <div style="font-weight:600; color:#1a1a2e;">{{ $order->phone }}</div>
            </div>
        </div>
    </div>

    {{-- Order Items --}}
    <div style="background:#fff; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.06); overflow:hidden;">
        <table style="width:100%; border-collapse:collapse;">
            <thead>
                <tr style="background:#f8fafc;">
                    <th style="padding:12px 14px; text-align:left; font-size:0.82rem; text-transform:uppercase; color:#666; font-weight:600;">Product</th>
                    <th style="padding:12px 14px; text-align:left; font-size:0.82rem; text-transform:uppercase; color:#666; font-weight:600;">Price</th>
                    <th style="padding:12px 14px; text-align:left; font-size:0.82rem; text-transform:uppercase; color:#666; font-weight:600;">Qty</th>
                    <th style="padding:12px 14px; text-align:left; font-size:0.82rem; text-transform:uppercase; color:#666; font-weight:600;">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                <tr style="border-bottom:1px solid #f0f2f5;">
                    <td style="padding:14px;">
                        <div style="display:flex; align-items:center; gap:10px;">
                            @if($item->product?->image)
                                <img src="{{ Storage::url($item->product->image) }}" width="40" height="40" style="border-radius:4px; object-fit:cover;">
                            @endif
                            <span style="font-size:0.9rem; font-weight:600; color:#1a1a2e;">{{ $item->product?->title ?? 'Product' }}</span>
                        </div>
                    </td>
                    <td style="padding:14px; color:#555;">${{ number_format($item->price, 2) }}</td>
                    <td style="padding:14px; color:#555;">{{ $item->quantity }}</td>
                    <td style="padding:14px; font-weight:700; color:#f0a500;">${{ number_format($item->price * $item->quantity, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr style="background:#f8fafc;">
                    <td colspan="3" style="padding:14px; text-align:right; font-weight:700; color:#1a1a2e;">Total:</td>
                    <td style="padding:14px; font-weight:700; color:#f0a500; font-size:1.05rem;">${{ number_format($order->total_price, 2) }}</td>
                </tr>
            </tfoot>
        </table>
    </div>

    <div style="margin-top:18px;">
        <a href="{{ route('userpanel.orders') }}" style="background:#f0f2f5; color:#555; padding:10px 22px; border-radius:6px; font-weight:600; font-size:0.9rem;">
            ← Back to Orders
        </a>
    </div>

@endsection
