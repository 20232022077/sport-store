@extends('layouts.userpanel_base')

@section('title', 'My Orders')

@section('content')

    <h2 class="section-title">My Orders</h2>

    @if(session('success'))
        <div style="background:#eafaf1; border:1px solid #2ecc71; border-radius:6px; padding:12px 16px; margin-bottom:20px; color:#27ae60; font-size:0.9rem;">
            {{ session('success') }}
        </div>
    @endif

    @if($orders->isEmpty())
        <div style="background:#fff; border-radius:8px; padding:24px; box-shadow:0 2px 8px rgba(0,0,0,0.06); color:#888;">
            No orders yet.
            <a href="{{ route('home') }}" style="color:#f0a500; font-weight:600; margin-left:6px;">Start Shopping</a>
        </div>
    @else
        <div style="background:#fff; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.06); overflow:hidden;">
            <table style="width:100%; border-collapse:collapse;">
                <thead>
                    <tr style="background:#f8fafc;">
                        <th style="padding:12px 14px; text-align:left; font-size:0.82rem; text-transform:uppercase; color:#666; font-weight:600;">Order #</th>
                        <th style="padding:12px 14px; text-align:left; font-size:0.82rem; text-transform:uppercase; color:#666; font-weight:600;">Date</th>
                        <th style="padding:12px 14px; text-align:left; font-size:0.82rem; text-transform:uppercase; color:#666; font-weight:600;">Total</th>
                        <th style="padding:12px 14px; text-align:left; font-size:0.82rem; text-transform:uppercase; color:#666; font-weight:600;">Status</th>
                        <th style="padding:12px 14px; text-align:left; font-size:0.82rem; text-transform:uppercase; color:#666; font-weight:600;">Details</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr style="border-bottom:1px solid #f0f2f5;">
                        <td style="padding:12px 14px; font-weight:700; color:#1a1a2e;">#{{ $order->id }}</td>
                        <td style="padding:12px 14px; color:#666; font-size:0.9rem;">{{ $order->created_at->format('Y-m-d') }}</td>
                        <td style="padding:12px 14px; font-weight:700; color:#f0a500;">${{ number_format($order->total_price, 2) }}</td>
                        <td style="padding:12px 14px;">
                            <span style="background:#eafaf1; color:#27ae60; padding:3px 10px; border-radius:20px; font-size:0.78rem; font-weight:600;">
                                {{ $order->status }}
                            </span>
                        </td>
                        <td style="padding:12px 14px;">
                            <a href="{{ route('userpanel.orderdetail', $order->id) }}"
                               style="background:#17a2b8; color:#fff; padding:5px 12px; border-radius:4px; font-size:0.85rem;">
                                View
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

@endsection
