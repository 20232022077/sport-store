@extends('layouts.admin_base')

@php use Illuminate\Support\Facades\Storage; @endphp

@section('title', 'Order #' . $order->id)

@section('page_title', 'Order Details')

@section('content')

    <div class="page-header">
        <h2>Order #{{ $order->id }}</h2>
    </div>

    @if(session('success'))
        <div style="background:#eafaf1; border:1px solid #2ecc71; border-radius:6px; padding:12px 16px; margin-bottom:20px; color:#27ae60; font-size:0.9rem;">
            {{ session('success') }}
        </div>
    @endif

    <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px; margin-bottom:20px;">

        {{-- Customer Info --}}
        <div class="table-card">
            <h4 style="margin-bottom:14px;">Customer Information</h4>
            <table>
                <tbody>
                    <tr><td style="font-weight:600; width:40%;">Name</td><td>{{ $order->shipping_name }}</td></tr>
                    <tr><td style="font-weight:600;">Email</td><td>{{ $order->email }}</td></tr>
                    <tr><td style="font-weight:600;">Phone</td><td>{{ $order->phone }}</td></tr>
                    <tr><td style="font-weight:600;">Address</td><td>{{ $order->shipping_address }}</td></tr>
                    <tr><td style="font-weight:600;">Date</td><td>{{ $order->created_at->format('Y-m-d H:i') }}</td></tr>
                    <tr>
                        <td style="font-weight:600;">Status</td>
                        <td><span class="badge badge-success">{{ $order->status }}</span></td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Update Status + Note --}}
        <div style="display:flex; flex-direction:column; gap:16px;">

            {{-- Update Status --}}
            <div class="table-card">
                <h4 style="margin-bottom:14px;">Update Status</h4>
                <form action="{{ route('admin.order.status', $order->id) }}" method="POST" style="display:flex; gap:10px;">
                    @csrf
                    <select name="status" style="flex:1; padding:9px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.92rem; background:#fff; outline:none;">
                        @foreach(['New','Accepted','Shipping','Completed','Cancelled'] as $s)
                            <option value="{{ $s }}" {{ $order->status === $s ? 'selected' : '' }}>{{ $s }}</option>
                        @endforeach
                    </select>
                    <button type="submit" style="background:#3b9eff; color:#fff; padding:9px 20px; border:none; border-radius:6px; font-weight:600; cursor:pointer;">
                        Update
                    </button>
                </form>
            </div>

            {{-- Admin Note --}}
            <div class="table-card">
                <h4 style="margin-bottom:14px;">Admin Note</h4>
                <form action="{{ route('admin.order.note', $order->id) }}" method="POST">
                    @csrf
                    <textarea name="admin_note" rows="3" placeholder="Tracking number, remarks..."
                        style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.92rem; outline:none; resize:vertical; margin-bottom:10px; box-sizing:border-box;">{{ $order->admin_note }}</textarea>
                    <button type="submit" style="background:#28a745; color:#fff; padding:9px 20px; border:none; border-radius:6px; font-weight:600; cursor:pointer;">
                        Save Note
                    </button>
                </form>
            </div>

        </div>
    </div>

    {{-- Order Items --}}
    <div class="table-card">
        <h4 style="margin-bottom:14px;">Order Items</h4>
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                <tr>
                    <td>
                        <div style="display:flex; align-items:center; gap:10px;">
                            @if($item->product?->image)
                                <img src="{{ Storage::url($item->product->image) }}" width="36" height="36" style="border-radius:4px; object-fit:cover;">
                            @endif
                            {{ $item->product?->title ?? '—' }}
                        </div>
                    </td>
                    <td>${{ number_format($item->price, 2) }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td style="font-weight:700; color:#27ae60;">${{ number_format($item->price * $item->quantity, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" style="text-align:right; font-weight:700; padding:12px 14px; color:#1e2a3b;">Total</td>
                    <td style="font-weight:700; color:#3b9eff; font-size:1rem; padding:12px 14px;">${{ number_format($order->total_price, 2) }}</td>
                </tr>
            </tfoot>
        </table>
    </div>

    <div style="margin-top:18px;">
        <a href="{{ route('admin.order.index') }}" style="background:#f0f2f5; color:#555; padding:10px 22px; border-radius:6px; font-weight:600; font-size:0.9rem;">
            ← Back to Orders
        </a>
    </div>

@endsection
