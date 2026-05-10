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
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600&family=Lato:wght@300;400;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;1,400;1,500&display=swap"
        rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        /* ══════════════════════════════════════════
           DESIGN TOKENS
        ══════════════════════════════════════════ */
        :root {
            --gold-primary: #D4AF37;
            --gold-dark: #B8860B;
            --gold-light: #F5E6A3;
            --gold-pale: #FBF6E8;
            --cream-base: #FDF8F0;
            --cream-dark: #F5EDD8;
            --black-rich: #1A1A1A;
            --gray-warm: #8B7355;
            --gray-mid: #B5A48A;
            --white-pure: #FFFFFF;
            --navy-deep: #0A1628;
            --navy-mid: #0F1F38;

            --font-hero: 'Cormorant Garamond', serif;
            --font-heading: 'Playfair Display', serif;
            --font-body: 'Lato', sans-serif;

            --transition-smooth: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        html,
        body {
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
        .font-hero {
            font-family: var(--font-hero);
        }

        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: var(--font-heading);
        }

        /* ══════════════════════════════════════════
           GLOBAL BUTTONS
        ══════════════════════════════════════════ */
        .btn-gold {
            background-color: var(--gold-primary);
            color: var(--black-rich);
            border: none;
            padding: 0.8rem 2.2rem;
            font-family: var(--font-body);
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 0.78rem;
            font-weight: 700;
            transition: var(--transition-smooth);
            box-shadow: 0 4px 20px rgba(212, 175, 55, 0.3);
            border-radius: 0;
            text-decoration: none;
            display: inline-block;
        }

        .btn-gold:hover {
            background-color: var(--gold-dark);
            color: var(--white-pure);
            transform: translateY(-2px);
            box-shadow: 0 8px 28px rgba(212, 175, 55, 0.4);
        }

        .btn-outline-gold {
            background-color: transparent;
            color: var(--gold-primary);
            border: 1px solid var(--gold-primary);
            padding: 0.8rem 2.2rem;
            font-family: var(--font-body);
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 0.78rem;
            font-weight: 700;
            transition: var(--transition-smooth);
            border-radius: 0;
            text-decoration: none;
            display: inline-block;
        }

        .btn-outline-gold:hover {
            background-color: var(--gold-primary);
            color: var(--black-rich);
        }

        .btn-outline-ghost {
            background-color: transparent;
            color: rgba(255, 255, 255, 0.85);
            border: 1px solid rgba(212, 175, 55, 0.5);
            padding: 0.8rem 2.2rem;
            font-family: var(--font-body);
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 0.78rem;
            font-weight: 700;
            transition: var(--transition-smooth);
            border-radius: 0;
            text-decoration: none;
            display: inline-block;
        }

        .btn-outline-ghost:hover {
            border-color: var(--gold-primary);
            color: var(--gold-primary);
            background: rgba(212, 175, 55, 0.08);
        }

        /* ══════════════════════════════════════════
           SECTION TYPOGRAPHY HELPERS
        ══════════════════════════════════════════ */
        .section-eyebrow {
            font-family: var(--font-body);
            font-size: 0.7rem;
            letter-spacing: 5px;
            text-transform: uppercase;
            color: var(--gold-primary);
            display: block;
            margin-bottom: 0.8rem;
        }

        .section-title {
            font-size: clamp(2rem, 4vw, 2.8rem);
            color: var(--gold-dark);
            text-align: center;
            margin-bottom: 0.8rem;
            font-weight: 600;
            position: relative;
        }

        .section-title::after {
            content: '';
            display: block;
            width: 50px;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--gold-primary), transparent);
            margin: 1rem auto 0;
        }

        .section-title.light {
            color: var(--gold-primary);
        }

        .section-title.light::after {
            background: linear-gradient(90deg, transparent, rgba(212, 175, 55, 0.6), transparent);
        }

        .section-subtitle {
            text-align: center;
            color: var(--gray-warm);
            font-size: 1rem;
            margin-bottom: 3.5rem;
            font-family: var(--font-heading);
            font-style: italic;
            max-width: 560px;
            margin-left: auto;
            margin-right: auto;
        }

        .section-subtitle.light {
            color: rgba(255, 255, 255, 0.45);
        }

        /* ══════════════════════════════════════════
           HERO
        ══════════════════════════════════════════ */
        .hero {
            min-height: 100vh;
            background:
                linear-gradient(rgba(10, 22, 40, 0.62), rgba(10, 22, 40, 0.82)),
                url('https://images.unsplash.com/photo-1511285560929-80b456fea0bc?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80') center / cover no-repeat;
            display: flex;
            align-items: center;
            text-align: center;
            color: var(--white-pure);
            position: relative;
            padding: 7rem 0 5rem;
        }

        .hero::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 100px;
            background: linear-gradient(transparent, var(--cream-base));
            pointer-events: none;
        }

        .hero-frame {
            border: 1px solid rgba(212, 175, 55, 0.5);
            padding: 5px;
            display: inline-block;
        }

        .hero-frame-inner {
            border: 1px solid rgba(212, 175, 55, 0.25);
            padding: clamp(1.8rem, 4vw, 3rem) clamp(1.5rem, 5vw, 4rem);
        }

        .hero-eyebrow {
            font-family: var(--font-body);
            font-size: 0.68rem;
            letter-spacing: 5px;
            text-transform: uppercase;
            color: var(--gold-primary);
            margin-bottom: 1.2rem;
            opacity: 0;
            animation: fadeUp 1s ease forwards 0.3s;
        }

        .hero-title {
            font-family: var(--font-hero);
            font-size: clamp(3.2rem, 8vw, 5.8rem);
            font-weight: 600;
            color: var(--white-pure);
            line-height: 1;
            margin-bottom: 1rem;
            opacity: 0;
            animation: fadeUp 1s ease forwards 0.55s;
        }

        .hero-title span {
            color: var(--gold-primary);
        }

        .hero-tagline {
            font-size: clamp(1rem, 2vw, 1.3rem);
            font-family: var(--font-heading);
            font-style: italic;
            margin-bottom: 2.5rem;
            color: rgba(255, 255, 255, 0.72);
            opacity: 0;
            animation: fadeUp 1s ease forwards 0.85s;
        }

        .hero-ctas {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            opacity: 0;
            animation: fadeUp 1s ease forwards 1.1s;
        }

        .scroll-caret {
            position: absolute;
            bottom: 115px;
            left: 50%;
            transform: translateX(-50%);
            color: rgba(212, 175, 55, 0.6);
            font-size: 1.6rem;
            animation: bounce 2.2s ease-in-out infinite;
            text-decoration: none;
            z-index: 1;
            transition: color 0.2s;
        }

        .scroll-caret:hover {
            color: var(--gold-primary);
        }

        /* ══════════════════════════════════════════
           STATS BAR
        ══════════════════════════════════════════ */
        .stats-bar {
            background: var(--navy-deep);
            padding: 2.8rem 0;
        }

        .stat-item {
            text-align: center;
            padding: 0.5rem 1rem;
            border-right: 1px solid rgba(212, 175, 55, 0.12);
        }

        .stat-item:last-child {
            border-right: none;
        }

        .stat-number {
            font-family: var(--font-hero);
            font-size: 2.6rem;
            color: var(--gold-primary);
            font-weight: 600;
            line-height: 1;
        }

        .stat-label {
            font-size: 0.68rem;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.4);
            margin-top: 0.35rem;
            font-family: var(--font-body);
        }

        /* ══════════════════════════════════════════
           HOW IT WORKS
        ══════════════════════════════════════════ */
        .how-it-works {
            padding: 6rem 0;
            background-color: var(--cream-base);
        }

        .step-card {
            text-align: center;
            padding: 2.5rem 1.8rem;
            background: var(--white-pure);
            border: 1px solid rgba(212, 175, 55, 0.15);
            transition: var(--transition-smooth);
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .step-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(180, 140, 60, 0.1);
            border-color: rgba(212, 175, 55, 0.35);
        }

        .step-number {
            position: absolute;
            top: 1.2rem;
            right: 1.5rem;
            font-family: var(--font-hero);
            font-size: 3.5rem;
            font-weight: 700;
            color: var(--gold-light);
            line-height: 1;
            opacity: 0.5;
            pointer-events: none;
        }

        .step-icon {
            font-size: 2.2rem;
            color: var(--gold-primary);
            margin-bottom: 1.2rem;
            display: block;
        }

        .step-title {
            font-size: 1.25rem;
            margin-bottom: 0.8rem;
            color: var(--black-rich);
            font-weight: 500;
        }

        .step-desc {
            color: var(--gray-warm);
            line-height: 1.75;
            font-size: 0.92rem;
        }

        /* ══════════════════════════════════════════
           LIVE PREVIEW
        ══════════════════════════════════════════ */
        .live-preview-section {
            padding: 6rem 0;
            background: linear-gradient(135deg, var(--cream-base) 0%, var(--cream-dark) 100%);
        }

        .preview-controls {
            background: var(--white-pure);
            border: 1px solid rgba(212, 175, 55, 0.25);
            padding: 2.2rem;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.04);
        }

        .preview-label {
            font-family: var(--font-heading);
            color: var(--gold-dark);
            font-size: 0.82rem;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            display: block;
            margin-bottom: 0.45rem;
        }

        .preview-input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--gold-light);
            font-family: var(--font-body);
            font-size: 0.95rem;
            color: var(--black-rich);
            background: var(--cream-base);
            outline: none;
            transition: border-color 0.25s;
            border-radius: 0;
            margin-bottom: 1.4rem;
        }

        .preview-input:focus {
            border-color: var(--gold-primary);
        }

        .invitation-card {
            background: linear-gradient(145deg, #FFFDF5, #FFF8E7);
            border: 2px solid var(--gold-primary);
            padding: clamp(2rem, 4vw, 3.5rem) clamp(1.5rem, 4vw, 2.5rem);
            text-align: center;
            position: relative;
            min-height: 400px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .invitation-card::before {
            content: '';
            position: absolute;
            inset: 10px;
            border: 1px solid rgba(212, 175, 55, 0.35);
            pointer-events: none;
        }

        .inv-corner {
            position: absolute;
            color: var(--gold-primary);
            font-size: 1rem;
            opacity: 0.5;
            line-height: 1;
        }

        .inv-corner.tl {
            top: 18px;
            left: 18px;
        }

        .inv-corner.tr {
            top: 18px;
            right: 18px;
        }

        .inv-corner.bl {
            bottom: 18px;
            left: 18px;
        }

        .inv-corner.br {
            bottom: 18px;
            right: 18px;
        }

        .inv-overline {
            font-family: var(--font-heading);
            color: rgba(10, 22, 40, 0.5);
            font-size: 0.68rem;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 1rem;
        }

        .inv-names {
            font-family: var(--font-hero);
            font-size: clamp(2.2rem, 5vw, 3.2rem);
            font-weight: 600;
            color: var(--black-rich);
            line-height: 1.05;
            transition: all 0.25s ease;
        }

        .inv-and {
            font-style: italic;
            color: var(--gold-primary);
            font-size: 1.4em;
            display: block;
            line-height: 1;
        }

        .inv-rule {
            width: 45px;
            height: 1px;
            background: var(--gold-primary);
            margin: 1.2rem auto;
            opacity: 0.55;
        }

        .inv-request {
            font-size: 0.68rem;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            color: var(--gray-mid);
            font-family: var(--font-body);
            margin-bottom: 0.6rem;
        }

        .inv-date {
            font-family: var(--font-heading);
            font-size: 1.15rem;
            color: var(--gold-dark);
            font-style: italic;
            transition: all 0.25s ease;
        }

        .inv-venue {
            font-size: 0.82rem;
            color: var(--gray-warm);
            margin-top: 0.3rem;
            font-family: var(--font-body);
            transition: all 0.25s ease;
        }

        /* ══════════════════════════════════════════
           TEMPLATES
        ══════════════════════════════════════════ */
        .templates {
            padding: 6rem 0;
            background-color: var(--cream-base);
        }

        .template-card {
            overflow: hidden;
            position: relative;
            cursor: pointer;
            height: 420px;
            border: 1px solid rgba(212, 175, 55, 0.15);
        }

        .template-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.7s ease;
            filter: brightness(0.88);
        }

        .template-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(10, 22, 40, 0.92));
            padding: 2.2rem 1.5rem 1.8rem;
            text-align: center;
        }

        .template-tag {
            display: inline-block;
            font-size: 0.62rem;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            color: var(--gold-primary);
            border: 1px solid rgba(212, 175, 55, 0.45);
            padding: 3px 10px;
            margin-bottom: 0.5rem;
            font-family: var(--font-body);
        }

        .template-name {
            color: var(--white-pure);
            font-size: 1.5rem;
            margin: 0;
            font-family: var(--font-heading);
            font-weight: 500;
        }

        .template-desc {
            color: rgba(255, 255, 255, 0.55);
            font-size: 0.82rem;
            margin: 0.3rem 0 0;
            font-family: var(--font-body);
        }

        .template-card:hover .template-img {
            transform: scale(1.06);
            filter: brightness(0.7);
        }

        /* ══════════════════════════════════════════
           TESTIMONIALS
        ══════════════════════════════════════════ */
        .testimonials {
            padding: 6rem 0;
            background: var(--navy-deep);
        }

        .testimonial-card {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(212, 175, 55, 0.15);
            padding: 2.5rem 2rem;
            height: 100%;
            position: relative;
            transition: var(--transition-smooth);
        }

        .testimonial-card:hover {
            border-color: rgba(212, 175, 55, 0.35);
            background: rgba(255, 255, 255, 0.07);
        }

        .stars {
            color: var(--gold-primary);
            font-size: 0.9rem;
            letter-spacing: 2px;
            margin-bottom: 1.2rem;
        }

        .testimonial-text {
            font-style: italic;
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.72);
            margin-bottom: 1.8rem;
            line-height: 1.8;
            font-family: var(--font-heading);
        }

        .t-author-row {
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .t-avatar {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--gold-primary), var(--gold-dark));
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: var(--font-hero);
            font-size: 1rem;
            color: var(--white-pure);
            flex-shrink: 0;
        }

        .t-author-name {
            font-family: var(--font-heading);
            color: var(--gold-primary);
            font-size: 1rem;
            font-weight: 500;
            margin: 0;
        }

        .t-author-meta {
            font-size: 0.75rem;
            color: rgba(255, 255, 255, 0.3);
            margin: 0;
        }

        /* ══════════════════════════════════════════
           PRICING
        ══════════════════════════════════════════ */
        .pricing-section {
            padding: 6rem 0;
            background: var(--cream-dark);
        }

        .pricing-card {
            background: var(--white-pure);
            border: 1px solid rgba(212, 175, 55, 0.2);
            padding: 2.8rem 2rem;
            text-align: center;
            height: 100%;
            transition: var(--transition-smooth);
            position: relative;
        }

        .pricing-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 16px 40px rgba(180, 140, 60, 0.1);
        }

        .pricing-card.featured {
            background: var(--navy-deep);
            border: 2px solid var(--gold-primary);
            transform: scale(1.03);
            color: var(--white-pure);
        }

        .pricing-card.featured:hover {
            transform: scale(1.03) translateY(-5px);
        }

        .pricing-badge {
            position: absolute;
            top: -14px;
            left: 50%;
            transform: translateX(-50%);
            background: var(--gold-primary);
            color: var(--navy-deep);
            font-size: 0.62rem;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding: 4px 16px;
            white-space: nowrap;
            font-family: var(--font-body);
        }

        .pricing-plan-label {
            font-family: var(--font-body);
            color: var(--gold-primary);
            letter-spacing: 2px;
            text-transform: uppercase;
            font-size: 0.75rem;
            margin-bottom: 1rem;
        }

        .pricing-amount {
            font-family: var(--font-hero);
            font-size: 3.5rem;
            font-weight: 700;
            line-height: 1;
            margin: 0;
            color: var(--black-rich);
        }

        .pricing-card.featured .pricing-amount {
            color: var(--gold-primary);
        }

        .pricing-period {
            color: var(--gray-warm);
            font-size: 0.82rem;
            margin: 0.3rem 0 2rem;
        }

        .pricing-card.featured .pricing-period {
            color: rgba(255, 255, 255, 0.4);
        }

        .pricing-divider {
            height: 1px;
            background: rgba(212, 175, 55, 0.12);
            margin: 0 0 1.5rem;
        }

        .pricing-feature {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            text-align: left;
            color: var(--gray-warm);
            font-size: 0.9rem;
            padding: 0.45rem 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            font-family: var(--font-body);
        }

        .pricing-card.featured .pricing-feature {
            color: rgba(255, 255, 255, 0.75);
            border-bottom-color: rgba(255, 255, 255, 0.06);
        }

        .pricing-feature:last-of-type {
            border-bottom: none;
        }

        .pricing-feature i.bi-check2 {
            color: var(--gold-primary);
            flex-shrink: 0;
        }

        .pricing-feature.off {
            opacity: 0.32;
        }

        .pricing-feature.off i {
            color: var(--gray-mid);
        }

        /* ══════════════════════════════════════════
           FAQ
        ══════════════════════════════════════════ */
        .faq-section {
            padding: 6rem 0;
            background: var(--cream-base);
        }

        .faq-item {
            border: 1px solid rgba(212, 175, 55, 0.22);
            margin-bottom: 0.65rem;
            background: var(--white-pure);
            transition: var(--transition-smooth);
        }

        .faq-item:hover {
            border-color: rgba(212, 175, 55, 0.45);
        }

        .faq-btn {
            width: 100%;
            background: none;
            border: none;
            padding: 1.3rem 1.5rem;
            text-align: left;
            font-family: var(--font-heading);
            font-size: 1.05rem;
            color: var(--black-rich);
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
            transition: color 0.2s;
        }

        .faq-btn:hover {
            color: var(--gold-dark);
        }

        .faq-btn .faq-icon {
            color: var(--gold-primary);
            font-size: 1.1rem;
            transition: transform 0.3s ease;
            flex-shrink: 0;
        }

        .faq-body {
            overflow: hidden;
            max-height: 0;
            transition: max-height 0.4s ease, padding 0.3s ease;
        }

        .faq-body.open {
            max-height: 300px;
            padding-bottom: 1.3rem;
        }

        .faq-body p {
            padding: 0 1.5rem;
            color: var(--gray-warm);
            font-size: 0.93rem;
            line-height: 1.85;
            margin: 0;
            font-family: var(--font-body);
        }

        /* ══════════════════════════════════════════
           FINAL CTA
        ══════════════════════════════════════════ */
        .final-cta {
            padding: 6rem 0;
            background:
                linear-gradient(rgba(10, 22, 40, 0.88), rgba(10, 22, 40, 0.92)),
                url('https://images.unsplash.com/photo-1519741497674-611481863552?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80') center / cover;
            text-align: center;
            color: var(--white-pure);
        }

        .final-cta-title {
            font-family: var(--font-hero);
            font-size: clamp(2.2rem, 5vw, 3.8rem);
            font-weight: 600;
            color: var(--white-pure);
            margin-bottom: 1rem;
            line-height: 1.1;
        }

        .final-cta-sub {
            font-family: var(--font-heading);
            font-style: italic;
            color: rgba(255, 255, 255, 0.55);
            font-size: 1.05rem;
            margin-bottom: 2.5rem;
        }

        .cta-footnote {
            font-size: 0.72rem;
            letter-spacing: 1px;
            color: rgba(255, 255, 255, 0.25);
            margin-top: 1.2rem;
        }

        /* ══════════════════════════════════════════
           ANIMATIONS
        ══════════════════════════════════════════ */
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(28px);
            }

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

        /* ══════════════════════════════════════════
           RESPONSIVE
        ══════════════════════════════════════════ */
        @media (max-width: 991px) {
            .pricing-card.featured {
                transform: none;
            }

            .pricing-card.featured:hover {
                transform: translateY(-5px);
            }
        }

        @media (max-width: 767px) {
            .stat-item {
                border-right: none;
                border-bottom: 1px solid rgba(212, 175, 55, 0.12);
                padding: 1rem 0;
            }

            .stat-item:last-child {
                border-bottom: none;
            }
        }

        @media (max-width: 576px) {
            .hero-frame-inner {
                padding: 1.8rem 1.2rem;
            }

            .hero::after {
                height: 60px;
            }
        }
    </style>
