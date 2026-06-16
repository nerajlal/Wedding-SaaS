<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $invitation->bride_name ?? $details['bride_name'] ?? 'Bride' }} & {{ $invitation->groom_name ?? $details['groom_name'] ?? 'Groom' }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=Alex+Brush&family=Cormorant+Garamond:ital,wght@0,600;1,600&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        :root {
            --bg-color: #FFFFFF;
            --text-color: #111111;
            --muted-color: #666666;
            --light-gray: #FAF8F5;
            --accent-border: #111111;
        }
        
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            min-height: 100vh;
            background: #F7F3EB; /* Premium warm cream page background */
            font-family: 'Inter', sans-serif;
            color: var(--text-color);
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }
        
        .template-wrapper {
            width: 100%;
            max-width: 580px;
            margin: 0 auto;
            min-height: 100vh;
            background: var(--bg-color);
            box-shadow: 0 0 50px rgba(0,0,0,0.06);
            display: flex;
            flex-direction: column;
            padding: 24px 20px 40px;
            box-sizing: border-box;
            position: relative;
        }
        
        /* Circular Hero Section */
        .hero-section-wrapper {
            width: 100%;
            max-width: 540px;
            margin: 0 auto 24px auto !important;
            aspect-ratio: 1 / 1;
            border-radius: 50%;
            overflow: hidden;
            position: relative;
            box-shadow: 0 16px 40px rgba(0,0,0,0.08);
            background: #ffffff;
            border: 1px solid rgba(0,0,0,0.03);
        }
        
        .hero-section-wrapper.mode-collage .collage-container {
            display: block;
        }
        .hero-section-wrapper.mode-collage .slideshow-container {
            display: none !important;
        }
        
        .hero-section-wrapper.mode-slideshow .collage-container {
            display: none !important;
        }
        .hero-section-wrapper.mode-slideshow .slideshow-container {
            display: block;
        }

        /* Collage Grid Layout */
        .collage-container {
            width: 100%;
            height: 100%;
        }

        .collage-grid {
            display: grid;
            grid-template-columns: 1.05fr 0.95fr;
            gap: 8px;
            height: 100%;
            width: 100%;
            background: #ffffff;
        }
        
        .collage-col-left {
            display: grid;
            grid-template-rows: 1.4fr 1fr;
            gap: 8px;
            height: 100%;
        }
        
        .collage-col-right {
            display: grid;
            grid-template-rows: 1.2fr 1fr 1.2fr;
            gap: 8px;
            height: 100%;
        }
        
        .img-box {
            overflow: hidden;
            width: 100%;
            height: 100%;
            background: #FAF8F5;
        }
        
        .img-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }
        
        /* Collage Text Wrapper inside bottom-left quadrant */
        .collage-text-wrapper {
            background: #ffffff;
            padding: 10px 10px 10px 16px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: left;
            height: 100%;
            box-sizing: border-box;
            overflow: hidden;
        }
        
        .names-title {
            font-family: 'Inter', sans-serif;
            font-size: 1.35rem;
            font-weight: 800;
            line-height: 1.1;
            letter-spacing: -0.5px;
            color: #111111 !important;
            margin: 0 0 4px 0;
            text-transform: uppercase;
        }
        
        .names-title span {
            display: block;
        }
        
        .names-title .ampersand {
            font-size: 1.05rem;
            font-weight: 800;
            color: #111111 !important;
            margin: 2px 0;
            display: block;
        }
        
        .quote {
            font-family: 'Inter', sans-serif;
            font-size: 0.6rem;
            font-weight: 600;
            line-height: 1.35;
            letter-spacing: 0.2px;
            color: #555555 !important;
            margin: 0;
            text-transform: uppercase;
            max-width: 95%;
        }

        /* Details & Content Section */
        .details-section {
            background: #ffffff;
            padding: 8px 10px;
            margin-top: 8px;
        }
        
        .section-title {
            font-size: 1.4rem;
            font-weight: 800;
            letter-spacing: 4px;
            text-align: center;
            color: var(--text-color);
            margin: 0 0 28px 0;
            text-transform: uppercase;
        }
        
        .details-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
            margin-bottom: 24px;
        }
        
        .detail-card {
            text-align: center;
            padding: 24px 16px;
            background: var(--light-gray);
            border-radius: 20px;
            border: 1px solid rgba(0,0,0,0.02);
            box-shadow: 0 4px 20px rgba(0,0,0,0.01);
        }
        
        .detail-icon {
            font-size: 1.6rem;
            color: var(--text-color);
            margin-bottom: 12px;
        }
        
        .detail-label {
            font-size: 0.68rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #888;
            font-weight: 700;
            margin-bottom: 8px;
        }
        
        .detail-value {
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--text-color);
            margin-bottom: 4px;
        }
        
        .detail-sub {
            font-size: 0.85rem;
            color: var(--muted-color);
            line-height: 1.4;
        }

        /* Map Direction Card */
        .map-card-container {
            margin-bottom: 32px;
        }
        .map-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding: 18px 20px;
            border-radius: 20px;
            border: 1px solid rgba(0,0,0,0.08);
            background: #fff;
            text-align: left;
        }
        .map-info h4 {
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin: 0 0 4px 0;
            color: var(--text-color);
        }
        .map-info p {
            font-size: 0.75rem;
            color: var(--muted-color);
            margin: 0;
            line-height: 1.35;
        }
        .location-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 18px;
            border-radius: 12px;
            background: var(--text-color);
            color: #fff;
            text-decoration: none;
            font-size: 0.8rem;
            font-weight: 600;
            transition: all 0.2s;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .location-btn:hover {
            background: #333;
            color: #fff;
        }

        /* The Couple Section */
        .couple-section {
            margin-bottom: 32px;
        }
        .subsection-title {
            font-size: 0.95rem;
            font-weight: 800;
            letter-spacing: 3px;
            text-align: center;
            color: var(--text-color);
            margin-bottom: 24px;
            text-transform: uppercase;
        }
        .couple-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        .couple-card {
            text-align: center;
        }
        .couple-img-wrapper {
            width: 100%;
            aspect-ratio: 1 / 1;
            border-radius: 50%;
            overflow: hidden;
            margin-bottom: 12px;
            border: 2px solid var(--text-color);
            padding: 4px;
            background: #ffffff;
            box-shadow: 0 6px 16px rgba(0,0,0,0.04);
            position: relative;
        }
        .couple-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }
        .role-badge {
            display: inline-block;
            font-size: 0.62rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-weight: 700;
            color: #888;
            margin-bottom: 4px;
        }
        .couple-card h4 {
            font-size: 1.05rem;
            font-weight: 700;
            margin: 0;
            color: var(--text-color);
        }

        /* RSVP Section */
        .rsvp-section {
            text-align: center;
            margin-bottom: 36px;
            padding: 8px 0;
        }
        .rsvp-msg {
            font-size: 0.85rem;
            color: var(--muted-color);
            margin-bottom: 16px;
        }
        .rsvp-card {
            display: inline-block;
            padding: 14px 28px;
            border: 1px solid var(--text-color);
            border-radius: 16px;
            background: #ffffff;
        }
        .rsvp-label {
            font-size: 0.65rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #888;
            font-weight: 700;
            margin-bottom: 4px;
        }
        .rsvp-contact {
            font-size: 1rem;
            font-weight: 700;
            color: var(--text-color);
        }

        /* Captured Moments / Gallery Grid */
        .gallery-section {
            margin-bottom: 36px;
        }
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 8px;
        }
        .gallery-item {
            aspect-ratio: 1 / 1;
            overflow: hidden;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            background: var(--light-gray);
            border: 1px solid rgba(0,0,0,0.03);
        }
        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }
        .gallery-item:hover img {
            transform: scale(1.05);
        }

        /* Footer */
        .template-footer {
            text-align: center;
            margin-top: 24px;
            padding-top: 24px;
            border-top: 1px solid rgba(0,0,0,0.05);
        }
        .footer-designed {
            font-size: 0.6rem;
            font-weight: 700;
            letter-spacing: 2px;
            color: #aaa;
            margin: 0;
            text-transform: uppercase;
        }

        /* Custom Font Bindings */
        [data-preview="wedding_date"], 
        [data-preview="time"], 
        [data-preview="venue_address"], 
        [data-preview="rsvp_contact"] {
            font-family: 'Inter', sans-serif !important;
        }
    </style>
