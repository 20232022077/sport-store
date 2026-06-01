@extends('layouts.userpanel_base')

@section('title', 'Dashboard')

@section('content')

    <h2 class="section-title">Dashboard</h2>

    <div style="background:#fff; border-radius:8px; padding:24px; box-shadow:0 2px 8px rgba(0,0,0,0.06);">
        <p style="color:#555; font-size:1rem;">
            Welcome back, <strong>{{ Auth::user()->name }}</strong>!
        </p>
        <p style="color:#888; font-size:0.9rem; margin-top:8px;">
            From your account panel you can manage your profile, view your orders, and read your reviews.
        </p>
    </div>

@endsection
