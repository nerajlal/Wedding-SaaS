<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Velvet Vows - Digital Wedding Invitations</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400&family=Lato:wght@300;400;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;1,400&display=swap" rel="stylesheet">
    
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

        body {
            background-color: var(--cream-base);
            color: var(--black-rich);
            font-family: var(--font-body);
            -webkit-font-smoothing: antialiased;
        }

        h1, .hero-title {
            font-family: var(--font-hero);
            font-weight: 700;
        }

        h2, h3, h4, h5, h6 {
            font-family: var(--font-heading);
            font-weight: 600;
        }

        /* Navbar */
        .navbar {
            background-color: transparent;
            padding: 1.5rem 0;
            transition: background-color 0.3s ease;
            position: absolute;
            width: 100%;
            z-index: 1000;
        }
        .navbar-brand {
            font-family: var(--font-hero);
            font-size: 2rem;
            font-weight: 700;
            color: var(--gold-primary) !important;
            letter-spacing: 2px;
        }
        
        .nav-link {
            font-family: var(--font-body);
            color: var(--white-pure) !important;
            font-weight: 400;
            letter-spacing: 1px;
            text-transform: uppercase;
            font-size: 0.85rem;
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
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
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
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
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
            padding: 4rem 0 2rem;
            text-align: center;
        }

        .footer-logo {
            font-family: var(--font-hero);
            font-size: 2.5rem;
            color: var(--gold-primary);
            margin-bottom: 1rem;
        }

        .footer-links a {
            color: var(--gray-warm);
            text-decoration: none;
            margin: 0 1rem;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: var(--gold-primary);
        }

        .copyright {
            margin-top: 3rem;
            color: var(--gray-warm);
            font-size: 0.9rem;
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 2rem;
        }

        @keyframes fadeUp {
            to {
                opacity: 1;
                transform: translateY(0);
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
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/">VELVET VOWS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="bi bi-list text-white fs-2"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#how-it-works">How It Works</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#templates">Templates</a>
                    </li>
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item ms-lg-3">
                                <a href="{{ url('/dashboard') }}" class="btn btn-gold">Dashboard</a>
                            </li>
                        @else
                            <li class="nav-item ms-lg-3">
                                <a href="{{ route('login') }}" class="nav-link">Log in</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item ms-lg-2">
                                    <a href="{{ route('register') }}" class="btn btn-gold">Create Invitation</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="gold-border-decor">
                        <div class="gold-border-decor-inner">
                            <h1 class="hero-title">Velvet Vows</h1>
                            <p class="hero-tagline">Where Love Meets Legacy. Digital invitations with the soul of luxury stationery.</p>
                            <a href="/create" class="btn btn-gold btn-lg">Create Your Invitation</a>
                        </div>
                    </div>
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
                        <p class="step-desc">No forms, no passwords. Simply authenticate with Google to start crafting your beautiful announcement immediately.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="step-card">
                        <i class="bi bi-vector-pen step-icon"></i>
                        <h3 class="step-title">2. Personalise Details</h3>
                        <p class="step-desc">Enter your names, venue, and timings into our seamless builder. Preview real-time changes on your chosen aesthetic.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="step-card">
                        <i class="bi bi-send-fill step-icon"></i>
                        <h3 class="step-title">3. Share Instantly</h3>
                        <p class="step-desc">Publish to receive your unique public URL and QR code. Share via WhatsApp, Email, or Social Media in seconds.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Template Showcase -->
    <section id="templates" class="templates">
        <div class="container">
            <h2 class="section-title">Curated Aesthetics</h2>
            <div class="row g-4 mt-2">
                <div class="col-md-4">
                    <div class="template-card">
                        <img src="https://images.unsplash.com/photo-1544926526-cb1723a1aee7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="The Royal Scroll" class="template-img">
                        <div class="template-overlay">
                            <h3 class="template-name">The Royal Scroll</h3>
                            <p class="mb-0">Classic Opulence</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="template-card">
                        <img src="https://images.unsplash.com/photo-1606800052052-a08af7148866?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Golden Minimalist" class="template-img">
                        <div class="template-overlay">
                            <h3 class="template-name">Golden Minimalist</h3>
                            <p class="mb-0">Contemporary Luxury</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="template-card">
                        <img src="https://images.unsplash.com/photo-1519741497674-611481863552?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Garden Celestial" class="template-img">
                        <div class="template-overlay">
                            <h3 class="template-name">Garden Celestial</h3>
                            <p class="mb-0">Romantic Ethereal</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5">
                <a href="/create" class="btn btn-outline-gold">Explore All Designs</a>
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
                        <p class="testimonial-text">"We wanted our digital invites to feel as special as physical ones. Velvet Vows delivered beyond our expectations. The Golden Minimalist theme was perfect."</p>
                        <p class="testimonial-author">Priya & Rahul</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <i class="bi bi-quote quote-icon"></i>
                        <p class="testimonial-text">"Created and sent to 300 guests in under 10 minutes. The WhatsApp integration is flawless, and the design received so many compliments!"</p>
                        <p class="testimonial-author">Sarah & James</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <i class="bi bi-quote quote-icon"></i>
                        <p class="testimonial-text">"The Royal Scroll template perfectly captured the traditional yet grand feel we wanted. It's truly a premium experience with zero stress."</p>
                        <p class="testimonial-author">Aisha & Kabir</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-logo">Velvet Vows</div>
            <p style="color: var(--gold-primary); font-family: var(--font-heading); font-style: italic; margin-bottom: 2rem;">Where Love Meets Legacy</p>
            
            <div class="footer-links">
                <a href="#">About Us</a>
                <a href="#">Templates</a>
                <a href="#">Pricing</a>
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
            </div>
            
            <div class="copyright">
                &copy; {{ date('Y') }} Velvet Vows. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Simple navbar background change on scroll
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                document.querySelector('.navbar').style.backgroundColor = 'rgba(10, 22, 40, 0.95)';
                document.querySelector('.navbar').style.padding = '1rem 0';
            } else {
                document.querySelector('.navbar').style.backgroundColor = 'transparent';
                document.querySelector('.navbar').style.padding = '1.5rem 0';
            }
        });
    </script>
</body>
</html>
