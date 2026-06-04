<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $invitation->bride_name ?? $details['bride_name'] ?? 'Bride' }} & {{ $invitation->groom_name ?? $details['groom_name'] ?? 'Groom' }}</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Montserrat:wght@300;400;600&family=Alex+Brush&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        :root {
            --bg-main: #FFFDF9; /* Sparkling cream white background */
            --gold-primary: #C5A86D; /* Luxury matte gold */
            --gold-light: #9B7F49; /* Dark gold for text contrast */
            --text-light: #2A241E; /* Rich deep brown/black for text */
            --text-muted: #6B6155; /* Soft warm charcoal/brown for subtext */
            --font-display: 'Playfair Display', serif;
            --font-sans: 'Montserrat', sans-serif;
            --font-cursive: 'Alex Brush', cursive;
        }
        
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            min-height: 100vh;
            background: #F4EFEB; /* Elegant warm alabaster backdrop */
            font-family: var(--font-sans);
            color: var(--text-light);
            display: flex;
            justify-content: center;
            overflow-x: hidden;
        }
        
        .template-wrapper {
            width: 100%;
            max-width: 600px;
            background: linear-gradient(180deg, #FFFDF9 0%, #FAF6EE 50%, #F5EFE4 100%);
            box-shadow: 0 20px 50px rgba(140, 109, 59, 0.12);
            padding-bottom: 80px;
            position: relative;
            border-left: 1px solid rgba(197, 168, 109, 0.25);
            border-right: 1px solid rgba(197, 168, 109, 0.25);
        }

        /* Celestial Deco Elements */
        .stars-overlay {
            position: absolute;
            inset: 0;
            background-image: 
                radial-gradient(rgba(197, 168, 109, 0.2) 1px, transparent 40px),
                radial-gradient(rgba(197, 168, 109, 0.15) 1.5px, transparent 30px);
            background-size: 350px 350px, 250px 250px;
            background-position: 0 0, 40px 60px;
            opacity: 0.8;
            pointer-events: none;
            z-index: 1;
        }

        .deco-frame {
            position: absolute;
            top: 20px;
            left: 20px;
            right: 20px;
            bottom: 20px;
            border: 1px solid rgba(197, 168, 109, 0.25);
            pointer-events: none;
            z-index: 2;
        }

        .deco-corner {
            position: absolute;
            width: 15px;
            height: 15px;
            border: 2px solid var(--gold-primary);
            pointer-events: none;
            z-index: 3;
        }
        .top-left { top: 15px; left: 15px; border-right: none; border-bottom: none; }
        .top-right { top: 15px; right: 15px; border-left: none; border-bottom: none; }
        .bottom-left { bottom: 15px; left: 15px; border-right: none; border-top: none; }
        .bottom-right { bottom: 15px; right: 15px; border-left: none; border-top: none; }

        .hero-section {
            position: relative;
            width: 100%;
            height: 480px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-img-wrap {
            width: 80%;
            height: 85%;
            border-radius: 150px 150px 0 0; /* Elegant Arch Shape */
            overflow: hidden;
            border: 2px solid var(--gold-primary);
            box-shadow: 0 10px 30px rgba(140,109,59,0.15);
            position: relative;
            z-index: 5;
        }

        .hero-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .content-container {
            padding: 20px 40px;
            text-align: center;
            position: relative;
            z-index: 5;
        }

        .intro-text {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 4px;
            color: var(--gold-light);
            margin-bottom: 20px;
            font-weight: 600;
        }

        .names {
            font-family: var(--font-display);
            font-size: 2.8rem;
            font-weight: 400;
            color: var(--text-light);
            margin: 0;
            text-shadow: none;
        }

        .ampersand {
            font-family: var(--font-cursive);
            font-size: 3rem;
            color: var(--gold-primary);
            margin: 10px 0;
            line-height: 0.8;
        }

        .date-section {
            margin: 35px auto;
            display: inline-block;
            border-top: 1px solid rgba(197, 168, 109, 0.4);
            border-bottom: 1px solid rgba(197, 168, 109, 0.4);
            padding: 15px 30px;
        }

        .date {
            font-family: var(--font-display);
            font-size: 1.5rem;
            color: var(--gold-light);
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .time {
            font-size: 0.95rem;
            color: var(--text-muted);
            margin-top: 5px;
            letter-spacing: 1px;
        }

        .message-box {
            font-family: var(--font-display);
            font-style: italic;
            font-size: 1.15rem;
            line-height: 1.8;
            color: var(--text-light);
            margin: 30px 0 45px;
            position: relative;
        }

        .message-box::before {
            content: "✦";
            display: block;
            color: var(--gold-primary);
            margin-bottom: 10px;
            font-size: 1.2rem;
        }

        /* Couple Sections */
        .couple-intro-title {
            font-family: var(--font-display);
            font-size: 1.8rem;
            color: var(--gold-light);
            margin-bottom: 30px;
        }

        .couple-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 50px;
        }

        .couple-card {
            background: rgba(197, 168, 109, 0.04);
            border: 1px solid rgba(197, 168, 109, 0.2);
            border-radius: 20px;
            padding: 20px 15px;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-shadow: 0 10px 25px rgba(140,109,59,0.05);
            backdrop-filter: blur(5px);
        }

        .couple-avatar-wrap {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            overflow: hidden;
            border: 2px solid var(--gold-primary);
            margin-bottom: 15px;
            box-shadow: 0 8px 20px rgba(140,109,59,0.15);
        }

        .couple-avatar {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .couple-name {
            font-family: var(--font-display);
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--text-light);
            margin: 0 0 5px 0;
        }

        .couple-role {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--gold-light);
            font-weight: 600;
        }

        /* Event Cards styling */
        .detail-section-title {
            font-family: var(--font-display);
            font-size: 1.8rem;
            color: var(--gold-light);
            margin-bottom: 25px;
        }

        .info-card {
            background: rgba(197, 168, 109, 0.04);
            border: 1px solid rgba(197, 168, 109, 0.22);
            border-radius: 24px;
            padding: 30px 25px;
            margin-bottom: 40px;
            text-align: center;
            box-shadow: 0 15px 35px rgba(140, 109, 59, 0.08);
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(5px);
        }

        .info-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; height: 3px;
            background: linear-gradient(90deg, transparent, var(--gold-primary), transparent);
        }

        .card-icon {
            font-size: 2rem;
            color: var(--gold-light);
            margin-bottom: 15px;
            display: inline-block;
        }

        .venue-name {
            font-family: var(--font-display);
            font-size: 1.4rem;
            color: var(--text-light);
            margin-bottom: 8px;
        }

        .venue-address {
            font-size: 0.95rem;
            color: var(--text-muted);
            line-height: 1.6;
            margin: 0 auto 20px;
            max-width: 400px;
        }

        .rsvp-label {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 3px;
            color: var(--gold-light);
            font-weight: 600;
            margin-bottom: 5px;
        }

        .rsvp-contact {
            font-family: var(--font-display);
            font-size: 1.3rem;
            color: var(--gold-light);
        }

        /* Gallery */
        .gallery-section {
            margin-top: 40px;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-top: 20px;
        }

        .gallery-item {
            aspect-ratio: 1;
            border-radius: 16px;
            overflow: hidden;
            border: 1px solid rgba(197, 168, 109, 0.2);
            box-shadow: 0 5px 15px rgba(140, 109, 59, 0.1);
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.08);
        }

        /* Custom Font modifiers to align with SaaS styles */
        [data-preview="wedding_date"], 
        [data-preview="time"], 
        [data-preview="venue_address"], 
        [data-preview="rsvp_contact"] {
            font-family: var(--font-display) !important;
            font-style: italic !important;
            letter-spacing: 0.5px !important;
        }
        [data-preview="venue_name"] {
            font-family: var(--font-cursive) !important;
            font-size: 1.8em !important;
            font-weight: normal !important;
            color: var(--gold-primary) !important;
        }

        .hidden { display: none; }

        /* Responsive Mobile Styling overrides */
        @media (max-width: 500px) {
            .deco-frame {
                top: 10px;
                left: 10px;
                right: 10px;
                bottom: 10px;
            }
            .deco-corner {
                width: 10px;
                height: 10px;
            }
            .top-left { top: 7px; left: 7px; }
            .top-right { top: 7px; right: 7px; }
            .bottom-left { bottom: 7px; left: 7px; }
            .bottom-right { bottom: 7px; right: 7px; }

            .hero-section {
                height: 380px;
            }
            .hero-img-wrap {
                width: 85%;
                height: 90%;
            }

            .content-container {
                padding: 15px 20px;
            }

            .names {
                font-size: 2.2rem;
            }

            .ampersand {
                font-size: 2.5rem;
            }

            .date-section {
                padding: 10px 15px;
                margin: 25px auto;
            }

            .date {
                font-size: 1.2rem;
            }

            .message-box {
                font-size: 1.05rem;
                margin: 20px 0 35px;
                padding: 0 10px;
            }

            .couple-grid {
                grid-template-columns: 1fr 1fr; /* Keep in same row */
                gap: 10px;
            }

            .couple-card {
                padding: 10px 5px;
            }

            .couple-avatar-wrap {
                width: 90px;
                height: 90px;
            }

            .couple-name {
                font-size: 1rem;
            }

            .info-card {
                padding: 20px 15px;
                margin-bottom: 25px;
            }

            .venue-name {
                font-size: 1.2rem;
            }

            .rsvp-contact {
                font-size: 1.15rem;
            }
        }
    </style>
