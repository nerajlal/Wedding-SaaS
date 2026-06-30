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
            --bg-forest: #0B2418;
            --bg-forest-card: #05140D;
            --gold-leaf: #C39B62;
            --gold-leaf-bright: #F7E7C4;
            --text-light: #FBF9F6;
            --text-muted: #8E9C94;
            --border-gold: rgba(195, 155, 98, 0.28);
            --border-gold-strong: rgba(195, 155, 98, 0.65);
            --font-display: 'Cinzel', serif;
            --font-serif: 'Playfair Display', serif;
            --font-sans: 'Montserrat', sans-serif;
        }

        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            min-height: 100vh;
            background: var(--bg-forest);
            font-family: var(--font-sans);
            color: var(--text-light);
            overflow-x: hidden;
        }

        /* Whimsical enchanted background pattern */
        .inv-enchanted-forest {
            width: 100%;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            text-align: center;
            position: relative;
            background-image: 
                radial-gradient(circle at 80% 10%, rgba(195, 155, 98, 0.06) 0%, transparent 50%),
                radial-gradient(circle at 20% 90%, rgba(195, 155, 98, 0.05) 0%, transparent 50%);
            padding-top: 35px;
        }

        /* Leafy organic framing border decoration */
        .leafy-frame {
            position: absolute;
            inset: 12px;
            border: 1px solid var(--border-gold);
            pointer-events: none;
            z-index: 10;
        }

        .leafy-frame::before {
            content: '🍃';
            position: absolute;
            top: -10px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 1.1rem;
            color: var(--gold-leaf);
            background: var(--bg-forest);
            padding: 0 10px;
            opacity: 0.8;
        }

        /* Hero Section style */
        .hero-section {
            background-color: #05140d; 
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
            border-bottom: 2px solid var(--gold-leaf);
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
            background: linear-gradient(180deg, rgba(11,36,24,0.4) 0%, rgba(11,36,24,0.85) 100%); 
            z-index: -1;
        }

        .hero-subtitle {
            font-family: var(--font-display); 
            text-transform: uppercase; 
            font-size: 0.6rem; 
            letter-spacing: 3.5px; 
            margin-bottom: 0.6rem;
            color: var(--gold-leaf);
        }

        .hero-names {
            font-family: var(--font-serif); 
            font-size: 2.2rem; 
            font-weight: 500;
            line-height: 1.15; 
            margin: 0;
            font-style: italic;
            color: var(--text-light);
        }

        .hero-names span {
            color: var(--gold-leaf-bright);
        }

        .hero-date {
            font-family: var(--font-sans); 
            font-size: 0.7rem; 
            letter-spacing: 2.5px; 
            text-transform: uppercase;
            margin-top: 1rem; 
            padding: 0.4rem 1.2rem; 
            border-top: 1px solid var(--border-gold); 
            border-bottom: 1px solid var(--border-gold);
            color: var(--gold-leaf-bright);
        }

        /* Content wrappers */
        .content-section {
            padding: 3rem 1.5rem;
            position: relative;
            z-index: 2;
            flex: 1;
        }

        .section-title {
            font-family: var(--font-serif);
            font-size: 2rem;
            color: var(--gold-leaf);
            font-style: italic;
            margin-top: 0;
            margin-bottom: 0.4rem;
        }

        .section-divider {
            width: 80px;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--gold-leaf), transparent);
            margin: 0.6rem auto 2rem;
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
            border: 1.5px solid var(--border-gold-strong);
            padding: 5px;
            position: relative;
            overflow: hidden;
            margin-bottom: 1rem;
            background: var(--bg-forest-card);
            /* Whimsical pointed arch shape */
            clip-path: polygon(50% 0%, 100% 28%, 100% 100%, 0% 100%, 0% 28%);
        }

        .person-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            clip-path: polygon(50% 0%, 100% 28%, 100% 100%, 0% 100%, 0% 28%);
        }

        /* Groom empty placeholder frame */
        .pv-groom-placeholder {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: rgba(5, 20, 13, 0.9);
            width: 100%;
            height: 100%;
            position: absolute;
            inset: 0;
            z-index: 1;
            transition: opacity 0.3s;
            border: 1px dashed var(--gold-leaf);
            clip-path: polygon(50% 0%, 100% 28%, 100% 100%, 0% 100%, 0% 28%);
            box-sizing: border-box;
        }

        .pv-groom-img-src[src]:not([src=""]) ~ .pv-groom-placeholder {
            opacity: 0;
            pointer-events: none;
        }

        .person-name {
            font-family: var(--font-serif);
            font-size: 1.15rem;
            color: var(--text-light);
            margin: 0;
            font-style: italic;
        }

        .person-role {
            font-size: 0.65rem;
            color: var(--gold-leaf);
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-top: 0.25rem;
        }

        /* Whimsical Botanical Directions Card */
        .luxury-directions-card {
            background: var(--bg-forest-card);
            border: 1px solid var(--border-gold);
            padding: 1.8rem 1.5rem;
            margin: 2rem auto;
            max-width: 600px;
            position: relative;
            box-shadow: 0 12px 36px rgba(0, 0, 0, 0.4);
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
            font-family: var(--font-serif);
            font-size: 1.1rem;
            color: var(--gold-leaf);
            margin: 0 0 0.4rem;
            font-style: italic;
        }

        .directions-text {
            font-family: var(--font-sans);
            font-size: 0.82rem;
            color: var(--text-muted);
            line-height: 1.55;
            margin: 0;
        }

        .directions-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.75rem 1.4rem;
            border-radius: 20px; /* Softer organic styling */
            background: linear-gradient(135deg, var(--gold-leaf), #dfba87);
            color: #05140d;
            text-decoration: none;
            font-family: var(--font-sans);
            font-size: 0.82rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            box-shadow: 0 5px 12px rgba(195, 155, 98, 0.25);
            border: none;
            transition: all 0.3s;
        }

        .directions-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 18px rgba(195, 155, 98, 0.4);
            filter: brightness(1.08);
        }

        /* Detail Block rows */
        .info-card {
            border: 1px solid var(--border-gold);
            padding: 2.2rem 1.5rem;
            margin: 2.5rem auto;
            max-width: 500px;
            background: rgba(5, 20, 13, 0.5);
        }

        .info-row {
            margin-bottom: 1.8rem;
        }
        .info-row:last-child {
            margin-bottom: 0;
        }

        .info-label {
            font-family: var(--font-display);
            font-size: 0.72rem;
            color: var(--gold-leaf);
            text-transform: uppercase;
            letter-spacing: 2.5px;
            margin-bottom: 0.4rem;
            display: block;
        }

        .info-value {
            font-family: var(--font-serif);
            font-size: 1.4rem;
            color: var(--text-light);
            font-style: italic;
        }

        .info-subvalue {
            font-family: var(--font-sans);
            font-size: 0.8rem;
            color: var(--text-muted);
            margin-top: 0.3rem;
            letter-spacing: 0.5px;
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
            padding: 2px;
            background: var(--bg-forest-card);
            overflow: hidden;
            border-radius: 4px;
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
            line-height: 1.65;
        }

        .rsvp-details {
            display: inline-block;
            background: rgba(195, 155, 98, 0.08);
            border: 1px solid var(--border-gold-strong);
            padding: 1rem 2rem;
            color: var(--gold-leaf-bright);
            font-family: var(--font-serif);
            font-style: italic;
            font-size: 1rem;
            letter-spacing: 0.5px;
        }

        /* Footer */
        .inv-footer {
            margin-top: 5rem;
            padding: 2.5rem 1rem;
            border-top: 1px solid rgba(195, 155, 98, 0.1);
            font-family: var(--font-sans);
            font-size: 0.72rem;
            color: var(--text-muted);
            text-align: center;
        }

        .inv-footer span {
            color: var(--gold-leaf);
            font-weight: 600;
        }

        [data-preview="venue_name"] {
            font-family: var(--font-serif) !important;
            font-weight: 600 !important;
        }

        @media (max-width: 650px) {
            .leafy-frame {
                inset: 6px;
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
    <div class="inv-enchanted-forest">
        <!-- Botanical Border Frame -->
        <div class="leafy-frame"></div>

        <!-- Hero Section (25% height, compact) -->
        <div class="hero-section">
            <img class="hero-img pv-main-img-src" src="{{ $invitation->main_image_url ?? $photo ?? 'https://images.unsplash.com/photo-1448375240586-882707db888b?auto=format&fit=crop&w=800&q=80' }}" alt="Enchanted Forest Main Cover">
            <div class="hero-overlay"></div>

            <p class="hero-subtitle">You are invite to share the magic of</p>
            
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
                    <span class="info-label">The Forest Sanctuary</span>
                    <div class="info-value" data-preview="venue_name">
                        {{ $invitation->venue_name ?? $details['venue_name'] ?? 'The Grand Venue' }}
                    </div>
                    <div class="info-subvalue" data-preview="venue_address">
                        {{ $invitation->venue_address ?? $details['venue_address'] ?? '123 Royal Road, Ballroom' }}
                    </div>
                </div>
            </div>

            <!-- Botanical Directions Card (Double Column) -->
            @php
                $locationUrl = $invitation->location_url ?? $details['location_url'] ?? '';
                $hasValidLocationUrl = !empty($locationUrl) && filter_var($locationUrl, FILTER_VALIDATE_URL);
            @endphp
            <div class="luxury-directions-card">
                <div class="directions-grid">
                    <div class="directions-left">
                        <p class="directions-title">Venue directions</p>
                        <p class="directions-text">Open the location in Maps to find the ceremony venue with ease.</p>
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
