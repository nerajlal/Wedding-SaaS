<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $invitation->bride_name ?? $details['bride_name'] ?? 'Bride' }} & {{ $invitation->groom_name ?? $details['groom_name'] ?? 'Groom' }}</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700;800;900&family=Montserrat:wght@400;500;600&family=Orbitron:wght@700;900&display=swap" rel="stylesheet">
    
    <style>
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            background: #FFFFFF;
            font-family: 'Montserrat', sans-serif;
            overflow-x: hidden;
            color: #333;
        }
        
        .inv-floral-love {
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
            min-height: 100vh;
            position: relative;
            background: #ffffff;
            box-shadow: 0 0 20px rgba(0,0,0,0.05);
            padding-bottom: 4rem;
            text-align: center;
        }

        /* Brush stroke image */
        .hero-section {
            position: relative;
            padding-top: 2rem;
            display: flex;
            justify-content: center;
        }

        .brush-img-container {
            width: 90%;
            aspect-ratio: 1/1.1;
            position: relative;
        }

        .brush-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            -webkit-mask-image: url('https://raw.githubusercontent.com/bradtraversy/50projects50days/master/kinetic_loader/ink.png');
            -webkit-mask-size: 110%;
            -webkit-mask-repeat: no-repeat;
            -webkit-mask-position: center;
            mask-image: url('https://raw.githubusercontent.com/bradtraversy/50projects50days/master/kinetic_loader/ink.png'); /* Fallback brush */
            mask-size: 110%;
            mask-repeat: no-repeat;
            mask-position: center;
            /* A better mask shape for portrait brush: */
            mask-image: radial-gradient(ellipse 90% 80% at 50% 50%, black 40%, transparent 100%);
            -webkit-mask-image: radial-gradient(ellipse 90% 80% at 50% 50%, black 40%, transparent 100%);
            /* Using a CSS polygon to simulate torn edges */
            clip-path: polygon(10% 0, 90% 2%, 100% 15%, 95% 40%, 100% 80%, 85% 100%, 15% 95%, 0 80%, 5% 45%, 0 15%);
        }

        .butterfly {
            position: absolute;
            top: -45px;
            left: 15%;
            width: 110px;
            opacity: 0.85;
            transform: rotate(-15deg);
            z-index: 1;
            mix-blend-mode: multiply;
        }

        .names-section {
            margin-top: 1.5rem;
            position: relative;
            z-index: 2;
        }

        .couple-name {
            font-family: 'Cinzel', serif;
            font-size: 2.2rem;
            font-weight: 800;
            color: #006b99;
            margin: 0;
            line-height: 1.1;
            text-transform: uppercase;
            position: relative;
            z-index: 2;
        }

        .ampersand {
            font-family: 'Cinzel', serif;
            font-size: 1.8rem;
            font-weight: 800;
            color: #006b99;
            margin: 0.2rem 0;
        }

        .subtitle {
            font-size: 0.75rem;
            color: #aed6f1;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-top: 1.5rem;
            padding: 0 1rem;
        }

        /* Date Blocks */
        .date-blocks {
            display: flex;
            justify-content: center;
            gap: 1.2rem;
            margin-top: 1.5rem;
            position: relative;
            z-index: 5;
        }

        .date-block {
            width: 75px;
            height: 75px;
            background: #0077b6;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            color: white;
            box-shadow: 0 8px 15px rgba(0,119,182,0.25);
        }

        /* Dashed stitch line */
        .date-block::after {
            content: '';
            position: absolute;
            top: 68%;
            left: 5%;
            width: 90%;
            height: 1px;
            border-top: 1px dashed rgba(255,255,255,0.4);
        }

        .date-num {
            font-family: 'Orbitron', sans-serif;
            font-size: 1.8rem;
            font-weight: 900;
            line-height: 1;
            margin-bottom: 0.3rem;
            letter-spacing: 1px;
        }

        .date-lbl {
            font-size: 0.5rem;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            position: relative;
            z-index: 2;
            padding-top: 0.3rem;
        }

        .event-details {
            padding: 2rem;
            margin-top: 2rem;
            background: #fdfefe;
            border-top: 1px solid rgba(0,0,0,0.05);
            text-align: center;
        }

        .event-details p {
            margin: 0.5rem 0;
            font-size: 0.95rem;
            color: #555;
            line-height: 1.5;
        }

        .detail-label {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #999;
            font-weight: 800;
            margin-bottom: 0.2rem;
            margin-top: 1.5rem;
        }
        .detail-val {
            font-family: 'Cinzel', serif;
            font-size: 1.4rem;
            font-weight: 700;
            color: #006b99;
        }
        .rsvp-box {
            margin-top: 2rem;
            padding: 2rem;
            background: #f4f9f9;
            border-radius: 12px;
            text-align: center;
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
        $rawDate = $invitation->wedding_date ?? $details['wedding_date'] ?? '2026-05-15';
        $dateObj = \Carbon\Carbon::parse($rawDate);
        $day = $dateObj->format('d');
        $month = $dateObj->format('m');
        $year = $dateObj->format('y');

        $mainImgUrl = $invitation->main_image_url ?? $details['main_image_url'] ?? null;
        $img1 = !empty($mainImgUrl) ? $mainImgUrl : (!empty($photo) ? $photo : 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=600&q=80');
    ?>
    <div class="inv-floral-love">

        <div class="hero-section">
            <div class="brush-img-container">
                <img src="{{ $img1 }}" alt="" class="brush-img pv-main-img-src">
            </div>
        </div>

        <div class="names-section">
            <img src="/template_thumbnails/blue_butterfly.png" alt="" class="butterfly" style="filter: drop-shadow(0 0 10px rgba(0,119,182,0.1));">
            <p class="couple-name" data-preview="bride_name">{{ $invitation->bride_name ?? $details['bride_name'] ?? 'ABISHEK' }}</p>
            <p class="ampersand">&amp;</p>
            <p class="couple-name" data-preview="groom_name">{{ $invitation->groom_name ?? $details['groom_name'] ?? 'VARSHA' }}</p>
        </div>

        <p class="subtitle">We're so happy to celebrate this day with you.</p>

        <div class="date-blocks">
            <div class="date-block">
                <div class="date-num">{{ $day }}</div>
                <div class="date-lbl">Day</div>
            </div>
            
            <div class="date-block">
                <div class="date-num">{{ $month }}</div>
                <div class="date-lbl">Month</div>
            </div>

            <div class="date-block">
                <div class="date-num">{{ $year }}</div>
                <div class="date-lbl">Year</div>
            </div>
        </div>

        <div class="event-details">
            <div class="detail-label">The Venue</div>
            <div class="detail-val" data-preview="venue_name">{{ $invitation->venue_name ?? $details['venue_name'] ?? 'The Grand Palace' }}</div>
            <p data-preview="venue_address">{{ $invitation->venue_address ?? $details['venue_address'] ?? '123 Royal Road, City' }}</p>
            
            <div class="detail-label">When</div>
            <div class="detail-val">{{ $dateObj->format('l, F jS, Y') }}</div>
            <p>At <span data-preview="time">{{ $invitation->time ?? $details['time'] ?? '7:00 PM' }}</span></p>

            <div class="rsvp-box">
                <div class="detail-label" style="margin-top:0;">Message from the Couple</div>
                <p data-preview="personal_message" style="font-style:italic; font-family:'Montserrat', sans-serif; font-size:1.1rem; color:#006b99;">"{{ $invitation->personal_message ?? $details['personal_message'] ?? 'Please confirm your attendance' }}"</p>
                <div class="detail-label" style="margin-top:2rem;">RSVP Contact</div>
                <div class="detail-val" data-preview="rsvp_contact">{{ $invitation->rsvp_contact ?? $details['rsvp_contact'] ?? 'Your Contact' }}</div>
            </div>
        </div>
        
        <!-- VELVET VOWS FOOTER -->
        <div style="margin-top: 3rem; text-align: center; font-family: 'Montserrat', sans-serif; font-size: 0.75rem; color: #aaa; padding-bottom: 2rem;">
            <p style="margin-bottom: 0.3rem; margin-top:0;">Created with love using <span style="color: #006b99; font-weight: 600;">Velvet Vows</span></p>
        </div>
    </div>
</body>
</html>
