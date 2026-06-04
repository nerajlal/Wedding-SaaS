<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $invitation->bride_name ?? $details['bride_name'] ?? 'Bride' }} & {{ $invitation->groom_name ?? $details['groom_name'] ?? 'Groom' }}</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --bg-color: #FFFFFF;
            --text-color: #111111;
            --muted-color: #555555;
        }
        
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            min-height: 100vh;
            background: var(--bg-color);
            font-family: 'Inter', sans-serif;
            color: var(--text-color);
            overflow-x: hidden;
        }
        
        .template-wrapper {
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        
        .collage-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            height: 500px; /* Fixed height for the collage area */
        }
        
        .collage-left {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        
        .collage-right {
            display: grid;
            grid-template-rows: 1.2fr 1fr 1.2fr;
            gap: 10px;
        }
        
        .img-box {
            overflow: hidden;
            background: #f0f0f0;
            width: 100%;
            height: 100%;
        }
        
        .img-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        /* Left main image */
        .img-main {
            border-radius: 500px 0 0 500px;
            height: 100%; /* Takes full height of left column except text part if we want text inside */
        }

        /* Right column images */
        .img-tr {
            border-radius: 500px 500px 0 0;
        }
        
        .img-mr {
            border-radius: 0;
        }
        
        .img-br {
            border-radius: 0 0 500px 0;
        }
        
        /* Text under left image */
        .text-section {
            padding-top: 20px;
            padding-right: 10px;
        }
        
        .names-title {
            font-size: 2.2rem;
            font-weight: 800;
            line-height: 1.1;
            margin: 0 0 10px 0;
            text-transform: uppercase;
        }
        
        .ampersand {
            display: block;
            margin: 5px 0;
        }
        
        .quote {
            font-size: 0.75rem;
            line-height: 1.5;
            color: var(--muted-color);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 15px;
        }

        .details-section {
            margin-top: 40px;
            border-top: 1px solid #eee;
            padding-top: 20px;
        }

        .detail-row {
            margin-bottom: 20px;
        }

        .detail-label {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--muted-color);
            margin-bottom: 5px;
            display: block;
        }

        .detail-value {
            font-size: 1.1rem;
            font-weight: 600;
        }
        
        .gallery-section {
            margin-top: 40px;
        }
        
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
        }
        
        .gallery-item {
            aspect-ratio: 1;
            overflow: hidden;
            border-radius: 8px;
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
    <div class="template-wrapper">
        <!-- Collage Layout -->
        <div class="collage-container">
            <!-- Left Column -->
            <div class="collage-left">
                <div class="img-box img-main">
                    <img class="pv-main-img-src" src="{{ $invitation->main_image_url ?? $details['main_image_url'] ?? 'https://images.unsplash.com/photo-1519225421980-715cb0215aed?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80' }}" alt="Main">
                </div>
            </div>
            <!-- Right Column -->
            <div class="collage-right">
                <div class="img-box img-tr">
                    <img class="pv-bride-img-src" src="{{ $invitation->bride_image_url ?? $details['bride_image_url'] ?? 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80' }}" alt="Bride">
                </div>
                <div class="img-box img-mr">
                    <img class="pv-groom-img-src" src="{{ $invitation->groom_image_url ?? $details['groom_image_url'] ?? 'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80' }}" alt="Groom">
                </div>
                <div class="img-box img-br">
                    <!-- Usually we'd use a gallery image here, but sticking to the basic hooks -->
                    <img class="pv-main-img-src" src="{{ $invitation->main_image_url ?? $details['main_image_url'] ?? 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80' }}" style="filter: brightness(0.8);" alt="Extra">
                </div>
            </div>
        </div>

        <!-- Text Section matching the image (under the left column in the design, but let's place it here so it aligns nicely) -->
        <div class="text-section">
            <h1 class="names-title">
                <span data-preview="bride_name">{{ $invitation->bride_name ?? $details['bride_name'] ?? 'NAVEEN' }}</span>
                <span class="ampersand">&</span>
                <span data-preview="groom_name">{{ $invitation->groom_name ?? $details['groom_name'] ?? 'NEETHU' }}</span>
            </h1>
            <div class="quote" data-preview="personal_message">
                {{ $invitation->personal_message ?? $details['personal_message'] ?? 'A successful marriage requires falling in love many times, always with the same person.' }}
            </div>
        </div>

        <!-- Details Section -->
        <div class="details-section">
            <div class="detail-row">
                <span class="detail-label">Date & Time</span>
                <div class="detail-value">
                    <span data-preview="wedding_date">{{ \Carbon\Carbon::parse($invitation->wedding_date ?? $details['wedding_date'] ?? now())->format('F j, Y') }}</span>
                    - <span data-preview="time">{{ $invitation->time ?? $details['time'] ?? '12:00 PM' }}</span>
                </div>
            </div>
            
            <div class="detail-row">
                <span class="detail-label">Venue</span>
                <div class="detail-value">
                    <div data-preview="venue_name">{{ $invitation->venue_name ?? $details['venue_name'] ?? 'The Grand Venue' }}</div>
                    <div data-preview="venue_address" style="font-size: 0.9rem; font-weight: 400; color: var(--muted-color);">{{ $invitation->venue_address ?? $details['venue_address'] ?? '123 Wedding Street, City' }}</div>
                </div>
            </div>
            
            <div class="detail-row">
                <span class="detail-label">RSVP</span>
                <div class="detail-value" data-preview="rsvp_contact">
                    {{ $invitation->rsvp_contact ?? $details['rsvp_contact'] ?? '+1 234 567 890' }}
                </div>
            </div>
        </div>

        <!-- Gallery Section -->
        <div class="gallery-section" style="{{ (isset($invitation) && $invitation->galleries && $invitation->galleries->count() > 0) ? '' : 'display:none;' }}">
            <h3 style="text-transform: uppercase; letter-spacing: 2px; font-size: 1rem; margin-bottom: 15px;">Gallery</h3>
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
