@extends('layouts.admin_base')

@php use Illuminate\Support\Facades\Storage; @endphp

@section('title', 'Product Details')

@section('page_title', 'Product Details')

@section('content')

    <div class="page-header">
        <h2>Product Details</h2>
        <p>Full information for this product</p>
    </div>

    <div class="table-card" style="max-width:700px;">

        <table>
            <tbody>
                <tr>
                    <td style="width:30%; font-weight:600; color:#1e2a3b;">ID</td>
                    <td>{{ $data->id }}</td>
                </tr>
                <tr>
                    <td style="font-weight:600; color:#1e2a3b;">Category</td>
                    <td>{{ $data->category ? $data->category->title : '—' }}</td>
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
                    <td style="font-weight:600; color:#1e2a3b;">Image</td>
                    <td>
                        @if($data->image)
                            <img src="{{ Storage::url($data->image) }}" width="80" height="80" style="border-radius:6px; object-fit:cover;">
                        @else
                            No image
                        @endif
                    </td>
                </tr>
                <tr>
                    <td style="font-weight:600; color:#1e2a3b;">Price</td>
                    <td>{{ $data->price }}</td>
                </tr>
                <tr>
                    <td style="font-weight:600; color:#1e2a3b;">Quantity</td>
                    <td>{{ $data->quantity }}</td>
                </tr>
                <tr>
                    <td style="font-weight:600; color:#1e2a3b;">Min Quantity</td>
                    <td>{{ $data->minquantity }}</td>
                </tr>
                <tr>
                    <td style="font-weight:600; color:#1e2a3b;">Tax</td>
                    <td>{{ $data->tax }}%</td>
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
            <a href="{{ route('admin.product.edit', ['id' => $data->id]) }}"
               style="background:#28a745; color:#fff; padding:10px 24px; border-radius:6px; font-weight:600; font-size:0.9rem;">
                <i class="fa-solid fa-pen"></i> Edit
            </a>
            <a href="{{ route('admin.product.delete', ['id' => $data->id]) }}"
               style="background:#dc3545; color:#fff; padding:10px 24px; border-radius:6px; font-weight:600; font-size:0.9rem;">
                <i class="fa-solid fa-trash"></i> Delete
            </a>
            <a href="{{ route('admin.product.index') }}"
               style="background:#f0f2f5; color:#555; padding:10px 22px; border-radius:6px; font-weight:600; font-size:0.9rem;">
                Back
            </a>
        </div>

    </div>

@endsection
