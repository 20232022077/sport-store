@extends('layouts.admin_base')

@section('title', 'Orders')

@section('page_title', 'Orders')

@section('content')

    <div class="page-header">
        <h2>Orders</h2>
        <p>Manage all customer orders</p>
    </div>

    {{-- Status Filter --}}
    <div style="margin-bottom:20px; display:flex; gap:8px; flex-wrap:wrap;">
        <a href="{{ route('admin.order.index') }}"
           style="padding:7px 16px; border-radius:20px; font-size:0.85rem; font-weight:600;
                  background:{{ !$status ? '#3b9eff' : '#f0f2f5' }}; color:{{ !$status ? '#fff' : '#555' }};">
            All
        </a>
        @foreach(['New','Accepted','Shipping','Completed','Cancelled'] as $s)
            <a href="{{ route('admin.order.index', ['status' => $s]) }}"
               style="padding:7px 16px; border-radius:20px; font-size:0.85rem; font-weight:600;
                      background:{{ $status === $s ? '#3b9eff' : '#f0f2f5' }}; color:{{ $status === $s ? '#fff' : '#555' }};">
                {{ $s }}
            </a>
        @endforeach
    </div>

    <div class="table-card">
        <table>
            <thead>
                <tr>
                    <th>Order #</th>
                    <th>Customer</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>View</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $order)
                <tr>
                    <td><strong>#{{ $order->id }}</strong></td>
                    <td>{{ $order->shipping_name }}</td>
                    <td style="color:#27ae60; font-weight:700;">${{ number_format($order->total_price, 2) }}</td>
                    <td>
                        @php
                            $colors = ['New'=>'warning','Accepted'=>'success','Shipping'=>'primary','Completed'=>'success','Cancelled'=>'danger'];
                            $color  = $colors[$order->status] ?? 'warning';
                        @endphp
                        <span class="badge badge-{{ $color }}">{{ $order->status }}</span>
                    </td>
                    <td>{{ $order->created_at->format('Y-m-d') }}</td>
                    <td>
                        <a href="{{ route('admin.order.show', $order->id) }}"
                           style="background:#17a2b8; color:#fff; padding:5px 12px; border-radius:4px; font-size:0.85rem;">View</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align:center; color:#888; padding:30px;">No orders found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
