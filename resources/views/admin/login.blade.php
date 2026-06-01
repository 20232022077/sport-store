<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Sport Store</title>
    <link rel="stylesheet" href="{{ asset('assets/admin/dist/css/admin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body { background:#1e2a3b; display:flex; align-items:center; justify-content:center; min-height:100vh; }
        .login-box {
            background:#fff;
            border-radius:12px;
            padding:40px;
            width:100%;
            max-width:420px;
            box-shadow:0 10px 40px rgba(0,0,0,0.3);
        }
        .login-logo {
            text-align:center;
            margin-bottom:30px;
        }
        .login-logo i { font-size:2.5rem; color:#3b9eff; }
        .login-logo h2 { color:#1e2a3b; font-size:1.4rem; margin-top:8px; font-weight:700; }
        .login-logo p { color:#888; font-size:0.88rem; margin-top:4px; }
        .form-group { margin-bottom:20px; }
        .form-group label { display:block; font-weight:600; margin-bottom:6px; color:#1e2a3b; font-size:0.9rem; }
        .form-group input {
            width:100%; padding:11px 14px; border:1px solid #dde3ec;
            border-radius:6px; font-size:0.95rem; outline:none; box-sizing:border-box;
            transition:border-color 0.2s;
        }
        .form-group input:focus { border-color:#3b9eff; }
        .btn-login {
            width:100%; padding:12px; background:#3b9eff; color:#fff;
            border:none; border-radius:6px; font-size:1rem; font-weight:700;
            cursor:pointer; transition:background 0.2s;
        }
        .btn-login:hover { background:#2d87e8; }
        .alert-error {
            background:#fdedec; border:1px solid #e74c3c; color:#e74c3c;
            padding:11px 14px; border-radius:6px; margin-bottom:20px; font-size:0.9rem;
        }
        .alert-success {
            background:#eafaf1; border:1px solid #2ecc71; color:#27ae60;
            padding:11px 14px; border-radius:6px; margin-bottom:20px; font-size:0.9rem;
        }
        .remember-row { display:flex; align-items:center; gap:8px; margin-bottom:20px; }
        .remember-row label { color:#555; font-size:0.88rem; font-weight:400; margin:0; }
    </style>
</head>
<body>

<div class="login-box">

    <div class="login-logo">
        <i class="fa-solid fa-store"></i>
        <h2>Sport Admin</h2>
        <p>Sign in to your admin account</p>
    </div>

    @if(session('error'))
        <div class="alert-error"><i class="fa-solid fa-circle-exclamation"></i> {{ session('error') }}</div>
    @endif

    @if(session('success'))
        <div class="alert-success"><i class="fa-solid fa-circle-check"></i> {{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert-error">
            @foreach($errors->all() as $error)
                <div><i class="fa-solid fa-circle-exclamation"></i> {{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form action="{{ route('admin.loginadmin') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Email Address</label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="admin@example.com" required autofocus>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="••••••••" required>
        </div>

        <div class="remember-row">
            <input type="checkbox" name="remember" id="remember" value="1">
            <label for="remember">Remember Me</label>
        </div>

        <button type="submit" class="btn-login">
            <i class="fa-solid fa-right-to-bracket"></i> Sign In
        </button>

    </form>

</div>

</body>
</html>
