@extends('layouts.admin_base')

@php use Illuminate\Support\Facades\Storage; @endphp

@section('title', 'Edit Product')

@section('page_title', 'Edit Product')

@section('head')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endsection

@section('footer')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $('#detail').summernote();
    </script>
@endsection

@section('content')

    <div class="page-header">
        <h2>Edit Product</h2>
    </div>

    <div class="table-card" style="max-width:700px;">

        <form action="{{ route('admin.product.update', ['id' => $data->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Category --}}
            <div style="margin-bottom:18px;">
                <label style="display:block; font-weight:600; margin-bottom:6px; color:#1e2a3b;">Category</label>
                <select name="category_id" style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; background:#fff; outline:none;">
                    <option value="0" {{ $data->category_id == 0 ? 'selected' : '' }}>Select Category</option>
                    @foreach($categories as $rs)
                        <option value="{{ $rs->id }}" {{ $rs->id == $data->category_id ? 'selected' : '' }}>
                            {{ \App\Models\Category::getParentsTree($rs, $rs->title) }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Title --}}
            <div style="margin-bottom:18px;">
                <label style="display:block; font-weight:600; margin-bottom:6px; color:#1e2a3b;">Title</label>
                <input type="text" name="title" value="{{ $data->title }}"
                    style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; outline:none;">
            </div>

            {{-- Keywords --}}
            <div style="margin-bottom:18px;">
                <label style="display:block; font-weight:600; margin-bottom:6px; color:#1e2a3b;">Keywords</label>
                <input type="text" name="keywords" value="{{ $data->keywords }}"
                    style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; outline:none;">
            </div>

            {{-- Description --}}
            <div style="margin-bottom:18px;">
                <label style="display:block; font-weight:600; margin-bottom:6px; color:#1e2a3b;">Description</label>
                <textarea name="description" rows="4"
                    style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; outline:none; resize:vertical;">{{ $data->description }}</textarea>
            </div>

            {{-- Image --}}
            <div style="margin-bottom:18px;">
                <label style="display:block; font-weight:600; margin-bottom:6px; color:#1e2a3b;">Image</label>
                @if($data->image)
                    <img src="{{ Storage::url($data->image) }}" width="60" height="60" style="border-radius:4px; object-fit:cover; margin-bottom:8px; display:block;">
                @endif
                <input type="file" name="image" accept="image/*"
                    style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; background:#fff;">
            </div>

            {{-- Price --}}
            <div style="margin-bottom:18px;">
                <label style="display:block; font-weight:600; margin-bottom:6px; color:#1e2a3b;">Price</label>
                <input type="number" step="0.01" name="price" value="{{ $data->price }}"
                    style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; outline:none;">
            </div>

            {{-- Quantity --}}
            <div style="margin-bottom:18px;">
                <label style="display:block; font-weight:600; margin-bottom:6px; color:#1e2a3b;">Quantity</label>
                <input type="number" name="quantity" value="{{ $data->quantity }}"
                    style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; outline:none;">
            </div>

            {{-- Min Quantity --}}
            <div style="margin-bottom:18px;">
                <label style="display:block; font-weight:600; margin-bottom:6px; color:#1e2a3b;">Min Quantity</label>
                <input type="number" name="minquantity" value="{{ $data->minquantity }}"
                    style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; outline:none;">
            </div>

            {{-- Tax --}}
            <div style="margin-bottom:18px;">
                <label style="display:block; font-weight:600; margin-bottom:6px; color:#1e2a3b;">Tax (%)</label>
                <input type="number" step="0.01" name="tax" value="{{ $data->tax }}"
                    style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; outline:none;">
            </div>

            {{-- Detail --}}
            <div style="margin-bottom:18px;">
                <label style="display:block; font-weight:600; margin-bottom:6px; color:#1e2a3b;">Detail</label>
                <textarea name="detail" id="detail" rows="6"
                    style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; outline:none; resize:vertical;">{!! $data->detail !!}</textarea>
            </div>

            {{-- Status --}}
            <div style="margin-bottom:24px;">
                <label style="display:block; font-weight:600; margin-bottom:6px; color:#1e2a3b;">Status</label>
                <select name="status" style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; background:#fff; outline:none;">
                    <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ $data->status == 0 ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            {{-- Buttons --}}
            <div style="display:flex; gap:12px;">
                <button type="submit" style="background:#28a745; color:#fff; padding:11px 28px; border:none; border-radius:6px; font-weight:600; font-size:0.95rem; cursor:pointer;">
                    Update
                </button>
                <a href="{{ route('admin.product.index') }}" style="background:#f0f2f5; color:#555; padding:11px 22px; border-radius:6px; font-weight:600; font-size:0.95rem;">
                    Cancel
                </a>
            </div>

        </form>
    </div>

@endsection
