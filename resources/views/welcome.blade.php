<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Velvet Vows & Bigdates - Beautiful Digital Invitation Websites</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@300;400;500;600;700;800&family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        /* ══════════════════════════════════════════
           LUXURY LIGHT GOLD DESIGN SYSTEM
           ══════════════════════════════════════════ */
        :root {
            --gold-dark: #8C6D3B;       /* Deep Gold for text contrast */
            --gold-primary: #B89047;    /* Classic Royal Gold */
            --gold-light: #DFCA9B;      /* Soft Accent Gold */
            --gold-pale: #F5EFEB;       /* Warm Champagne */
            --cream-base: #FFFDF9;      /* Ultra Premium Off-White */
            --cream-dark: #F7F3EB;      /* Ivory */
            --text-dark: #2A241E;       /* Luxurious Warm Black */
            --text-muted: #7A7065;      /* Warm Slate Gray */
            --border-gold: rgba(184, 144, 71, 0.18);
            --border-gold-light: rgba(184, 144, 71, 0.08);
            
            --font-display: 'Outfit', sans-serif;
            --font-body: 'Inter', sans-serif;
            --font-serif: 'Cormorant Garamond', serif;
            
            --transition-premium: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
            --shadow-premium: 0 15px 40px rgba(140, 109, 59, 0.05);
            --shadow-premium-hover: 0 25px 50px rgba(140, 109, 59, 0.12);
        }

        body {
            font-family: var(--font-body);
            background-color: var(--cream-base);
            color: var(--text-dark);
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        h1, h2, h3, h4 {
            font-family: var(--font-display);
            font-weight: 700;
            color: var(--text-dark);
        }

        .highlight-gold {
            background: linear-gradient(135deg, var(--gold-dark), var(--gold-primary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Custom luxury scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: var(--cream-dark);
        }
        ::-webkit-scrollbar-thumb {
            background: var(--gold-primary);
            border-radius: 99px;
        }

        /* ══════════════════════════════════════════
           PREMIUM LIGHT STICKY NAVIGATION
           ══════════════════════════════════════════ */
        .premium-nav {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: rgba(255, 253, 249, 0.88);
            backdrop-filter: blur(25px);
            border-bottom: 1px solid var(--border-gold-light);
            transition: var(--transition-premium);
            padding: 0.9rem 0;
        }

        .premium-nav.scrolled {
            box-shadow: 0 10px 30px rgba(140, 109, 59, 0.04);
            padding: 0.65rem 0;
        }

        .navbar-brand {
            font-family: var(--font-display);
            font-weight: 800;
            font-size: 1.45rem;
            letter-spacing: -0.5px;
            color: var(--text-dark) !important;
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        .navbar-brand span {
            color: var(--gold-primary);
        }

        .nav-link {
            font-weight: 500;
            color: var(--text-muted) !important;
            font-size: 0.92rem;
            padding: 0.5rem 1.1rem !important;
            border-radius: 99px;
            transition: var(--transition-premium);
        }

        .nav-link:hover {
            color: var(--gold-dark) !important;
            background: rgba(184, 144, 71, 0.05);
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .btn-premium-outline {
            border: 1.5px solid var(--gold-light);
            background: transparent;
            color: var(--gold-dark);
            font-weight: 600;
            font-size: 0.86rem;
            padding: 0.55rem 1.4rem;
            border-radius: 99px;
            transition: var(--transition-premium);
            text-decoration: none;
        }

        .btn-premium-outline:hover {
            border-color: var(--gold-primary);
            color: var(--gold-primary);
            background: rgba(184, 144, 71, 0.03);
        }

        .btn-premium-solid {
            background: linear-gradient(135deg, var(--gold-dark), var(--gold-primary));
            border: none;
            color: #fff !important;
            font-weight: 600;
            font-size: 0.86rem;
            padding: 0.6rem 1.6rem;
            border-radius: 99px;
            box-shadow: 0 4px 20px rgba(184, 144, 71, 0.2);
            transition: var(--transition-premium);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
        }

        .btn-premium-solid:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(184, 144, 71, 0.35);
        }

        /* ══════════════════════════════════════════
           HERO SECTION
           ══════════════════════════════════════════ */
        .hero-section {
            padding: 7.5rem 0 5.5rem;
            position: relative;
            background: radial-gradient(circle at 85% 15%, rgba(184, 144, 71, 0.07) 0%, transparent 60%),
                        radial-gradient(circle at 15% 75%, rgba(184, 144, 71, 0.04) 0%, transparent 50%);
        }

        .badge-loved {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(184, 144, 71, 0.07);
            border: 1px solid var(--border-gold);
            padding: 0.45rem 1.1rem;
            border-radius: 99px;
            font-weight: 700;
            font-size: 0.76rem;
            color: var(--gold-dark);
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 1.6rem;
        }

        .hero-title {
            font-size: clamp(2.5rem, 5.5vw, 4.4rem);
            line-height: 1.08;
            letter-spacing: -1.2px;
            color: var(--text-dark);
            margin-bottom: 1.6rem;
        }

        .hero-subtitle {
            font-size: 1.15rem;
            color: var(--text-muted);
            line-height: 1.65;
            margin-bottom: 2.4rem;
            max-width: 600px;
        }

        .hero-ctas {
            display: flex;
            align-items: center;
            gap: 1.2rem;
            flex-wrap: wrap;
            margin-bottom: 1.6rem;
        }

        .cta-note {
            font-size: 0.86rem;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 0.45rem;
        }

        /* ══════════════════════════════════════════
           PREMIUM PHONE SCREEN ANIMATION
           ══════════════════════════════════════════ */
        .hero-visual-wrapper {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .phone-mockup {
            width: 310px;
            height: 620px;
            border: 11px solid var(--text-dark);
            border-radius: 42px;
            background: #fff;
            position: relative;
            box-shadow: 0 30px 70px rgba(140, 109, 59, 0.1);
            overflow: hidden;
            z-index: 2;
            transition: var(--transition-premium);
        }

        .phone-mockup:hover {
            transform: translateY(-8px);
            box-shadow: 0 40px 90px rgba(140, 109, 59, 0.18);
        }

        .phone-screen {
            width: 100%;
            height: 100%;
            background: var(--cream-dark);
            padding: 1.8rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            position: relative;
            font-family: var(--font-serif);
        }

        .phone-island {
            width: 100px;
            height: 25px;
            background: var(--text-dark);
            border-radius: 99px;
            position: absolute;
            top: 6px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 10;
        }

        .phone-einvite-card {
            border: 1px solid var(--border-gold);
            padding: 2.2rem 1.2rem;
            background: var(--cream-base);
            width: 100%;
            text-align: center;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(140, 109, 59, 0.03);
            margin-top: 1rem;
            position: relative;
        }

        .phone-einvite-card::before {
            content: '';
            position: absolute;
            inset: 6px;
            border: 1.5px solid rgba(184, 144, 71, 0.12);
            border-radius: 12px;
        }

        .floating-stars {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
            z-index: 1;
        }

        .float-icon {
            position: absolute;
            animation: float-anim 5.5s ease-in-out infinite;
        }

        .float-1 { top: 12%; left: -6%; color: var(--gold-primary); font-size: 2.2rem; animation-delay: 0s; }
        .float-2 { top: 58%; right: -6%; color: var(--gold-dark); font-size: 1.8rem; animation-delay: 1.8s; }
        .float-3 { bottom: 8%; left: -2%; color: var(--gold-light); font-size: 2rem; animation-delay: 3.5s; }

        @keyframes float-anim {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-18px) rotate(12deg); }
        }

        /* ══════════════════════════════════════════
           TRUSTED SHOWCASE CAROUSEL
           ══════════════════════════════════════════ */
        .showcase-section {
            background: var(--cream-dark);
            padding: 5.5rem 0;
            overflow: hidden;
            border-top: 1px solid var(--border-gold-light);
            border-bottom: 1px solid var(--border-gold-light);
        }

        .showcase-header {
            text-align: center;
            margin-bottom: 3.5rem;
        }

        .showcase-slider {
            display: flex;
            gap: 2rem;
            animation: slide-showcase 45s linear infinite;
            width: max-content;
        }

        .showcase-slider:hover {
            animation-play-state: paused;
        }

        .showcase-card {
            width: 200px;
            height: 380px;
            border-radius: 24px;
            background: #fff;
            border: 1px solid var(--border-gold-light);
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(140, 109, 59, 0.02);
            transition: var(--transition-premium);
            cursor: pointer;
            position: relative;
        }

        .showcase-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition-premium);
        }

        .showcase-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: var(--shadow-premium-hover);
        }

        .showcase-badge {
            position: absolute;
            bottom: 1.2rem;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(255, 253, 249, 0.95);
            backdrop-filter: blur(10px);
            color: var(--gold-dark);
            border: 1px solid var(--border-gold);
            padding: 0.4rem 1.1rem;
            border-radius: 99px;
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.8px;
            text-transform: uppercase;
        }

        @keyframes slide-showcase {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        /* ══════════════════════════════════════════
           OCCASIONS CATEGORY GRID
           ══════════════════════════════════════════ */
        .category-section {
            padding: 7.5rem 0;
            background: var(--cream-base);
        }

        .section-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            padding: 0.45rem 1.1rem;
            border-radius: 99px;
            font-weight: 700;
            font-size: 0.76rem;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            background: rgba(184, 144, 71, 0.06);
            color: var(--gold-dark);
            border: 1px solid var(--border-gold);
            margin-bottom: 1.4rem;
        }

        .section-title-alt {
            font-size: clamp(2.1rem, 4.5vw, 3rem);
            color: var(--text-dark);
            margin-bottom: 0.9rem;
            font-weight: 800;
            letter-spacing: -0.8px;
        }

        .section-subtitle-alt {
            color: var(--text-muted);
            font-size: 1.08rem;
            margin-bottom: 4rem;
        }

        .category-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(285px, 1fr));
            gap: 1.8rem;
        }

        .category-card-compact {
            border-radius: 26px;
            background: var(--cream-dark);
            border: 1.5px solid rgba(184, 144, 71, 0.05);
            overflow: hidden;
            display: flex;
            align-items: center;
            gap: 1.2rem;
            padding: 1.25rem;
            text-decoration: none;
            transition: var(--transition-premium);
        }

        .category-card-compact:hover {
            transform: translateY(-6px);
            background: #fff;
            border-color: var(--gold-primary);
            box-shadow: var(--shadow-premium-hover);
        }

        .compact-thumb {
            width: 72px;
            height: 72px;
            border-radius: 18px;
            background-size: cover;
            background-position: center;
            flex-shrink: 0;
            border: 1px solid rgba(184, 144, 71, 0.1);
        }

        .compact-info h3 {
            font-size: 1.16rem;
            font-weight: 700;
            color: var(--text-dark);
            margin: 0 0 0.25rem 0;
        }

        .compact-info p {
            font-size: 0.86rem;
            color: var(--text-muted);
            margin: 0;
        }

        .compact-arrow {
            margin-left: auto;
            color: var(--gold-light);
            transition: var(--transition-premium);
        }

        .category-card-compact:hover .compact-arrow {
            color: var(--gold-dark);
            transform: translateX(4px);
        }

        .category-card-compact.coming-soon-card {
            cursor: default !important;
            opacity: 0.85;
        }

        .category-card-compact.coming-soon-card:hover {
            transform: none !important;
            border-color: rgba(184, 144, 71, 0.05) !important;
            box-shadow: none !important;
            background: var(--cream-dark) !important;
        }

        .category-card-compact.coming-soon-card .compact-arrow {
            display: none !important;
        }

        .badge-coming-soon {
            display: inline-block;
            font-size: 0.65rem;
            font-weight: 700;
            background: rgba(184, 144, 71, 0.06);
            color: var(--gold-dark);
            border: 1px solid var(--border-gold);
            padding: 0.15rem 0.55rem;
            border-radius: 99px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-top: 0.35rem;
        }

        /* ══════════════════════════════════════════
           HOW IT WORKS & PROCESS
           ══════════════════════════════════════════ */
        .process-section {
            padding: 7.5rem 0;
            background: var(--cream-dark);
        }

        .process-step {
            text-align: center;
            position: relative;
            padding: 2.5rem 1.8rem;
            background: var(--cream-base);
            border-radius: 26px;
            border: 1.5px solid var(--border-gold-light);
            transition: var(--transition-premium);
            height: 100%;
        }

        .process-step:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-premium-hover);
            border-color: var(--gold-primary);
        }

        .step-num {
            position: absolute;
            top: 1rem;
            right: 1.5rem;
            font-size: 3rem;
            font-weight: 800;
            color: rgba(184, 144, 71, 0.08);
            line-height: 1;
        }

        .step-icon-wrapper {
            width: 64px;
            height: 64px;
            border-radius: 20px;
            background: rgba(184, 144, 71, 0.08);
            color: var(--gold-dark);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.60rem;
            margin-bottom: 1.6rem;
            border: 1px solid var(--border-gold);
        }

        .process-step h3 {
            font-size: 1.25rem;
            margin-bottom: 0.7rem;
            color: var(--text-dark);
        }

        .process-step p {
            color: var(--text-muted);
            font-size: 0.94rem;
            line-height: 1.65;
            margin: 0;
        }

        /* ══════════════════════════════════════════
           LIVE WHATSAPP CHAT ANIMATION
           ══════════════════════════════════════════ */
        .whatsapp-section {
            padding: 7.5rem 0;
            background: var(--cream-base);
        }

        .wa-phone {
            width: 320px;
            height: 630px;
            border: 12px solid var(--text-dark);
            border-radius: 42px;
            background: #fdfaf5; /* Clean light champagne wallpaper */
            position: relative;
            box-shadow: 0 30px 70px rgba(140, 109, 59, 0.08);
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .wa-header {
            background: var(--cream-dark);
            color: var(--text-dark);
            border-bottom: 1px solid var(--border-gold);
            padding: 1.8rem 1rem 0.8rem;
            display: flex;
            align-items: center;
            gap: 0.6rem;
            flex-shrink: 0;
        }

        .wa-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: var(--gold-primary);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 0.95rem;
        }

        .wa-contact-info h4 {
            font-size: 0.92rem;
            margin: 0;
            font-weight: 700;
        }

        .wa-contact-info span {
            font-size: 0.72rem;
            color: var(--gold-dark);
            display: block;
        }

        .wa-chat-area {
            flex-grow: 1;
            padding: 1rem;
            display: flex;
            flex-direction: column;
            gap: 1rem;
            overflow-y: auto;
            position: relative;
        }

        .wa-msg {
            max-width: 85%;
            padding: 0.7rem 0.9rem;
            border-radius: 14px;
            font-size: 0.85rem;
            line-height: 1.45;
            position: relative;
            box-shadow: 0 2px 8px rgba(140, 109, 59, 0.04);
        }

        .wa-msg.received {
            background: #fff;
            color: var(--text-dark);
            align-self: flex-start;
            border-top-left-radius: 0;
            border: 1px solid var(--border-gold-light);
        }

        .wa-msg.sent {
            background: var(--cream-dark);
            color: var(--text-dark);
            align-self: flex-end;
            border-top-right-radius: 0;
            border: 1px solid var(--border-gold);
        }

        .wa-invite-preview {
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            border: 1px solid var(--border-gold);
            margin-top: 0.5rem;
        }

        .wa-invite-preview img {
            width: 100%;
            height: 120px;
            object-fit: cover;
        }

        .wa-preview-body {
            padding: 0.6rem;
            font-size: 0.78rem;
        }

        .wa-preview-domain {
            color: var(--gold-dark);
            font-weight: 600;
            font-size: 0.7rem;
            display: block;
        }

        .wa-preview-title {
            font-weight: 700;
            color: var(--text-dark);
            display: block;
            margin-top: 0.15rem;
        }

        .wa-msg-meta {
            font-size: 0.66rem;
            color: var(--text-muted);
            text-align: right;
            display: block;
            margin-top: 0.25rem;
        }

        /* Continuous looping simulator animations using CSS keyframes */
        .anim-wa-msg-1 { animation: show-msg 12s infinite 1s; opacity: 0; }
        .anim-wa-msg-2 { animation: show-msg 12s infinite 3s; opacity: 0; }
        .anim-wa-msg-3 { animation: show-msg 12s infinite 5.5s; opacity: 0; }
        .anim-wa-msg-4 { animation: show-msg 12s infinite 8s; opacity: 0; }

        @keyframes show-msg {
            0%, 8% { opacity: 0; transform: translateY(10px); }
            12%, 92% { opacity: 1; transform: translateY(0); }
            96%, 100% { opacity: 0; transform: translateY(-10px); }
        }

        .wa-input-simulator {
            background: var(--cream-dark);
            padding: 0.7rem 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            border-top: 1px solid var(--border-gold);
            flex-shrink: 0;
        }

        .wa-input-field {
            flex-grow: 1;
            background: #fff;
            padding: 0.5rem 0.9rem;
            border-radius: 20px;
            font-size: 0.8rem;
            color: var(--text-muted);
            border: 1px solid var(--border-gold);
        }

        /* ══════════════════════════════════════════
           PAPER + DIGITAL QR SCAN ANIMATION
           ══════════════════════════════════════════ */
        .qr-section {
            padding: 7.5rem 0;
            background: var(--cream-dark);
        }

        .qr-animation-wrapper {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 2rem;
            flex-wrap: wrap;
        }

        .physical-invite {
            width: 260px;
            height: 380px;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 15px 45px rgba(140, 109, 59, 0.05);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            padding: 2.2rem 1.6rem;
            position: relative;
            border: 2px solid var(--border-gold);
            transition: var(--transition-premium);
        }

        .physical-invite:hover {
            transform: scale(1.03);
            box-shadow: var(--shadow-premium-hover);
        }

        .physical-invite::before {
            content: '';
            position: absolute;
            inset: 7px;
            border: 1.5px solid rgba(184, 144, 71, 0.16);
            border-radius: 14px;
        }

        .physical-title {
            font-family: var(--font-serif);
            font-size: 1.4rem;
            color: var(--text-dark);
            text-align: center;
            margin-top: 1rem;
        }

        .physical-qr-box {
            width: 110px;
            height: 110px;
            background: var(--cream-base);
            border: 1.5px solid var(--border-gold);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0.6rem;
            position: relative;
            overflow: hidden;
        }

        .physical-qr-box img {
            width: 100%;
            height: 100%;
        }

        .scan-wave {
            position: absolute;
            width: 100%;
            height: 4px;
            background: var(--gold-primary);
            box-shadow: 0 0 12px var(--gold-primary);
            left: 0;
            top: 0;
            animation: scan-loop 3.5s linear infinite;
        }

        @keyframes scan-loop {
            0%, 100% { top: 0; }
            50% { top: 100%; }
        }

        /* ══════════════════════════════════════════
           PREMIUM FAQ SECTION
           ══════════════════════════════════════════ */
        .faq-section {
            padding: 7.5rem 0;
            background: var(--cream-base);
        }

        .accordion-item {
            border: 1px solid var(--border-gold) !important;
            border-radius: 18px !important;
            overflow: hidden;
            margin-bottom: 1.1rem;
            box-shadow: 0 4px 15px rgba(140, 109, 59, 0.01);
            transition: var(--transition-premium);
            background: #fff;
        }

        .accordion-item:hover {
            border-color: var(--gold-primary) !important;
            box-shadow: 0 10px 30px rgba(184, 144, 71, 0.05);
        }

        .accordion-button {
            font-family: var(--font-display);
            font-weight: 600;
            font-size: 1.06rem;
            color: var(--text-dark);
            padding: 1.3rem 1.6rem;
            background: #fff;
        }

        .accordion-button:not(.collapsed) {
            background-color: var(--cream-dark) !important;
            color: var(--gold-dark) !important;
        }

        /* ══════════════════════════════════════════
           SUPER CALL TO ACTION BANNER
           ══════════════════════════════════════════ */
        .cta-banner {
            padding: 6.5rem 0;
            background: linear-gradient(135deg, var(--cream-dark) 0%, #f1ebe1 100%);
            color: var(--text-dark);
            position: relative;
            overflow: hidden;
            border-radius: 40px;
            margin: 2rem 0;
            border: 1.5px solid var(--border-gold);
            box-shadow: var(--shadow-premium);
        }

        .cta-banner::before {
            content: '';
            position: absolute;
            width: 450px;
            height: 450px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(184, 144, 71, 0.12) 0%, transparent 70%);
            top: -220px;
            right: -120px;
        }

        .cta-banner-content {
            position: relative;
            z-index: 2;
        }

        /* ══════════════════════════════════════════
           PREMIUM LIGHT FOOTER
           ══════════════════════════════════════════ */
        .premium-footer {
            background: var(--cream-dark);
            color: var(--text-muted);
            border-top: 1.5px solid var(--border-gold);
            padding: 6.5rem 0 3.5rem;
            font-size: 0.92rem;
        }

        .footer-logo {
            font-family: var(--font-display);
            font-weight: 800;
            font-size: 1.65rem;
            letter-spacing: -0.5px;
            color: var(--text-dark);
            margin-bottom: 1.3rem;
            display: inline-block;
            text-decoration: none;
        }

        .footer-logo span {
            color: var(--gold-primary);
        }

        .footer-links-title {
            color: var(--text-dark);
            font-weight: 700;
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 1.6rem;
        }

        .footer-link-item {
            display: block;
            color: var(--text-muted);
            text-decoration: none;
            margin-bottom: 0.8rem;
            transition: var(--transition-premium);
        }

        .footer-link-item:hover {
            color: var(--gold-dark);
            transform: translateX(3px);
        }

        .footer-bottom {
            margin-top: 4.5rem;
            padding-top: 2rem;
            border-top: 1px solid var(--border-gold);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1.5rem;
            font-size: 0.88rem;
        }
    </style>
