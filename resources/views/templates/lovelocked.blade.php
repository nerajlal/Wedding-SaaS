<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $invitation->bride_name ?? $details['bride_name'] ?? 'Bride' }} & {{ $invitation->groom_name ?? $details['groom_name'] ?? 'Groom' }}</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700;800;900&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <style>
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            background: #111;
            font-family: 'Montserrat', sans-serif;
            overflow-x: hidden;
            color: #fff;
        }
        
        .inv-lovelocked {
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
            min-height: 100vh;
            background: #111;
            box-shadow: 0 0 30px rgba(0,0,0,0.5);
            display: flex;
            flex-direction: column;
        }

        .hero-poster {
            position: relative;
            width: 100%;
            height: 100vh;
            min-height: 600px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        /* Background Layer (Faded, sepia) */
        .bg-layer {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 60%;
            background-size: cover;
            background-position: center 20%;
            filter: opacity(0.5) sepia(0.6) brightness(0.8) contrast(1.2);
            z-index: 1;
        }

        .bg-layer::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 50%;
            background: linear-gradient(to top, #111 0%, transparent 100%);
        }

        /* Foreground Layer */
        .fg-layer {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 65%;
            background-size: cover;
            background-position: top center;
            z-index: 2;
            -webkit-mask-image: linear-gradient(to bottom, transparent 0%, black 20%, black 100%);
            mask-image: linear-gradient(to bottom, transparent 0%, black 20%, black 100%);
        }

        /* Content Layer (z-index 3 to sit on top of everything) */
        .content-layer {
            position: relative;
            z-index: 3;
            flex: 1;
            display: flex;
            flex-direction: column;
            pointer-events: none; /* Let clicks pass through if needed */
        }

        .top-section {
            text-align: center;
            padding-top: 3rem;
            text-transform: uppercase;
        }

        .photography-text {
            font-size: 0.5rem;
            letter-spacing: 4px;
            color: #b59b7a;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        /* Movie Title overlapping the images */
        .movie-title-container {
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            text-align: center;
            z-index: 1; /* Sits behind foreground image if possible, but actually we use mix-blend-mode to blend it */
            mix-blend-mode: screen;
        }

        .movie-title {
            font-family: 'Cinzel', serif;
            font-size: 4.5rem;
            line-height: 0.9;
            font-weight: 400;
            color: #cbb497;
            margin: 0;
            letter-spacing: 2px;
            text-shadow: 0 4px 20px rgba(0,0,0,0.8);
        }

        .tagline {
            font-size: 0.75rem;
            letter-spacing: 2px;
            color: #d1c1ad;
            margin-top: 0.5rem;
            font-style: italic;
        }

        /* Bottom Details Section */
        .credits-section {
            padding: 3rem 2rem 2rem;
            background: #111;
            text-align: center;
            position: relative;
            z-index: 4;
            border-top: 1px solid rgba(255,255,255,0.05);
        }

        .couple-names {
            font-family: 'Cinzel', serif;
            font-size: 1.5rem;
            font-weight: 600;
            color: #e5d3bc;
            margin-bottom: 1.5rem;
            letter-spacing: 1px;
        }

        .credit-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem 1rem;
            margin-bottom: 2rem;
            border-top: 1px solid rgba(203,180,151,0.2);
            border-bottom: 1px solid rgba(203,180,151,0.2);
            padding: 1.5rem 0;
        }

        .credit-item {
            text-align: center;
        }

        .credit-label {
            font-size: 0.45rem;
            text-transform: uppercase;
            letter-spacing: 3px;
            color: #888;
            margin-bottom: 0.4rem;
        }

        .credit-val {
            font-family: 'Cinzel', serif;
            font-size: 0.9rem;
            color: #cbb497;
            letter-spacing: 1px;
        }

        .credit-val.address {
            font-family: 'Montserrat', sans-serif;
            font-size: 0.65rem;
            line-height: 1.4;
            color: #aaa;
            margin-top: 0.3rem;
            letter-spacing: 0.5px;
        }

        .rsvp-line {
            font-size: 0.65rem;
            color: #aaa;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        .rsvp-val {
            font-weight: 600;
            color: #cbb497;
        }

        .gallery-item:hover img {
            transform: scale(1.05);
            opacity: 0.8;
        }

        /* Meet the Cast Section */
        .meet-cast-section {
            padding: 4rem 2rem;
            background-color: #050505;
            text-align: center;
            border-top: 1px solid rgba(255,255,255,0.05);
        }

        .cast-title {
            font-size: 1.2rem;
            letter-spacing: 5px;
            color: #cbb497;
            margin-bottom: 3rem;
            text-transform: uppercase;
        }

        .cast-container {
            display: flex;
            justify-content: center;
            gap: 4rem;
            flex-wrap: wrap;
        }

        .cast-profile {
            text-align: center;
            width: 200px;
        }

        .cast-img-wrapper {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto 1.5rem;
            border: 2px solid rgba(203, 180, 151, 0.3);
            box-shadow: 0 10px 30px rgba(0,0,0,0.8);
            transition: transform 0.4s ease, border-color 0.4s ease;
        }

        .cast-profile:hover .cast-img-wrapper {
            transform: scale(1.05);
            border-color: rgba(203, 180, 151, 0.8);
        }

        .cast-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: grayscale(20%) contrast(1.1);
        }

        .cast-name {
            font-family: 'Cinzel', serif;
            font-size: 1.4rem;
            color: #fff;
            letter-spacing: 2px;
            margin-bottom: 0.5rem;
        }

        .cast-role {
            font-size: 0.8rem;
            color: #888;
            letter-spacing: 3px;
            text-transform: uppercase;
        }

        /* Responsive */
        .gallery-item {
            aspect-ratio: 1/1;
            overflow: hidden;
            border-radius: 8px;
            width: 100%;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }

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
    <?php
        $rawDate = $invitation->wedding_date ?? $details['wedding_date'] ?? '2026-10-25';
        $dateObj = \Carbon\Carbon::parse($rawDate);
        
        $mainImgUrl = $invitation->main_image_url ?? $details['main_image_url'] ?? null;
        $brideImgUrl = $invitation->bride_image_url ?? $details['bride_image_url'] ?? null;

        $bgImg = !empty($mainImgUrl) ? $mainImgUrl : (!empty($photo) ? $photo : 'https://images.unsplash.com/photo-1606800052052-a08af7148866?auto=format&fit=crop&w=600&q=80');
        $fgImg = 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?auto=format&fit=crop&w=600&q=80';
    ?>
    <div class="inv-lovelocked">
        
        <div class="hero-poster">
            <!-- Background Layer -->
            <div class="bg-layer pv-main-img-src" style="background-image: url('{{ $bgImg }}');"></div>

            
            <!-- Foreground Layer (Static Cinematic Overlay) -->
            <div class="fg-layer" style="background-image: url('{{ $fgImg }}');"></div>
            
            <!-- Title & Names -->
            <div class="movie-title-container">
                <h1 class="movie-title">LOVE<br>LOCKED</h1>
                <p class="tagline" data-preview="personal_message">No key, {{ $invitation->personal_message ?? $details['personal_message'] ?? '...locked in love!' }}</p>
            </div>

            <div class="content-layer">
                <div class="top-section">
                    <div class="photography-text">A CINEMATIC WEDDING</div>
                </div>
            </div>
        </div>

        <div class="credits-section">
                <div class="couple-names">
                    <span data-preview="bride_name">{{ $invitation->bride_name ?? $details['bride_name'] ?? 'Abishek' }}</span>
                    <span style="font-size: 0.8em; color: #888; margin: 0 0.5rem;">&amp;</span>
                    <span data-preview="groom_name">{{ $invitation->groom_name ?? $details['groom_name'] ?? 'Varsha' }}</span>
                </div>

                <div class="credit-grid">
                    <div class="credit-item">
                        <div class="credit-label">When</div>
                        <div class="credit-val">{{ $dateObj->format('F jS, Y') }}</div>
                        <div class="credit-val address" style="font-weight: 600; color: #cbb497;" data-preview="time">{{ $invitation->time ?? $details['time'] ?? '7:00 PM' }}</div>
                    </div>
                    
                    <div class="credit-item">
                        <div class="credit-label">Where</div>
                        <div class="credit-val" data-preview="venue_name">{{ $invitation->venue_name ?? $details['venue_name'] ?? 'The Grand Palace' }}</div>
                        <div class="credit-val address" data-preview="venue_address">{{ $invitation->venue_address ?? $details['venue_address'] ?? '123 Royal Road, City' }}</div>
                    </div>
                </div>

                @php
                    $locationUrl = $invitation->location_url ?? $details['location_url'] ?? '';
                    $hasValidLocationUrl = !empty($locationUrl) && filter_var($locationUrl, FILTER_VALIDATE_URL);
                @endphp
                <div style="margin-top: 1rem; width: 100%; max-width: 440px; margin-left: auto; margin-right: auto; margin-bottom: 1.5rem;">
                    <div style="display:flex; flex-wrap:wrap; align-items:center; justify-content:space-between; gap:0.8rem; padding: 1rem 1.2rem; border-radius: 12px; border: 1px solid rgba(203, 180, 151, 0.2); background: rgba(203, 180, 151, 0.05); text-align: left;">
                        <div style="flex:1 1 180px; min-width: 180px;">
                            <p style="font-family:'Cinzel',serif; font-weight:600; font-size:0.75rem; letter-spacing:2px; text-transform:uppercase; color:#cbb497; margin:0 0 0.3rem;">Venue directions</p>
                            <p style="font-family:'Montserrat',sans-serif; font-size:0.65rem; color:#aaa; line-height:1.4; margin:0;">Open the location in Maps to find the venue with ease.</p>
                        </div>
                        <a class="pv-location-url" href="{{ $hasValidLocationUrl ? $locationUrl : 'javascript:void(0)' }}" target="_blank" rel="noopener noreferrer" style="display: {{ $hasValidLocationUrl ? 'inline-flex' : 'none' }}; align-items:center; justify-content:center; gap:0.45rem; padding:0.65rem 1rem; border-radius:8px; background: #cbb497; color: #111; text-decoration:none; font-family:'Inter', sans-serif; font-size:0.75rem; font-weight:600; letter-spacing:1px; text-transform:uppercase; box-shadow: 0 4px 12px rgba(0,0,0,0.15);">
                            View on map
                        </a>
                    </div>
                </div>

                <div class="rsvp-line">
                    RSVP to <span class="rsvp-val" data-preview="rsvp_contact">{{ $invitation->rsvp_contact ?? $details['rsvp_contact'] ?? 'Your Contact' }}</span>
                </div>
                </div>
        </div>

        <!-- Meet the Cast Section -->
        <div class="meet-cast-section">
            <h2 class="cast-title">Starring</h2>
            <div class="cast-container">
                <div class="cast-profile">
                    <div class="cast-img-wrapper">
                        <img class="pv-bride-img-src" src="{{ !empty($invitation->bride_image_url) ? $invitation->bride_image_url : (!empty($details['bride_image_url']) ? $details['bride_image_url'] : 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=400&q=80') }}">
                    </div>
                    <div class="cast-name" data-preview="bride_name">{{ $invitation->bride_name ?? $details['bride_name'] ?? 'Abishek' }}</div>
                    <div class="cast-role">The Bride</div>
                </div>
                <div class="cast-profile">
                    <div class="cast-img-wrapper">
                        <img class="pv-groom-img-src" src="{{ !empty($invitation->groom_image_url) ? $invitation->groom_image_url : (!empty($details['groom_image_url']) ? $details['groom_image_url'] : 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?auto=format&fit=crop&w=400&q=80') }}">
                    </div>
                    <div class="cast-name" data-preview="groom_name">{{ $invitation->groom_name ?? $details['groom_name'] ?? 'Varsha' }}</div>
                    <div class="cast-role">The Groom</div>
                </div>
            </div>
        </div>

        <!-- Gallery Section -->
                @php
                    $hasGalleries = isset($invitation) && $invitation->galleries && $invitation->galleries->count() > 0;
                    $showGallery = $hasGalleries || !isset($invitation);
                @endphp
                <div class="gallery-section" style="{{ $showGallery ? 'margin-top: 3rem;' : 'display:none;' }}">
                    <div class="photography-text" style="margin-bottom: 1rem;">SCENES FROM OUR LOVE</div>
                    <div class="gallery-grid" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px;">
                        @if($hasGalleries)
                            @foreach($invitation->galleries as $gallery)
                                <div class="gallery-item">
                                    <img src="{{ $gallery->image_url }}" style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                            @endforeach
                        @else
                            <div class="gallery-item">
                                <img src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=400&q=80" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <div class="gallery-item">
                                <img src="https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=400&q=80" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                        @endif
                    </div>
                </div>
                
                <div style="margin-top: 2.5rem; text-align: center; font-family: 'Montserrat', sans-serif; font-size: 0.6rem; color: #555; padding-bottom: 0;">
                    <p style="margin: 0; letter-spacing: 1px;">CREATED WITH VELVET VOWS</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
