<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') — ForexTalent</title>
    <link rel="icon" type="image/png" href="{{ asset('images/web_logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/web_logo.png') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;0,600;1,400&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary:       #0682B5;
            --primary-dark:  #022B63;
            --primary-light: #0682B5;
            --accent:        #0682B5;
            --text-dark:     #0d1b2a;
            --text-mid:      #3d5166;
            --text-light:    #7a91a8;
            --bg-soft:       #f4f8fc;
            --bg-white:      #ffffff;
            --border:        #dde8f0;
            --shadow-card:   0 4px 24px rgba(2,43,99,.10);
            --radius:        14px;
            --radius-sm:     10px;
        }

        body {
            background: var(--bg-soft);
            font-family: 'DM Sans', sans-serif;
            color: var(--text-dark);
        }
        h1,h2,h3,h4,h5,h6 { font-family: 'Sora', sans-serif; font-weight: 800; }

        .admin-shell { min-height: 100vh; display:flex; }

        .admin-sidebar {
            width: 280px;
            background: rgba(255,255,255,0.96);
            backdrop-filter: blur(10px);
            border-right: 1px solid var(--border);
        }

        .admin-brand {
            padding: 16px 16px 10px;
            display:flex;
            align-items:center;
            gap: 10px;
            font-family: 'Sora', sans-serif;
            font-weight: 900;
            letter-spacing: -0.5px;
            color: var(--primary-dark);
        }
        .admin-brand .dot {
            width: 10px; height: 10px; border-radius: 50%;
            background: var(--accent);
            box-shadow: 0 0 0 7px rgba(6,130,181,.16);
        }
        .admin-brand-logo {
            height: 36px;
            width: auto;
            object-fit: contain;
            display: block;
        }

        .admin-nav { padding: 6px 10px 12px; }
        .admin-nav .muted {
            color: var(--text-light);
            font-weight: 800;
            padding: 12px 10px 8px;
            font-size: .72rem;
            text-transform: uppercase;
            letter-spacing: .14em;
            font-family: 'Sora', sans-serif;
        }
        .admin-nav a {
            display:flex;
            align-items:center;
            gap: 10px;
            padding: 10px 10px;
            border-radius: 12px;
            color: var(--text-mid);
            text-decoration:none;
            font-weight: 700;
            font-size: .93rem;
            transition: background .2s, color .2s;
        }
        .admin-nav a:hover { background: rgba(6,130,181,.08); color: var(--primary-dark); }
        .admin-nav a.active { background: rgba(6,130,181,.14); color: var(--primary-dark); }

        .admin-content { flex:1; min-width: 0; }

        .admin-topbar {
            background: rgba(255,255,255,0.96);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--border);
            padding: 12px 16px;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .admin-page { padding: 18px 16px 28px; }
        .admin-card {
            background: var(--bg-white);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            box-shadow: var(--shadow-card);
        }
        .badge-admin {
            background: rgba(6,130,181,.14);
            color: var(--primary-dark);
            border: 1px solid rgba(6,130,181,.25);
            font-weight: 800;
        }
        .btn-admin {
            background: var(--primary);
            border: none;
            color: #fff;
            font-weight: 800;
            border-radius: 999px;
            padding: .45rem 1rem;
        }
        .btn-admin:hover { background: var(--primary-dark); color: #fff; }
        .btn-admin-outline {
            border: 1px solid var(--border);
            background: #fff;
            border-radius: 999px;
            padding: .42rem 1rem;
            font-weight: 800;
            color: var(--text-mid);
        }
        .btn-admin-outline:hover { color: var(--primary-dark); border-color: rgba(6,130,181,.25); }

        @media (max-width: 991.98px) {
            .admin-shell { display:block; }
            .admin-sidebar { display:none; }
        }
    </style>
    @stack('styles')
</head>
<body>
<div class="admin-shell">
    <aside class="admin-sidebar">
        <div class="admin-brand">
            <img class="admin-brand-logo" src="{{ asset('images/web_logo.png') }}" alt="Website Logo">
            <div style="line-height:1;">
                Admin Panel
                <div style="font-size:.78rem;color:var(--text-light);font-weight:800;margin-top:3px;">ForexTalent</div>
            </div>
        </div>
        <nav class="admin-nav">
            <div class="muted">Main</div>
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-grid-1x2"></i> Dashboard
            </a>

            <div class="muted mt-2">Management</div>
            <a href="{{ route('admin.jobs.index') }}" class="{{ request()->routeIs('admin.jobs.*') ? 'active' : '' }}">
                <i class="bi bi-briefcase"></i> Jobs
            </a>
            <a href="{{ route('admin.applications.index') }}" class="{{ request()->routeIs('admin.applications.*') ? 'active' : '' }}">
                <i class="bi bi-inbox"></i> Applications
            </a>
            <a href="{{ route('admin.offers.index') }}" class="{{ request()->routeIs('admin.offers.*') ? 'active' : '' }}">
                <i class="bi bi-person-workspace"></i> Offers
            </a>
        </nav>
    </aside>

    <main class="admin-content">
        <div class="admin-topbar">
            <div class="d-flex align-items-center justify-content-between gap-3">
                <div class="d-flex align-items-center gap-2">
                    <button class="btn btn-admin-outline d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#adminNavCanvas" aria-controls="adminNavCanvas">
                        <i class="bi bi-list"></i>
                    </button>
                    <div>
                        <div class="fw-bold" style="font-family:'Sora',sans-serif;">@yield('heading', 'Admin')</div>
                        <div class="small" style="color:var(--text-light);font-weight:700;">{{ auth()->user()?->email }}</div>
                    </div>
                    <span class="badge badge-admin rounded-pill ms-1">Admin</span>
                </div>

                <div class="d-flex align-items-center gap-2">
                    <a class="btn btn-admin-outline" href="{{ url('/') }}">
                        <i class="bi bi-globe me-1"></i> Website
                    </a>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button class="btn btn-admin" type="submit">
                            <i class="bi bi-box-arrow-right me-1"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="admin-page">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @yield('content')
        </div>
    </main>
</div>

<div class="offcanvas offcanvas-start" tabindex="-1" id="adminNavCanvas" aria-labelledby="adminNavCanvasLabel">
    <div class="offcanvas-header">
        <div class="admin-brand m-0 p-0" id="adminNavCanvasLabel">
            <img class="admin-brand-logo" src="{{ asset('images/web_logo.png') }}" alt="Website Logo">
            <div style="line-height:1;">
                Admin Panel
                <div style="font-size:.78rem;color:var(--text-light);font-weight:800;margin-top:3px;">ForexTalent</div>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-0">
        <nav class="admin-nav">
            <div class="muted">Main</div>
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-grid-1x2"></i> Dashboard
            </a>

            <div class="muted mt-2">Management</div>
            <a href="{{ route('admin.jobs.index') }}" class="{{ request()->routeIs('admin.jobs.*') ? 'active' : '' }}">
                <i class="bi bi-briefcase"></i> Jobs
            </a>
            <a href="{{ route('admin.applications.index') }}" class="{{ request()->routeIs('admin.applications.*') ? 'active' : '' }}">
                <i class="bi bi-inbox"></i> Applications
            </a>
            <a href="{{ route('admin.offers.index') }}" class="{{ request()->routeIs('admin.offers.*') ? 'active' : '' }}">
                <i class="bi bi-person-workspace"></i> Offers
            </a>
        </nav>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: @json(session('success')),
            confirmButtonColor: '#0682B5'
        });
    @endif

    @if (session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Something went wrong',
            text: @json(session('error')),
            confirmButtonColor: '#0682B5'
        });
    @endif

    @if ($errors->any())
        Swal.fire({
            icon: 'error',
            title: 'Please fix form errors',
            html: `{!! collect($errors->all())->map(fn($e) => '<div style="text-align:left;">- '.e($e).'</div>')->implode('') !!}`,
            confirmButtonColor: '#0682B5'
        });
    @endif
</script>
@stack('scripts')
</body>
</html>

