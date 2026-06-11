<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eternal Love Poster</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;1,400&family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
    
    <style>
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            min-height: 100vh;
            background: #111;
            font-family: 'Montserrat', sans-serif;
            overflow-x: hidden;
        }
        
        .inv-eternal-poster {
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
            height: 100vh;
            position: relative;
            background: #111;
            box-shadow: 0 0 30px rgba(0,0,0,0.5);
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        /* Full Background Layer (Colorful, Slightly Darkened for Text) */
        .bg-layer {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            filter: brightness(0.6) contrast(1.1);
            z-index: 1;
        }

        /* Content Layer (z-index 2) */
        .content-layer {
            position: absolute;
            top: 35%;
            left: 0;
            width: 100%;
            transform: translateY(-50%);
            z-index: 2;
            text-align: center;
        }

        .personal-message {
            font-size: 0.45rem;
            line-height: 1.6;
            letter-spacing: 1px;
            color: rgba(255, 255, 255, 0.9);
            text-transform: uppercase;
            padding: 0 10%;
            margin-bottom: 0.5rem;
            text-shadow: 0 1px 3px rgba(0,0,0,0.8);
        }

        /* Huge Title */
        .movie-title {
            font-family: 'Playfair Display', serif;
            font-size: 3.4rem;
            line-height: 1;
            font-weight: 400;
            color: #f5f5f5;
            margin: 0;
            letter-spacing: -1px;
            text-shadow: 1px 1px 2px rgba(255,255,255,0.3), 
                         -1px -1px 2px rgba(0,0,0,0.5),
                         0 5px 15px rgba(0,0,0,0.6);
            white-space: nowrap;
        }

        /* Foreground Layer (z-index 3) - No Fade, No Mask */
        .fg-layer {
            position: absolute;
            bottom: -5%;
            right: -15%;
            width: 90%;
            height: 60%;
            background-size: contain;
            background-position: bottom right;
            background-repeat: no-repeat;
            z-index: 3;
            filter: drop-shadow(-5px 5px 15px rgba(0,0,0,0.3));
        }
        /* Bottom Details Section */
        .details-section {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 3rem 1.5rem 1.5rem;
            background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.7) 40%, transparent 100%);
            text-align: center;
            z-index: 5;
            box-sizing: border-box;
        }

        .couple-names {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 600;
            color: #fff;
            margin-bottom: 1.5rem;
            letter-spacing: 1px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.5);
        }

        .credit-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-bottom: 1.5rem;
            border-top: 1px solid rgba(255,255,255,0.2);
            border-bottom: 1px solid rgba(255,255,255,0.2);
            padding: 1rem 0;
        }

        .credit-item {
            text-align: center;
        }

        .credit-label {
            font-size: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #bbb;
            margin-bottom: 0.3rem;
        }

        .credit-val {
            font-family: 'Playfair Display', serif;
            font-size: 0.85rem;
            color: #eee;
            letter-spacing: 1px;
        }

        .credit-val.address {
            font-family: 'Montserrat', sans-serif;
            font-size: 0.6rem;
            line-height: 1.4;
            color: #ccc;
            margin-top: 0.2rem;
            letter-spacing: 0.5px;
        }

        .rsvp-line {
            font-size: 0.65rem;
            color: #ccc;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        .rsvp-val {
            font-weight: 600;
            color: #fff;
        }

        /* Meet the Cast Section */
        .meet-cast-section {
            padding: 4rem 2rem;
            background-color: #0d0d0d;
            text-align: center;
            border-top: 1px solid rgba(255,255,255,0.05);
            max-width: 500px;
            margin: 0 auto;
            box-sizing: border-box;
        }

        .cast-title {
            font-size: 1.2rem;
            letter-spacing: 5px;
            color: #ddd;
            margin-bottom: 3rem;
            text-transform: uppercase;
        }

        .cast-container {
            display: flex;
            justify-content: center;
            gap: 2rem;
            flex-wrap: wrap;
        }

        .cast-profile {
            text-align: center;
            width: 120px;
        }

        .cast-img-wrapper {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto 1.5rem;
            border: 2px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 10px 30px rgba(0,0,0,0.8);
            transition: transform 0.4s ease, border-color 0.4s ease;
        }

        .cast-profile:hover .cast-img-wrapper {
            transform: scale(1.05);
            border-color: rgba(255, 255, 255, 0.8);
        }

        .cast-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: grayscale(20%) contrast(1.1);
        }

        .cast-name {
            font-family: 'Playfair Display', serif;
            font-size: 1.2rem;
            color: #fff;
            letter-spacing: 1px;
            margin-bottom: 0.5rem;
        }

        .cast-role {
            font-size: 0.7rem;
            color: #888;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        /* Gallery */
        .gallery-wrapper {
            background: #111;
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
        }
        .gallery-item {
            aspect-ratio: 1/1;
            overflow: hidden;
            border-radius: 8px;
            width: 100%;
            box-shadow: 0 4px 10px rgba(0,0,0,0.5);
        }

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
    <?php
        $rawDate = $invitation->wedding_date ?? $details['wedding_date'] ?? '2026-11-15';
        $dateObj = \Carbon\Carbon::parse($rawDate);
        
        $mainImgUrl = $invitation->main_image_url ?? $details['main_image_url'] ?? null;
        $brideImgUrl = $invitation->bride_image_url ?? $details['bride_image_url'] ?? null;

        $bgImg = !empty($mainImgUrl) ? $mainImgUrl : (!empty($photo) ? $photo : 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=800&q=80');
        $fgImg = 'https://raw.githubusercontent.com/bradtraversy/50projects50days/master/kinetic_loader/ink.png'; 
    ?>
    <div class="inv-eternal-poster">
        
        <!-- Full Background Layer -->
        <div class="bg-layer pv-main-img-src" style="background-image: url('{{ $bgImg }}');"></div>

        
        <!-- Title & Content layered BEHIND foreground -->
        <div class="content-layer">
            <p class="personal-message" data-preview="personal_message">{{ $invitation->personal_message ?? $details['personal_message'] ?? 'THANK YOU FOR SAYING YES AND MAKING ME THE HAPPIEST PERSON IN THE WORLD. YOU\'RE THE LOVE OF MY LIFE, AND I CAN\'T WAIT TO SPEND THE REST OF MY LIFE WITH YOU.' }}</p>
            <h1 class="movie-title">Eternal love</h1>
        </div>

        <!-- Foreground Layer (Static ink cutout) -->
        <div class="fg-layer" style="background-image: url('{{ $fgImg }}');"></div>

        <!-- Details Section Overlay -->
        <div class="details-section">
            <div class="couple-names">
                <span data-preview="bride_name">{{ $invitation->bride_name ?? $details['bride_name'] ?? 'Abishek' }}</span>
                <span style="font-size: 0.7em; color: #888; margin: 0 0.5rem; font-family: 'Montserrat', sans-serif;">&amp;</span>
                <span data-preview="groom_name">{{ $invitation->groom_name ?? $details['groom_name'] ?? 'Varsha' }}</span>
            </div>

            <div class="credit-grid">
                <div class="credit-item">
                    <div class="credit-label">When</div>
                    <div class="credit-val">{{ $dateObj->format('F jS, Y') }}</div>
                    <div class="credit-val address" style="font-weight: 600; color: #fff;" data-preview="time">{{ $invitation->time ?? $details['time'] ?? '7:00 PM' }}</div>
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
                <div style="display:flex; flex-wrap:wrap; align-items:center; justify-content:space-between; gap:0.8rem; padding: 1rem 1.2rem; border-radius: 18px; border: 1px solid rgba(255, 255, 255, 0.2); background: rgba(255, 255, 255, 0.06); text-align: left;">
                    <div style="flex:1 1 180px; min-width: 180px;">
                        <p style="font-family:'Montserrat',sans-serif; font-weight:600; font-size:0.75rem; letter-spacing:2px; text-transform:uppercase; color:#fff; margin:0 0 0.3rem;">Venue directions</p>
                        <p style="font-family:'Montserrat',sans-serif; font-size:0.65rem; color:#ccc; line-height:1.4; margin:0; letter-spacing:0.5px;">Open the location in Maps to find the venue with ease.</p>
                    </div>
                    <a class="pv-location-url" href="{{ $hasValidLocationUrl ? $locationUrl : 'javascript:void(0)' }}" target="_blank" rel="noopener noreferrer" style="display: {{ $hasValidLocationUrl ? 'inline-flex' : 'none' }}; align-items:center; justify-content:center; gap:0.45rem; padding:0.65rem 1rem; border-radius:8px; background: #fff; color: #111; text-decoration:none; font-family:'Inter', sans-serif; font-size:0.75rem; font-weight:600; letter-spacing:1px; text-transform:uppercase; box-shadow: 0 4px 12px rgba(0,0,0,0.15);">
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
                <div class="cast-img-wrapper" style="border: 2px dashed rgba(255, 255, 255, 0.2); background: rgba(255, 255, 255, 0.05);">
                    <img class="pv-groom-img-src" src="{{ !empty($invitation->groom_image_url) ? $invitation->groom_image_url : '' }}" style="display: {{ !empty($invitation->groom_image_url) || !empty($details['groom_image_url']) ? 'block' : 'none' }};">
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
    <div class="gallery-wrapper gallery-section" style="{{ $showGallery ? '' : 'display:none;' }} padding: 2rem; position: relative; z-index: 10;">
        <div class="credit-label" style="text-align: center; font-size: 0.6rem; color: #fff; margin-bottom: 1.5rem;">SCENES FROM OUR LOVE</div>
        <div class="gallery-grid" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px;">
            @if($hasGalleries)
                @foreach($invitation->galleries as $gallery)
                    <div class="gallery-item">
                        <img src="{{ $gallery->image_url }}" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                @endforeach
            @else
                <div class="gallery-item"><img src="https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=400&q=80" style="width: 100%; height: 100%; object-fit: cover;"></div>
                <div class="gallery-item"><img src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=400&q=80" style="width: 100%; height: 100%; object-fit: cover;"></div>
                <div class="gallery-item"><img src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?auto=format&fit=crop&w=400&q=80" style="width: 100%; height: 100%; object-fit: cover;"></div>
                <div class="gallery-item"><img src="https://images.unsplash.com/photo-1530103043960-ef38714abb15?auto=format&fit=crop&w=400&q=80" style="width: 100%; height: 100%; object-fit: cover;"></div>
            @endif
        </div>
    </div>

</body>
</html>
