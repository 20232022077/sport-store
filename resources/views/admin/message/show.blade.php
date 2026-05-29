@extends('layouts.admin_base')

@section('title', 'Message Details')

@section('page_title', 'Message Details')

@section('content')

    <div class="page-header">
        <h2>Message Details</h2>
    </div>

    @if(session('success'))
        <div style="background:#eafaf1; border:1px solid #2ecc71; border-radius:6px; padding:12px 16px; margin-bottom:20px; color:#27ae60; font-size:0.9rem;">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-card" style="max-width:700px;">

        <table>
            <tbody>
                <tr>
                    <td style="width:30%; font-weight:600; color:#1e2a3b;">ID</td>
                    <td>{{ $data->id }}</td>
                </tr>
                <tr>
                    <td style="font-weight:600; color:#1e2a3b;">Name</td>
                    <td>{{ $data->name }}</td>
                </tr>
                <tr>
                    <td style="font-weight:600; color:#1e2a3b;">Email</td>
                    <td>{{ $data->email }}</td>
                </tr>
                <tr>
                    <td style="font-weight:600; color:#1e2a3b;">Phone</td>
                    <td>{{ $data->phone ?? '—' }}</td>
                </tr>
                <tr>
                    <td style="font-weight:600; color:#1e2a3b;">Subject</td>
                    <td>{{ $data->subject }}</td>
                </tr>
                <tr>
                    <td style="font-weight:600; color:#1e2a3b;">Message</td>
                    <td style="white-space:pre-line;">{{ $data->message }}</td>
                </tr>
                <tr>
                    <td style="font-weight:600; color:#1e2a3b;">IP Address</td>
                    <td>{{ $data->ip_address }}</td>
                </tr>
                <tr>
                    <td style="font-weight:600; color:#1e2a3b;">Status</td>
                    <td>
                        @if($data->status == 1)
                            <span class="badge badge-success">Read</span>
                        @else
                            <span class="badge badge-warning">Unread</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td style="font-weight:600; color:#1e2a3b;">Date</td>
                    <td>{{ $data->created_at }}</td>
                </tr>
            </tbody>
        </table>

        {{-- Admin Note --}}
        <div style="margin-top:24px; padding-top:18px; border-top:2px solid #f0f2f5;">
            <h4 style="color:#1e2a3b; margin-bottom:14px; font-size:0.95rem; font-weight:600;">Admin Note</h4>

            <form action="{{ route('admin.message.update', $data->id) }}" method="POST">
                @csrf
                <textarea name="note" rows="4" placeholder="Write an internal note..."
                    style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; outline:none; resize:vertical; margin-bottom:12px;">{{ $data->note }}</textarea>
                <button type="submit" style="background:#3b9eff; color:#fff; padding:9px 22px; border:none; border-radius:6px; font-weight:600; font-size:0.9rem; cursor:pointer;">
                    Save Note
                </button>
            </form>
        </div>

        {{-- Actions --}}
        <div style="display:flex; gap:12px; margin-top:20px; padding-top:16px; border-top:2px solid #f0f2f5;">
            <a href="{{ route('admin.message.delete', $data->id) }}"
               style="background:#dc3545; color:#fff; padding:10px 24px; border-radius:6px; font-weight:600; font-size:0.9rem;">
                <i class="fa-solid fa-trash"></i> Delete
            </a>
            <a href="{{ route('admin.message.index') }}"
               style="background:#f0f2f5; color:#555; padding:10px 22px; border-radius:6px; font-weight:600; font-size:0.9rem;">
                Back
            </a>
        </div>

    </div>

@endsection
