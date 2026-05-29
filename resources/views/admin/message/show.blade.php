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
                        @if($data->status == 0)
                            <span class="badge badge-warning">New</span>
                        @else
                            <span class="badge badge-success">Read</span>
                        @endif
                    </td>
                </tr>
                @if($data->admin_note)
                <tr>
                    <td style="font-weight:600; color:#1e2a3b;">Admin Note</td>
                    <td>{{ $data->admin_note }}</td>
                </tr>
                @endif
                <tr>
                    <td style="font-weight:600; color:#1e2a3b;">Date</td>
                    <td>{{ $data->created_at }}</td>
                </tr>
            </tbody>
        </table>

        {{-- Actions --}}
        <div style="display:flex; gap:12px; margin-top:20px; padding-top:16px; border-top:2px solid #f0f2f5;">
            <a href="{{ route('admin.message.edit', $data->id) }}"
               style="background:#28a745; color:#fff; padding:10px 24px; border-radius:6px; font-weight:600; font-size:0.9rem;">
                <i class="fa-solid fa-pen"></i> Edit
            </a>
            <a href="{{ route('admin.message.delete', $data->id) }}"
               onclick="return confirm('Are you sure you want to delete this message?')"
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
