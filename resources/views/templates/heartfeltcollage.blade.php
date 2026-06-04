<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $invitation->bride_name ?? 'Bride' }} & {{ $invitation->groom_name ?? 'Groom' }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { 
            margin: 0; 
            padding: 0; 
            background-color: #fef7d5; /* Light yellow background */
            color: #3d2a1d; /* Dark brown/black text */
            font-family: 'Montserrat', sans-serif;
            overflow-x: hidden;
        }
        .theme-wrapper { 
            min-height: 100vh; 
            display: flex; 
            flex-direction: column; 
            text-align: center;
            padding-bottom: 4rem;
        }
        h1, h2, h3, .heading-font {
            font-family: 'Cinzel', serif;
            font-weight: 600;
            color: #3d2a1d;
        }
        
        /* Heart Grid Collage */
        .heart-grid-wrapper {
            margin: 3rem auto;
            width: 90%;
            max-width: 400px;
        }
        .heart-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 8px;
        }
        .heart-item {
            aspect-ratio: 1;
            border-radius: 8px;
            overflow: hidden;
            background-color: #e5dca5;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .heart-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        /* Define the heart shape using grid-area or specific row/col */
        .h-1 { grid-column: 2; grid-row: 1; }
        .h-2 { grid-column: 4; grid-row: 1; }
        .h-3 { grid-column: 1; grid-row: 2; }
        .h-4 { grid-column: 2; grid-row: 2; }
        .h-5 { grid-column: 3; grid-row: 2; }
        .h-6 { grid-column: 4; grid-row: 2; }
        .h-7 { grid-column: 5; grid-row: 2; }
        .h-8 { grid-column: 1; grid-row: 3; }
        .h-9 { grid-column: 2; grid-row: 3; }
        .h-10 { grid-column: 3; grid-row: 3; }
        .h-11 { grid-column: 4; grid-row: 3; }
        .h-12 { grid-column: 5; grid-row: 3; }
        .h-13 { grid-column: 2; grid-row: 4; }
        .h-14 { grid-column: 3; grid-row: 4; }
        .h-15 { grid-column: 4; grid-row: 4; }
        .h-16 { grid-column: 3; grid-row: 5; }

        .red-heart {
            color: #c91111;
            font-size: 2.5rem;
            margin: 1rem 0 2rem 0;
            transform: rotate(-15deg);
            display: inline-block;
        }

        .names-section { margin-bottom: 2rem; }
        .names-section h1 {
            font-size: 3rem;
            margin: 0;
            line-height: 1.2;
            letter-spacing: 1px;
        }
        .names-section h2 {
            font-size: 2.5rem;
            margin: 0.5rem 0;
            font-weight: 400;
        }

        .date-display {
            font-size: 1.8rem;
            margin: 2rem 0;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 15px;
        }
        .date-display span.heart {
            color: #c91111;
            font-size: 1.4rem;
        }

        .countdown-title {
            letter-spacing: 3px;
            font-size: 1.5rem;
            margin-top: 3rem;
            margin-bottom: 2rem;
            text-transform: uppercase;
        }
        .hex-grid {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 10px;
            margin: 0 auto 3rem auto;
        }
        .hex-row-1 { display: flex; gap: 10px; }
        .hex-row-2 { display: flex; gap: 10px; }
        .hex {
            width: 80px;
            height: 90px;
            background-color: #fdfdf9;
            clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            border: 1px solid #e2dac0;
        }
        .hex-num {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.4rem;
            font-weight: 700;
            color: #435b45; /* Dark green for numbers */
            line-height: 1;
            margin-bottom: 4px;
        }
        .hex-label {
            font-size: 0.55rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #888;
        }

        .sub-message {
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 0.85rem;
            margin: 4rem 2rem 2rem 2rem;
            line-height: 1.6;
            font-weight: 600;
        }

        .section-title {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
            letter-spacing: 1px;
        }
        
        .double-hearts {
            font-size: 2rem;
            margin-bottom: 3rem;
            letter-spacing: -10px;
        }
        .double-hearts .red { color: #c91111; }
        .double-hearts .black { color: #000; position: relative; z-index: 1; }

        .person-section {
            margin: 3rem 0;
            position: relative;
        }
        .person-img-wrap {
            width: 220px;
            height: 220px;
            margin: 0 auto;
            border-radius: 50%;
            border: 4px solid #fff;
            overflow: hidden;
            position: relative;
        }
        .person-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .person-hearts {
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 2rem;
            letter-spacing: -10px;
            z-index: 2;
        }
        .person-hearts .red { color: #c91111; }
        .person-hearts .white { color: #fff; text-shadow: 0 2px 4px rgba(0,0,0,0.2); }
        
        .person-name {
            font-size: 2.2rem;
            margin: 2rem 0 0.5rem 0;
            font-family: 'Cinzel', serif;
            font-weight: 700;
        }
        .person-role {
            font-size: 1.8rem;
            font-weight: 400;
            margin: 0;
            display: inline-block;
            padding-bottom: 5px;
            border-bottom: 1px solid #3d2a1d;
        }
        .person-desc {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            line-height: 1.6;
            max-width: 280px;
            margin: 1.5rem auto;
            font-weight: 500;
        }

        .save-date {
            letter-spacing: 4px;
            text-transform: uppercase;
            font-size: 0.8rem;
            margin-bottom: 1rem;
            margin-top: 5rem;
            color: #555;
        }
        
        .event-card {
            background: #fff;
            border-radius: 20px;
            margin: 2rem auto;
            width: 90%;
            max-width: 450px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            text-align: left;
        }
        .event-card-img {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }
        .event-card-body {
            padding: 2.5rem 2rem;
        }
        .event-card-title {
            font-size: 2.8rem;
            margin: 0 0 1.5rem 0;
            text-align: center;
        }
        .event-detail {
            display: flex;
            gap: 1.2rem;
            margin-bottom: 1.2rem;
            align-items: flex-start;
        }
        .event-detail-icon {
            width: 28px;
            height: 28px;
            background: #f0f2f5;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6b86b3;
            font-size: 0.9rem;
        }
        .event-detail-text {
            flex: 1;
            font-size: 0.95rem;
            line-height: 1.5;
            color: #555;
        }
        .event-detail-text strong {
            color: #333;
            font-weight: 600;
        }

        .gallery-section {
            padding: 3rem 1.5rem;
            background: #fff9e6;
            margin-top: 3rem;
            border-top: 1px solid rgba(0,0,0,0.05);
        }
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            max-width: 500px;
            margin: 0 auto;
        }
        .gallery-item {
            aspect-ratio: 1;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
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
    <div class="theme-wrapper">
        
        <!-- Heart Grid Collage -->
        <div class="heart-grid-wrapper">
            <div class="heart-grid">
                @php
                    $imgs = [];
                    if(isset($invitation) && $invitation->galleries) {
                        foreach($invitation->galleries as $g) {
                            $imgs[] = $g->image_url;
                        }
                    }
                    
                    $mainImg = $invitation->main_image_url ?? $details['main_image_url'] ?? null;
                    if($mainImg) {
                        array_unshift($imgs, $mainImg);
                    }
                    if(isset($invitation) && $invitation->bride_image_url) {
                        $imgs[] = $invitation->bride_image_url;
                    }
                    if(isset($invitation) && $invitation->groom_image_url) {
                        $imgs[] = $invitation->groom_image_url;
                    }
                    
                    // Fallback elegant photos
                    $fallbacks = [
                        'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&q=80&w=400',
                        'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&q=80&w=400',
                        'https://images.unsplash.com/photo-1532712938310-34cb3982ef74?auto=format&fit=crop&q=80&w=400',
                        'https://images.unsplash.com/photo-1520854221256-17451cc331bf?auto=format&fit=crop&q=80&w=400',
                        'https://images.unsplash.com/photo-1515934751635-c81c6bc9a2d8?auto=format&fit=crop&q=80&w=400'
                    ];
                    
                    // Use the first image (main / details main / first fallback) for every grid cell
                    $src = $mainImg ?? (count($imgs) > 0 ? $imgs[0] : $fallbacks[0]);
                    for($i=1; $i<=16; $i++) {
                        $class = "h-" . $i;
                        echo "<div class='heart-item $class'><img class='pv-main-img-src' src='$src' alt=''></div>";
                    }
                @endphp
            </div>
        </div>

        <div style="text-align: right; padding-right: 20%; margin-top: -1rem;">
            <div class="red-heart">♥️</div>
        </div>

        <!-- Names Section -->
        <div class="names-section">
            <h1 data-preview="bride_name">{{ $invitation->bride_name ?? $details['bride_name'] ?? 'Rivona' }}</h1>
            <h2>&amp;</h2>
            <h1 data-preview="groom_name">{{ $invitation->groom_name ?? $details['groom_name'] ?? 'Rixon' }}</h1>
        </div>

        <!-- Date Section -->
        @php
            $date = \Carbon\Carbon::parse($invitation->wedding_date ?? $details['wedding_date'] ?? '2027-04-26');
        @endphp
        <div class="date-display heading-font">
            <span data-preview="wedding_date_d">{{ $date->format('d') }}</span>
            <span class="heart">♥️</span>
            <span data-preview="wedding_date_m">{{ $date->format('m') }}</span>
            <span class="heart">♥️</span>
            <span data-preview="wedding_date_y">{{ $date->format('Y') }}</span>
            <span data-preview="wedding_date" style="display:none;">{{ $date->format('Y-m-d') }}</span>
        </div>

        <!-- Countdown -->
        <h3 class="countdown-title">COUNTDOWN</h3>
        <div class="hex-grid">
            <div class="hex-row-1">
                <div class="hex">
                    <span class="hex-num">328</span>
                    <span class="hex-label">Days</span>
                </div>
                <div class="hex">
                    <span class="hex-num">00</span>
                    <span class="hex-label">Hours</span>
                </div>
                <div class="hex">
                    <span class="hex-num">12</span>
                    <span class="hex-label">Minutes</span>
                </div>
            </div>
            <div class="hex-row-2">
                <div class="hex">
                    <span class="hex-num">50</span>
                    <span class="hex-label">Seconds</span>
                </div>
            </div>
        </div>
        
        <!-- Dots below countdown -->
        <div style="display: flex; justify-content: center; gap: 8px; margin-bottom: 2rem;">
            <div style="width: 6px; height: 6px; background: #888; border-radius: 50%;"></div>
            <div style="width: 6px; height: 6px; background: #cba86a; border-radius: 50%;"></div>
        </div>

        <!-- Sub Message -->
        <p class="sub-message">We are excited to see you at our special day</p>

        <!-- About Details -->
        <h2 class="section-title">About Details</h2>
        <div class="double-hearts">
            <span class="red">❤</span><span class="black">❤</span>
        </div>

        <!-- Groom Section -->
        <div class="person-section">
            <div class="person-img-wrap">
                <img class="pv-groom-img-src" src="{{ $invitation->groom_image_url ?? 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?auto=format&fit=crop&q=80&w=400' }}" alt="Groom">
                <div class="person-hearts">
                    <span class="red">❤</span><span class="white">❤</span>
                </div>
            </div>
            <h2 class="person-name" data-preview="groom_name">{{ $invitation->groom_name ?? $details['groom_name'] ?? 'Rixon' }}</h2>
            <h3 class="person-role">The Groom</h3>
            <!-- <p class="person-desc">Kindly share the groom's details, including his parents' names and address.</p> -->
        </div>

        <!-- Bride Section -->
        <div class="person-section">
            <div class="person-img-wrap">
                <img class="pv-bride-img-src" src="{{ $invitation->bride_image_url ?? 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&q=80&w=400' }}" alt="Bride">
                <div class="person-hearts">
                    <span class="red">❤</span><span class="white">❤</span>
                </div>
            </div>
            <h2 class="person-name" data-preview="bride_name">{{ $invitation->bride_name ?? $details['bride_name'] ?? 'Rivona' }}</h2>
            <h3 class="person-role">The Bride</h3>
            <!-- <p class="person-desc">Kindly share the bride's details, including her parents' names and address.</p> -->
        </div>

        <!-- Event Details -->
        <div class="save-date">Save The Date</div>
        <h2 class="section-title">When & Where</h2>
        
        <div class="event-card">
            <!-- <img src="{{ $invitation->main_image_url ?? 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&q=80&w=800' }}" class="event-card-img" alt="Wedding Venue"> -->
            <div class="event-card-body">
                <h2 class="event-card-title">Wedding</h2>
                
                <div class="event-detail">
                    <div class="event-detail-icon"><i class="bi bi-calendar3"></i></div>
                    <div class="event-detail-text">
                        {{ $date->format('l, F j, Y') }}
                    </div>
                </div>

                <div class="event-detail">
                    <div class="event-detail-icon"><i class="bi bi-clock"></i></div>
                    <div class="event-detail-text" data-preview="time">
                        {{ $invitation->time ?? $details['time'] ?? '10:00 AM onwards' }}
                    </div>
                </div>

                <div class="event-detail">
                    <div class="event-detail-icon"><i class="bi bi-geo-alt"></i></div>
                    <div class="event-detail-text">
                        <strong data-preview="venue_name">{{ $invitation->venue_name ?? $details['venue_name'] ?? 'Guardian Angel Catholic Church' }}</strong><br>
                        <span data-preview="venue_address" style="display: block; margin-top: 4px;">{{ $invitation->venue_address ?? $details['venue_address'] ?? 'Moralien, Kakoda, Vodlemol Cacora, South Goa' }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gallery Section -->
        <div class="gallery-section" style="{{ (isset($invitation) && $invitation->galleries && $invitation->galleries->count() > 0) ? '' : 'display:none;' }}">
            <h2 class="section-title" style="margin-bottom: 2rem;">Memories</h2>
            <div class="gallery-grid">
                @if(isset($invitation) && $invitation->galleries)
                    @foreach($invitation->galleries as $gallery)
                        <div class="gallery-item">
                            <img src="{{ $gallery->image_url }}" alt="Gallery Image">
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

    </div>
</body>
</html>
