@extends('layouts.admin_base')

@section('title', 'Category List')

@section('page_title', 'Category List')

@section('content')

    <div class="page-header" style="display:flex; justify-content:space-between; align-items:center;">
        <div>
            <h2>Category List</h2>
        </div>
        <a href="/admin/category/create" style="background:#3b9eff; color:#fff; padding:10px 20px; border-radius:6px; font-weight:600; font-size:0.9rem;">
            + Add Category
        </a>
    </div>

    <div class="table-card">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Keywords</th>
                    <th>Description</th>
                    <th>Image</th>
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
                    <td>{{ $rs->title }}</td>
                    <td>{{ $rs->keywords }}</td>
                    <td>{{ $rs->description }}</td>
                    <td>{{ $rs->image }}</td>
                    <td>{{ $rs->status }}</td>
                    <td>
                        <a href="/admin/category/edit/{{ $rs->id }}" style="background:#28a745; color:#fff; padding:5px 12px; border-radius:4px; font-size:0.85rem;">Edit</a>
                    </td>
                    <td>
                        <a href="#" style="background:#dc3545; color:#fff; padding:5px 12px; border-radius:4px; font-size:0.85rem;">Delete</a>
                    </td>
                    <td>
                        <a href="#" style="background:#17a2b8; color:#fff; padding:5px 12px; border-radius:4px; font-size:0.85rem;">Show</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
