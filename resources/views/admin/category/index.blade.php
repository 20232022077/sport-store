@extends('layouts.admin_base')

@section('title', 'Categories - Admin Panel')

@section('page_title', 'Categories')

@section('content')

    <div class="page-header" style="display:flex; justify-content:space-between; align-items:center;">
        <div>
            <h2>Categories</h2>
            <p>Manage all product categories</p>
        </div>
        <a href="/admin/category/create" style="background:#3b9eff; color:#fff; padding:10px 20px; border-radius:6px; font-weight:600; font-size:0.9rem;">
            + Add Category
        </a>
    </div>

    <div class="table-card">
        <h4>All Categories</h4>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Keywords</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->title }}</td>
                        <td>{{ $category->keywords ?? '-' }}</td>
                        <td>
                            @if($category->status == 1)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif
                        </td>
                        <td>{{ $category->created_at->format('Y-m-d') }}</td>
                        <td>
                            <a href="#" style="color:#3b9eff; margin-right:10px;">Edit</a>
                            <a href="#" style="color:#e74c3c;">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align:center; color:#999; padding:30px;">
                            No categories found. <a href="/admin/category/create" style="color:#3b9eff;">Add one</a>.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
