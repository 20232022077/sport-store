@extends('layouts.admin_base')

@section('title', 'Category Details')

@section('page_title', 'Category Details')

@section('content')

    <div class="page-header">
        <h2>Category Details</h2>
        <p>Full information for this category</p>
    </div>

    <div class="table-card" style="max-width:700px;">

        <table>
            <tbody>
                <tr>
                    <td style="width:30%; font-weight:600; color:#1e2a3b;">ID</td>
                    <td>{{ $data->id }}</td>
                </tr>
                <tr>
                    <td style="font-weight:600; color:#1e2a3b;">Title</td>
                    <td>{{ $data->title }}</td>
                </tr>
                <tr>
                    <td style="font-weight:600; color:#1e2a3b;">Keywords</td>
                    <td>{{ $data->keywords }}</td>
                </tr>
                <tr>
                    <td style="font-weight:600; color:#1e2a3b;">Description</td>
                    <td>{{ $data->description }}</td>
                </tr>
                <tr>
                    <td style="font-weight:600; color:#1e2a3b;">Status</td>
                    <td>
                        @if($data->status == 1)
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-danger">Inactive</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td style="font-weight:600; color:#1e2a3b;">Created At</td>
                    <td>{{ $data->created_at }}</td>
                </tr>
                <tr>
                    <td style="font-weight:600; color:#1e2a3b;">Updated At</td>
                    <td>{{ $data->updated_at }}</td>
                </tr>
            </tbody>
        </table>

        <div style="display:flex; gap:12px; margin-top:20px; padding-top:16px; border-top:2px solid #f0f2f5;">
            <a href="/admin/category/edit/{{ $data->id }}"
               style="background:#28a745; color:#fff; padding:10px 24px; border-radius:6px; font-weight:600; font-size:0.9rem;">
                <i class="fa-solid fa-pen"></i> Edit
            </a>
            <a href="#"
               style="background:#dc3545; color:#fff; padding:10px 24px; border-radius:6px; font-weight:600; font-size:0.9rem;">
                <i class="fa-solid fa-trash"></i> Delete
            </a>
            <a href="/admin/category"
               style="background:#f0f2f5; color:#555; padding:10px 22px; border-radius:6px; font-weight:600; font-size:0.9rem;">
                Back
            </a>
        </div>

    </div>

@endsection