</head>

<body>

    @include('partials.header')

    <!-- ══════════════════════════════════════════
         HERO SECTION
         ══════════════════════════════════════════ -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-7">
                    <div class="badge-loved">
                        <i class="bi bi-star-fill text-warning"></i> Loved by 10,000+ couples
                    </div>
                    <h1 class="hero-title">
                        Beautiful Simple <span class="highlight-gold">Invitation Websites</span> that keep everyone connected
                    </h1>
                    <p class="hero-subtitle">
                        Premium, high-conversion templates. Personalize yours in minutes. One elegant link that connects every guest, anywhere.
                    </p>

                    <div class="hero-ctas">
                        <a href="#categories" class="btn-premium-solid py-3 px-5 fs-6">
                            Start Creating <i class="bi bi-arrow-right-short fs-4"></i>
                        </a>
                        <div class="cta-note ms-lg-3">
                            <i class="bi bi-clock-history text-warning fs-5"></i> Ready in 5 minutes • Share with one tap
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="hero-visual-wrapper">
                        <div class="phone-mockup">
                            <div class="phone-island"></div>
                            <div class="phone-screen">
                                <div style="margin-top: 1.5rem; text-transform: uppercase; font-size: 0.65rem; letter-spacing: 3px; color: var(--gold-dark);">
                                    The Royal Scroll
                                </div>
                                <div class="phone-einvite-card">
                                    <div style="font-family: var(--font-serif); font-size: 1.8rem; font-weight: 700; color: var(--text-dark);">
                                        Rahul & Neha
                                    </div>
                                    <div style="color: var(--gold-primary); font-size: 1.2rem; margin: 0.5rem 0;">&</div>
                                    <div style="font-size: 0.95rem; letter-spacing: 1px; text-transform: uppercase; color: var(--text-muted);">
                                        Are getting married
                                    </div>
                                    <div style="height: 1px; width: 40px; background: var(--gold-primary); margin: 1.2rem auto; opacity: 0.5;"></div>
                                    <div style="font-size: 1.1rem; font-style: italic; color: var(--text-dark);">
                                        20 February 2027
                                    </div>
                                    <div style="font-size: 0.8rem; color: var(--text-muted); margin-top: 0.4rem;">
                                        Jaipur Palace Ballroom
                                    </div>
                                </div>
                                <div style="margin-bottom: 1rem; width: 100%;">
                                    <div style="background: var(--gold-primary); color: #fff; padding: 0.65rem; border-radius: 99px; font-size: 0.85rem; font-weight: 600; text-align: center; font-family: var(--font-body); box-shadow: 0 4px 15px rgba(184, 144, 71, 0.15);">
                                        RSVP Now
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="floating-stars">
                            <i class="bi bi-star-fill float-icon float-1"></i>
                            <i class="bi bi-heart-fill float-icon float-2"></i>
                            <i class="bi bi-brightness-high-fill float-icon float-3"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══════════════════════════════════════════
         TRUSTED SHOWCASE SLIDER
         ══════════════════════════════════════════ -->
    <section class="showcase-section">
        <div class="showcase-header">
            <h2 class="section-title-alt text-center">Trusted Globally</h2>
            <p class="text-center text-muted">Join thousands of happy couples and organizers who built premium digital cards</p>
        </div>

        <div class="showcase-slider">
            <!-- First loop -->
            <div class="showcase-card">
                <img src="https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=400&q=80" alt="Wedding">
                <span class="showcase-badge">Wedding</span>
            </div>
            <div class="showcase-card">
                <img src="https://images.unsplash.com/photo-1530103862676-de8c9debad1d?auto=format&fit=crop&w=400&q=80" alt="Birthday">
                <span class="showcase-badge">Birthday</span>
            </div>
            <div class="showcase-card">
                <img src="https://images.unsplash.com/photo-1545232979-8bf34eb9757b?auto=format&fit=crop&w=400&q=80" alt="Naming Ceremony">
                <span class="showcase-badge">Naming</span>
            </div>
            <div class="showcase-card">
                <img src="https://images.unsplash.com/photo-1502086223501-7ea6ecd79368?auto=format&fit=crop&w=400&q=80" alt="Housewarming">
                <span class="showcase-badge">Housewarming</span>
            </div>
            <div class="showcase-card">
                <img src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=400&q=80" alt="Wedding 2">
                <span class="showcase-badge">Wedding</span>
            </div>

            <!-- Second copy loop for seamless continuous slider animation -->
            <div class="showcase-card">
                <img src="https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=400&q=80" alt="Wedding">
                <span class="showcase-badge">Wedding</span>
            </div>
            <div class="showcase-card">
                <img src="https://images.unsplash.com/photo-1530103862676-de8c9debad1d?auto=format&fit=crop&w=400&q=80" alt="Birthday">
                <span class="showcase-badge">Birthday</span>
            </div>
            <div class="showcase-card">
                <img src="https://images.unsplash.com/photo-1545232979-8bf34eb9757b?auto=format&fit=crop&w=400&q=80" alt="Naming Ceremony">
                <span class="showcase-badge">Naming</span>
            </div>
            <div class="showcase-card">
                <img src="https://images.unsplash.com/photo-1502086223501-7ea6ecd79368?auto=format&fit=crop&w=400&q=80" alt="Housewarming">
                <span class="showcase-badge">Housewarming</span>
            </div>
            <div class="showcase-card">
                <img src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=400&q=80" alt="Wedding 2">
                <span class="showcase-badge">Wedding</span>
            </div>
        </div>
    </section>

    <!-- ══════════════════════════════════════════
         OCCASIONS CATEGORY GRID
         ══════════════════════════════════════════ -->
    <section id="categories" class="category-section">
        <div class="container">
            <div class="text-center">
                <span class="section-badge"><i class="bi bi-geo-alt-fill"></i> All Occasions</span>
                <h2 class="section-title-alt">Big Moments Deserve Beautiful Sites</h2>
                <p class="section-subtitle-alt">Select your occasion and build a personalized invite experience your guests will love.</p>
            </div>

            <div class="category-grid">
                <!-- Wedding -->
                <a href="javascript:void(0)" onclick="openInfoModal()" class="category-card-compact">
                    <div class="compact-thumb" style="background-image: url('https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=150&q=80');"></div>
                    <div class="compact-info">
                        <h3>Wedding</h3>
                        <p>Two hearts, one premium site</p>
                    </div>
                    <span class="compact-arrow"><i class="bi bi-arrow-right-short fs-4"></i></span>
                </a>

                <!-- Birthday -->
                <a href="javascript:void(0)" class="category-card-compact coming-soon-card">
                    <div class="compact-thumb" style="background-image: url('https://images.unsplash.com/photo-1530103862676-de8c9debad1d?auto=format&fit=crop&w=150&q=80');"></div>
                    <div class="compact-info">
                        <h3>Birthday</h3>
                        <p>Celebrate another beautiful year</p>
                        <span class="badge-coming-soon">Coming Soon</span>
                    </div>
                </a>

                <!-- Baptism -->
                <a href="javascript:void(0)" class="category-card-compact coming-soon-card">
                    <div class="compact-thumb" style="background-image: url('https://images.unsplash.com/photo-1545232979-8bf34eb9757b?auto=format&fit=crop&w=150&q=80');"></div>
                    <div class="compact-info">
                        <h3>Baptism</h3>
                        <p>Blessed new beginnings</p>
                        <span class="badge-coming-soon">Coming Soon</span>
                    </div>
                </a>

                <!-- Holy Communion -->
                <a href="javascript:void(0)" class="category-card-compact coming-soon-card">
                    <div class="compact-thumb" style="background-image: url('https://images.unsplash.com/photo-1502086223501-7ea6ecd79368?auto=format&fit=crop&w=150&q=80');"></div>
                    <div class="compact-info">
                        <h3>Holy Communion</h3>
                        <p>Moments of grace and belief</p>
                        <span class="badge-coming-soon">Coming Soon</span>
                    </div>
                </a>

                <!-- Naming Ceremony -->
                <a href="javascript:void(0)" class="category-card-compact coming-soon-card">
                    <div class="compact-thumb" style="background-image: url('https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=150&q=80');"></div>
                    <div class="compact-info">
                        <h3>Naming Ceremony</h3>
                        <p>A beautiful name given in love</p>
                        <span class="badge-coming-soon">Coming Soon</span>
                    </div>
                </a>

                <!-- Baby Shower -->
                <a href="javascript:void(0)" class="category-card-compact coming-soon-card">
                    <div class="compact-thumb" style="background-image: url('https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=150&q=80');"></div>
                    <div class="compact-info">
                        <h3>Baby Shower</h3>
                        <p>Awaiting a little miracle</p>
                        <span class="badge-coming-soon">Coming Soon</span>
                    </div>
                </a>

                <!-- Housewarming -->
                <a href="javascript:void(0)" class="category-card-compact coming-soon-card">
                    <div class="compact-thumb" style="background-image: url('https://images.unsplash.com/photo-1502086223501-7ea6ecd79368?auto=format&fit=crop&w=150&q=80');"></div>
                    <div class="compact-info">
                        <h3>Housewarming</h3>
                        <p>Starting life in a brand new home</p>
                        <span class="badge-coming-soon">Coming Soon</span>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- ══════════════════════════════════════════
         PROCESS / HOW IT WORKS
         ══════════════════════════════════════════ -->
    <section id="how-it-works" class="process-section">
        <div class="container">
            <div class="text-center">
                <span class="section-badge"><i class="bi bi-lightning-charge-fill"></i> Three Steps</span>
                <h2 class="section-title-alt">From Details to Invitation in Minutes</h2>
                <p class="section-subtitle-alt">The easiest digital invite process, requiring no complicated design skills.</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="process-step">
                        <div class="step-num">1</div>
                        <div class="step-icon-wrapper">
                            <i class="bi bi-chat-text-fill"></i>
                        </div>
                        <h3>Add Details</h3>
                        <p>Fill out a quick and intuitive form listing event date, venue timings, RSVP contact, and photos.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="process-step">
                        <div class="step-num">2</div>
                        <div class="step-icon-wrapper">
                            <i class="bi bi-palette-fill"></i>
                        </div>
                        <h3>Choose Style</h3>
                        <p>Select from premium handcrafted design templates such as Royal Scroll or Golden Minimalist.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="process-step">
                        <div class="step-num">3</div>
                        <div class="step-icon-wrapper">
                            <i class="bi bi-share-fill"></i>
                        </div>
                        <h3>Share Instantly</h3>
                        <p>Receive your customizable guest dashboard with dynamic WhatsApp sharing hooks and QR codes.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══════════════════════════════════════════
         WHATSAPP MESSAGE SIMULATOR ANIMATION
         ══════════════════════════════════════════ -->
    <section id="whatsapp-sim" class="whatsapp-section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="wa-phone mx-auto">
                        <div class="wa-header">
                            <div class="wa-avatar" style="background: var(--gold-dark);">N</div>
                            <div class="wa-contact-info">
                                <h4>Neraj Lal</h4>
                                <span>online</span>
                            </div>
                        </div>

                        <div class="wa-chat-area">
                            <div class="wa-msg received anim-wa-msg-1">
                                Hey! Are the wedding details ready?
                                <span class="wa-msg-meta">10:30 AM</span>
                            </div>
                            <div class="wa-msg sent anim-wa-msg-2">
                                Yes! Just created our digital invite website on Velvet Vows. Let me share it!
                                <span class="wa-msg-meta">10:31 AM</span>
                            </div>
                            <div class="wa-msg sent anim-wa-msg-3">
                                🎊 You're invited to celebrate our wedding!
                                <div class="wa-invite-preview">
                                    <img src="https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=300&q=80" alt="Preview">
                                    <div class="wa-preview-body">
                                        <span class="wa-preview-domain">velvetvows.invite</span>
                                        <span class="wa-preview-title">Rahul & Neha Wedding Website</span>
                                    </div>
                                </div>
                                <span class="wa-msg-meta">10:32 AM</span>
                            </div>
                            <div class="wa-msg received anim-wa-msg-4">
                                Wow! The invitation website looks absolutely stunning and premium! 😍 RSVPing now!
                                <span class="wa-msg-meta">10:34 AM</span>
                            </div>
                        </div>

                        <div class="wa-input-simulator">
                            <div class="wa-input-field">Type a message...</div>
                            <i class="bi bi-mic-fill text-muted fs-5"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <span class="section-badge"><i class="bi bi-whatsapp"></i> Instant Sharing</span>
                    <h2 class="section-title-alt">Invite Every Guest on WhatsApp</h2>
                    <p class="lead text-muted mb-4">
                        Say goodbye to boring plain text messages. Share an interactive visual card in one tap.
                    </p>
                    <div class="d-flex gap-3 mb-3">
                        <div class="bg-warning-subtle text-warning rounded-circle p-2 d-inline-flex align-self-start" style="border: 1px solid var(--border-gold);">
                            <i class="bi bi-check2-circle fs-5 text-warning"></i>
                        </div>
                        <div>
                            <h4 class="h6 mb-1 text-slate-800" style="font-weight: 700;">Dynamic Link Previews</h4>
                            <p class="text-muted small">Automatic rich-media previews when you drop your invite URL on any platform.</p>
                        </div>
                    </div>
                    <div class="d-flex gap-3 mb-3">
                        <div class="bg-warning-subtle text-warning rounded-circle p-2 d-inline-flex align-self-start" style="border: 1px solid var(--border-gold);">
                            <i class="bi bi-check2-circle fs-5 text-warning"></i>
                        </div>
                        <div>
                            <h4 class="h6 mb-1 text-slate-800" style="font-weight: 700;">Zero Friction Onboarding</h4>
                            <p class="text-muted small">Guests open your personalized invitation instantly without downloading apps.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══════════════════════════════════════════
         QR HYBRID SCANNING SECTION
         ══════════════════════════════════════════ -->
    <section id="qr-hybrid" class="qr-section">
        <div class="container">
            <div class="row align-items-center g-5 flex-lg-row-reverse">
                <div class="col-lg-6">
                    <div class="qr-animation-wrapper">
                        <!-- Physical Card Mockup with scanning beam -->
                        <div class="physical-invite">
                            <div class="physical-title">
                                Velvet Vows<br>
                                <span style="font-size: 0.9rem; font-style: italic; color: var(--gold-primary);">Wedding Invitation</span>
                            </div>
                            <div class="physical-qr-box">
                                <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=https://bigdates.ai" alt="QR Code">
                                <div class="scan-wave"></div>
                            </div>
                            <div style="font-size: 0.65rem; color: var(--text-muted); letter-spacing: 1px; text-transform: uppercase;">
                                Scan QR code to view details
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <span class="section-badge"><i class="bi bi-qr-code"></i> Hybrid Invitations</span>
                    <h2 class="section-title-alt">Tradition on Paper. Magic on Phone.</h2>
                    <p class="lead text-muted mb-4">
                        Combine traditional physical cards with modern interactivity. Generate a high-resolution QR code, print it on paper cards, and let guests scan to view live locations and submit RSVPs.
                    </p>
                    <ul class="list-unstyled">
                        <li class="mb-3 d-flex align-items-center gap-2">
                            <i class="bi bi-chevron-right text-warning"></i> Download printable high-res vector graphics
                        </li>
                        <li class="mb-3 d-flex align-items-center gap-2">
                            <i class="bi bi-chevron-right text-warning"></i> Guests easily grab navigation maps & timings
                        </li>
                        <li class="mb-3 d-flex align-items-center gap-2">
                            <i class="bi bi-chevron-right text-warning"></i> Perfect for elderly and tech-savvy guests alike
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- ══════════════════════════════════════════
         FAQ SECTION
         ══════════════════════════════════════════ -->
    <section id="faqs" class="faq-section">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-badge"><i class="bi bi-question-circle-fill"></i> Help & Support</span>
                <h2 class="section-title-alt">Frequently Asked Questions</h2>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="accordionFaqs">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Can I edit details after publishing the invitation website?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionFaqs">
                                <div class="accordion-body text-muted" style="background: #fff; line-height: 1.6;">
                                    Absolutely! You can update the wedding details, add photos, change event locations, or adjust timings at any point through your dashboard, and guests will instantly see updates.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    How long will my invitation page remain online?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionFaqs">
                                <div class="accordion-body text-muted" style="background: #fff; line-height: 1.6;">
                                    Standard invitations are hosted safely for up to 6 months post-event. Premium plans offer extended lifetimes and offline archives for lifelong preservation.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Can guests RSVP easily using mobile devices?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionFaqs">
                                <div class="accordion-body text-muted" style="background: #fff; line-height: 1.6;">
                                    Yes! The RSVP form is optimized explicitly for smartphone screen viewports with zero typing friction, ensuring maximum response rates from your invitees.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══════════════════════════════════════════
         SUPER CALL TO ACTION BANNER
         ══════════════════════════════════════════ -->
    <div class="container my-5">
        <div class="cta-banner text-center">
            <div class="cta-banner-content col-md-8 mx-auto">
                <h2 class="display-6 fw-bold mb-3" style="color: var(--text-dark);">Ready to Create Your Stunning Digital Invite?</h2>
                <p class="lead opacity-75 mb-4 text-muted">
                    Zero coding. Handcrafted design layouts. Share with the world in less than five minutes.
                </p>
                <!-- <button onclick="openSigninModal()" class="btn-premium-solid btn-lg px-5 py-3 fs-6">
                    Get Started Free <i class="bi bi-arrow-right-short fs-4"></i>
                </button> -->
                <a href="#categories" class="btn-premium-solid py-3 px-5 fs-6">
                    Get Started Free <i class="bi bi-arrow-right-short fs-4"></i>
                </a>
            </div>
        </div>
    </div>

    @include('partials.footer')

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    @include('partials.popups')

</body>

</html>