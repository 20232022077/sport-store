@extends('layouts.admin_base')

@section('title', 'Users')

@section('page_title', 'Users')

@section('content')

    <div class="page-header"><h2>Users</h2></div>

    <div class="table-card">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th>Joined</th>
                    <th>Manage</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $rs)
                <tr>
                    <td>{{ $rs->id }}</td>
                    <td>{{ $rs->name }}</td>
                    <td>{{ $rs->email }}</td>
                    <td>
                        @foreach($rs->roles as $role)
                            <span class="badge badge-success">{{ $role->title }}</span>
                        @endforeach
                    </td>
                    <td>{{ $rs->created_at->format('Y-m-d') }}</td>
                    <td>
                        <a href="{{ route('admin.user.show', $rs->id) }}" style="background:#17a2b8; color:#fff; padding:5px 12px; border-radius:4px; font-size:0.85rem;">Manage</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align:center; color:#888; padding:30px;">No users found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
