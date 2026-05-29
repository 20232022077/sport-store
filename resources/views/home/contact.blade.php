@extends('layouts.front_base')

@section('title', 'Contact Us | ' . ($setting?->title ?? 'Sport Store'))

@section('content')

    <div class="breadcrumb">
        <a href="{{ route('home') }}">Home</a>
        <span> &rsaquo; </span>
        <span>Contact Us</span>
    </div>

    <h2 class="section-title">Contact Us</h2>

    <div style="display:flex; gap:40px; flex-wrap:wrap;">

        {{-- Left: Contact Form --}}
        <div style="flex:1; min-width:280px; background:#fff; border-radius:8px; padding:30px; box-shadow:0 2px 8px rgba(0,0,0,0.06);">
            <h3 style="color:#1a1a2e; margin-bottom:20px; font-size:1.1rem;">Send a Message</h3>

            @if(session('success'))
                <div style="background:#eafaf1; border:1px solid #2ecc71; border-radius:6px; padding:12px 16px; margin-bottom:20px; color:#27ae60; font-size:0.9rem;">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div style="background:#fdedec; border:1px solid #e74c3c; border-radius:6px; padding:12px 16px; margin-bottom:20px;">
                    <ul style="margin:0; padding-left:18px; color:#e74c3c; font-size:0.9rem;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('storemessage') }}" method="POST">
                @csrf

                <div style="margin-bottom:16px;">
                    <label style="display:block; font-weight:600; margin-bottom:6px; color:#555; font-size:0.9rem;">Full Name <span style="color:#e74c3c;">*</span></label>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Your name"
                        style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; outline:none; box-sizing:border-box;">
                </div>

                <div style="margin-bottom:16px;">
                    <label style="display:block; font-weight:600; margin-bottom:6px; color:#555; font-size:0.9rem;">Email <span style="color:#e74c3c;">*</span></label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Your email"
                        style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; outline:none; box-sizing:border-box;">
                </div>

                <div style="margin-bottom:16px;">
                    <label style="display:block; font-weight:600; margin-bottom:6px; color:#555; font-size:0.9rem;">Phone</label>
                    <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Your phone"
                        style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; outline:none; box-sizing:border-box;">
                </div>

                <div style="margin-bottom:16px;">
                    <label style="display:block; font-weight:600; margin-bottom:6px; color:#555; font-size:0.9rem;">Subject <span style="color:#e74c3c;">*</span></label>
                    <input type="text" name="subject" value="{{ old('subject') }}" placeholder="Subject"
                        style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; outline:none; box-sizing:border-box;">
                </div>

                <div style="margin-bottom:20px;">
                    <label style="display:block; font-weight:600; margin-bottom:6px; color:#555; font-size:0.9rem;">Message <span style="color:#e74c3c;">*</span></label>
                    <textarea name="message" rows="5" placeholder="Your message..."
                        style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; outline:none; resize:vertical; box-sizing:border-box;">{{ old('message') }}</textarea>
                </div>

                <button type="submit"
                    style="background:#f0a500; color:#1a1a2e; padding:11px 28px; border:none; border-radius:6px; font-weight:700; font-size:0.95rem; cursor:pointer; width:100%;">
                    Send Message
                </button>
            </form>
        </div>

        {{-- Right: Company Info --}}
        <div style="flex:0 0 260px; background:#1a1a2e; border-radius:8px; padding:30px; color:#ccc;">
            <h3 style="color:#f0a500; margin-bottom:24px; font-size:1.1rem;">Contact Information</h3>

            @if($setting?->address)
                <div style="margin-bottom:16px; display:flex; gap:12px; align-items:flex-start;">
                    <i class="fa-solid fa-location-dot" style="color:#f0a500; margin-top:3px;"></i>
                    <span>{{ $setting->address }}</span>
                </div>
            @endif

            @if($setting?->phone)
                <div style="margin-bottom:16px; display:flex; gap:12px; align-items:center;">
                    <i class="fa-solid fa-phone" style="color:#f0a500;"></i>
                    <span>{{ $setting->phone }}</span>
                </div>
            @endif

            @if($setting?->email)
                <div style="margin-bottom:16px; display:flex; gap:12px; align-items:center;">
                    <i class="fa-solid fa-envelope" style="color:#f0a500;"></i>
                    <span>{{ $setting->email }}</span>
                </div>
            @endif

            @if($setting?->fax)
                <div style="margin-bottom:16px; display:flex; gap:12px; align-items:center;">
                    <i class="fa-solid fa-fax" style="color:#f0a500;"></i>
                    <span>{{ $setting->fax }}</span>
                </div>
            @endif
        </div>

    </div>

@endsection
