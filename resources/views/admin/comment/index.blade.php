@extends('layouts.admin_base')

@section('title', 'Comments')

@section('page_title', 'Comments')

@section('content')

    <div class="page-header">
        <h2>Product Reviews</h2>
        <p>Manage and moderate customer reviews</p>
    </div>

    @if(session('success'))
        <div style="background:#eafaf1; border:1px solid #2ecc71; border-radius:6px; padding:12px 16px; margin-bottom:20px; color:#27ae60; font-size:0.9rem;">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-card">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Product</th>
                    <th>Subject</th>
                    <th>Rate</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Approve</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $rs)
                <tr>
                    <td>{{ $rs->id }}</td>
                    <td>{{ $rs->user->name ?? '—' }}</td>
                    <td>
                        @if($rs->product)
                            <a href="{{ route('product', $rs->product_id) }}" target="_blank" style="color:#3b9eff;">
                                {{ $rs->product->title }}
                            </a>
                        @else
                            —
                        @endif
                    </td>
                    <td>{{ $rs->subject }}</td>
                    <td>
                        @for($i = 1; $i <= 5; $i++)
                            <i class="fa-{{ $i <= $rs->rate ? 'solid' : 'regular' }} fa-star" style="color:#f0a500; font-size:0.8rem;"></i>
                        @endfor
                    </td>
                    <td>
                        @if($rs->status === 'approved')
                            <span class="badge badge-success">Approved</span>
                        @else
                            <span class="badge badge-warning">{{ ucfirst($rs->status) }}</span>
                        @endif
                    </td>
                    <td>{{ $rs->created_at->format('Y-m-d') }}</td>
                    <td>
                        @if($rs->status !== 'approved')
                            <a href="{{ route('admin.comment.approve', $rs->id) }}"
                               style="background:#28a745; color:#fff; padding:5px 12px; border-radius:4px; font-size:0.85rem;">Approve</a>
                        @else
                            <span style="color:#27ae60; font-size:0.85rem;"><i class="fa-solid fa-check"></i> Done</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.comment.delete', $rs->id) }}"
                           onclick="return confirm('Delete this comment?')"
                           style="background:#dc3545; color:#fff; padding:5px 12px; border-radius:4px; font-size:0.85rem;">Delete</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" style="text-align:center; color:#888; padding:30px;">No comments yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