</head>
<body>
    @php
        $rawDate = $invitation->wedding_date ?? $details['wedding_date'] ?? '2026-10-18';
        $dateObj = \Carbon\Carbon::parse($rawDate);

        $mainImgUrl = $invitation->main_image_url ?? $details['main_image_url'] ?? null;
        $accentImgUrl = $invitation->accent_image_url ?? $details['accent_image_url'] ?? null;
        $hero3ImgUrl = $invitation->hero_image_3_url ?? $details['hero_image_3_url'] ?? null;
        $hero4ImgUrl = $invitation->hero_image_4_url ?? $details['hero_image_4_url'] ?? null;
        $brideImgUrl = $invitation->bride_image_url ?? $details['bride_image_url'] ?? null;
        $groomImgUrl = $invitation->groom_image_url ?? $details['groom_image_url'] ?? null;

        $bgImg = !empty($mainImgUrl) ? $mainImgUrl : 'https://images.unsplash.com/photo-1519225421980-715cb0215aed?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80';
        $accentImg = !empty($accentImgUrl) ? $accentImgUrl : 'https://images.unsplash.com/photo-1524504388940-b1c1722653e1?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80';
        $hero3Img = !empty($hero3ImgUrl) ? $hero3ImgUrl : $bgImg;
        $hero4Img = !empty($hero4ImgUrl) ? $hero4ImgUrl : $accentImg;

        $fgLeftImg = !empty($brideImgUrl) ? $brideImgUrl : 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=600&q=80';
        $fgBottomImg = !empty($groomImgUrl) ? $groomImgUrl : 'https://images.unsplash.com/photo-1519225421980-715cb0215aed?auto=format&fit=crop&w=600&q=80';
    @endphp

    <div class="template-wrapper">
        <div class="hero-section-wrapper mode-collage">
            <!-- Collage Layout -->
            <div class="collage-container">
                <div class="collage-grid">
                    <!-- Left Column -->
                    <div class="collage-col-left">
                        <div class="img-box">
                            <img class="pv-main-img-src" src="{{ $bgImg }}" alt="Main Photo" style="filter: grayscale(100%);">
                        </div>
                        <div class="collage-text-wrapper">
                            <h1 class="names-title">
                                <span data-preview="bride_name">{{ $invitation->bride_name ?? $details['bride_name'] ?? 'Bride' }}</span>
                                <span class="ampersand">&</span>
                                <span data-preview="groom_name">{{ $invitation->groom_name ?? $details['groom_name'] ?? 'Groom' }}</span>
                            </h1>
                            <p class="quote" data-preview="personal_message">
                                {{ $invitation->personal_message ?? $details['personal_message'] ?? 'A successful marriage requires falling in love many times, always with the same person.' }}
                            </p>
                        </div>
                    </div>
                    <!-- Right Column -->
                    <div class="collage-col-right">
                        <div class="img-box">
                            <img class="pv-accent-img-src" src="{{ $accentImg }}" alt="Accent Photo">
                        </div>
                        <div class="img-box">
                            <img class="pv-hero3-img-src" src="{{ $hero3Img }}" alt="Hero Photo 3">
                        </div>
                        <div class="img-box">
                            <img class="pv-hero4-img-src" src="{{ $hero4Img }}" alt="Hero Photo 4">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Wedding Details Content -->
        <div class="details-section">
            <h2 class="section-title">OUR SPECIAL DAY</h2>
            
            <div class="details-grid">
                <div class="detail-card">
                    <div class="detail-icon"><i class="bi bi-calendar-heart"></i></div>
                    <div class="detail-label">The Date</div>
                    <div class="detail-value" data-preview="wedding_date">
                        {{ $dateObj->format('F j, Y') }}
                    </div>
                    <div class="detail-sub" data-preview="time">
                        at {{ $invitation->time ?? $details['time'] ?? '12:00 PM' }}
                    </div>
                </div>

                <div class="detail-card">
                    <div class="detail-icon"><i class="bi bi-geo-alt"></i></div>
                    <div class="detail-label">The Venue</div>
                    <div class="detail-value" data-preview="venue_name">
                        {{ $invitation->venue_name ?? $details['venue_name'] ?? 'The Grand Venue' }}
                    </div>
                    <div class="detail-sub" data-preview="venue_address">
                        {{ $invitation->venue_address ?? $details['venue_address'] ?? '123 Wedding Street, City' }}
                    </div>
                </div>
            </div>

            <!-- Directions Map Card -->
            @php
                $locationUrl = $invitation->location_url ?? $details['location_url'] ?? '';
                $hasValidLocationUrl = !empty($locationUrl) && filter_var($locationUrl, FILTER_VALIDATE_URL);
            @endphp
            <div class="map-card-container">
                <div class="map-card">
                    <div class="map-info">
                        <h4>Venue directions</h4>
                        <p>Open the location in Maps to find the venue with ease.</p>
                    </div>
                    <a class="pv-location-url location-btn" href="{{ $hasValidLocationUrl ? $locationUrl : 'javascript:void(0)' }}" target="_blank" rel="noopener noreferrer" style="display: {{ $hasValidLocationUrl ? 'inline-flex' : 'none' }};">
                        View on map
                    </a>
                </div>
            </div>

            <!-- The Couple Section -->
            <div class="couple-section">
                <h3 class="subsection-title">THE COUPLE</h3>
                <div class="couple-grid">
                    <!-- Bride -->
                    <div class="couple-card">
                        <div class="couple-img-wrapper">
                            <img class="pv-bride-img-src" src="{{ $fgLeftImg }}" alt="Bride Image">
                        </div>
                        <span class="role-badge">Bride</span>
                        <h4 data-preview="bride_name">{{ $invitation->bride_name ?? $details['bride_name'] ?? 'Bride' }}</h4>
                    </div>
                    <!-- Groom -->
                    <div class="couple-card">
                        <div class="couple-img-wrapper">
                            <img class="pv-groom-img-src" src="{{ $fgBottomImg }}" alt="Groom Image">
                        </div>
                        <span class="role-badge">Groom</span>
                        <h4 data-preview="groom_name">{{ $invitation->groom_name ?? $details['groom_name'] ?? 'Groom' }}</h4>
                    </div>
                </div>
            </div>

            <!-- RSVP Section -->
            <div class="rsvp-section">
                <h3 class="subsection-title">RSVP</h3>
                <p class="rsvp-msg">We look forward to celebrating with you</p>
                <div class="rsvp-card">
                    <div class="rsvp-label">Please reply to</div>
                    <div class="rsvp-contact" data-preview="rsvp_contact">
                        {{ $invitation->rsvp_contact ?? $details['rsvp_contact'] ?? 'Your Contact' }}
                    </div>
                </div>
            </div>

            <!-- Gallery Section -->
            @php
                $hasGalleries = isset($invitation) && $invitation->galleries && $invitation->galleries->count() > 0;
                $showGallery = $hasGalleries || !isset($invitation);
            @endphp
            <div class="gallery-section" style="{{ $showGallery ? '' : 'display:none;' }}">
                <h3 class="subsection-title">Captured Moments</h3>
                <div class="gallery-grid">
                    @if($hasGalleries)
                        @foreach($invitation->galleries as $gallery)
                            <div class="gallery-item">
                                <img src="{{ $gallery->image_url }}" alt="Gallery Image">
                            </div>
                        @endforeach
                    @else
                        <div class="gallery-item">
                            <img src="https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=400&q=80" alt="Gallery Image">
                        </div>
                        <div class="gallery-item">
                            <img src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=400&q=80" alt="Gallery Image">
                        </div>
                        <div class="gallery-item">
                            <img src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?auto=format&fit=crop&w=400&q=80" alt="Gallery Image">
                        </div>
                    @endif
                </div>
            </div>

            <!-- Footer -->
            <div class="template-footer">
                <p class="footer-designed">DESIGNED ON VELVET VOWS</p>
            </div>
        </div>
    </div>

    <!-- Scripting for Preview Realtime Events -->
    <script>
        // Realtime Event: Hero layout toggle (always collage for the Elegant Circle layout signature)
        window.toggleHeroLayout = function(theme) {
            const wrapper = document.querySelector('.hero-section-wrapper');
            if (wrapper) {
                wrapper.classList.remove('mode-slideshow');
                wrapper.classList.add('mode-collage');
            }
        };

        // Realtime Event: Slideshow image updates (no-op as slideshow layout is disabled)
        window.updateHeroSlideshow = function(allImages) {
            // Keep collage layout active
        };
    </script>
</body>
</html>
