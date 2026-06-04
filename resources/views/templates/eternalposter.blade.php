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
            height: 100%;
            background: #fff;
            font-family: 'Montserrat', sans-serif;
            overflow: hidden;
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

        /* Full Background Layer (Grayscale, No Fade) */
        .bg-layer {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            filter: grayscale(100%) opacity(0.85);
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

        $bgImg = !empty($mainImgUrl) ? $mainImgUrl : (!empty($photo) ? $photo : 'https://images.unsplash.com/photo-1606800052052-a08af7148866?auto=format&fit=crop&w=800&q=80');
        $fgImg = !empty($brideImgUrl) ? $brideImgUrl : 'https://raw.githubusercontent.com/bradtraversy/50projects50days/master/kinetic_loader/ink.png'; 
    ?>
    <div class="inv-eternal-poster">
        
        <!-- Full Background Layer -->
        <div class="bg-layer pv-main-img-src" style="background-image: url('{{ $bgImg }}');"></div>
        
        <!-- Title & Content layered BEHIND foreground -->
        <div class="content-layer">
            <p class="personal-message" data-preview="personal_message">{{ $invitation->personal_message ?? $details['personal_message'] ?? 'THANK YOU FOR SAYING YES AND MAKING ME THE HAPPIEST PERSON IN THE WORLD. YOU\'RE THE LOVE OF MY LIFE, AND I CAN\'T WAIT TO SPEND THE REST OF MY LIFE WITH YOU.' }}</p>
            <h1 class="movie-title">Eternal love</h1>
        </div>

        <!-- Foreground Layer (User must upload a cutout PNG for best effect) -->
        <div class="fg-layer pv-bride-img-src" style="background-image: url('{{ $fgImg }}');"></div>

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

            <div class="rsvp-line">
                RSVP to <span class="rsvp-val" data-preview="rsvp_contact">{{ $invitation->rsvp_contact ?? $details['rsvp_contact'] ?? 'Your Contact' }}</span>
            </div>
        </div>

    </div>
</body>
</html>
