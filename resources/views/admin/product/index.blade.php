@extends('layouts.admin_base')

@php use Illuminate\Support\Facades\Storage; @endphp

@section('title', 'Product List')

@section('page_title', 'Product List')

@section('content')

    <div class="page-header" style="display:flex; justify-content:space-between; align-items:center;">
        <div>
            <h2>Product List</h2>
        </div>
        <a href="{{ route('admin.product.create') }}" style="background:#3b9eff; color:#fff; padding:10px 20px; border-radius:6px; font-weight:600; font-size:0.9rem;">
            + Add Product
        </a>
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
                    <th>Image</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Show</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $rs)
                <tr>
                    <td>{{ $rs->id }}</td>
                    <td>
                        @if($rs->image)
                            <img src="{{ Storage::url($rs->image) }}" width="40" height="40" style="border-radius:4px; object-fit:cover;">
                        @else
                            —
                        @endif
                    </td>
                    <td>{{ $rs->title }}</td>
                    <td>{{ $rs->category ? $rs->category->title : '—' }}</td>
                    <td>{{ $rs->price }}</td>
                    <td>{{ $rs->quantity }}</td>
                    <td>
                        @if($rs->status == 1)
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-danger">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.product.edit', ['id' => $rs->id]) }}" style="background:#28a745; color:#fff; padding:5px 12px; border-radius:4px; font-size:0.85rem;">Edit</a>
                    </td>
                    <td>
                        <a href="{{ route('admin.product.delete', ['id' => $rs->id]) }}" style="background:#dc3545; color:#fff; padding:5px 12px; border-radius:4px; font-size:0.85rem;">Delete</a>
                    </td>
                    <td>
                        <a href="{{ route('admin.product.show', ['id' => $rs->id]) }}" style="background:#17a2b8; color:#fff; padding:5px 12px; border-radius:4px; font-size:0.85rem;">Show</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
