@extends('layouts.admin_base')

@section('title', 'User Details')

@section('page_title', 'User Details')

@section('content')

    <div class="page-header"><h2>User Details</h2></div>

    @if(session('success'))
        <div style="background:#eafaf1; border:1px solid #2ecc71; border-radius:6px; padding:12px 16px; margin-bottom:20px; color:#27ae60; font-size:0.9rem;">
            {{ session('success') }}
        </div>
    @endif

    {{-- User Info --}}
    <div class="table-card" style="max-width:700px; margin-bottom:25px;">
        <table>
            <tbody>
                <tr>
                    <td style="width:30%; font-weight:600; color:#1e2a3b;">ID</td>
                    <td>{{ $data->id }}</td>
                </tr>
                <tr>
                    <td style="font-weight:600; color:#1e2a3b;">Name</td>
                    <td>{{ $data->name }}</td>
                </tr>
                <tr>
                    <td style="font-weight:600; color:#1e2a3b;">Email</td>
                    <td>{{ $data->email }}</td>
                </tr>
                <tr>
                    <td style="font-weight:600; color:#1e2a3b;">Joined</td>
                    <td>{{ $data->created_at->format('Y-m-d') }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- Assigned Roles --}}
    <div class="table-card" style="max-width:700px; margin-bottom:25px;">
        <h4 style="font-size:1rem; color:#1e2a3b; margin-bottom:15px; padding-bottom:10px; border-bottom:2px solid #f0f2f5;">
            Assigned Roles
        </h4>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Role</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data->roles as $rs)
                <tr>
                    <td>{{ $rs->id }}</td>
                    <td>{{ $rs->title }}</td>
                    <td>
                        <a href="{{ route('admin.user.deleterole', ['user_id' => $data->id, 'role_id' => $rs->id]) }}"
                           onclick="return confirm('Remove this role?')"
                           style="background:#dc3545; color:#fff; padding:5px 12px; border-radius:4px; font-size:0.85rem;">Remove</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" style="text-align:center; color:#888; padding:16px;">No roles assigned yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Add Role Form --}}
    <div class="table-card" style="max-width:700px;">
        <h4 style="font-size:1rem; color:#1e2a3b; margin-bottom:15px; padding-bottom:10px; border-bottom:2px solid #f0f2f5;">
            Assign New Role
        </h4>

        <form action="{{ route('admin.user.addrole', $data->id) }}" method="POST">
            @csrf

            <div style="display:flex; gap:12px; align-items:flex-end;">
                <div style="flex:1;">
                    <label style="display:block; font-weight:600; margin-bottom:6px; color:#1e2a3b; font-size:0.9rem;">Select Role</label>
                    <select name="role_id" style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; background:#fff; outline:none;">
                        <option value="">-- Choose Role --</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->title }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" style="background:#3b9eff; color:#fff; padding:11px 22px; border:none; border-radius:6px; font-weight:600; font-size:0.9rem; cursor:pointer;">
                    Assign
                </button>
            </div>

        </form>
    </div>

    <div style="margin-top:20px;">
        <a href="{{ route('admin.user.index') }}" style="background:#f0f2f5; color:#555; padding:10px 22px; border-radius:6px; font-weight:600; font-size:0.9rem;">
            Back to Users
        </a>
    </div>

@endsection
