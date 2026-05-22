@extends('layouts.admin_base')

@section('title', 'Dashboard - Admin Panel')

@section('page_title', 'Dashboard')

@section('content')

    <div class="page-header">
        <h2>Dashboard</h2>
        <p>Welcome back! Here's what's happening in your store.</p>
    </div>

    {{-- Stats Cards --}}
    <div class="stats-grid">
        <div class="stat-card blue">
            <div class="stat-icon">📦</div>
            <div class="stat-info">
                <h3>248</h3>
                <p>Total Products</p>
            </div>
        </div>
        <div class="stat-card green">
            <div class="stat-icon">🛒</div>
            <div class="stat-info">
                <h3>1340</h3>
                <p>Total Orders</p>
            </div>
        </div>
        <div class="stat-card orange">
            <div class="stat-icon">👥</div>
            <div class="stat-info">
                <h3>892</h3>
                <p>Customers</p>
            </div>
        </div>
        <div class="stat-card red">
            <div class="stat-icon">💰</div>
            <div class="stat-info">
                <h3>54820</h3>
                <p>Revenue ($)</p>
            </div>
        </div>
    </div>

    {{-- Recent Orders Table --}}
    <div class="table-card">
        <h4>Recent Orders</h4>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Customer</th>
                    <th>Product</th>
                    <th>Amount</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1001</td>
                    <td>Ahmed Ali</td>
                    <td>Football Pro</td>
                    <td>$29.99</td>
                    <td><span class="badge badge-success">Delivered</span></td>
                </tr>
                <tr>
                    <td>1002</td>
                    <td>Sara Mohammed</td>
                    <td>Tennis Racket</td>
                    <td>$89.99</td>
                    <td><span class="badge badge-warning">Pending</span></td>
                </tr>
                <tr>
                    <td>1003</td>
                    <td>Khalid Hassan</td>
                    <td>Basketball Elite</td>
                    <td>$39.99</td>
                    <td><span class="badge badge-success">Delivered</span></td>
                </tr>
                <tr>
                    <td>1004</td>
                    <td>Nora Salem</td>
                    <td>Running Shoes</td>
                    <td>$74.99</td>
                    <td><span class="badge badge-danger">Cancelled</span></td>
                </tr>
                <tr>
                    <td>1005</td>
                    <td>Omar Faisal</td>
                    <td>Boxing Gloves</td>
                    <td>$54.99</td>
                    <td><span class="badge badge-warning">Processing</span></td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection
