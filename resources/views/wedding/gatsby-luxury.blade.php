<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $invitation->bride_name ?? $details['bride_name'] ?? 'Bride' }} & {{ $invitation->groom_name ?? $details['groom_name'] ?? 'Groom' }}</title>
    
    <!-- Google Fonts: Playfair Display for headers, Montserrat for text, Cinzel for Art Deco accents -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Cinzel:wght@400;600;700;900&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --bg-dark: #121212;
            --bg-card: #1C1C1C;
            --gold-primary: #D4AF37;
            --gold-dark: #AA7C11;
            --gold-light: #F3E5AB;
            --text-light: #F5F5F5;
            --text-muted: #A0A0A0;
            --border-gold: rgba(212, 175, 55, 0.25);
            --border-gold-strong: rgba(212, 175, 55, 0.6);
            --font-display: 'Cinzel', serif;
            --font-serif: 'Playfair Display', serif;
            --font-sans: 'Montserrat', sans-serif;
        }

        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            min-height: 100vh;
            background: var(--bg-dark);
            font-family: var(--font-sans);
            color: var(--text-light);
            overflow-x: hidden;
        }

        /* Ambient Art Deco background texture */
        .inv-gatsby-luxury {
            width: 100%;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            text-align: center;
            position: relative;
            background-image: 
                radial-gradient(circle at 10% 20%, rgba(212, 175, 55, 0.05) 0%, transparent 40%),
                radial-gradient(circle at 90% 80%, rgba(212, 175, 55, 0.05) 0%, transparent 40%);
            padding-top: 35px;
        }

        /* Art Deco border pattern decoration */
        .deco-frame {
            position: absolute;
            inset: 15px;
            border: 1px solid var(--border-gold);
            pointer-events: none;
            z-index: 10;
        }

        .deco-frame::before {
            content: '';
            position: absolute;
            inset: 8px;
            border: 2px solid var(--gold-primary);
            opacity: 0.15;
        }

        /* Hero Section style */
        .hero-section {
            background-color: #1a1a1a; 
            height: 28vh; 
            min-height: 240px; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            flex-direction: column; 
            color: #fff; 
            padding: 2rem 1.2rem 1.5rem; 
            position: relative; 
            z-index: 1;
            border-bottom: 2px solid var(--gold-primary);
            box-sizing: border-box;
        }

        .hero-img {
            position: absolute; 
            inset: 0; 
            width: 100%; 
            height: 100%; 
            object-fit: cover; 
            z-index: -2;
        }

        .hero-overlay {
            position: absolute; 
            inset: 0; 
            background: linear-gradient(180deg, rgba(18,18,18,0.4) 0%, rgba(18,18,18,0.8) 100%); 
            z-index: -1;
        }

        .hero-subtitle {
            font-family: var(--font-display); 
            text-transform: uppercase; 
            font-size: 0.65rem; 
            letter-spacing: 4px; 
            margin-bottom: 0.8rem;
            color: var(--gold-primary);
        }

        .hero-names {
            font-family: var(--font-display); 
            font-size: 2.2rem; 
            font-weight: 700;
            line-height: 1.1; 
            margin: 0;
            letter-spacing: 1px;
            color: var(--text-light);
        }

        .hero-names span {
            color: var(--gold-primary);
        }

        .hero-date {
            font-family: var(--font-sans); 
            font-size: 0.72rem; 
            letter-spacing: 2px; 
            text-transform: uppercase;
            margin-top: 1rem; 
            padding: 0.5rem 1rem; 
            border-top: 1px solid var(--border-gold); 
            border-bottom: 1px solid var(--border-gold);
            color: var(--gold-light);
        }

        /* Content wrappers */
        .content-section {
            padding: 3rem 1.5rem;
            position: relative;
            z-index: 2;
            flex: 1;
        }

        .section-title {
            font-family: var(--font-display);
            font-size: 1.8rem;
            color: var(--gold-primary);
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-top: 0;
            margin-bottom: 0.5rem;
        }

        .section-divider {
            width: 60px;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--gold-primary), transparent);
            margin: 0.8rem auto 2rem;
        }

        /* Couple Portrait Frames */
        .couple-container {
            display: flex;
            justify-content: center;
            gap: 2.5rem;
            margin-bottom: 3rem;
            flex-wrap: wrap;
        }

        .person-card {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .photo-frame-wrapper {
            width: 120px;
            height: 160px;
            border: 2px solid var(--gold-primary);
            padding: 5px;
            position: relative;
            overflow: hidden;
            margin-bottom: 1rem;
            background: var(--bg-card);
            /* Art Deco cut corner style */
            clip-path: polygon(15% 0%, 85% 0%, 100% 12%, 100% 88%, 85% 100%, 15% 100%, 0% 88%, 0% 12%);
        }

        .person-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            clip-path: polygon(15% 0%, 85% 0%, 100% 12%, 100% 88%, 85% 100%, 15% 100%, 0% 88%, 0% 12%);
        }

        /* Groom empty placeholder frame */
        .pv-groom-placeholder {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #222;
            width: 100%;
            height: 100%;
            position: absolute;
            inset: 0;
            z-index: 1;
            transition: opacity 0.3s;
            border: 1px dashed var(--border-gold-strong);
            clip-path: polygon(15% 0%, 85% 0%, 100% 12%, 100% 88%, 85% 100%, 15% 100%, 0% 88%, 0% 12%);
            box-sizing: border-box;
        }

        .pv-groom-img-src[src]:not([src=""]) ~ .pv-groom-placeholder {
            opacity: 0;
            pointer-events: none;
        }

        .person-name {
            font-family: var(--font-display);
            font-size: 1.1rem;
            color: var(--text-light);
            letter-spacing: 1.5px;
            margin: 0;
            text-transform: uppercase;
        }

        .person-role {
            font-size: 0.65rem;
            color: var(--gold-primary);
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-top: 0.25rem;
        }

        /* Luxury Double-column Directions Card */
        .luxury-directions-card {
            background: var(--bg-card);
            border: 1px solid var(--border-gold);
            padding: 1.8rem 1.5rem;
            margin: 2rem auto;
            max-width: 600px;
            position: relative;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            /* Subtle interior deco line */
            outline: 1px solid rgba(212, 175, 55, 0.1);
            outline-offset: -8px;
        }

        .directions-grid {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 1.2rem;
            text-align: left;
        }

        .directions-left {
            flex: 1 1 250px;
        }

        .directions-title {
            font-family: var(--font-display);
            font-size: 1.1rem;
            color: var(--gold-primary);
            margin: 0 0 0.4rem;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .directions-text {
            font-family: var(--font-sans);
            font-size: 0.82rem;
            color: var(--text-muted);
            line-height: 1.5;
            margin: 0;
        }

        .directions-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.8rem 1.4rem;
            border-radius: 0px; /* Sharp art deco styling */
            background: linear-gradient(135deg, var(--gold-dark), var(--gold-primary));
            color: #121212;
            text-decoration: none;
            font-family: var(--font-display);
            font-size: 0.85rem;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            box-shadow: 0 6px 15px rgba(212, 175, 55, 0.2);
            border: 1px solid var(--gold-light);
            transition: all 0.3s;
        }

        .directions-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(212, 175, 55, 0.35);
            filter: brightness(1.1);
        }

        /* Detail Block rows */
        .info-card {
            border: 1px solid var(--border-gold);
            padding: 2rem 1.5rem;
            margin: 2.5rem auto;
            max-width: 500px;
            background: rgba(28, 28, 28, 0.6);
        }

        .info-row {
            margin-bottom: 1.5rem;
        }
        .info-row:last-child {
            margin-bottom: 0;
        }

        .info-label {
            font-family: var(--font-display);
            font-size: 0.75rem;
            color: var(--gold-primary);
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 0.3rem;
            display: block;
        }

        .info-value {
            font-family: var(--font-serif);
            font-size: 1.3rem;
            color: var(--text-light);
            font-weight: normal;
        }

        .info-subvalue {
            font-family: var(--font-sans);
            font-size: 0.8rem;
            color: var(--text-muted);
            margin-top: 0.25rem;
        }

        /* Gallery Grid */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 0.6rem;
            max-width: 600px;
            margin: 1.5rem auto;
        }

        .gallery-item {
            aspect-ratio: 1;
            border: 1px solid var(--border-gold);
            padding: 3px;
            background: var(--bg-card);
            overflow: hidden;
        }

        .gallery-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* RSVP */
        .rsvp-wrapper {
            margin: 3.5rem auto 1.5rem;
            padding: 2.5rem 1rem;
            border-top: 1px solid var(--border-gold);
            max-width: 600px;
        }

        .rsvp-message {
            font-family: var(--font-serif);
            font-size: 1.15rem;
            font-style: italic;
            color: var(--text-light);
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .rsvp-details {
            display: inline-block;
            background: rgba(212, 175, 55, 0.08);
            border: 1px solid var(--border-gold-strong);
            padding: 1rem 2rem;
            color: var(--gold-light);
            font-family: var(--font-display);
            font-size: 0.9rem;
            letter-spacing: 1.5px;
        }

        /* Footer */
        .inv-footer {
            margin-top: 5rem;
            padding: 2.5rem 1rem;
            border-top: 1px solid rgba(212, 175, 55, 0.1);
            font-family: var(--font-sans);
            font-size: 0.72rem;
            color: var(--text-muted);
            text-align: center;
        }

        .inv-footer span {
            color: var(--gold-primary);
            font-weight: 600;
        }

        [data-preview="venue_name"] {
            font-family: var(--font-serif) !important;
            font-weight: 600 !important;
        }

        @media (max-width: 650px) {
            .deco-frame {
                inset: 8px;
            }
            .deco-frame::before {
                inset: 4px;
            }
            .couple-container {
                gap: 1.5rem;
            }
            .hero-names {
                font-size: 1.8rem;
            }
            .luxury-directions-card {
                padding: 1.4rem 1.2rem;
            }
            .directions-grid {
                text-align: center;
                justify-content: center;
            }
            .directions-button {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="inv-gatsby-luxury">
        <!-- Art Deco Decorative Border Frame -->
        <div class="deco-frame"></div>

        <!-- Hero Section (25% height, compact) -->
        <div class="hero-section">
            <img class="hero-img pv-main-img-src" src="{{ $invitation->main_image_url ?? $photo ?? 'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?auto=format&fit=crop&w=800&q=80' }}" alt="Gatsby Luxury Main Cover">
            <div class="hero-overlay"></div>

            <p class="hero-subtitle">The Honour of Your Presence</p>
            
            <p class="hero-names">
                <span data-preview="bride_name">{{ $invitation->bride_name ?? $details['bride_name'] ?? 'Bride' }}</span> 
                <span>&amp;</span> 
                <span data-preview="groom_name">{{ $invitation->groom_name ?? $details['groom_name'] ?? 'Groom' }}</span>
            </p>
            
            <p class="hero-date" data-preview="wedding_date">
                {{ \Carbon\Carbon::parse($invitation->wedding_date ?? $details['wedding_date'] ?? now())->format('F j, Y') }}
            </p>
        </div>

        <!-- Content Section -->
        <div class="content-section">
            <h2 class="section-title">The Couple</h2>
            <div class="section-divider"></div>
            
            <div class="couple-container">
                <!-- Bride -->
                <div class="person-card">
                    <div class="photo-frame-wrapper">
                        <img class="person-img pv-bride-img-src" src="{{ !empty($invitation->bride_image_url) ? $invitation->bride_image_url : (!empty($details['bride_image_url']) ? $details['bride_image_url'] : 'https://images.unsplash.com/photo-1541250848049-b4f7141fca3f?auto=format&fit=crop&w=400&q=80') }}" alt="">
                    </div>
                    <p class="person-name" data-preview="bride_name">
                        {{ $invitation->bride_name ?? $details['bride_name'] ?? 'Bride' }}
                    </p>
                    <span class="person-role">Bride</span>
                </div>
                
                <!-- Groom -->
                <div class="person-card">
                    @php
                        $groomImg = !empty($invitation->groom_image_url) ? $invitation->groom_image_url : (!empty($details['groom_image_url']) ? $details['groom_image_url'] : '');
                    @endphp
                    <div class="photo-frame-wrapper">
                        <img class="person-img pv-groom-img-src" src="{{ $groomImg }}" style="opacity:{{ $groomImg ? 1 : 0 }}; position: absolute; inset: 0;" onload="this.style.opacity=1" onerror="this.style.opacity=0" alt="Groom Portrait">
                        <div class="pv-groom-placeholder"></div>
                    </div>
                    <p class="person-name" data-preview="groom_name">
                        {{ $invitation->groom_name ?? $details['groom_name'] ?? 'Groom' }}
                    </p>
                    <span class="person-role">Groom</span>
                </div>
            </div>

            <!-- When & Where Details -->
            <div class="info-card">
                <div class="info-row">
                    <span class="info-label">The Date</span>
                    <div class="info-value" data-preview="wedding_date">
                        {{ \Carbon\Carbon::parse($invitation->wedding_date ?? $details['wedding_date'] ?? now())->format('l, F j, Y') }}
                    </div>
                    <div class="info-subvalue">At <span data-preview="time">{{ $invitation->time ?? $details['time'] ?? '7:00 PM' }}</span></div>
                </div>

                <div class="info-row" style="margin-top: 2rem;">
                    <span class="info-label">The Place</span>
                    <div class="info-value" data-preview="venue_name">
                        {{ $invitation->venue_name ?? $details['venue_name'] ?? 'The Grand Venue' }}
                    </div>
                    <div class="info-subvalue" data-preview="venue_address">
                        {{ $invitation->venue_address ?? $details['venue_address'] ?? '123 Royal Road, Ballroom' }}
                    </div>
                </div>
            </div>

            <!-- Luxury Venue Directions (Double Column) -->
            @php
                $locationUrl = $invitation->location_url ?? $details['location_url'] ?? '';
                $hasValidLocationUrl = !empty($locationUrl) && filter_var($locationUrl, FILTER_VALIDATE_URL);
            @endphp
            <div class="luxury-directions-card">
                <div class="directions-grid">
                    <div class="directions-left">
                        <p class="directions-title">Venue directions</p>
                        <p class="directions-text">Open the location in Maps to find the grand ballroom with ease.</p>
                    </div>
                    <a class="pv-location-url" href="{{ $hasValidLocationUrl ? $locationUrl : 'javascript:void(0)' }}" target="_blank" rel="noopener noreferrer" style="display: {{ $hasValidLocationUrl ? 'inline-flex' : 'none' }};" class="directions-button">
                        View on map
                    </a>
                </div>
            </div>

            <!-- Gallery Section -->
            <div class="gallery-section" style="{{ (isset($invitation) && $invitation->galleries && $invitation->galleries->count() > 0) ? 'display:block; margin-top: 3.5rem;' : 'display:none;' }}">
                <h2 class="section-title">Memories</h2>
                <div class="section-divider"></div>
                <div class="gallery-grid">
                    @if(isset($invitation) && $invitation->galleries)
                        @foreach($invitation->galleries as $gallery)
                            <div class="gallery-item">
                                <img src="{{ $gallery->image_url }}" class="gallery-img">
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <!-- RSVP Section -->
            <div class="rsvp-wrapper">
                <h2 class="section-title">RSVP</h2>
                <div class="section-divider"></div>
                
                <p class="rsvp-message" data-preview="personal_message">
                    {{ $invitation->personal_message ?? $details['personal_message'] ?? 'Please confirm your presence by RSVPing at your earliest convenience.' }}
                </p>

                <div class="rsvp-details">
                    Contact: <span data-preview="rsvp_contact">{{ $invitation->rsvp_contact ?? $details['rsvp_contact'] ?? 'N/A' }}</span>
                </div>
            </div>

            <!-- Footer -->
            <div class="inv-footer">
                <p style="margin-bottom: 0.3rem;">Created with love using <span>Velvet Vows</span></p>
                <p style="font-size: 0.65rem; opacity: 0.6;">Design your own beautiful digital invitation</p>
            </div>
        </div>
    </div>
</body>
</html>
