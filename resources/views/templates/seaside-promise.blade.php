<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $invitation->bride_name ?? $details['bride_name'] ?? 'Bride' }} & {{ $invitation->groom_name ?? $details['groom_name'] ?? 'Groom' }}</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600&family=Great+Vibes&family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --bg-color: #ffffff;
            --text-gold: #9b8252; /* Dark gold/brown matching the image */
            --text-dark: #333333;
            --font-display: 'Cinzel', serif;
            --font-script: 'Great Vibes', cursive;
            --font-sans: 'Montserrat', sans-serif;
        }
        
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            min-height: 100vh;
            background: #f4f4f4;
            font-family: var(--font-sans);
            display: flex;
            justify-content: center;
        }
        
        .template-wrapper {
            width: 100%;
            max-width: 600px;
            background-color: var(--bg-color);
            position: relative;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0,0,0,0.05);
            padding-bottom: 80px;
        }

        /* Subtle floral background pattern */
        .template-wrapper::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            /* A subtle floral pattern using a public transparent texture */
            background-image: url('https://www.transparenttextures.com/patterns/arabesque.png');
            opacity: 0.15;
            z-index: 0;
            pointer-events: none;
        }

        /* Content must sit above the background pattern */
        .content-layer {
            position: relative;
            z-index: 1;
            text-align: center;
        }

        /* Hero Image with Torn Paper Edge */
        .hero-container {
            position: relative;
            width: 100%;
            height: 450px;
            overflow: hidden;
        }

        .hero-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: top center;
        }

        /* Torn/wavy edge SVG overlay */
        .torn-edge {
            position: absolute;
            bottom: -2px; /* Pull down slightly to avoid gap */
            left: 0;
            width: 100%;
            height: 40px;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1200 120' preserveAspectRatio='none'%3E%3Cpath d='M0,120 C150,100 350,0 500,40 C650,80 850,50 1200,80 L1200,120 Z' fill='%23ffffff'%3E%3C/path%3E%3C/svg%3E");
            background-size: cover;
            background-position: center bottom;
            background-repeat: no-repeat;
            filter: drop-shadow(0 -5px 5px rgba(255,255,255,1));
        }

        /* Typography */
        .celebrate-text {
            font-family: var(--font-display);
            font-size: 1rem;
            color: var(--text-gold);
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-top: 40px;
            margin-bottom: 40px;
        }

        .names-block {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            margin-bottom: 50px;
        }

        .name-main {
            font-family: var(--font-display);
            font-size: 3.2rem;
            color: var(--text-gold);
            font-weight: 400;
            line-height: 1.1;
            letter-spacing: 1px;
        }

        .ampersand {
            font-family: var(--font-display);
            font-size: 2.5rem;
            color: var(--text-gold);
            font-style: italic;
        }

        /* Tape Banner (Date) */
        .tape-container {
            position: relative;
            margin: 60px auto;
            width: 280px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Simulated textured tape using gradients */
        .tape-bg {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(90deg, rgba(220,205,180,0.8) 0%, rgba(206,187,156,0.9) 50%, rgba(220,205,180,0.8) 100%);
            box-shadow: inset 0 0 10px rgba(155,130,82,0.2);
            transform: rotate(-2deg);
            z-index: 1;
        }

        /* Torn edges for the tape */
        .tape-bg::before, .tape-bg::after {
            content: '';
            position: absolute;
            top: 0; bottom: 0;
            width: 10px;
            background: inherit;
        }
        .tape-bg::before { left: -5px; clip-path: polygon(100% 0, 0 10%, 100% 20%, 0 30%, 100% 40%, 0 50%, 100% 60%, 0 70%, 100% 80%, 0 90%, 100% 100%); }
        .tape-bg::after { right: -5px; clip-path: polygon(0 0, 100% 10%, 0 20%, 100% 30%, 0 40%, 100% 50%, 0 60%, 100% 70%, 0 80%, 100% 90%, 0 100%); }

        .date-text {
            position: relative;
            z-index: 2;
            font-family: var(--font-sans);
            font-size: 1.4rem;
            color: rgba(155, 130, 82, 0.4); /* Faded out to look like it's underneath */
            font-weight: 600;
            letter-spacing: 3px;
        }

        .scratch-reveal {
            position: absolute;
            z-index: 3;
            font-family: var(--font-script);
            font-size: 2.2rem;
            color: #ffffff;
            text-shadow: 1px 1px 3px rgba(155, 130, 82, 0.4);
            transform: rotate(-2deg);
        }

        /* Countdown Section */
        .countdown-title {
            font-family: var(--font-display);
            font-size: 2.5rem;
            color: var(--text-gold);
            letter-spacing: 2px;
            margin-top: 60px;
            margin-bottom: 20px;
        }

        /* Details */
        .details-grid {
            margin-top: 40px;
            padding: 0 40px;
        }
        
        .detail-item {
            margin-bottom: 25px;
        }
        
        .detail-label {
            font-family: var(--font-display);
            font-size: 1rem;
            color: var(--text-gold);
            margin-bottom: 5px;
            letter-spacing: 1px;
        }
        
        .detail-value {
            font-family: var(--font-sans);
            font-size: 1.1rem;
            color: var(--text-dark);
            font-weight: 300;
        }

        .hidden { display: none; }
    </style>

    <!-- Added Beautiful Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400;1,600&display=swap" rel="stylesheet">
    <style>
        [data-preview="wedding_date"], 
        [data-preview="time"], 
        [data-preview="venue_address"], 
        [data-preview="rsvp_contact"] {
            font-family: 'Cormorant Garamond', serif !important;
            font-weight: 600 !important;
            font-style: italic !important;
            letter-spacing: 0.5px !important;
        }
        [data-preview="venue_name"] {
            font-family: 'Alex Brush', cursive !important;
            font-size: 1.5em !important;
            font-weight: normal !important;
        }
    </style>
</head>
<body>
    <div class="template-wrapper">
        
        <div class="hero-container">
            <img class="hero-img pv-main-img-src" src="{{ $invitation->main_image_url ?? 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=800&q=80' }}" alt="Main Photo">
            <div class="torn-edge"></div>
        </div>

        <div class="content-layer">
            <div class="celebrate-text">Celebrate our love with us.</div>
            
            <div class="names-block">
                <div class="name-main" data-preview="groom_name">{{ strtoupper($invitation->groom_name ?? $details['groom_name'] ?? 'SIDDARTH') }}</div>
                <div class="ampersand">&</div>
                <div class="name-main" data-preview="bride_name">{{ strtoupper($invitation->bride_name ?? $details['bride_name'] ?? 'ANAMIKA') }}</div>
            </div>
            
            <div class="tape-container">
                <div class="tape-bg"></div>
                <div class="date-text" data-preview="wedding_date">{{ \Carbon\Carbon::parse($invitation->wedding_date ?? $details['wedding_date'] ?? now())->format('d/m/Y') }}</div>
                <div class="scratch-reveal">Scratch & Reveal</div>
            </div>
            
            <div class="countdown-title">COUNT DOWN</div>
            
            <!-- Standard Theme Info -->
            <div class="details-grid">
                <div class="detail-item">
                    <div class="detail-label">TIME</div>
                    <div class="detail-value" data-preview="time">{{ $invitation->time ?? $details['time'] ?? '4:00 PM' }}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">VENUE</div>
                    <div class="detail-value" data-preview="venue_name" style="font-weight: 500;">{{ $invitation->venue_name ?? $details['venue_name'] ?? 'Seaside Resort & Spa' }}</div>
                    <div class="detail-value" data-preview="venue_address" style="font-size: 0.95rem; margin-top: 4px;">{{ $invitation->venue_address ?? $details['venue_address'] ?? '123 Ocean Drive, Paradise Coast' }}</div>
                </div>
                <div class="detail-item" style="margin-top: 40px;">
                    <div class="detail-label" style="font-size: 0.85rem;">RSVP</div>
                    <div class="detail-value" data-preview="rsvp_contact" style="font-style: italic;">{{ $invitation->rsvp_contact ?? $details['rsvp_contact'] ?? 'contact@siddarth-anamika.com' }}</div>
                </div>
            </div>
        </div>

        <!-- Hidden mandatory hooks -->
        <div class="hidden">
            <div data-preview="personal_message">{{ $invitation->personal_message ?? '' }}</div>
            <img class="pv-bride-img-src" src="{{ $invitation->bride_image_url ?? '' }}">
            <img class="pv-groom-img-src" src="{{ $invitation->groom_image_url ?? '' }}">
            
            <div class="gallery-section" style="display:none;">
                <div class="gallery-grid"></div>
            </div>
        </div>
        
    </div>
</body>
</html>
