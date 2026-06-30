<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $invitation->bride_name ?? $details['bride_name'] ?? 'Bride' }} & {{ $invitation->groom_name ?? $details['groom_name'] ?? 'Groom' }}</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Playfair+Display:ital,wght@0,400;0,600;1,400;1,600&display=swap" rel="stylesheet">
    
    <style>
        /* 1. CSS Variables & Reset */
        :root {
            --glass-bg: rgba(255, 255, 255, 0.6);
            --glass-border: rgba(255, 255, 255, 0.8);
            --glass-shadow: 0 8px 32px rgba(31, 38, 135, 0.05);
            --text-main: #2d3748;
            --text-accent: #718096;
            --font-sans: 'Inter', sans-serif;
            --font-serif: 'Playfair Display', serif;
        }
        
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            min-height: 100vh;
            font-family: var(--font-sans);
            color: var(--text-main);
            overflow-x: hidden;
            /* Animated Gradient Background */
            background: linear-gradient(-45deg, #fcebb6, #f3d1df, #e2eafc, #fef9e7);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .template-wrapper {
            max-width: 600px;
            margin: 0 auto;
            padding: 40px 20px 80px;
        }

        /* 2. Glassmorphism Components */
        .glass-card {
            background: var(--glass-bg);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid var(--glass-border);
            border-radius: 24px;
            box-shadow: var(--glass-shadow);
            padding: 40px 30px;
            margin-bottom: 30px;
            text-align: center;
            transition: transform 0.3s ease;
        }
        
        .glass-card:hover {
            transform: translateY(-5px);
        }

        /* 3. Typography */
        .hero-names {
            font-family: var(--font-serif);
            font-size: 3.5rem;
            font-weight: 600;
            line-height: 1.2;
            margin-bottom: 10px;
            background: linear-gradient(45deg, #2d3748, #4a5568);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-and {
            font-family: var(--font-serif);
            font-style: italic;
            font-size: 2rem;
            color: #a0aec0;
            margin: 10px 0;
        }

        .section-label {
            font-size: 0.75rem;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: var(--text-accent);
            font-weight: 600;
            margin-bottom: 15px;
        }

        .date-display {
            font-family: var(--font-serif);
            font-size: 1.8rem;
            font-weight: 600;
            margin: 20px 0;
            color: var(--text-main);
        }

        .message-text {
            font-family: var(--font-serif);
            font-style: italic;
            font-size: 1.3rem;
            line-height: 1.8;
            color: var(--text-main);
        }

        .role-name {
            font-family: var(--font-serif);
            font-size: 2rem;
            font-weight: 600;
            margin-top: 15px;
        }

        /* 4. Images */
        .img-hero {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
            margin-bottom: 20px;
        }

        .img-avatar {
            width: 140px;
            height: 140px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #fff;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            margin: 0 auto;
        }

        /* 5. Countdown */
        .countdown-wrap {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin: 30px 0;
        }
        
        .cd-box {
            background: rgba(255, 255, 255, 0.4);
            border: 1px solid rgba(255,255,255,0.6);
            border-radius: 12px;
            padding: 15px 10px;
            min-width: 65px;
        }
        
        .cd-num {
            font-family: var(--font-sans);
            font-size: 1.8rem;
            font-weight: 300;
            display: block;
            margin-bottom: 5px;
        }
        
        .cd-lbl {
            font-size: 0.6rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--text-accent);
        }

        /* 6. Gallery */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-top: 20px;
        }
        
        .gallery-item {
            width: 100%;
            aspect-ratio: 1;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        
        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.05);
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
    <div class="template-wrapper">
        
        <!-- Hero Section -->
        <div class="glass-card">
            <div class="section-label">We Are Getting Married</div>

            <div class="hero-names" data-preview="bride_name">{{ $invitation->bride_name ?? $details['bride_name'] ?? 'Sophia' }}</div>
            <div class="hero-and">&</div>
            <div class="hero-names" data-preview="groom_name">{{ $invitation->groom_name ?? $details['groom_name'] ?? 'Alexander' }}</div>
            
            <div style="margin-top: 30px;">
                <img class="img-hero pv-main-img-src" src="{{ $invitation->main_image_url ?? 'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=800&q=80' }}" alt="Main Photo">
            </div>
        </div>
        
        <!-- Date & Countdown -->
        <div class="glass-card">
            <div class="section-label">Save The Date</div>
            <div class="date-display" data-preview="wedding_date">
                {{ \Carbon\Carbon::parse($invitation->wedding_date ?? $details['wedding_date'] ?? now())->format('F jS, Y') }}
            </div>
            
            <div class="countdown-wrap">
                <div class="cd-box"><span class="cd-num">42</span><span class="cd-lbl">Days</span></div>
                <div class="cd-box"><span class="cd-num">18</span><span class="cd-lbl">Hours</span></div>
                <div class="cd-box"><span class="cd-num">30</span><span class="cd-lbl">Mins</span></div>
                <div class="cd-box"><span class="cd-num">12</span><span class="cd-lbl">Secs</span></div>
            </div>
            
            <div style="margin-top: 20px;">
                <div class="section-label" style="margin-top: 30px;">Time & Venue</div>
                <div style="font-size: 1.1rem; font-weight: 500; margin-bottom: 5px;" data-preview="time">{{ $invitation->time ?? $details['time'] ?? '4:00 PM' }}</div>
                <div style="font-family: var(--font-serif); font-size: 1.4rem; margin-bottom: 10px;" data-preview="venue_name">{{ $invitation->venue_name ?? $details['venue_name'] ?? 'The Glasshouse Conservatory' }}</div>
                <div style="color: var(--text-accent); font-size: 0.9rem;" data-preview="venue_address">{{ $invitation->venue_address ?? $details['venue_address'] ?? '123 Botanical Gardens, NY' }}</div>
                @php
                    $locationUrl = $invitation->location_url ?? $details['location_url'] ?? '';
                    $hasValidLocationUrl = !empty($locationUrl) && filter_var($locationUrl, FILTER_VALIDATE_URL);
                @endphp
                <div style="margin-top: 1.5rem; width: 100%; max-width: 460px; margin-left: auto; margin-right: auto;">
                    <div style="display:flex; flex-wrap:wrap; align-items:center; justify-content:space-between; gap:0.8rem; padding: 1rem 1.2rem; border-radius: 20px; border: 1px solid rgba(255, 255, 255, 0.6); background: rgba(255, 255, 255, 0.35); backdrop-filter: blur(8px); text-align: left; box-shadow: 0 8px 32px rgba(31, 38, 135, 0.03);">
                        <div style="flex:1 1 200px; min-width: 200px;">
                            <p style="font-family:var(--font-sans); font-weight:600; font-size:0.75rem; letter-spacing:1.5px; text-transform:uppercase; color:var(--text-accent); margin:0 0 0.3rem;">Venue directions</p>
                            <p style="font-family:var(--font-sans); font-size:0.78rem; color:var(--text-main); line-height:1.4; margin:0; opacity:0.95;">Open the location in Maps to find the venue with ease.</p>
                        </div>
                        <a class="pv-location-url" href="{{ $hasValidLocationUrl ? $locationUrl : 'javascript:void(0)' }}" target="_blank" rel="noopener noreferrer" style="display: {{ $hasValidLocationUrl ? 'inline-flex' : 'none' }}; align-items:center; justify-content:center; gap:0.45rem; padding:0.75rem 1.1rem; border-radius:12px; background: var(--text-main); color: #fff; text-decoration:none; font-family:'Inter', sans-serif; font-size:0.8rem; font-weight:600; letter-spacing:0.5px; box-shadow:0 6px 16px rgba(0,0,0,0.1);">
                            View on map
                        </a>
                    </div>
                </div>

            </div>
        </div>
        
        <!-- About Us -->
        <div class="glass-card">
            <div class="section-label">Our Story</div>
            <div class="message-text" data-preview="personal_message">
                {!! nl2br(e($invitation->personal_message ?? $details['personal_message'] ?? "Every love story is beautiful, but ours is my favorite. We cannot wait to celebrate the beginning of our forever with all of our favorite people.")) !!}
            </div>
            
            <div style="display: flex; flex-direction: column; gap: 30px; margin-top: 40px; align-items: center; justify-content: center;">
                <!-- Bride -->
                <div style="text-align: center;">
                    <img class="img-avatar pv-bride-img-src" src="{{ !empty($invitation->bride_image_url) ? $invitation->bride_image_url : (!empty($details['bride_image_url']) ? $details['bride_image_url'] : 'https://images.unsplash.com/photo-1541250848049-b4f7141fca3f?auto=format&fit=crop&w=400&q=80') }}">
                    <div class="role-name" data-preview="bride_name">{{ $invitation->bride_name ?? $details['bride_name'] ?? 'Sophia' }}</div>
                    <div class="section-label" style="margin-top: 5px;">The Bride</div>
                </div>
                
                <!-- Groom -->
                <div style="text-align: center;">
                    <img class="img-avatar pv-groom-img-src" src="{{ !empty($invitation->groom_image_url) ? $invitation->groom_image_url : '' }}" style="display: {{ !empty($invitation->groom_image_url) || !empty($details['groom_image_url']) ? 'block' : 'none' }};">
                    <div class="role-name" data-preview="groom_name">{{ $invitation->groom_name ?? $details['groom_name'] ?? 'Alexander' }}</div>
                    <div class="section-label" style="margin-top: 5px;">The Groom</div>
                </div>
            </div>
        </div>
        
        <!-- Gallery Section -->
        @php
            $hasGalleries = isset($invitation) && $invitation->galleries && $invitation->galleries->count() > 0;
            $showGallery = $hasGalleries || !isset($invitation);
        @endphp
        <div class="glass-card gallery-section" style="{{ $showGallery ? '' : 'display:none;' }}">
            <div class="section-label">Moments</div>
            <div class="gallery-grid">
                @if($hasGalleries)
                    @foreach($invitation->galleries as $gallery)
                        <div class="gallery-item">
                            <img src="{{ $gallery->image_url }}" alt="Gallery Image">
                        </div>
                    @endforeach
                @else
                    <!-- Fallback for empty state preview -->
                    <div class="gallery-item"><img src="https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=400&q=80" alt="Gallery"></div>
                    <div class="gallery-item"><img src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=400&q=80" alt="Gallery"></div>
                @endif
            </div>
        </div>

        <div class="glass-card" style="padding: 20px;">
             <div class="section-label" style="margin: 0;">RSVP</div>
             <div style="font-family: var(--font-serif); font-size: 1.2rem; margin-top: 10px;" data-preview="rsvp_contact">{{ $invitation->rsvp_contact ?? $details['rsvp_contact'] ?? 'contact@sophia-alex.com' }}</div>
        </div>
        
    </div>
</body>
</html>
