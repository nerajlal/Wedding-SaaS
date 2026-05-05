<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Velvet Vows - Digital Wedding Invitations</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400&family=Lato:wght@300;400;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;1,400&display=swap"
        rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        :root {
            --gold-primary: #D4AF37;
            --gold-dark: #B8860B;
            --gold-light: #F5E6A3;
            --cream-base: #FDF8F0;
            --black-rich: #1A1A1A;
            --gray-warm: #8B7355;
            --white-pure: #FFFFFF;
            --navy-deep: #0A1628;

            --font-hero: 'Cormorant Garamond', serif;
            --font-heading: 'Playfair Display', serif;
            --font-body: 'Lato', sans-serif;
        }

        html, body {
            overflow-x: hidden;
            width: 100%;
        }

        body {
            background-color: var(--cream-base);
            color: var(--black-rich);
            font-family: var(--font-body);
            -webkit-font-smoothing: antialiased;
        }

        h1,
        .hero-title {
            font-family: var(--font-hero);
            font-weight: 700;
        }

        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: var(--font-heading);
            font-weight: 600;
        }

        /* Buttons */
        .btn-gold {
            background-color: var(--gold-primary);
            color: var(--cream-base);
            border: none;
            padding: 0.75rem 2rem;
            font-family: var(--font-body);
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(212, 175, 55, 0.3);
            border-radius: 0;
        }

        .btn-gold:hover {
            background-color: var(--gold-dark);
            color: var(--white-pure);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(212, 175, 55, 0.4);
        }

        .btn-outline-gold {
            background-color: transparent;
            color: var(--gold-primary);
            border: 1px solid var(--gold-primary);
            padding: 0.75rem 2rem;
            font-family: var(--font-body);
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            border-radius: 0;
        }

        .btn-outline-gold:hover {
            background-color: var(--gold-primary);
            color: var(--cream-base);
        }

        /* Hero Section */
        .hero {
            height: 100vh;
            background: linear-gradient(rgba(10, 22, 40, 0.7), rgba(10, 22, 40, 0.8)), url('https://images.unsplash.com/photo-1511285560929-80b456fea0bc?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80') center/cover;
            display: flex;
            align-items: center;
            text-align: center;
            color: var(--white-pure);
            position: relative;
        }

        .hero-title {
            font-size: 5rem;
            margin-bottom: 1rem;
            color: var(--gold-primary);
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            opacity: 0;
            transform: translateY(30px);
            animation: fadeUp 1s ease forwards 0.5s;
        }

        .hero-tagline {
            font-size: 1.5rem;
            font-family: var(--font-heading);
            font-style: italic;
            margin-bottom: 3rem;
            color: var(--cream-base);
            opacity: 0;
            transform: translateY(30px);
            animation: fadeUp 1s ease forwards 0.8s;
        }

        .hero .btn-gold {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeUp 1s ease forwards 1.1s;
        }

        /* How It Works */
        .how-it-works {
            padding: 6rem 0;
            background-color: var(--cream-base);
        }

        .section-title {
            font-size: 2.5rem;
            color: var(--gold-dark);
            text-align: center;
            margin-bottom: 4rem;
            position: relative;
        }

        .section-title::after {
            content: '';
            display: block;
            width: 60px;
            height: 2px;
            background-color: var(--gold-primary);
            margin: 1rem auto 0;
        }

        .step-card {
            text-align: center;
            padding: 2rem;
            background: var(--white-pure);
            border: 1px solid rgba(212, 175, 55, 0.2);
            transition: transform 0.3s ease;
            height: 100%;
        }

        .step-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }

        .step-icon {
            font-size: 3rem;
            color: var(--gold-primary);
            margin-bottom: 1.5rem;
        }

        .step-title {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: var(--black-rich);
        }

        .step-desc {
            color: var(--gray-warm);
            line-height: 1.6;
        }

        /* Templates Showcase */
        .templates {
            padding: 6rem 0;
            background-color: var(--navy-deep);
            color: var(--white-pure);
        }

        .templates .section-title {
            color: var(--gold-primary);
        }

        .template-card {
            background: var(--white-pure);
            overflow: hidden;
            border: none;
            position: relative;
            cursor: pointer;
            height: 450px;
        }

        .template-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.7s ease;
        }

        .template-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(10, 22, 40, 0.9));
            padding: 2rem;
            text-align: center;
            transform: translateY(20px);
            transition: transform 0.3s ease;
        }

        .template-name {
            color: var(--gold-primary);
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
            font-family: var(--font-heading);
        }

        .template-card:hover .template-img {
            transform: scale(1.05);
        }

        .template-card:hover .template-overlay {
            transform: translateY(0);
        }

        /* Testimonials */
        .testimonials {
            padding: 6rem 0;
            background-color: var(--cream-base);
        }

        .testimonial-card {
            background: var(--white-pure);
            padding: 3rem 2rem;
            text-align: center;
            border: 1px solid var(--gold-light);
            position: relative;
        }

        .quote-icon {
            color: var(--gold-light);
            font-size: 4rem;
            position: absolute;
            top: 1rem;
            left: 1rem;
            opacity: 0.3;
        }

        .testimonial-text {
            font-style: italic;
            font-size: 1.1rem;
            color: var(--gray-warm);
            margin-bottom: 2rem;
            position: relative;
            z-index: 1;
        }

        .testimonial-author {
            font-family: var(--font-heading);
            color: var(--gold-dark);
            font-size: 1.2rem;
            font-weight: 600;
        }

        /* Footer */
        .footer {
            background-color: var(--black-rich);
            color: var(--white-pure);
            padding: 0;
        }

        .footer-main {
            padding-top: 5rem;
            padding-bottom: 3rem;
        }

        .footer-brand p {
            color: var(--gray-warm);
            font-family: var(--font-body);
            font-size: 0.9rem;
            line-height: 1.7;
            margin-bottom: 1.5rem;
        }

        .footer-heading {
            font-family: var(--font-heading);
            color: var(--gold-primary);
            font-size: 1rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.75rem;
        }

        .footer-heading::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 30px;
            height: 2px;
            background: var(--gold-primary);
        }

        .footer-links-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-links-list li {
            margin-bottom: 0.7rem;
        }

        .footer-links-list a {
            color: var(--gray-warm);
            text-decoration: none;
            font-family: var(--font-body);
            font-size: 0.9rem;
            transition: color 0.3s ease, padding-left 0.3s ease;
        }

        .footer-links-list a:hover {
            color: var(--gold-primary);
            padding-left: 5px;
        }

        .footer-social a {
            width: 38px;
            height: 38px;
            border: 1px solid rgba(212, 175, 55, 0.35);
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: var(--gold-primary);
            font-size: 1rem;
            text-decoration: none;
            transition: all 0.3s ease;
            margin-right: 0.6rem;
        }

        .footer-social a:hover {
            background: var(--gold-primary);
            color: var(--navy-deep);
            transform: translateY(-3px);
        }

        .footer-contact-item {
            color: var(--gray-warm);
            font-family: var(--font-body);
            font-size: 0.9rem;
            margin-bottom: 0.7rem;
        }

        .footer-contact-item i {
            color: var(--gold-primary);
            margin-right: 0.5rem;
            width: 16px;
        }

        .footer-contact-item a {
            color: var(--gray-warm);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-contact-item a:hover {
            color: var(--gold-primary);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            padding: 1.5rem 0;
        }

        .footer-bottom p,
        .footer-bottom a {
            color: var(--gray-warm);
            font-size: 0.8rem;
            font-family: var(--font-body);
            margin: 0;
        }

        .footer-bottom a {
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-bottom a:hover {
            color: var(--gold-primary);
        }

        .copyright {
            margin-top: 0;
            color: var(--gray-warm);
            font-size: 0.8rem;
        }

        @keyframes fadeUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateX(-50%) translateY(0);
            }

            50% {
                transform: translateX(-50%) translateY(10px);
            }
        }

        /* Decoration element */
        .gold-border-decor {
            border: 2px solid var(--gold-primary);
            padding: 5px;
            display: inline-block;
        }

        .gold-border-decor-inner {
            border: 1px solid var(--gold-primary);
            padding: 40px;
        }
        /* Responsive Fixes */
        @media (max-width: 991px) {
            .hero-title {
                font-size: 3.5rem;
            }
            .hero-tagline {
                font-size: 1.2rem;
            }
            .section-title {
                font-size: 2.2rem;
            }
            .stats-col-middle {
                border-left: none !important;
                border-right: none !important;
                border-top: 1px solid rgba(212, 175, 55, 0.2);
                border-bottom: 1px solid rgba(212, 175, 55, 0.2);
                margin: 1rem 0;
                padding: 1.5rem 0 !important;
            }
        }

        @media (max-width: 576px) {
            .hero-title {
                font-size: 2.8rem;
            }
            .hero-tagline {
                font-size: 1rem;
                margin-bottom: 2rem;
            }
            .gold-border-decor-inner {
                padding: 25px;
            }
            .hero {
                height: auto;
                min-height: 100vh;
                padding: 100px 0 60px;
            }
        }
    </style>
    <!-- Navbar -->
    <style>
        /* 1. STICKY & DIMENSIONS */
        .navbar {
            padding: 1.2rem 0;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: fixed;
            width: 100%;
            z-index: 1100;
            /* Start transparent with a hint of dark for readability */
            background-color: rgba(10, 22, 40, 0.1);
            backdrop-filter: blur(0px);
        }

        /* Sticky Behavior Class (Added via JS) */
        .navbar.scrolled {
            background-color: rgba(10, 22, 40, 0.95);
            backdrop-filter: blur(10px);
            padding: 0.7rem 0;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
        }

        /* 2. BRAND LOGO SCALING */
        .navbar-brand {
            font-family: var(--font-hero);
            font-size: 1.8rem;
            /* Desktop size */
            font-weight: 700;
            color: var(--gold-primary) !important;
            letter-spacing: 2px;
            transition: font-size 0.3s ease;
        }

        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1.4rem;
                /* Smaller on mobile */
            }

            .navbar-collapse {
                background: var(--navy-deep);
                /* Solid background for mobile menu */
                margin-top: 1rem;
                padding: 1rem;
                border-radius: 8px;
                border: 1px solid var(--gold-primary);
            }
        }

        /* 3. ACTIVE LINK HIGHLIGHTING */
        .nav-link {
            position: relative;
            color: var(--white-pure) !important;
            font-size: 0.8rem;
            margin: 0 10px;
            transition: color 0.3s ease;
        }

        /* The Animated Underline */
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 1px;
            bottom: -5px;
            left: 0;
            background-color: var(--gold-primary);
            transition: width 0.3s ease;
        }

        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }

        .nav-link.active {
            color: var(--gold-primary) !important;
        }

        /* 4. CUSTOM HAMBURGER */
        .navbar-toggler {
            border: none !important;
            padding: 0;
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        .bi-list {
            color: var(--gold-primary);
            font-size: 2rem;
        }
    </style>
</head>

<body>



    <!-- Navbar -->
    @include('partials.header')

    <!-- Hero Section -->
    <section id="hero" class="hero">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="gold-border-decor">
                        <div class="gold-border-decor-inner">
                            <h1 class="hero-title">Velvet Vows</h1>
                            <p class="hero-tagline">Where Love Meets Legacy. Digital invitations with the soul of luxury
                                stationery.</p>
                            <div class="hero-ctas"
                                style="opacity:0;transform:translateY(30px);animation:fadeUp 1s ease forwards 1.1s;">
                                <a href="/register" class="btn btn-gold btn-lg me-3">Create Your Invitation</a>
                                <a href="#live-preview" class="btn btn-outline-gold btn-lg">See a Live Example</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Scroll indicator -->
        <a href="#stats" class="scroll-indicator"
            style="position:absolute;bottom:30px;left:50%;transform:translateX(-50%);color:var(--gold-primary);font-size:2rem;animation:bounce 2s infinite;text-decoration:none;">
            <i class="bi bi-chevron-double-down"></i>
        </a>
    </section>

    <!-- Stats Bar -->
    <section id="stats" style="background:var(--navy-deep);padding:2rem 0;">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4 py-2">
                    <h3 style="font-family:var(--font-hero);color:var(--gold-primary);font-size:2.5rem;margin:0;">
                        10,000+</h3>
                    <p
                        style="color:var(--cream-base);font-family:var(--font-body);margin:0;letter-spacing:1px;text-transform:uppercase;font-size:0.8rem;">
                        Invitations Sent</p>
                </div>
                <div class="col-md-4 py-2 stats-col-middle">
                    <h3 style="font-family:var(--font-hero);color:var(--gold-primary);font-size:2.5rem;margin:0;">98%
                    </h3>
                    <p
                        style="color:var(--cream-base);font-family:var(--font-body);margin:0;letter-spacing:1px;text-transform:uppercase;font-size:0.8rem;">
                        Couple Satisfaction</p>
                </div>
                <div class="col-md-4 py-2">
                    <h3 style="font-family:var(--font-hero);color:var(--gold-primary);font-size:2.5rem;margin:0;">Free
                    </h3>
                    <p
                        style="color:var(--cream-base);font-family:var(--font-body);margin:0;letter-spacing:1px;text-transform:uppercase;font-size:0.8rem;">
                        To Start Creating</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section id="how-it-works" class="how-it-works">
        <div class="container">
            <h2 class="section-title">Effortless Elegance</h2>
            <div class="row g-4 mt-2">
                <div class="col-md-4">
                    <div class="step-card">
                        <i class="bi bi-google step-icon"></i>
                        <h3 class="step-title">1. One-Click Sign In</h3>
                        <p class="step-desc">No forms, no passwords. Simply authenticate with Google to start crafting
                            your beautiful announcement immediately.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="step-card">
                        <i class="bi bi-vector-pen step-icon"></i>
                        <h3 class="step-title">2. Personalise Details</h3>
                        <p class="step-desc">Enter your names, venue, and timings into our seamless builder. Preview
                            real-time changes on your chosen aesthetic.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="step-card">
                        <i class="bi bi-send-fill step-icon"></i>
                        <h3 class="step-title">3. Share Instantly</h3>
                        <p class="step-desc">Publish to receive your unique public URL and QR code. Share via WhatsApp,
                            Email, or Social Media in seconds.</p>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5">
                <a href="/register" class="btn btn-gold px-5 py-3">Start Creating — It's Free</a>
            </div>
        </div>
    </section>

    <!-- Live Invitation Preview -->
    <section id="live-preview" style="padding:6rem 0;background:linear-gradient(135deg,#fdf8f0 0%,#f7eedc 100%);">
        <div class="container">
            <h2 class="section-title">See Your Invitation Come to Life</h2>
            <p class="text-center"
                style="color:var(--gray-warm);max-width:580px;margin:0 auto 3rem;font-size:1.05rem;font-family:var(--font-body);">
                Type your names below and watch the magic happen in real time.</p>
            <div class="row align-items-center g-5">
                <div class="col-lg-5">
                    <div
                        style="background:var(--white-pure);padding:2.5rem;border:1px solid rgba(212,175,55,0.3);box-shadow:0 8px 30px rgba(0,0,0,0.06);">
                        <label
                            style="font-family:var(--font-heading);color:var(--gold-dark);font-size:0.9rem;letter-spacing:1px;text-transform:uppercase;display:block;margin-bottom:0.4rem;">Partner
                            One</label>
                        <input id="previewName1" type="text" value="Priya"
                            style="width:100%;padding:0.8rem 1rem;border:1px solid var(--gold-light);font-family:var(--font-body);font-size:1rem;margin-bottom:1.5rem;outline:none;background:var(--cream-base);transition:border 0.2s;">
                        <label
                            style="font-family:var(--font-heading);color:var(--gold-dark);font-size:0.9rem;letter-spacing:1px;text-transform:uppercase;display:block;margin-bottom:0.4rem;">Partner
                            Two</label>
                        <input id="previewName2" type="text" value="Rahul"
                            style="width:100%;padding:0.8rem 1rem;border:1px solid var(--gold-light);font-family:var(--font-body);font-size:1rem;margin-bottom:1.5rem;outline:none;background:var(--cream-base);transition:border 0.2s;">
                        <label
                            style="font-family:var(--font-heading);color:var(--gold-dark);font-size:0.9rem;letter-spacing:1px;text-transform:uppercase;display:block;margin-bottom:0.4rem;">Wedding
                            Date</label>
                        <input id="previewDate" type="text" value="December 25, 2026"
                            style="width:100%;padding:0.8rem 1rem;border:1px solid var(--gold-light);font-family:var(--font-body);font-size:1rem;outline:none;background:var(--cream-base);transition:border 0.2s;">
                        <a href="/register" class="btn btn-gold w-100 mt-4">Create Mine Now</a>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div
                        style="background:linear-gradient(145deg,#0A1628 0%,#1a2d4a 100%);border:2px solid var(--gold-primary);padding:3.5rem 2.5rem;text-align:center;position:relative;min-height:380px;display:flex;align-items:center;justify-content:center;">
                        <div
                            style="position:absolute;top:12px;left:12px;right:12px;bottom:12px;border:1px solid rgba(212,175,55,0.35);pointer-events:none;">
                        </div>
                        <div style="position:relative;z-index:1;width:100%;">
                            <p
                                style="font-family:var(--font-heading);color:var(--gold-light);font-size:0.8rem;letter-spacing:3px;text-transform:uppercase;margin-bottom:1.2rem;">
                                Together with their families</p>
                            <h3 id="displayName1"
                                style="font-family:var(--font-hero);color:var(--gold-primary);font-size:2.8rem;margin:0;transition:all 0.2s;">
                                Priya</h3>
                            <p
                                style="font-family:var(--font-heading);color:var(--cream-base);font-size:1.8rem;margin:0.3rem 0;font-style:italic;">
                                &amp;</p>
                            <h3 id="displayName2"
                                style="font-family:var(--font-hero);color:var(--gold-primary);font-size:2.8rem;margin:0;transition:all 0.2s;">
                                Rahul</h3>
                            <div style="width:50px;height:1px;background:var(--gold-primary);margin:1.5rem auto;"></div>
                            <p
                                style="font-family:var(--font-heading);color:var(--cream-base);font-size:0.8rem;letter-spacing:2px;text-transform:uppercase;margin-bottom:0.4rem;">
                                request the honour of your presence</p>
                            <p id="displayDate"
                                style="font-family:var(--font-hero);color:var(--gold-light);font-size:1.5rem;margin:0;transition:all 0.2s;">
                                December 25, 2026</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        ['previewName1', 'previewName2', 'previewDate'].forEach(id => {
            document.getElementById(id).addEventListener('input', e => {
                const map = { previewName1: 'displayName1', previewName2: 'displayName2', previewDate: 'displayDate' };
                document.getElementById(map[id]).textContent = e.target.value || '—';
            });
        });
    </script>

    <!-- Template Showcase -->
    <section id="templates" style="padding:6rem 0;background:var(--cream-base);">
        <div class="container">
            <h2 class="section-title">Curated Aesthetics</h2>
            <div class="row g-4 mt-2">
                <div class="col-md-3 col-sm-6">
                    <div class="template-card">
                        <img src="https://images.unsplash.com/photo-1544926526-cb1723a1aee7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            alt="The Royal Scroll" class="template-img">
                        <div class="template-overlay">
                            <h3 class="template-name">The Royal Scroll</h3>
                            <p class="mb-0" style="color:var(--cream-base);font-size:0.85rem;">Classic Opulence</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="template-card">
                        <img src="https://images.unsplash.com/photo-1606800052052-a08af7148866?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            alt="Golden Minimalist" class="template-img">
                        <div class="template-overlay">
                            <h3 class="template-name">Golden Minimalist</h3>
                            <p class="mb-0" style="color:var(--cream-base);font-size:0.85rem;">Contemporary Luxury</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="template-card">
                        <img src="https://images.unsplash.com/photo-1519741497674-611481863552?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            alt="Garden Celestial" class="template-img">
                        <div class="template-overlay">
                            <h3 class="template-name">Garden Celestial</h3>
                            <p class="mb-0" style="color:var(--cream-base);font-size:0.85rem;">Romantic Ethereal</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="template-card">
                        <img src="https://images.unsplash.com/photo-1537633552985-df8429e8048b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            alt="Midnight Jasmine" class="template-img">
                        <div class="template-overlay">
                            <h3 class="template-name">Midnight Jasmine</h3>
                            <p class="mb-0" style="color:var(--cream-base);font-size:0.85rem;">Modern Mystique</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5">
                <a href="/register" class="btn btn-gold px-5">Start With a Template</a>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials">
        <div class="container">
            <h2 class="section-title">Couples Who Chose Elegance</h2>
            <div class="row g-4 mt-2">
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <i class="bi bi-quote quote-icon"></i>
                        <div style="color:#D4AF37;font-size:1.1rem;margin-bottom:1rem;">★★★★★</div>
                        <p class="testimonial-text">"We wanted our digital invites to feel as special as physical ones.
                            Velvet Vows delivered beyond our expectations. The Golden Minimalist theme was perfect."</p>
                        <div
                            style="display:flex;align-items:center;justify-content:center;gap:0.75rem;margin-top:1rem;">
                            <div
                                style="width:42px;height:42px;border-radius:50%;background:linear-gradient(135deg,#D4AF37,#B8860B);display:flex;align-items:center;justify-content:center;font-family:var(--font-hero);color:#fff;font-size:1rem;flex-shrink:0;">
                                P</div>
                            <p class="testimonial-author mb-0">Priya &amp; Rahul · Mumbai</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <i class="bi bi-quote quote-icon"></i>
                        <div style="color:#D4AF37;font-size:1.1rem;margin-bottom:1rem;">★★★★★</div>
                        <p class="testimonial-text">"Created and sent to 300 guests in under 10 minutes. The WhatsApp
                            integration is flawless, and the design received so many compliments!"</p>
                        <div
                            style="display:flex;align-items:center;justify-content:center;gap:0.75rem;margin-top:1rem;">
                            <div
                                style="width:42px;height:42px;border-radius:50%;background:linear-gradient(135deg,#D4AF37,#B8860B);display:flex;align-items:center;justify-content:center;font-family:var(--font-hero);color:#fff;font-size:1rem;flex-shrink:0;">
                                S</div>
                            <p class="testimonial-author mb-0">Sarah &amp; James · London</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <i class="bi bi-quote quote-icon"></i>
                        <div style="color:#D4AF37;font-size:1.1rem;margin-bottom:1rem;">★★★★★</div>
                        <p class="testimonial-text">"The Royal Scroll template perfectly captured the traditional yet
                            grand feel we wanted. It's truly a premium experience with zero stress."</p>
                        <div
                            style="display:flex;align-items:center;justify-content:center;gap:0.75rem;margin-top:1rem;">
                            <div
                                style="width:42px;height:42px;border-radius:50%;background:linear-gradient(135deg,#D4AF37,#B8860B);display:flex;align-items:center;justify-content:center;font-family:var(--font-hero);color:#fff;font-size:1rem;flex-shrink:0;">
                                A</div>
                            <p class="testimonial-author mb-0">Aisha &amp; Kabir · Dubai</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing -->
    <section id="pricing" style="padding:6rem 0;background:var(--navy-deep);">
        <div class="container">
            <h2 class="section-title" style="color:var(--gold-primary);">Simple, Transparent Pricing</h2>
            <p class="text-center"
                style="color:rgba(253,248,240,0.7);max-width:500px;margin:0 auto 3rem;font-family:var(--font-body);">
                Start for free. Upgrade only when you need more.</p>
            <div class="row justify-content-center g-4">
                <!-- Free -->
                <div class="col-md-4">
                    <div
                        style="background:rgba(255,255,255,0.04);border:1px solid rgba(212,175,55,0.3);padding:2.5rem;text-align:center;height:100%;transition:transform 0.3s ease;">
                        <p
                            style="font-family:var(--font-body);color:var(--gold-light);letter-spacing:2px;text-transform:uppercase;font-size:0.8rem;margin-bottom:1rem;">
                            Free Forever</p>
                        <h3 style="font-family:var(--font-hero);color:var(--white-pure);font-size:3.5rem;margin:0;">₹0
                        </h3>
                        <p style="color:rgba(253,248,240,0.5);font-size:0.85rem;margin-bottom:2rem;">No credit card
                            needed</p>
                        <ul style="list-style:none;padding:0;text-align:left;margin-bottom:2rem;">
                            <li
                                style="color:var(--cream-base);padding:0.5rem 0;border-bottom:1px solid rgba(255,255,255,0.07);font-family:var(--font-body);font-size:0.95rem;">
                                <i class="bi bi-check2" style="color:var(--gold-primary);margin-right:0.5rem;"></i>1
                                Digital Invitation
                            </li>
                            <li
                                style="color:var(--cream-base);padding:0.5rem 0;border-bottom:1px solid rgba(255,255,255,0.07);font-family:var(--font-body);font-size:0.95rem;">
                                <i class="bi bi-check2" style="color:var(--gold-primary);margin-right:0.5rem;"></i>3
                                Premium Templates
                            </li>
                            <li
                                style="color:var(--cream-base);padding:0.5rem 0;border-bottom:1px solid rgba(255,255,255,0.07);font-family:var(--font-body);font-size:0.95rem;">
                                <i class="bi bi-check2"
                                    style="color:var(--gold-primary);margin-right:0.5rem;"></i>Unique Shareable Link
                            </li>
                            <li
                                style="color:var(--cream-base);padding:0.5rem 0;font-family:var(--font-body);font-size:0.95rem;">
                                <i class="bi bi-check2"
                                    style="color:var(--gold-primary);margin-right:0.5rem;"></i>WhatsApp Share
                            </li>
                        </ul>
                        <a href="/register" class="btn btn-outline-gold w-100">Get Started Free</a>
                    </div>
                </div>
                <!-- Premium -->
                <div class="col-md-4">
                    <div
                        style="background:linear-gradient(145deg,rgba(212,175,55,0.15),rgba(212,175,55,0.05));border:2px solid var(--gold-primary);padding:2.5rem;text-align:center;height:100%;position:relative;transform:scale(1.03);">
                        <div
                            style="position:absolute;top:-14px;left:50%;transform:translateX(-50%);background:var(--gold-primary);color:var(--navy-deep);font-size:0.7rem;font-weight:700;letter-spacing:2px;padding:0.3rem 1.2rem;text-transform:uppercase;font-family:var(--font-body);">
                            Most Popular</div>
                        <p
                            style="font-family:var(--font-body);color:var(--gold-light);letter-spacing:2px;text-transform:uppercase;font-size:0.8rem;margin-bottom:1rem;">
                            Premium</p>
                        <h3 style="font-family:var(--font-hero);color:var(--gold-primary);font-size:3.5rem;margin:0;">
                            ₹999</h3>
                        <p style="color:rgba(253,248,240,0.5);font-size:0.85rem;margin-bottom:2rem;">One-time per
                            wedding</p>
                        <ul style="list-style:none;padding:0;text-align:left;margin-bottom:2rem;">
                            <li
                                style="color:var(--cream-base);padding:0.5rem 0;border-bottom:1px solid rgba(255,255,255,0.07);font-family:var(--font-body);font-size:0.95rem;">
                                <i class="bi bi-check2"
                                    style="color:var(--gold-primary);margin-right:0.5rem;"></i>Unlimited Invitations
                            </li>
                            <li
                                style="color:var(--cream-base);padding:0.5rem 0;border-bottom:1px solid rgba(255,255,255,0.07);font-family:var(--font-body);font-size:0.95rem;">
                                <i class="bi bi-check2" style="color:var(--gold-primary);margin-right:0.5rem;"></i>All
                                20+ Templates
                            </li>
                            <li
                                style="color:var(--cream-base);padding:0.5rem 0;border-bottom:1px solid rgba(255,255,255,0.07);font-family:var(--font-body);font-size:0.95rem;">
                                <i class="bi bi-check2" style="color:var(--gold-primary);margin-right:0.5rem;"></i>RSVP
                                Tracking
                            </li>
                            <li
                                style="color:var(--cream-base);padding:0.5rem 0;border-bottom:1px solid rgba(255,255,255,0.07);font-family:var(--font-body);font-size:0.95rem;">
                                <i class="bi bi-check2"
                                    style="color:var(--gold-primary);margin-right:0.5rem;"></i>Custom Domain
                            </li>
                            <li
                                style="color:var(--cream-base);padding:0.5rem 0;font-family:var(--font-body);font-size:0.95rem;">
                                <i class="bi bi-check2"
                                    style="color:var(--gold-primary);margin-right:0.5rem;"></i>Priority Support
                            </li>
                        </ul>
                        <a href="/register" class="btn btn-gold w-100">Start Premium</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section id="faq" style="padding:6rem 0;background:var(--cream-base);">
        <div class="container">
            <h2 class="section-title">Frequently Asked Questions</h2>
            <div class="row justify-content-center mt-4">
                <div class="col-lg-8">
                    <div class="accordion" id="faqAccordion">
                        <div style="border:1px solid rgba(212,175,55,0.3);margin-bottom:0.75rem;">
                            <button
                                style="width:100%;background:var(--white-pure);border:none;padding:1.25rem 1.5rem;text-align:left;font-family:var(--font-heading);font-size:1.05rem;color:var(--black-rich);cursor:pointer;display:flex;justify-content:space-between;align-items:center;"
                                data-bs-toggle="collapse" data-bs-target="#faq1">
                                Can guests RSVP through the invitation? <i class="bi bi-plus-lg"
                                    style="color:var(--gold-primary);"></i>
                            </button>
                            <div id="faq1" class="collapse" data-bs-parent="#faqAccordion">
                                <p
                                    style="padding:0 1.5rem 1.25rem;color:var(--gray-warm);font-family:var(--font-body);line-height:1.7;margin:0;">
                                    Yes! Premium invitations include a built-in RSVP feature. Guests can confirm
                                    attendance directly from the invitation link, and you receive real-time
                                    notifications.</p>
                            </div>
                        </div>
                        <div style="border:1px solid rgba(212,175,55,0.3);margin-bottom:0.75rem;">
                            <button
                                style="width:100%;background:var(--white-pure);border:none;padding:1.25rem 1.5rem;text-align:left;font-family:var(--font-heading);font-size:1.05rem;color:var(--black-rich);cursor:pointer;display:flex;justify-content:space-between;align-items:center;"
                                data-bs-toggle="collapse" data-bs-target="#faq2">
                                Does it work on mobile? <i class="bi bi-plus-lg" style="color:var(--gold-primary);"></i>
                            </button>
                            <div id="faq2" class="collapse" data-bs-parent="#faqAccordion">
                                <p
                                    style="padding:0 1.5rem 1.25rem;color:var(--gray-warm);font-family:var(--font-body);line-height:1.7;margin:0;">
                                    Absolutely. Every Velvet Vows invitation is fully responsive and looks stunning on
                                    any device — mobile, tablet, or desktop. Most guests will open it on WhatsApp on
                                    their phone.</p>
                            </div>
                        </div>
                        <div style="border:1px solid rgba(212,175,55,0.3);margin-bottom:0.75rem;">
                            <button
                                style="width:100%;background:var(--white-pure);border:none;padding:1.25rem 1.5rem;text-align:left;font-family:var(--font-heading);font-size:1.05rem;color:var(--black-rich);cursor:pointer;display:flex;justify-content:space-between;align-items:center;"
                                data-bs-toggle="collapse" data-bs-target="#faq3">
                                Is it really free to start? <i class="bi bi-plus-lg"
                                    style="color:var(--gold-primary);"></i>
                            </button>
                            <div id="faq3" class="collapse" data-bs-parent="#faqAccordion">
                                <p
                                    style="padding:0 1.5rem 1.25rem;color:var(--gray-warm);font-family:var(--font-body);line-height:1.7;margin:0;">
                                    Yes, completely. No credit card required. The free plan lets you create one
                                    invitation with 3 beautiful templates and share it with unlimited guests via
                                    WhatsApp or link.</p>
                            </div>
                        </div>
                        <div style="border:1px solid rgba(212,175,55,0.3);">
                            <button
                                style="width:100%;background:var(--white-pure);border:none;padding:1.25rem 1.5rem;text-align:left;font-family:var(--font-heading);font-size:1.05rem;color:var(--black-rich);cursor:pointer;display:flex;justify-content:space-between;align-items:center;"
                                data-bs-toggle="collapse" data-bs-target="#faq4">
                                How do I share my invitation? <i class="bi bi-plus-lg"
                                    style="color:var(--gold-primary);"></i>
                            </button>
                            <div id="faq4" class="collapse" data-bs-parent="#faqAccordion">
                                <p
                                    style="padding:0 1.5rem 1.25rem;color:var(--gray-warm);font-family:var(--font-body);line-height:1.7;margin:0;">
                                    After publishing, you get a unique URL and a QR code. Share either via WhatsApp,
                                    Email, Instagram stories, or print the QR code on your physical stationery.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA Banner -->
    <section
        style="padding:5rem 0;background:linear-gradient(135deg,#0A1628 0%,#1a2d4a 60%,#0A1628 100%);text-align:center;position:relative;overflow:hidden;">
        <div
            style="position:absolute;inset:0;background:url('data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><circle cx=%2250%22 cy=%2250%22 r=%2240%22 fill=%22none%22 stroke=%22rgba(212,175,55,0.05)%22 stroke-width=%221%22/></svg>') center/cover;">
        </div>
        <div class="container" style="position:relative;z-index:1;">
            <p
                style="font-family:var(--font-heading);color:var(--gold-light);letter-spacing:3px;text-transform:uppercase;font-size:0.85rem;margin-bottom:1rem;">
                Your love story deserves a beautiful beginning</p>
            <h2 style="font-family:var(--font-hero);color:var(--white-pure);font-size:3rem;margin-bottom:1rem;">Ready to
                Create Something Unforgettable?</h2>
            <p
                style="font-family:var(--font-body);color:rgba(253,248,240,0.7);max-width:520px;margin:0 auto 2.5rem;font-size:1.05rem;line-height:1.7;">
                Join 10,000+ couples who trusted Velvet Vows to announce their most important day. Start free in under 2
                minutes.</p>
            <a href="/register" class="btn btn-gold btn-lg px-5 me-3">Get Started Free</a>
            <a href="#live-preview" class="btn btn-outline-gold btn-lg px-5">See a Demo</a>
        </div>
    </section>

    @include('partials.footer')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Scroll-spy: highlight active nav link based on section in view
        const sections = document.querySelectorAll('section[id]');
        const navItems = document.querySelectorAll('.nav-link[href^="#"]');
        window.addEventListener('scroll', () => {
            let current = '';
            sections.forEach(section => {
                if (window.scrollY >= section.offsetTop - 120) current = section.getAttribute('id');
            });
            navItems.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === '#' + current) link.classList.add('active');
            });
        });
    </script>
</body>

</html>