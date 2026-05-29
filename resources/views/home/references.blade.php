@extends('layouts.front_base')

@section('title', 'References | ' . ($setting?->title ?? 'Sport Store'))

@section('content')

    <div class="breadcrumb">
        <a href="{{ route('home') }}">Home</a>
        <span> &rsaquo; </span>
        <span>References</span>
    </div>

    <h2 class="section-title">References</h2>

    <div style="background:#fff; border-radius:8px; padding:30px; box-shadow:0 2px 8px rgba(0,0,0,0.06); line-height:1.8; color:#444;">
        @if($setting?->references)
            {!! $setting->references !!}
        @else
            <p style="color:#888;">No content available yet.</p>
        @endif
    </div>

@endsection
