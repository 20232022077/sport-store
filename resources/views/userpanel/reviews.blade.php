@extends('layouts.userpanel_base')

@section('title', 'My Reviews')

@section('content')

    <h2 class="section-title">My Reviews</h2>

    @if(session('success'))
        <div style="background:#eafaf1; border:1px solid #2ecc71; border-radius:6px; padding:12px 16px; margin-bottom:20px; color:#27ae60; font-size:0.9rem;">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div style="background:#fdedec; border:1px solid #e74c3c; border-radius:6px; padding:12px 16px; margin-bottom:20px; color:#e74c3c; font-size:0.9rem;">
            {{ session('error') }}
        </div>
    @endif

    @if($reviews->isEmpty())
        <div style="background:#fff; border-radius:8px; padding:24px; box-shadow:0 2px 8px rgba(0,0,0,0.06); color:#888;">
            You have not submitted any reviews yet.
            <a href="{{ route('home') }}" style="color:#f0a500; font-weight:600; margin-left:6px;">Browse products</a>
        </div>
    @else
        <div style="background:#fff; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.06); overflow:hidden;">
            <table style="width:100%; border-collapse:collapse;">
                <thead>
                    <tr style="background:#f8fafc;">
                        <th style="padding:12px 14px; text-align:left; font-size:0.82rem; text-transform:uppercase; letter-spacing:0.8px; color:#666; font-weight:600;">Product</th>
                        <th style="padding:12px 14px; text-align:left; font-size:0.82rem; text-transform:uppercase; letter-spacing:0.8px; color:#666; font-weight:600;">Subject</th>
                        <th style="padding:12px 14px; text-align:left; font-size:0.82rem; text-transform:uppercase; letter-spacing:0.8px; color:#666; font-weight:600;">Review</th>
                        <th style="padding:12px 14px; text-align:left; font-size:0.82rem; text-transform:uppercase; letter-spacing:0.8px; color:#666; font-weight:600;">Rate</th>
                        <th style="padding:12px 14px; text-align:left; font-size:0.82rem; text-transform:uppercase; letter-spacing:0.8px; color:#666; font-weight:600;">Status</th>
                        <th style="padding:12px 14px; text-align:left; font-size:0.82rem; text-transform:uppercase; letter-spacing:0.8px; color:#666; font-weight:600;">Date</th>
                        <th style="padding:12px 14px; text-align:left; font-size:0.82rem; text-transform:uppercase; letter-spacing:0.8px; color:#666; font-weight:600;">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reviews as $rs)
                    <tr style="border-bottom:1px solid #f0f2f5;">
                        <td style="padding:12px 14px; font-size:0.92rem; color:#444;">
                            @if($rs->product)
                                <a href="{{ route('product', $rs->product_id) }}" style="color:#f0a500; font-weight:600;">
                                    {{ $rs->product->title }}
                                </a>
                            @else
                                —
                            @endif
                        </td>
                        <td style="padding:12px 14px; font-size:0.92rem; color:#444;">{{ $rs->subject }}</td>
                        <td style="padding:12px 14px; font-size:0.88rem; color:#666; max-width:200px;">
                            {{ Str::limit($rs->review, 60) }}
                        </td>
                        <td style="padding:12px 14px;">
                            <span style="color:#f0a500;">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fa-{{ $i <= $rs->rate ? 'solid' : 'regular' }} fa-star" style="font-size:0.8rem;"></i>
                                @endfor
                            </span>
                        </td>
                        <td style="padding:12px 14px;">
                            @if($rs->status === 'approved')
                                <span style="background:#eafaf1; color:#27ae60; padding:3px 10px; border-radius:20px; font-size:0.78rem; font-weight:600;">Approved</span>
                            @elseif($rs->status === 'new')
                                <span style="background:#fef9e7; color:#f39c12; padding:3px 10px; border-radius:20px; font-size:0.78rem; font-weight:600;">New</span>
                            @else
                                <span style="background:#fdedec; color:#e74c3c; padding:3px 10px; border-radius:20px; font-size:0.78rem; font-weight:600;">{{ ucfirst($rs->status) }}</span>
                            @endif
                        </td>
                        <td style="padding:12px 14px; font-size:0.88rem; color:#888;">{{ $rs->created_at->format('Y-m-d') }}</td>
                        <td style="padding:12px 14px;">
                            <a href="{{ route('userpanel.deletereview', $rs->id) }}"
                               onclick="return confirm('Are you sure you want to delete this review?')"
                               style="background:#dc3545; color:#fff; padding:5px 12px; border-radius:4px; font-size:0.82rem;">
                                Delete
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

@endsection
