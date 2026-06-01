@extends('layouts.admin_base')

@section('title', 'Add Role')

@section('page_title', 'Add Role')

@section('content')

    <div class="page-header"><h2>Add New Role</h2></div>

    <div class="table-card" style="max-width:500px;">

        @if($errors->any())
            <div style="background:#fdedec; border:1px solid #e74c3c; border-radius:6px; padding:12px 16px; margin-bottom:20px;">
                <ul style="margin:0; padding-left:18px; color:#e74c3c; font-size:0.9rem;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.role.store') }}" method="POST">
            @csrf

            <div style="margin-bottom:18px;">
                <label style="display:block; font-weight:600; margin-bottom:6px; color:#1e2a3b;">Role Title</label>
                <input type="text" name="title" value="{{ old('title') }}" placeholder="e.g. Admin, Editor, Manager"
                    style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; outline:none;">
            </div>

            <div style="display:flex; gap:12px;">
                <button type="submit" style="background:#3b9eff; color:#fff; padding:11px 28px; border:none; border-radius:6px; font-weight:600; font-size:0.95rem; cursor:pointer;">
                    Save Role
                </button>
                <a href="{{ route('admin.role.index') }}" style="background:#f0f2f5; color:#555; padding:11px 22px; border-radius:6px; font-weight:600; font-size:0.95rem;">
                    Cancel
                </a>
            </div>

        </form>
    </div>

@endsection
