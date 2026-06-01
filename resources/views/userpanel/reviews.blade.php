@extends('layouts.userpanel_base')

@section('title', 'My Reviews')

@section('content')

    <h2 class="section-title">My Reviews</h2>

    @if($reviews->isEmpty())
        <div style="background:#fff; border-radius:8px; padding:24px; box-shadow:0 2px 8px rgba(0,0,0,0.06); color:#888;">
            You have not submitted any reviews yet.
        </div>
    @else
        <div style="display:flex; flex-direction:column; gap:16px;">
            @foreach($reviews as $rs)
                <div style="background:#fff; border-radius:8px; padding:20px; box-shadow:0 2px 8px rgba(0,0,0,0.06);">
                    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:10px;">
                        <strong style="color:#1a1a2e;">{{ $rs->product->title ?? 'Product' }}</strong>
                        <span style="color:#f0a500;">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fa-{{ $i <= $rs->rate ? 'solid' : 'regular' }} fa-star" style="font-size:0.85rem;"></i>
                            @endfor
                        </span>
                    </div>
                    <p style="font-weight:600; color:#333; margin-bottom:4px;">{{ $rs->subject }}</p>
                    <p style="color:#666; font-size:0.9rem;">{{ $rs->review }}</p>
                    <div style="display:flex; justify-content:space-between; align-items:center; margin-top:10px;">
                        <small style="color:#aaa;">{{ $rs->created_at->format('Y-m-d') }}</small>
                        <span style="font-size:0.8rem; padding:3px 10px; border-radius:20px;
                            background:{{ $rs->status === 'approved' ? '#eafaf1' : '#fef9e7' }};
                            color:{{ $rs->status === 'approved' ? '#27ae60' : '#f39c12' }};">
                            {{ ucfirst($rs->status) }}
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

@endsection
