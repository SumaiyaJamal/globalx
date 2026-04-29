<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — ForexTalent</title>
    <link rel="icon" type="image/png" href="{{ asset('images/web_logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/web_logo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;0,600;1,400&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary:       #0a5c8a;
            --primary-dark:  #073f61;
            --primary-light: #1488c6;
            --accent:        #00c9a7;
            --text-dark:     #0d1b2a;
            --text-mid:      #3d5166;
            --text-light:    #7a91a8;
            --bg-soft:       #f4f8fc;
            --bg-white:      #ffffff;
            --border:        #dde8f0;
            --gradient-hero: linear-gradient(105deg, rgba(7,63,97,.92) 0%, rgba(10,92,138,.80) 55%, rgb(20, 136, 198) 100%);
            --shadow-card:   0 12px 40px rgba(10,92,138,.18);
            --radius:        14px;
            --radius-sm:     8px;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            min-height: 100vh;
            background: var(--bg-soft);
            color: var(--text-dark);
        }
        h1,h2,h3,h4,h5,h6 { font-family: 'Sora', sans-serif; }

        .login-shell {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 1fr 480px;
        }
        .login-left {
            background: var(--gradient-hero);
            color: #fff;
            padding: 2.5rem 2rem;
            display: flex;
            align-items: end;
        }
        .login-left .content {
            max-width: 620px;
            margin: 0 auto;
        }
        .login-left h1 {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            margin-bottom: .7rem;
            letter-spacing: -1px;
        }
        .login-left p { color: rgba(255,255,255,.82); line-height: 1.7; max-width: 520px; }

        .login-right {
            display:flex;
            align-items:center;
            justify-content:center;
            padding: 1.25rem;
        }
        .login-card {
            width: 100%;
            max-width: 420px;
            background: #fff;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            box-shadow: var(--shadow-card);
            padding: 1.5rem;
        }
        .brand-dot { width:10px;height:10px;border-radius:50%;background:var(--accent); box-shadow: 0 0 0 7px rgba(0,201,167,.14); }
        .brand-logo {
            height: 42px;
            width: auto;
            object-fit: contain;
            display: block;
        }

        .form-label { font-weight: 700; color: var(--text-mid); font-size: .9rem; }
        .form-control, .form-check-input {
            border: 1.5px solid var(--border);
            border-radius: var(--radius-sm);
        }
        .form-control {
            padding: .65rem .85rem;
            font-size: .95rem;
        }
        .form-control:focus {
            border-color: var(--primary-light);
            box-shadow: 0 0 0 3px rgba(20,136,198,.12);
        }
        .btn-accent {
            background: var(--primary);
            border: none;
            color: #fff;
            font-family: 'Sora', sans-serif;
            font-weight: 700;
            border-radius: 50px;
            padding: .72rem 1rem;
        }
        .btn-accent:hover { background: var(--primary-dark); color: #fff; }

        @media (max-width: 991.98px) {
            .login-shell { grid-template-columns: 1fr; }
            .login-left {
                padding: 2.2rem 1.2rem;
                align-items: center;
                text-align: center;
            }
            .login-left .content p { margin: 0 auto; }
            .login-right { padding: 1rem 1rem 2rem; margin-top: -20px; }
        }
    </style>
</head>
<body>
    <div class="login-shell">
        <section class="login-left">
            <div class="content">
                <span class="section-label" style="display:block;font-family:'Sora',sans-serif;letter-spacing:2px;text-transform:uppercase;color:var(--accent);font-size:.8rem;font-weight:700;">Secure Access</span>
                <h1>Admin Control Center</h1>
                <p>
                    Manage jobs, applications, and offers from one dashboard.
                    Access is restricted to authorized admin accounts only.
                </p>
            </div>
        </section>

        <section class="login-right">
            <div class="login-card">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <img class="brand-logo" src="{{ asset('images/web_logo.png') }}" alt="Website Logo">
                    <div>
                        <div class="fw-bold" style="font-family:'Sora',sans-serif;color:var(--primary-dark);">Admin Login</div>
                        <div class="small" style="color:var(--text-light);font-weight:700;">ForexTalent</div>
                    </div>
                </div>

                <form method="POST" action="{{ route('admin.login.submit') }}" novalidate>
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                               class="form-control @error('email') is-invalid @enderror"
                               placeholder="admin@example.com" required autofocus>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password"
                               class="form-control @error('password') is-invalid @enderror"
                               placeholder="••••••••" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember" style="color:var(--text-mid);font-weight:700;">
                                Remember me
                            </label>
                        </div>
                        <a class="small text-decoration-none" href="{{ url('/') }}" style="color:var(--primary);font-weight:700;">Back to website</a>
                    </div>
                    <button type="submit" class="btn btn-accent w-100">
                        <i class="bi bi-shield-lock me-1"></i> Sign in
                    </button>
                </form>

                <div class="mt-3 small" style="color:var(--text-light);">
                    Default seeded admin is from your `.env`:
                    <div><code>ADMIN_EMAIL</code> and <code>ADMIN_PASSWORD</code></div>
                </div>
            </div>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Login failed',
                html: `{!! collect($errors->all())->map(fn($e) => '<div style="text-align:left;">- '.e($e).'</div>')->implode('') !!}`,
                confirmButtonColor: '#0a5c8a'
            });
        @endif
    </script>
</body>
</html>

