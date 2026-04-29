<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ForexTalent — Hire Top Forex & Crypto Talent Globally')</title>
    <meta name="description" content="@yield('meta_description', 'Connect with pre-screened forex, crypto, and fintech professionals worldwide.')">
    <link rel="icon" type="image/png" href="{{ asset('images/web_logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/web_logo.png') }}">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;0,600;1,400&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary:       #0682B5;
            --primary-dark:  #022B63;
            --primary-light: #0682B5;
            --accent:        #0682B5;
            --accent-2:      #022B63;
            --text-dark:     #0d1b2a;
            --text-mid:      #3d5166;
            --text-light:    #7a91a8;
            --bg-soft:       #f4f8fc;
            --bg-white:      #ffffff;
            --border:        #dde8f0;
            --gradient-hero: linear-gradient(105deg, rgba(2,43,99,.92) 0%, rgba(6,130,181,.84) 55%, rgba(6,130,181,1) 100%);
            --shadow-card:   0 4px 24px rgba(2,43,99,.10);
            --shadow-hover:  0 12px 40px rgba(2,43,99,.18);
            --radius:        14px;
            --radius-sm:     8px;
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'DM Sans', sans-serif;
            color: var(--text-dark);
            background: var(--bg-white);
            overflow-x: hidden;
            font-size: 1.05rem;
        }

        h1,h2,h3,h4,h5,h6 {
            font-family: 'Sora', sans-serif;
            font-weight: 700;
        }

        /* ── NAVBAR ── */
        .navbar {
            background: rgba(255,255,255,0.97);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border);
            padding: 0.55rem 0;
            position: sticky;
            top: 0;
            z-index: 1050;
            transition: box-shadow .3s;
        }
        .navbar.scrolled { box-shadow: 0 2px 20px rgba(2,43,99,.12); }

        .navbar-brand {
            font-family: 'Sora', sans-serif;
            font-size: 1.45rem;
            font-weight: 800;
            color: var(--primary-dark) !important;
            letter-spacing: -0.5px;
            display: inline-flex;
            align-items: center;
            gap: .65rem;
        }
        .navbar-brand span { color: var(--accent); }
        .navbar-brand img {
            height: 72px;
            width: auto;
            object-fit: contain;
            display: block;
        }
        .brand-company-name {
            font-size: clamp(1.08rem, 1.35vw, 1.45rem);
            font-weight: 800;
            color: var(--primary-dark);
            line-height: 1.2;
            max-width: 290px;
            white-space: normal;
        }
        @media (max-width: 576px) {
            .navbar-brand img { height: 62px; }
            .brand-company-name { font-size: .98rem; max-width: 200px; line-height: 1.1; }
        }

        .nav-link {
            font-family: 'DM Sans', sans-serif;
            font-weight: 600;
            color: var(--text-mid) !important;
            padding: 0.35rem .8rem !important;
            font-size: 1.02rem;
            transition: color .2s;
            text-decoration: none;
        }
        .nav-link:hover, .nav-link.active { 
            color: var(--primary) !important;
            text-decoration: none;
        }

        .btn-nav-cta {
            background: #0682B5 !important;
            color: #fff !important;
            border-radius: 50px;
            padding: 0.4rem 1rem !important;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all .2s;
            text-decoration: none;
        }
        .btn-nav-cta:hover {
            background: var(--primary) !important;
            color: #fff !important;
            transform: translateY(-1px);
            text-decoration: none;
        }

        /* ── BUTTONS ── */
        .btn-primary-custom {
            background: var(--primary);
            color: #fff;
            border: none;
            border-radius: 50px;
            padding: 0.75rem 2rem;
            font-family: 'Sora', sans-serif;
            font-weight: 600;
            font-size: 0.95rem;
            letter-spacing: 0.3px;
            transition: all .25s;
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            text-decoration: none;
        }
        .btn-primary-custom:hover {
            background: var(--primary-dark);
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 8px 28px rgba(2,43,99,.3);
            text-decoration: none;
        }
        .btn-outline-custom {
            background: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
            border-radius: 50px;
            padding: 0.7rem 1.9rem;
            font-family: 'Sora', sans-serif;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all .25s;
            text-decoration: none;
        }
        .btn-outline-custom:hover {
            background: var(--primary);
            color: #fff;
            transform: translateY(-2px);
            text-decoration: none;
        }
        .btn-white-custom {
            background: #fff;
            color: var(--primary-dark);
            border: none;
            border-radius: 50px;
            padding: 0.75rem 2rem;
            font-family: 'Sora', sans-serif;
            font-weight: 700;
            font-size: 0.95rem;
            transition: all .25s;
            text-decoration: none;
        }
        .btn-white-custom:hover {
            background: var(--primary);
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 8px 28px rgba(2,43,99,.28);
            text-decoration: none;
        }

        /* ── SECTION HELPERS ── */
        .section-pad { padding: 90px 0; }
        .section-pad-sm { padding: 60px 0; }

        .section-label {
            font-family: 'Sora', sans-serif;
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            color: var(--accent);
            margin-bottom: .6rem;
            display: block;
        }
        .section-title {
            font-size: clamp(1.9rem, 4vw, 2.8rem);
            font-weight: 800;
            color: var(--text-dark);
            line-height: 1.2;
            margin-bottom: 1rem;
        }
        .section-title span { color: var(--primary); }
        .section-subtitle {
            font-size: 1.05rem;
            color: var(--text-mid);
            line-height: 1.7;
            max-width: 560px;
        }
        .section-divider {
            width: 52px;
            height: 4px;
            background: var(--accent);
            border-radius: 4px;
            margin: 1rem 0 1.8rem;
        }
        .section-divider.center { margin-left: auto; margin-right: auto; }

        /* ── CARDS ── */
        .card-custom {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 2rem 1.8rem;
            transition: all .3s;
            height: 100%;
        }
        .card-custom:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-hover);
            border-color: var(--primary-light);
        }
        .icon-box {
            width: 56px;
            height: 56px;
            border-radius: 14px;
            background: linear-gradient(135deg, var(--primary-light), var(--primary));
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 1.4rem;
            margin-bottom: 1.2rem;
            flex-shrink: 0;
        }
        .icon-box.accent { background: linear-gradient(135deg, #0682B5, #022B63); }
        .icon-box.gold   { background: linear-gradient(135deg, #0682B5, #022B63); }

        /* ── FOOTER ── */
        footer {
            background: var(--text-dark);
            color: rgba(255,255,255,.75);
            padding: 60px 0 30px;
        }
        footer h5 {
            font-family: 'Sora', sans-serif;
            font-size: 1rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 1.2rem;
        }
        footer a {
            color: rgba(255,255,255,.65);
            text-decoration: none;
            font-size: .92rem;
            transition: color .2s;
            display: block;
            margin-bottom: .5rem;
        }
        footer a:hover { color: var(--accent); }
        .footer-brand {
            font-family: 'Sora', sans-serif;
            font-size: 1.5rem;
            font-weight: 800;
            color: #fff;
        }
        .footer-brand span { color: var(--accent); }
        .footer-brand img {
            height: 95px;
            width: auto;
            object-fit: contain;
            display: block;
        }
        .footer-divider {
            border-color: rgba(255,255,255,.1);
            margin: 2.5rem 0 1.5rem;
        }
        .footer-bottom {
            font-size: .85rem;
            color: rgba(255,255,255,.45);
        }

        /* ── LOGO STRIP ── */
        .logo-strip {
            background: var(--bg-soft);
            padding: 40px 0;
        }
        .logo-item {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px 20px;
            filter: grayscale(100%);
            opacity: .6;
            transition: all .3s;
        }
        .logo-item:hover { filter: grayscale(0%); opacity: 1; }
        .logo-item img { max-height: 44px; max-width: 140px; object-fit: contain; }

        /* ── FORM ── */
        .form-control-custom {
            border: 1.5px solid var(--border);
            border-radius: var(--radius-sm);
            padding: .7rem 1rem;
            font-family: 'DM Sans', sans-serif;
            font-size: .95rem;
            color: var(--text-dark);
            background: #fff;
            transition: border-color .2s, box-shadow .2s;
        }
        .form-control-custom:focus {
            border-color: var(--primary-light);
            box-shadow: 0 0 0 3px rgba(6,130,181,.12);
            outline: none;
        }
        .form-label-custom {
            font-family: 'DM Sans', sans-serif;
            font-size: .88rem;
            font-weight: 600;
            color: var(--text-mid);
            margin-bottom: .4rem;
        }

        /* ── MISC ── */
        .bg-soft { background: var(--bg-soft); }
        .text-accent { color: var(--accent); }
        .text-primary-custom { color: var(--primary); }

        @media (max-width: 768px) {
            .section-pad { padding: 60px 0; }
            .section-pad-sm { padding: 40px 0; }
        }
    </style>
    @stack('styles')
</head>
<body>

<!-- ── NAVBAR ── -->
<nav class="navbar navbar-expand-lg" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('images/web_logo.png') }}" alt="Website Logo">
            <span class="brand-company-name">Globex Talent Solutions</span>
        </a>
        <button class="navbar-toggler border-0" type="button"
                data-bs-toggle="collapse" data-bs-target="#navMenu"
                aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-list fs-4" style="color:var(--primary)"></i>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1 py-2 py-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{ url('/about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('jobs') ? 'active' : '' }}" href="{{ url('/jobs') }}">Jobs Portal</a>
                </li>
                @if(auth()->check() && auth()->user()->hasRole('admin'))
                    <li class="nav-item ms-lg-2">
                        <a class="nav-link btn-nav-cta" href="{{ url('/admin') }}">Go to Dashboard</a>
                    </li>
                @else
                    <li class="nav-item ms-lg-2">
                        <a class="nav-link btn-nav-cta" href="{{ route('hire-talent') }}">Hire Talent</a>
                    </li>
                    <li class="nav-item ms-lg-2">
                        <a class="nav-link btn-nav-cta" href="{{ url('/opportunities') }}">Explore Opportunities</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<!-- ── PAGE CONTENT ── -->
@yield('content')

<!-- ── FOOTER ── -->
<footer>
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6">
                <div class="footer-brand mb-3">
                    <img src="{{ asset('images/web_logo.png') }}" alt="Website Logo">
                </div>
                <p style="font-size:.93rem;line-height:1.7;max-width:300px;">
                    Connecting forex, crypto, and fintech companies with top-tier talent across the globe.
                </p>
                <div class="d-flex gap-3 mt-3">
                    <a href="#" class="d-inline-flex align-items-center justify-content-center"
                       style="width:36px;height:36px;background:rgba(255,255,255,.08);border-radius:8px;">
                        <i class="bi bi-linkedin" style="color:#fff;font-size:.95rem;"></i>
                    </a>
                    <a href="#" class="d-inline-flex align-items-center justify-content-center"
                       style="width:36px;height:36px;background:rgba(255,255,255,.08);border-radius:8px;">
                        <i class="bi bi-twitter-x" style="color:#fff;font-size:.95rem;"></i>
                    </a>
                    <a href="#" class="d-inline-flex align-items-center justify-content-center"
                       style="width:36px;height:36px;background:rgba(255,255,255,.08);border-radius:8px;">
                        <i class="bi bi-whatsapp" style="color:#fff;font-size:.95rem;"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-6">
                <h5>Quick Links</h5>
                <a href="{{ url('/') }}">Home</a>
                <a href="{{ url('/about') }}">About Us</a>
                <a href="{{ url('/jobs') }}">Jobs Portal</a>
                <a href="{{ route('hire-talent') }}">Hire Talent</a>
                <a href="{{ url('/opportunities') }}">Explore Opportunities</a>
            </div>
            <div class="col-lg-3 col-md-3 col-6">
                <h5>Specialisations</h5>
                <a href="#">Forex Industry</a>
                <a href="#">Cryptocurrency</a>
                <a href="#">Fintech</a>
                <a href="#">Blockchain</a>
                <a href="#">Trading Platforms</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5>Get in Touch</h5>
                <a href="mailto:info@forextalent.com">
                    <i class="bi bi-envelope me-2"></i>info@forextalent.com
                </a>
                <a href="https://wa.me/923001234567">
                    <i class="bi bi-whatsapp me-2"></i>+92 300 1234567
                </a>
                <a href="#">
                    <i class="bi bi-geo-alt me-2"></i>103, Fahidi Heights, Khalid Bin Al Waleed Road, Al Hamriya, Bur Dubai, Dubai
                </a>
            </div>
        </div>

        <hr class="footer-divider">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-2 footer-bottom">
            <span>© {{ date('Y') }} ForexTalent. All rights reserved.</span>
            <div class="d-flex gap-3">
                <a href="#" style="font-size:.85rem;">Privacy Policy</a>
                <a href="#" style="font-size:.85rem;">Terms of Use</a>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Sticky navbar shadow on scroll
    window.addEventListener('scroll', () => {
        document.getElementById('mainNav').classList.toggle('scrolled', window.scrollY > 40);
    });

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
