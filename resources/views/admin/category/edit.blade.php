@extends('layouts.admin_base')

@section('title', 'Edit Category')

@section('page_title', 'Edit Category')

@section('content')

    <div class="page-header">
        <h2>Edit Category</h2>
    </div>

    <div class="table-card" style="max-width:700px;">

        <form action="/admin/category/update/{{ $data->id }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Title --}}
            <div style="margin-bottom:18px;">
                <label style="display:block; font-weight:600; margin-bottom:6px; color:#1e2a3b;">Title</label>
                <input
                    type="text"
                    name="title"
                    value="{{ $data->title }}"
                    style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; outline:none;">
            </div>

            {{-- Keywords --}}
            <div style="margin-bottom:18px;">
                <label style="display:block; font-weight:600; margin-bottom:6px; color:#1e2a3b;">Keywords</label>
                <input
                    type="text"
                    name="keywords"
                    value="{{ $data->keywords }}"
                    style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; outline:none;">
            </div>

            {{-- Description --}}
            <div style="margin-bottom:18px;">
                <label style="display:block; font-weight:600; margin-bottom:6px; color:#1e2a3b;">Description</label>
                <input
                    type="text"
                    name="description"
                    value="{{ $data->description }}"
                    style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; outline:none;">
            </div>

            {{-- Image --}}
            <div style="margin-bottom:18px;">
                <label style="display:block; font-weight:600; margin-bottom:6px; color:#1e2a3b;">Image</label>
                <input
                    type="file"
                    name="image"
                    accept="image/*"
                    style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; background:#fff;">
            </div>

            {{-- Status --}}
            <div style="margin-bottom:24px;">
                <label style="display:block; font-weight:600; margin-bottom:6px; color:#1e2a3b;">Status</label>
                <select
                    name="status"
                    style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; background:#fff; outline:none;">
                    <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>True</option>
                    <option value="0" {{ $data->status == 0 ? 'selected' : '' }}>False</option>
                </select>
            </div>

            {{-- Buttons --}}
            <div style="display:flex; gap:12px;">
                <button type="submit" style="background:#28a745; color:#fff; padding:11px 28px; border:none; border-radius:6px; font-weight:600; font-size:0.95rem; cursor:pointer;">
                    Update
                </button>
                <a href="/admin/category" style="background:#f0f2f5; color:#555; padding:11px 22px; border-radius:6px; font-weight:600; font-size:0.95rem;">
                    Cancel
                </a>
            </div>

        </form>
    </div>

@endsection
