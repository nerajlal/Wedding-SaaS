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
            position: relative;
            background: #111;
            box-shadow: 0 0 30px rgba(0,0,0,0.5);
            display: flex;
            flex-direction: column;
            overflow: hidden;
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
            justify-content: space-between;
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
            margin-top: auto;
            padding: 4rem 2rem 2rem;
            background: linear-gradient(to top, #111 0%, #111 40%, transparent 100%);
            text-align: center;
            position: relative;
            z-index: 4;
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
        $rawDate = $invitation->wedding_date ?? $details['wedding_date'] ?? '2026-10-25';
        $dateObj = \Carbon\Carbon::parse($rawDate);
        
        $mainImgUrl = $invitation->main_image_url ?? $details['main_image_url'] ?? null;
        $brideImgUrl = $invitation->bride_image_url ?? $details['bride_image_url'] ?? null;

        $bgImg = !empty($mainImgUrl) ? $mainImgUrl : (!empty($photo) ? $photo : 'https://images.unsplash.com/photo-1606800052052-a08af7148866?auto=format&fit=crop&w=600&q=80');
        $fgImg = !empty($brideImgUrl) ? $brideImgUrl : 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?auto=format&fit=crop&w=600&q=80';
    ?>
    <div class="inv-lovelocked">
        
        <!-- Background Layer -->
        <div class="bg-layer pv-main-img-src" style="background-image: url('{{ $bgImg }}');"></div>
        
        <!-- Foreground Layer -->
        <div class="fg-layer pv-bride-img-src" style="background-image: url('{{ $fgImg }}');"></div>
        
        <!-- Title & Names -->
        <div class="movie-title-container">
            <h1 class="movie-title">LOVE<br>LOCKED</h1>
            <p class="tagline" data-preview="personal_message">No key, {{ $invitation->personal_message ?? $details['personal_message'] ?? '...locked in love!' }}</p>
        </div>

        <div class="content-layer">
            <div class="top-section">
                <div class="photography-text">A CINEMATIC WEDDING</div>
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

                <div class="rsvp-line">
                    RSVP to <span class="rsvp-val" data-preview="rsvp_contact">{{ $invitation->rsvp_contact ?? $details['rsvp_contact'] ?? 'Your Contact' }}</span>
                </div>
                
                <div style="margin-top: 2.5rem; text-align: center; font-family: 'Montserrat', sans-serif; font-size: 0.6rem; color: #555; padding-bottom: 0;">
                    <p style="margin: 0; letter-spacing: 1px;">CREATED WITH VELVET VOWS</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