</head>
<body>
    <div class="template-wrapper">
        <div class="stars-overlay"></div>
        <div class="deco-frame"></div>
        <div class="deco-corner top-left"></div>
        <div class="deco-corner top-right"></div>
        <div class="deco-corner bottom-left"></div>
        <div class="deco-corner bottom-right"></div>
        
        <!-- Arch Hero Image -->
        <div class="hero-section">
            <div class="hero-img-wrap">
                <img class="hero-img pv-main-img-src" src="{{ $invitation->main_image_url ?? 'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&q=80&w=800' }}" alt="Main Photo">
            </div>
        </div>
        
        <div class="content-container">
            <div class="intro-text">The Wedding of</div>
            
            <h1 class="names" data-preview="bride_name">{{ $invitation->bride_name ?? $details['bride_name'] ?? 'Sophia' }}</h1>
            <div class="ampersand">&amp;</div>
            <h1 class="names" data-preview="groom_name">{{ $invitation->groom_name ?? $details['groom_name'] ?? 'Alexander' }}</h1>
            
            <div class="date-section">
                <div class="date" data-preview="wedding_date">
                    {{ \Carbon\Carbon::parse($invitation->wedding_date ?? $details['wedding_date'] ?? now())->format('l, F j, Y') }}
                </div>
                <div class="time" data-preview="time">{{ $invitation->time ?? $details['time'] ?? '05:00 PM onwards' }}</div>
            </div>
            
            <div class="message-box" data-preview="personal_message">
                {!! nl2br(e($invitation->personal_message ?? $details['personal_message'] ?? "Together with our families, we invite you to join us as we celebrate our love and begin our greatest adventure together.")) !!}
            </div>

            <!-- Couple Section -->
            <div class="couple-intro-title">The Happy Couple</div>
            <div class="couple-grid">
                <div class="couple-card">
                    <div class="couple-avatar-wrap">
                        <img class="couple-avatar pv-bride-img-src" src="{{ $invitation->bride_image_url ?? 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&q=80&w=400' }}" alt="Bride">
                    </div>
                    <h3 class="couple-name" data-preview="bride_name">{{ $invitation->bride_name ?? $details['bride_name'] ?? 'Sophia' }}</h3>
                    <span class="couple-role">The Bride</span>
                </div>
                <div class="couple-card">
                    <div class="couple-avatar-wrap">
                        <img class="couple-avatar pv-groom-img-src" src="{{ $invitation->groom_image_url ?? 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?auto=format&fit=crop&q=80&w=400' }}" alt="Groom">
                    </div>
                    <h3 class="couple-name" data-preview="groom_name">{{ $invitation->groom_name ?? $details['groom_name'] ?? 'Alexander' }}</h3>
                    <span class="couple-role">The Groom</span>
                </div>
            </div>
            
            <div class="detail-section-title">When &amp; Where</div>
            <div class="info-card">
                <div class="card-icon"><i class="bi bi-geo-alt"></i></div>
                <h3 class="venue-name" data-preview="venue_name">{{ $invitation->venue_name ?? $details['venue_name'] ?? 'St. Regis Grand Ballroom' }}</h3>
                <p class="venue-address" data-preview="venue_address">{{ $invitation->venue_address ?? $details['venue_address'] ?? '290 Fifth Avenue, New York, NY' }}</p>
            </div>

            <div class="info-card">
                <div class="card-icon"><i class="bi bi-envelope-check"></i></div>
                <div class="rsvp-label">RSVP</div>
                <div class="rsvp-contact" data-preview="rsvp_contact">{{ $invitation->rsvp_contact ?? $details['rsvp_contact'] ?? 'rsvp@sophiaandalexander.com' }}</div>
            </div>

            <!-- Gallery Section -->
            <div class="gallery-section" style="{{ (isset($invitation) && $invitation->galleries && $invitation->galleries->count() > 0) ? '' : 'display:none;' }}">
                <div class="detail-section-title">Memories</div>
                <div class="gallery-grid">
                    @if(isset($invitation) && $invitation->galleries)
                        @foreach($invitation->galleries as $gallery)
                            <div class="gallery-item">
                                <img class="gallery-img" src="{{ $gallery->image_url }}" alt="Gallery Image">
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>
