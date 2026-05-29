@extends('layouts.admin_base')

@section('title', 'Messages')

@section('page_title', 'Messages')

@section('content')

    <div class="page-header">
        <h2>Messages</h2>
        <p>All contact form submissions</p>
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Subject</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Show</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $rs)
                <tr>
                    <td>{{ $rs->id }}</td>
                    <td>{{ $rs->name }}</td>
                    <td>{{ $rs->email }}</td>
                    <td>{{ $rs->phone ?? '—' }}</td>
                    <td>{{ $rs->subject }}</td>
                    <td>
                        @if($rs->status == 0)
                            <span class="badge badge-warning">New</span>
                        @else
                            <span class="badge badge-success">Read</span>
                        @endif
                    </td>
                    <td>{{ $rs->created_at->format('Y-m-d') }}</td>
                    <td>
                        <a href="{{ route('admin.message.show', $rs->id) }}" style="background:#17a2b8; color:#fff; padding:5px 12px; border-radius:4px; font-size:0.85rem;">Show</a>
                    </td>
                    <td>
                        <a href="{{ route('admin.message.edit', $rs->id) }}" style="background:#28a745; color:#fff; padding:5px 12px; border-radius:4px; font-size:0.85rem;">Edit</a>
                    </td>
                    <td>
                        <a href="{{ route('admin.message.delete', $rs->id) }}"
                           onclick="return confirm('Are you sure you want to delete this message?')"
                           style="background:#dc3545; color:#fff; padding:5px 12px; border-radius:4px; font-size:0.85rem;">Delete</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" style="text-align:center; color:#888; padding:30px;">No messages yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
