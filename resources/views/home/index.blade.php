@extends('frontbase')

@section('title', 'Home - Sport Store')

@section('meta')
    <meta name="description" content="Welcome to Sport Store - Your sports equipment destination">
@endsection

@section('header')
    @parent
@endsection

@section('sidebar')
    <h3 style="margin-top:0;">Categories</h3>
    <ul style="list-style:none; padding:0;">
        <li style="margin:8px 0;"><a href="#">Football</a></li>
        <li style="margin:8px 0;"><a href="#">Basketball</a></li>
        <li style="margin:8px 0;"><a href="#">Tennis</a></li>
        <li style="margin:8px 0;"><a href="#">Swimming</a></li>
    </ul>
@endsection

@section('content')
    <h2>Welcome to Sport Store</h2>
    <p>Find the best sports equipment for every sport.</p>

    <div style="display:flex; gap:20px; margin-top:20px;">
        <div style="background:#f0f8ff; border:1px solid #cce; padding:20px; border-radius:8px; flex:1;">
            <h3>New Arrivals</h3>
            <p>Check out the latest products added to our store.</p>
        </div>
        <div style="background:#fff8f0; border:1px solid #ecc; padding:20px; border-radius:8px; flex:1;">
            <h3>Best Sellers</h3>
            <p>Our most popular items loved by athletes.</p>
        </div>
        <div style="background:#f0fff0; border:1px solid #cec; padding:20px; border-radius:8px; flex:1;">
            <h3>Offers</h3>
            <p>Special discounts available this week only.</p>
        </div>
    </div>
@endsection
