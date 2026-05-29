@extends('layouts.admin_base')

@section('title', 'Edit Message')

@section('page_title', 'Edit Message')

@section('content')

    <div class="page-header">
        <h2>Edit Message</h2>
        <p>You can only update status and admin note</p>
    </div>

    <div class="table-card" style="max-width:700px;">

        {{-- Read-only message info --}}
        <div style="background:#f8fafc; border-radius:6px; padding:16px; margin-bottom:24px; border:1px solid #e8ecf0;">
            <p style="margin-bottom:6px; font-size:0.9rem; color:#666;"><strong>From:</strong> {{ $data->name }} &lt;{{ $data->email }}&gt;</p>
            <p style="margin-bottom:6px; font-size:0.9rem; color:#666;"><strong>Subject:</strong> {{ $data->subject }}</p>
            <p style="font-size:0.9rem; color:#666;"><strong>Date:</strong> {{ $data->created_at->format('Y-m-d H:i') }}</p>
        </div>

        <form action="{{ route('admin.message.update', $data->id) }}" method="POST">
            @csrf

            {{-- Status --}}
            <div style="margin-bottom:18px;">
                <label style="display:block; font-weight:600; margin-bottom:6px; color:#1e2a3b;">Status</label>
                <select name="status" style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; background:#fff; outline:none;">
                    <option value="0" {{ $data->status == 0 ? 'selected' : '' }}>New</option>
                    <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>Read</option>
                </select>
            </div>

            {{-- Admin Note --}}
            <div style="margin-bottom:24px;">
                <label style="display:block; font-weight:600; margin-bottom:6px; color:#1e2a3b;">Admin Note</label>
                <textarea name="admin_note" rows="5" placeholder="Write an internal note..."
                    style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; outline:none; resize:vertical;">{{ $data->admin_note }}</textarea>
            </div>

            <div style="display:flex; gap:12px;">
                <button type="submit" style="background:#28a745; color:#fff; padding:11px 28px; border:none; border-radius:6px; font-weight:600; font-size:0.95rem; cursor:pointer;">
                    Save Changes
                </button>
                <a href="{{ route('admin.message.show', $data->id) }}" style="background:#f0f2f5; color:#555; padding:11px 22px; border-radius:6px; font-weight:600; font-size:0.95rem;">
                    Cancel
                </a>
            </div>

        </form>
    </div>

@endsection
