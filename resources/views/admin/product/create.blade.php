@extends('layouts.admin_base')

@section('title', 'Add Product')

@section('page_title', 'Add Product')

@section('head')
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('detail');
    </script>
@endsection

@section('content')

    <div class="page-header">
        <h2>Add New Product</h2>
        <p>Fill in the details below to create a new product</p>
    </div>

    <div class="table-card" style="max-width:700px;">

        @if($errors->any())
            <div style="background:#fdedec; border:1px solid #e74c3c; border-radius:6px; padding:12px 16px; margin-bottom:20px;">
                <ul style="margin:0; padding-left:18px; color:#e74c3c; font-size:0.9rem;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Category --}}
            <div style="margin-bottom:18px;">
                <label style="display:block; font-weight:600; margin-bottom:6px; color:#1e2a3b;">Category</label>
                <select name="category_id" style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; background:#fff; outline:none;">
                    <option value="0">Select Category</option>
                    @foreach($categories as $rs)
                        <option value="{{ $rs->id }}">
                            {{ \App\Models\Category::getParentsTree($rs, $rs->title) }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Title --}}
            <div style="margin-bottom:18px;">
                <label style="display:block; font-weight:600; margin-bottom:6px; color:#1e2a3b;">Title <span style="color:#e74c3c;">*</span></label>
                <input type="text" name="title" value="{{ old('title') }}" placeholder="Product title"
                    style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; outline:none;">
            </div>

            {{-- Keywords --}}
            <div style="margin-bottom:18px;">
                <label style="display:block; font-weight:600; margin-bottom:6px; color:#1e2a3b;">Keywords</label>
                <input type="text" name="keywords" value="{{ old('keywords') }}" placeholder="e.g. football, sports"
                    style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; outline:none;">
            </div>

            {{-- Description --}}
            <div style="margin-bottom:18px;">
                <label style="display:block; font-weight:600; margin-bottom:6px; color:#1e2a3b;">Description</label>
                <textarea name="description" rows="4" placeholder="Product description..."
                    style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; outline:none; resize:vertical;">{{ old('description') }}</textarea>
            </div>

            {{-- Image --}}
            <div style="margin-bottom:18px;">
                <label style="display:block; font-weight:600; margin-bottom:6px; color:#1e2a3b;">Image</label>
                <input type="file" name="image" accept="image/*"
                    style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; background:#fff;">
            </div>

            {{-- Price --}}
            <div style="margin-bottom:18px;">
                <label style="display:block; font-weight:600; margin-bottom:6px; color:#1e2a3b;">Price</label>
                <input type="number" step="0.01" name="price" value="{{ old('price', 0) }}"
                    style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; outline:none;">
            </div>

            {{-- Quantity --}}
            <div style="margin-bottom:18px;">
                <label style="display:block; font-weight:600; margin-bottom:6px; color:#1e2a3b;">Quantity</label>
                <input type="number" name="quantity" value="{{ old('quantity', 0) }}"
                    style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; outline:none;">
            </div>

            {{-- Min Quantity --}}
            <div style="margin-bottom:18px;">
                <label style="display:block; font-weight:600; margin-bottom:6px; color:#1e2a3b;">Min Quantity</label>
                <input type="number" name="minquantity" value="{{ old('minquantity', 0) }}"
                    style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; outline:none;">
            </div>

            {{-- Tax --}}
            <div style="margin-bottom:18px;">
                <label style="display:block; font-weight:600; margin-bottom:6px; color:#1e2a3b;">Tax (%)</label>
                <input type="number" step="0.01" name="tax" value="{{ old('tax', 0) }}"
                    style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; outline:none;">
            </div>

            {{-- Detail --}}
            <div style="margin-bottom:18px;">
                <label style="display:block; font-weight:600; margin-bottom:6px; color:#1e2a3b;">Detail</label>
                <textarea name="detail" id="detail" rows="6"
                    style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; outline:none; resize:vertical;">{{ old('detail') }}</textarea>
            </div>

            {{-- Status --}}
            <div style="margin-bottom:24px;">
                <label style="display:block; font-weight:600; margin-bottom:6px; color:#1e2a3b;">Status <span style="color:#e74c3c;">*</span></label>
                <select name="status" style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; background:#fff; outline:none;">
                    <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            {{-- Buttons --}}
            <div style="display:flex; gap:12px;">
                <button type="submit" style="background:#3b9eff; color:#fff; padding:11px 28px; border:none; border-radius:6px; font-weight:600; font-size:0.95rem; cursor:pointer;">
                    Save Product
                </button>
                <a href="{{ route('admin.product.index') }}" style="background:#f0f2f5; color:#555; padding:11px 22px; border-radius:6px; font-weight:600; font-size:0.95rem;">
                    Cancel
                </a>
            </div>

        </form>
    </div>

@endsection
