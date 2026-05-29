@extends('layouts.admin_base')

@php use Illuminate\Support\Facades\Storage; @endphp

@section('title', 'Site Settings')

@section('page_title', 'Site Settings')

@section('head')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endsection

@section('content')

    <div class="page-header">
        <h2>Site Settings</h2>
        <p>Manage your website configuration</p>
    </div>

    @if(session('success'))
        <div style="background:#eafaf1; border:1px solid #2ecc71; border-radius:6px; padding:12px 16px; margin-bottom:20px; color:#27ae60; font-size:0.9rem;">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tabs --}}
    <div style="margin-bottom:20px; border-bottom:2px solid #e0e8f0; display:flex; gap:4px;">
        <button onclick="showTab('general')" id="tab-general" class="tab-btn active-tab">General</button>
        <button onclick="showTab('contact')" id="tab-contact" class="tab-btn">Contact</button>
        <button onclick="showTab('aboutus')" id="tab-aboutus" class="tab-btn">About Us</button>
        <button onclick="showTab('references')" id="tab-references" class="tab-btn">References</button>
        <button onclick="showTab('icon')" id="tab-icon" class="tab-btn">Icon</button>
    </div>

    <form action="{{ route('admin.setting.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $setting->id }}">

        {{-- General Tab --}}
        <div id="panel-general" class="table-card" style="max-width:700px;">

            <div style="margin-bottom:18px;">
                <label style="display:block; font-weight:600; margin-bottom:6px; color:#1e2a3b;">Site Title</label>
                <input type="text" name="title" value="{{ $setting->title }}"
                    style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; outline:none;">
            </div>

            <div style="margin-bottom:18px;">
                <label style="display:block; font-weight:600; margin-bottom:6px; color:#1e2a3b;">Keywords</label>
                <input type="text" name="keywords" value="{{ $setting->keywords }}"
                    style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; outline:none;">
            </div>

            <div style="margin-bottom:18px;">
                <label style="display:block; font-weight:600; margin-bottom:6px; color:#1e2a3b;">Description</label>
                <textarea name="description" rows="4"
                    style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; outline:none; resize:vertical;">{{ $setting->description }}</textarea>
            </div>

            <div style="margin-bottom:18px;">
                <label style="display:block; font-weight:600; margin-bottom:6px; color:#1e2a3b;">Company Name</label>
                <input type="text" name="company" value="{{ $setting->company }}"
                    style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; outline:none;">
            </div>

        </div>

        {{-- Contact Tab --}}
        <div id="panel-contact" class="table-card" style="max-width:700px; display:none;">

            <div style="margin-bottom:18px;">
                <label style="display:block; font-weight:600; margin-bottom:6px; color:#1e2a3b;">Address</label>
                <input type="text" name="address" value="{{ $setting->address }}"
                    style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; outline:none;">
            </div>

            <div style="margin-bottom:18px;">
                <label style="display:block; font-weight:600; margin-bottom:6px; color:#1e2a3b;">Phone</label>
                <input type="text" name="phone" value="{{ $setting->phone }}"
                    style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; outline:none;">
            </div>

            <div style="margin-bottom:18px;">
                <label style="display:block; font-weight:600; margin-bottom:6px; color:#1e2a3b;">Email</label>
                <input type="email" name="email" value="{{ $setting->email }}"
                    style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; outline:none;">
            </div>

            <div style="margin-bottom:18px;">
                <label style="display:block; font-weight:600; margin-bottom:6px; color:#1e2a3b;">Fax</label>
                <input type="text" name="fax" value="{{ $setting->fax }}"
                    style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; outline:none;">
            </div>

        </div>

        {{-- About Us Tab --}}
        <div id="panel-aboutus" class="table-card" style="max-width:700px; display:none;">

            <div style="margin-bottom:18px;">
                <label style="display:block; font-weight:600; margin-bottom:6px; color:#1e2a3b;">About Us Content</label>
                <textarea name="aboutus" id="aboutus" rows="10"
                    style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; outline:none; resize:vertical;">{!! $setting->aboutus !!}</textarea>
            </div>

        </div>

        {{-- References Tab --}}
        <div id="panel-references" class="table-card" style="max-width:700px; display:none;">

            <div style="margin-bottom:18px;">
                <label style="display:block; font-weight:600; margin-bottom:6px; color:#1e2a3b;">References Content</label>
                <textarea name="references" id="references" rows="10"
                    style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; outline:none; resize:vertical;">{!! $setting->references !!}</textarea>
            </div>

        </div>

        {{-- Icon Tab --}}
        <div id="panel-icon" class="table-card" style="max-width:700px; display:none;">

            <div style="margin-bottom:18px;">
                <label style="display:block; font-weight:600; margin-bottom:6px; color:#1e2a3b;">Site Icon</label>
                @if($setting->icon)
                    <img src="{{ Storage::url($setting->icon) }}" width="60" height="60"
                        style="border-radius:6px; object-fit:cover; margin-bottom:10px; display:block;">
                @endif
                <input type="file" name="icon" accept="image/*"
                    style="width:100%; padding:10px 14px; border:1px solid #dde3ec; border-radius:6px; font-size:0.95rem; background:#fff;">
            </div>

        </div>

        {{-- Submit --}}
        <div style="margin-top:16px;">
            <button type="submit" style="background:#3b9eff; color:#fff; padding:11px 28px; border:none; border-radius:6px; font-weight:600; font-size:0.95rem; cursor:pointer;">
                Save Settings
            </button>
        </div>

    </form>

@endsection

@section('footer')
<style>
    .tab-btn {
        padding: 9px 22px;
        border: none;
        background: #f0f2f5;
        color: #555;
        border-radius: 6px 6px 0 0;
        font-size: 0.92rem;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.2s, color 0.2s;
    }
    .active-tab { background: #3b9eff; color: #fff; }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    function showTab(name) {
        ['general','contact','aboutus','references','icon'].forEach(function(t) {
            document.getElementById('panel-' + t).style.display = 'none';
            document.getElementById('tab-' + t).classList.remove('active-tab');
        });
        document.getElementById('panel-' + name).style.display = 'block';
        document.getElementById('tab-' + name).classList.add('active-tab');
    }
    $('#aboutus').summernote({ height: 300 });
    $('#references').summernote({ height: 300 });
</script>
@endsection
