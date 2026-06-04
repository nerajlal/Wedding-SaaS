<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $invitation->bride_name ?? $details['bride_name'] ?? 'Bride' }} & {{ $invitation->groom_name ?? $details['groom_name'] ?? 'Groom' }}</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Playball&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --text-color: #2c3e2c; /* Dark olive green */
            --accent-color: #8c9b74;
            --gold-color: #c9b183;
        }
        
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            min-height: 100vh;
            font-family: 'Montserrat', sans-serif;
            color: var(--text-color);
            overflow-x: hidden;
            /* Geometric background using an SVG pattern */
            background-color: #f4f5e7;
            background-image: url("data:image/svg+xml,%3Csvg width='400' height='400' viewBox='0 0 400 400' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath fill='%23e0e5d3' d='M0 0h400v400H0z'/%3E%3Cpath fill='%23d0d8bb' d='M200 0l200 200-200 200L0 200z'/%3E%3Cpath fill='%23eceed6' d='M200 200l200-200v400z'/%3E%3Cpath fill='%23ffffff' fill-opacity='0.4' d='M0 200l200-200h-200z'/%3E%3Cpath fill='%23b8c49a' fill-opacity='0.4' d='M200 400l200-200v200z'/%3E%3C/svg%3E");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        
        .template-wrapper {
            max-width: 600px;
            margin: 0 auto;
            position: relative;
            padding: 40px 20px 80px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        /* Polaroid Photo Styles */
        .polaroid {
            background: #fff;
            padding: 10px 10px 25px 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
            border-radius: 2px;
            position: relative;
            z-index: 2;
        }
        
        .polaroid img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }
        
        .polaroid-1 {
            width: 220px;
            height: 220px;
            transform: rotate(-8deg);
            margin-right: auto;
            margin-left: 10px;
            margin-bottom: -50px;
        }
        
        .polaroid-2 {
            width: 180px;
            height: 180px;
            transform: rotate(12deg);
            margin-left: auto;
            margin-right: 10px;
            margin-top: -120px;
            z-index: 1;
        }
        
        .polaroid-3 {
            width: 280px;
            height: 280px;
            transform: rotate(3deg);
            margin: 20px auto 0;
            z-index: 3;
        }
        
        /* Text Section */
        .text-glass-box {
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(8px);
            padding: 40px 30px;
            width: 100%;
            max-width: 400px;
            text-align: center;
            margin-top: -20px;
            position: relative;
            z-index: 2;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.4);
        }
        
        .eyebrow {
            font-size: 0.85rem;
            letter-spacing: 4px;
            text-transform: uppercase;
            font-weight: 600;
            color: var(--gold-color);
            margin-bottom: 20px;
        }
        
        .names-title {
            font-family: 'Playball', cursive;
            font-size: 3.5rem;
            line-height: 1.1;
            margin: 0;
            color: var(--text-color);
            font-weight: 400;
        }
        
        .ampersand {
            font-family: 'Montserrat', sans-serif;
            font-size: 1rem;
            color: var(--gold-color);
            margin: 5px 0;
            display: block;
        }
        
        .divider {
            width: 50px;
            height: 1px;
            background-color: var(--gold-color);
            margin: 20px auto;
        }
        
        .date-text {
            font-size: 0.95rem;
            letter-spacing: 2px;
            font-weight: 600;
            color: var(--text-color);
            text-transform: uppercase;
        }
        
        .details-box {
            margin-top: 40px;
            text-align: center;
            background: #fff;
            padding: 30px;
            border-radius: 4px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            width: 100%;
            max-width: 400px;
            position: relative;
            z-index: 2;
        }
        
        .detail-label {
            font-size: 0.7rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--gold-color);
            margin-bottom: 5px;
            display: block;
            font-weight: 600;
        }
        
        .detail-value {
            font-size: 1rem;
            margin-bottom: 20px;
        }
        
        .gallery-section {
            margin-top: 50px;
            width: 100%;
            max-width: 450px;
            position: relative;
            z-index: 2;
        }
        
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }
        
        .gallery-item {
            background: #fff;
            padding: 8px 8px 20px 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .gallery-item img {
            width: 100%;
            aspect-ratio: 1;
            object-fit: cover;
            display: block;
        }
        
        /* Alternate rotations for gallery items to maintain polaroid feel */
        .gallery-item:nth-child(even) { transform: rotate(2deg); }
        .gallery-item:nth-child(odd) { transform: rotate(-2deg); }
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
        
        <!-- Top Photos -->
        <div class="polaroid polaroid-1">
            <img class="pv-bride-img-src" src="{{ $invitation->bride_image_url ?? '' }}" alt="Bride">
        </div>
        
        <div class="polaroid polaroid-2">
            <img class="pv-groom-img-src" src="{{ $invitation->groom_image_url ?? '' }}" alt="Groom">
        </div>
        
        <!-- Center Text Box -->
        <div class="text-glass-box">
            <div class="eyebrow">Wedding</div>
            <div class="names-title" data-preview="bride_name">{{ $invitation->bride_name ?? $details['bride_name'] ?? 'Diana' }}</div>
            <div class="ampersand">&</div>
            <div class="names-title" data-preview="groom_name">{{ $invitation->groom_name ?? $details['groom_name'] ?? 'Pascal' }}</div>
            
            <div class="divider"></div>
            
            <div class="date-text" data-preview="wedding_date">
                {{ \Carbon\Carbon::parse($invitation->wedding_date ?? $details['wedding_date'] ?? now())->format('d F, Y') }}
            </div>
            
            <div style="margin-top: 10px; font-size: 0.85rem;" data-preview="time">
                {{ $invitation->time ?? $details['time'] ?? '12:00 PM' }}
            </div>
        </div>
        
        <!-- Bottom Main Photo -->
        <div class="polaroid polaroid-3">
            <img class="pv-main-img-src" src="{{ $invitation->main_image_url ?? '' }}" alt="Couple">
        </div>
        
        <!-- Details Section -->
        <div class="details-box">
            <span class="detail-label">The Venue</span>
            <div class="detail-value">
                <div data-preview="venue_name">{{ $invitation->venue_name ?? $details['venue_name'] ?? 'The Grand Estate' }}</div>
                <div data-preview="venue_address" style="font-size: 0.85rem; color: #666; margin-top: 4px;">
                    {{ $invitation->venue_address ?? $details['venue_address'] ?? '123 Wedding Lane, Love City' }}
                </div>
            </div>
            
            <span class="detail-label">Message</span>
            <div class="detail-value" style="font-size: 0.9rem; font-style: italic; line-height: 1.6;" data-preview="personal_message">
                "{{ $invitation->personal_message ?? $details['personal_message'] ?? 'A successful marriage requires falling in love many times, always with the same person.' }}"
            </div>
            
            <span class="detail-label">RSVP By</span>
            <div class="detail-value" data-preview="rsvp_contact" style="margin-bottom: 0;">
                {{ $invitation->rsvp_contact ?? $details['rsvp_contact'] ?? 'Contact us at +1 234 567 890' }}
            </div>
        </div>
        
        <!-- Gallery Section -->
        <div class="gallery-section" style="{{ (isset($invitation) && $invitation->galleries && $invitation->galleries->count() > 0) ? '' : 'display:none;' }}">
            <div style="text-align: center; margin-bottom: 20px;">
                <div class="eyebrow">Memories</div>
            </div>
            <div class="gallery-grid">
                @if(isset($invitation) && $invitation->galleries)
                    @foreach($invitation->galleries as $gallery)
                        <div class="gallery-item polaroid-style">
                            <img src="{{ $gallery->image_url }}" alt="Gallery">
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        
    </div>
</body>
</html>