</head>

<body>

    {{-- ═══ NAVBAR (from partial) ═══ --}}
    @include('partials.header')

    {{-- ═══ HERO ═══ --}}
    <section id="hero" class="hero">
        <div class="container" style="position:relative;z-index:1;">
            <div class="row justify-content-center">
                <div class="col-lg-9 col-xl-8">
                    <p class="hero-eyebrow">Digital Wedding Invitations</p>
                    <div class="hero-frame">
                        <div class="hero-frame-inner">
                            <h1 class="hero-title">Velvet <span>&</span> Vows</h1>
                            <p class="hero-tagline">Where love meets legacy. Digital invitations crafted with the soul
                                of luxury stationery.</p>
                            <div class="hero-ctas">
                                <!-- <a href="{{ url('/register') }}" class="btn btn-gold btn-lg">Create Your Invitation</a> -->
                                <a href="#live-preview" class="btn btn-outline-ghost btn-lg">See a Live Example</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="#stats" class="scroll-caret">
            <i class="bi bi-chevron-double-down"></i>
        </a>
    </section>

    {{-- ═══ STATS BAR ═══ --}}
    <section id="stats" class="stats-bar">
        <div class="container">
            <div class="row text-center g-0">
                <div class="col-6 col-md-3">
                    <div class="stat-item">
                        <div class="stat-number">10K+</div>
                        <div class="stat-label">Invitations Sent</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-item">
                        <div class="stat-number">98%</div>
                        <div class="stat-label">Couple Satisfaction</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-item">
                        <div class="stat-number">20+</div>
                        <div class="stat-label">Premium Templates</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-item">
                        <div class="stat-number">Free</div>
                        <div class="stat-label">To Start Creating</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ═══ HOW IT WORKS ═══ --}}
    <section id="how-it-works" class="how-it-works">
        <div class="container">
            <span class="section-eyebrow text-center d-block">Simple Process</span>
            <h2 class="section-title">Effortless Elegance</h2>
            <p class="section-subtitle">From blank page to beautiful invitation in under five minutes.</p>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="step-card">
                        <span class="step-number">01</span>
                        <i class="bi bi-person-check step-icon"></i>
                        <h3 class="step-title">One-Click Sign In</h3>
                        <p class="step-desc">No forms, no passwords. Simply authenticate with Google to start crafting
                            your beautiful announcement immediately.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="step-card">
                        <span class="step-number">02</span>
                        <i class="bi bi-vector-pen step-icon"></i>
                        <h3 class="step-title">Personalise Details</h3>
                        <p class="step-desc">Enter your names, venue, and timings into our seamless builder. Preview
                            real-time changes on your chosen aesthetic.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="step-card">
                        <span class="step-number">03</span>
                        <i class="bi bi-send-fill step-icon"></i>
                        <h3 class="step-title">Share Instantly</h3>
                        <p class="step-desc">Publish to receive your unique URL and QR code. Share via WhatsApp, Email,
                            or Social Media in seconds.</p>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5">
                <!-- <a href="{{ url('/register') }}" class="btn btn-gold px-5 py-3">Start Creating — It's Free</a> -->
            </div>
        </div>
    </section>

    {{-- ═══ LIVE PREVIEW ═══ --}}
    <section id="live-preview" class="live-preview-section">
        <div class="container">
            <span class="section-eyebrow text-center d-block">Interactive Demo</span>
            <h2 class="section-title">See Your Invitation Come to Life</h2>
            <p class="section-subtitle">Type your names below and watch the magic happen in real time.</p>
            <div class="row align-items-center g-5">
                <!-- Controls -->
                <div class="col-lg-5">
                    <div class="preview-controls">
                        <label class="preview-label">Partner One</label>
                        <input id="previewName1" type="text" class="preview-input" value="Priya" maxlength="25">

                        <label class="preview-label">Partner Two</label>
                        <input id="previewName2" type="text" class="preview-input" value="Rahul" maxlength="25">

                        <label class="preview-label">Wedding Date</label>
                        <input id="previewDate" type="text" class="preview-input" value="December 25, 2026"
                            maxlength="35">

                        <label class="preview-label">Venue</label>
                        <input id="previewVenue" type="text" class="preview-input" value="The Grand Ballroom, Mumbai"
                            maxlength="50" style="margin-bottom:1.8rem;">

                        <a href="{{ url('/register') }}" class="btn btn-gold w-100">Create Mine Now →</a>
                    </div>
                </div>
                <!-- Card -->
                <div class="col-lg-7">
                    <div class="invitation-card">
                        <span class="inv-corner tl">✦</span>
                        <span class="inv-corner tr">✦</span>
                        <span class="inv-corner bl">✦</span>
                        <span class="inv-corner br">✦</span>
                        <p class="inv-overline">Together with their families</p>
                        <div class="inv-names">
                            <span id="displayName1">Priya</span>
                            <span class="inv-and">&</span>
                            <span id="displayName2">Rahul</span>
                        </div>
                        <div class="inv-rule"></div>
                        <p class="inv-request">Request the honour of your presence</p>
                        <p class="inv-date" id="displayDate">December 25, 2026</p>
                        <p class="inv-venue" id="displayVenue">The Grand Ballroom, Mumbai</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ═══ TEMPLATES ═══ --}}
    <section id="templates" class="templates">
        <div class="container">
            <span class="section-eyebrow text-center d-block">Curated Collection</span>
            <h2 class="section-title">Timeless Aesthetics</h2>
            <p class="section-subtitle">Every template crafted to feel like heirloom stationery.</p>
            <div class="row g-3">
                <div class="col-md-3 col-sm-6">
                    <div class="template-card">
                        <img src="https://images.unsplash.com/photo-1544926526-cb1723a1aee7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            alt="The Royal Scroll" class="template-img">
                        <div class="template-overlay">
                            <span class="template-tag">Classic</span>
                            <h3 class="template-name">The Royal Scroll</h3>
                            <p class="template-desc">Classic Opulence</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="template-card">
                        <img src="https://images.unsplash.com/photo-1606800052052-a08af7148866?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            alt="Golden Minimalist" class="template-img">
                        <div class="template-overlay">
                            <span class="template-tag">Contemporary</span>
                            <h3 class="template-name">Golden Minimalist</h3>
                            <p class="template-desc">Contemporary Luxury</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="template-card">
                        <img src="https://images.unsplash.com/photo-1519741497674-611481863552?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            alt="Garden Celestial" class="template-img">
                        <div class="template-overlay">
                            <span class="template-tag">Romantic</span>
                            <h3 class="template-name">Garden Celestial</h3>
                            <p class="template-desc">Romantic Ethereal</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="template-card">
                        <img src="https://images.unsplash.com/photo-1537633552985-df8429e8048b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            alt="Midnight Jasmine" class="template-img">
                        <div class="template-overlay">
                            <span class="template-tag">Mystique</span>
                            <h3 class="template-name">Midnight Jasmine</h3>
                            <p class="template-desc">Modern Mystique</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5">
                <a href="{{ url('/register') }}" class="btn btn-gold px-5">Start With a Template</a>
            </div>
        </div>
    </section>

    {{-- ═══ TESTIMONIALS ═══ --}}
    <section class="testimonials">
        <div class="container">
            <span class="section-eyebrow text-center d-block" style="color:var(--gold-light);">Love Stories</span>
            <h2 class="section-title light">Couples Who Chose Elegance</h2>
            <p class="section-subtitle light">Over 10,000 love stories shared through Velvet Vows.</p>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="stars">★★★★★</div>
                        <p class="testimonial-text">"We wanted our digital invites to feel as special as physical ones.
                            Velvet Vows delivered beyond our expectations. The Golden Minimalist theme was perfect."</p>
                        <div class="t-author-row">
                            <div class="t-avatar">P</div>
                            <div>
                                <p class="t-author-name">Priya &amp; Rahul</p>
                                <p class="t-author-meta">February 2025 · Mumbai</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="stars">★★★★★</div>
                        <p class="testimonial-text">"Created and sent to 300 guests in under 10 minutes. The WhatsApp
                            integration is flawless, and the design received so many compliments from everyone!"</p>
                        <div class="t-author-row">
                            <div class="t-avatar">S</div>
                            <div>
                                <p class="t-author-name">Sarah &amp; James</p>
                                <p class="t-author-meta">March 2025 · London</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="stars">★★★★★</div>
                        <p class="testimonial-text">"The Royal Scroll template perfectly captured the traditional yet
                            grand feel we wanted. Truly a premium experience with absolutely zero stress."</p>
                        <div class="t-author-row">
                            <div class="t-avatar">A</div>
                            <div>
                                <p class="t-author-name">Aisha &amp; Kabir</p>
                                <p class="t-author-meta">November 2024 · Dubai</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ═══ PRICING ═══ --}}
    <section id="pricing" class="pricing-section">
        <div class="container">
            <span class="section-eyebrow text-center d-block">No Surprises</span>
            <h2 class="section-title">Simple, Transparent Pricing</h2>
            <p class="section-subtitle">Start for free. Upgrade only when you need more.</p>
            <div class="row justify-content-center g-4">
                <!-- Free -->
                <div class="col-md-5 col-lg-4">
                    <div class="pricing-card">
                        <p class="pricing-plan-label">Free Forever</p>
                        <div class="pricing-amount">₹0</div>
                        <p class="pricing-period">No credit card needed</p>
                        <div class="pricing-divider"></div>
                        <div class="pricing-feature"><i class="bi bi-check2"></i> 1 Digital Invitation</div>
                        <div class="pricing-feature"><i class="bi bi-check2"></i> 3 Premium Templates</div>
                        <div class="pricing-feature"><i class="bi bi-check2"></i> Unique Shareable Link &amp; QR</div>
                        <div class="pricing-feature"><i class="bi bi-check2"></i> WhatsApp &amp; Email Share</div>
                        <div class="pricing-feature off"><i class="bi bi-x"></i> RSVP Tracking</div>
                        <div class="pricing-feature off"><i class="bi bi-x"></i> Custom Domain</div>
                        <div class="pricing-feature off"><i class="bi bi-x"></i> Remove Watermark</div>
                        <a href="{{ url('/register') }}" class="btn btn-outline-gold w-100 mt-4">Get Started Free</a>
                    </div>
                </div>
                <!-- Premium -->
                <div class="col-md-5 col-lg-4">
                    <div class="pricing-card featured">
                        <span class="pricing-badge">Most Popular</span>
                        <p class="pricing-plan-label">Premium</p>
                        <div class="pricing-amount">₹999</div>
                        <p class="pricing-period">One-time per wedding</p>
                        <div class="pricing-divider"></div>
                        <div class="pricing-feature"><i class="bi bi-check2"></i> Unlimited Invitations</div>
                        <div class="pricing-feature"><i class="bi bi-check2"></i> All 20+ Templates</div>
                        <div class="pricing-feature"><i class="bi bi-check2"></i> Unique Shareable Link &amp; QR</div>
                        <div class="pricing-feature"><i class="bi bi-check2"></i> WhatsApp &amp; Email Share</div>
                        <div class="pricing-feature"><i class="bi bi-check2"></i> RSVP Tracking Dashboard</div>
                        <div class="pricing-feature"><i class="bi bi-check2"></i> Custom Domain</div>
                        <div class="pricing-feature"><i class="bi bi-check2"></i> Remove Watermark</div>
                        <a href="{{ url('/register') }}" class="btn btn-gold w-100 mt-4">Start Premium</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ═══ FAQ ═══ --}}
    <section id="faq" class="faq-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <span class="section-eyebrow text-center d-block">Got Questions?</span>
                    <h2 class="section-title">Frequently Asked Questions</h2>
                    <p class="section-subtitle">Everything you need to know before you begin.</p>

                    <div class="faq-item">
                        <button class="faq-btn" onclick="toggleFaq(this)">
                            Can guests RSVP through the invitation?
                            <i class="bi bi-plus-lg faq-icon"></i>
                        </button>
                        <div class="faq-body">
                            <p>Yes! Premium invitations include a built-in RSVP feature. Guests confirm attendance
                                directly from the invitation link, and you see all responses in real-time on your
                                dashboard with instant notifications.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-btn" onclick="toggleFaq(this)">
                            Will it look good on mobile phones?
                            <i class="bi bi-plus-lg faq-icon"></i>
                        </button>
                        <div class="faq-body">
                            <p>Absolutely. Every invitation is fully responsive and looks stunning on any device. Since
                                most guests open invitations via WhatsApp on their phone, we design mobile-first on
                                every template.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-btn" onclick="toggleFaq(this)">
                            Is it really free to start? No hidden charges?
                            <i class="bi bi-plus-lg faq-icon"></i>
                        </button>
                        <div class="faq-body">
                            <p>Yes, completely free. No credit card required. The free plan lets you create one
                                invitation with 3 beautiful templates and share it with unlimited guests via WhatsApp or
                                link — forever.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-btn" onclick="toggleFaq(this)">
                            Can I edit my invitation after publishing?
                            <i class="bi bi-plus-lg faq-icon"></i>
                        </button>
                        <div class="faq-body">
                            <p>Yes, update your invitation details at any time. The live URL stays the same, so guests
                                who already received the link will automatically see the latest version when they open
                                it.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-btn" onclick="toggleFaq(this)">
                            How do I share it on WhatsApp or Email?
                            <i class="bi bi-plus-lg faq-icon"></i>
                        </button>
                        <div class="faq-body">
                            <p>After publishing, your dashboard gives you a shareable link, a downloadable QR code, and
                                a one-click WhatsApp share button. You can also print the QR code on physical
                                stationery.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-btn" onclick="toggleFaq(this)">
                            What payment methods are accepted?
                            <i class="bi bi-plus-lg faq-icon"></i>
                        </button>
                        <div class="faq-body">
                            <p>Payments are processed securely via Razorpay. We accept all major credit/debit cards, UPI
                                (GPay, PhonePe, Paytm), and net banking. We never store your card details on our
                                servers.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ═══ FINAL CTA ═══ --}}
    <section class="final-cta">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 text-center">
                    <span class="section-eyebrow">Your love story deserves a beautiful beginning</span>
                    <h2 class="final-cta-title">Ready to Create Something Unforgettable?</h2>
                    <p class="final-cta-sub">Join 10,000+ couples who trusted Velvet Vows to announce their most
                        important day. Start free in under 2 minutes.</p>
                    <div class="d-flex gap-3 justify-content-center flex-wrap">
                        <a href="{{ url('/register') }}" class="btn btn-gold btn-lg px-5">Get Started Free</a>
                        <a href="#live-preview" class="btn btn-outline-ghost btn-lg px-5">See a Demo</a>
                    </div>
                    <p class="cta-footnote">No credit card required &nbsp;·&nbsp; Free plan available forever</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ═══ FOOTER (from partial) ═══ --}}
    @include('partials.footer')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // ── Live Invitation Preview ────────────────────
        const previewMap = {
            previewName1: 'displayName1',
            previewName2: 'displayName2',
            previewDate: 'displayDate',
            previewVenue: 'displayVenue'
        };
        Object.entries(previewMap).forEach(([inputId, displayId]) => {
            const input = document.getElementById(inputId);
            const display = document.getElementById(displayId);
            if (input && display) {
                input.addEventListener('input', () => {
                    display.textContent = input.value || '—';
                });
            }
        });

        // ── FAQ Accordion ─────────────────────────────
        function toggleFaq(btn) {
            const body = btn.nextElementSibling;
            const icon = btn.querySelector('.faq-icon');
            const isOpen = body.classList.contains('open');

            document.querySelectorAll('.faq-body.open').forEach(b => b.classList.remove('open'));
            document.querySelectorAll('.faq-icon').forEach(i => {
                i.classList.replace('bi-dash-lg', 'bi-plus-lg');
            });

            if (!isOpen) {
                body.classList.add('open');
                icon.classList.replace('bi-plus-lg', 'bi-dash-lg');
            }
        }

        // ── Scroll-spy: active nav link ───────────────
        const sections = document.querySelectorAll('section[id]');
        const navLinks = document.querySelectorAll('.nav-link[href^="#"]');
        window.addEventListener('scroll', () => {
            let current = '';
            sections.forEach(s => {
                if (window.scrollY >= s.offsetTop - 130) current = s.id;
            });
            navLinks.forEach(l => {
                l.classList.toggle('active', l.getAttribute('href') === '#' + current);
            });
        }, { passive: true });
    </script>

</body>

</html>