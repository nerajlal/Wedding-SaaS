<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $invitation->bride_name ?? $details['bride_name'] ?? 'Bride' }} & {{ $invitation->groom_name ?? $details['groom_name'] ?? 'Groom' }}</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800&family=Great+Vibes&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <style>
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            background: #fbfbfb;
            font-family: 'Montserrat', sans-serif;
            overflow-x: hidden;
            color: #333;
        }
        
        .inv-cloud-collage {
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
            min-height: 100vh;
            position: relative;
            background: #fbfbfb;
            box-shadow: 0 0 30px rgba(0,0,0,0.05);
            display: flex;
            flex-direction: column;
            overflow: hidden;
            padding-bottom: 2rem;
        }

        /* Top Names */
        .top-names-container {
            width: 100%;
            text-align: center;
            padding: 2.5rem 1rem 1rem;
            background: #fbfbfb;
            z-index: 10;
            position: relative;
        }

        .top-names {
            font-family: 'Playfair Display', serif;
            font-size: 1.1rem;
            font-weight: 800;
            color: #c95c6f; /* Deep pink/red */
            letter-spacing: 12px;
            text-transform: uppercase;
            text-shadow: 0 2px 5px rgba(255,255,255,0.8);
            margin-left: 12px; /* compensate for letter spacing */
        }
        .top-names span {
            color: #c95c6f;
            margin: 0 5px;
            letter-spacing: 0;
            font-size: 1.2rem;
        }

        /* Images Setup */
        .collage-container {
            position: relative;
            width: 100%;
            height: 65vh; /* 65% of viewport height */
            min-height: 600px;
        }

        /* Background large image (Greyscale) */
        .collage-bg {
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 75%;
            background-size: cover;
            background-position: center top;
            filter: grayscale(100%) contrast(1.1) brightness(1.1);
            -webkit-mask-image: radial-gradient(ellipse 100% 90% at 70% 30%, black 30%, transparent 80%);
            mask-image: radial-gradient(ellipse 100% 90% at 70% 30%, black 30%, transparent 80%);
            z-index: 1;
        }

        /* Cloud overlays to blend edges */
        .cloud-overlay {
            position: absolute;
            background-size: contain;
            background-repeat: no-repeat;
            pointer-events: none;
            opacity: 0.9;
        }
        .cloud-1 {
            background-image: url('https://cdn.pixabay.com/photo/2016/09/01/08/25/clouds-1635489_1280.png');
            width: 150%; height: 250px;
            top: 40%; left: -25%;
            z-index: 2; opacity: 0.8; filter: drop-shadow(0 10px 10px rgba(255,255,255,0.8));
        }
        .cloud-2 {
            background-image: url('https://cdn.pixabay.com/photo/2016/09/01/08/25/clouds-1635489_1280.png');
            width: 150%; height: 300px;
            bottom: -50px; right: -20%;
            z-index: 5; opacity: 0.9; transform: scaleX(-1);
        }

        /* Foreground Image 1 (Mid Left, Color) */
        .collage-fg-left {
            position: absolute;
            top: 35%;
            left: -10%;
            width: 75%;
            height: 55%;
            background-size: contain;
            background-repeat: no-repeat;
            background-position: bottom left;
            z-index: 3;
            -webkit-mask-image: radial-gradient(ellipse 90% 100% at 50% 50%, black 50%, transparent 80%);
            mask-image: radial-gradient(ellipse 90% 100% at 50% 50%, black 50%, transparent 80%);
        }

        /* Foreground Image 2 (Bottom Right, Color) */
        .collage-fg-bottom {
            position: absolute;
            bottom: 5%;
            right: 0%;
            width: 80%;
            height: 40%;
            background-size: cover;
            background-position: center;
            z-index: 4;
            -webkit-mask-image: radial-gradient(circle at 60% 50%, black 40%, transparent 75%);
            mask-image: radial-gradient(circle at 60% 50%, black 40%, transparent 75%);
        }

        /* Cursive Personal Message */
        .cursive-msg {
            position: absolute;
            top: 55%;
            right: 5%;
            width: 60%;
            font-family: 'Great Vibes', cursive;
            font-size: 2.2rem;
            color: #fff;
            text-align: center;
            line-height: 1.2;
            z-index: 6;
            text-shadow: 0 2px 10px rgba(0,0,0,0.2), 0 0 20px rgba(255,255,255,0.6);
            transform: rotate(-3deg);
        }

        /* Bottom Details */
        .details-section {
            position: relative;
            z-index: 10;
            padding: 1rem 2rem;
            text-align: center;
            background: linear-gradient(to bottom, transparent, #fbfbfb 15%);
            margin-top: -50px;
        }

        .detail-item {
            margin-bottom: 1.5rem;
        }

        .detail-label {
            font-size: 0.6rem;
            text-transform: uppercase;
            letter-spacing: 3px;
            color: #c95c6f;
            font-weight: 600;
            margin-bottom: 0.3rem;
        }

        .detail-val {
            font-family: 'Playfair Display', serif;
            font-size: 1.25rem;
            color: #333;
            font-weight: 700;
        }

        .detail-desc {
            font-size: 0.75rem;
            color: #777;
            margin-top: 0.3rem;
            line-height: 1.4;
        }

        .rsvp-box {
            display: inline-block;
            margin-top: 1rem;
            padding: 0.8rem 2rem;
            border: 1px solid rgba(201,92,111,0.3);
            border-radius: 50px;
            font-size: 0.75rem;
            color: #555;
            letter-spacing: 1px;
            background: #fff;
        }
        .rsvp-box span {
            color: #c95c6f;
            font-weight: 600;
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
        $rawDate = $invitation->wedding_date ?? $details['wedding_date'] ?? '2026-12-10';
        $dateObj = \Carbon\Carbon::parse($rawDate);

        $mainImgUrl = $invitation->main_image_url ?? $details['main_image_url'] ?? null;
        $brideImgUrl = $invitation->bride_image_url ?? $details['bride_image_url'] ?? null;
        $groomImgUrl = $invitation->groom_image_url ?? $details['groom_image_url'] ?? null;

        $bgImg = !empty($mainImgUrl) ? $mainImgUrl : (!empty($photo) ? $photo : 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?auto=format&fit=crop&w=800&q=80');
        $fgLeftImg = !empty($brideImgUrl) ? $brideImgUrl : 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=600&q=80';
        $fgBottomImg = !empty($groomImgUrl) ? $groomImgUrl : 'https://images.unsplash.com/photo-1519225421980-715cb0215aed?auto=format&fit=crop&w=600&q=80';
    ?>
    <div class="inv-cloud-collage">
        
        <div class="top-names-container">
            <div class="top-names">
                <span style="font-size: inherit; letter-spacing: inherit;" data-preview="bride_name">{{ $invitation->bride_name ?? $details['bride_name'] ?? 'Deepal' }}</span> 
                <span>&amp;</span> 
                <span style="font-size: inherit; letter-spacing: inherit;" data-preview="groom_name">{{ $invitation->groom_name ?? $details['groom_name'] ?? 'Jyoti' }}</span>
            </div>
        </div>

        <div class="collage-container">
            <!-- Background Greyscale Image -->
            <div class="collage-bg pv-main-img-src" style="background-image: url('{{ $bgImg }}');"></div>
            
            <!-- Clouds behind left image -->
            <div class="cloud-overlay cloud-1"></div>

            <!-- Foreground Left Color Image -->
            <div class="collage-fg-left pv-bride-img-src" style="background-image: url('{{ $fgLeftImg }}');"></div>
            
            <!-- Foreground Bottom Color Image -->
            <div class="collage-fg-bottom pv-groom-img-src" style="background-image: url('{{ $fgBottomImg }}');"></div>
            
            <!-- Cursive Personal Message Overlay -->
            <div class="cursive-msg" data-preview="personal_message">
                {{ $invitation->personal_message ?? $details['personal_message'] ?? 'Together, for a lifetime and beyond.' }}
            </div>

            <!-- Clouds overlaying the bottom edges -->
            <div class="cloud-overlay cloud-2"></div>
        </div>

        <div class="details-section">
            <div class="detail-item" style="margin-bottom: 2rem;">
                <div class="detail-val" style="font-size: 1.8rem; color: #c95c6f;">
                    <span data-preview="bride_name">{{ $invitation->bride_name ?? $details['bride_name'] ?? 'Deepal' }}</span> 
                    <span style="font-size: 0.7em; color: #999; margin: 0 0.5rem;">&amp;</span> 
                    <span data-preview="groom_name">{{ $invitation->groom_name ?? $details['groom_name'] ?? 'Jyoti' }}</span>
                </div>
            </div>

            <div class="detail-item">
                <div class="detail-label">The Date</div>
                <div class="detail-val">{{ $dateObj->format('l, F jS, Y') }}</div>
                <div class="detail-desc" data-preview="time">at {{ $invitation->time ?? $details['time'] ?? '6:00 PM' }}</div>
            </div>

            <div class="detail-item">
                <div class="detail-label">The Venue</div>
                <div class="detail-val" data-preview="venue_name">{{ $invitation->venue_name ?? $details['venue_name'] ?? 'The Grand Palace' }}</div>
                <div class="detail-desc" data-preview="venue_address">{{ $invitation->venue_address ?? $details['venue_address'] ?? '123 Royal Road, City' }}</div>
            </div>

            <div class="rsvp-box">
                RSVP to <span data-preview="rsvp_contact">{{ $invitation->rsvp_contact ?? $details['rsvp_contact'] ?? 'Your Contact' }}</span>
            </div>

            <!-- VELVET VOWS FOOTER -->
            <div style="margin-top: 3rem; text-align: center; font-family: 'Montserrat', sans-serif; font-size: 0.6rem; color: #999;">
                <p style="margin: 0; letter-spacing: 1px;">DESIGNED ON VELVET VOWS</p>
            </div>
        </div>
    </div>
</body>
</html>
