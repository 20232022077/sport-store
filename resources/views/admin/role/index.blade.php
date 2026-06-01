@extends('layouts.admin_base')

@section('title', 'Roles')

@section('page_title', 'Roles')

@section('content')

    <div class="page-header" style="display:flex; justify-content:space-between; align-items:center;">
        <div><h2>Roles</h2></div>
        <a href="{{ route('admin.role.create') }}" style="background:#3b9eff; color:#fff; padding:10px 20px; border-radius:6px; font-weight:600; font-size:0.9rem;">
            + Add Role
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
                    <th>Title</th>
                    <th>Created At</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $rs)
                <tr>
                    <td>{{ $rs->id }}</td>
                    <td>{{ $rs->title }}</td>
                    <td>{{ $rs->created_at->format('Y-m-d') }}</td>
                    <td>
                        <a href="{{ route('admin.role.delete', $rs->id) }}"
                           onclick="return confirm('Delete this role?')"
                           style="background:#dc3545; color:#fff; padding:5px 12px; border-radius:4px; font-size:0.85rem;">Delete</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="text-align:center; color:#888; padding:30px;">No roles yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
