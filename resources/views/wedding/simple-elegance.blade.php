<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $invitation->bride_name ?? $details['bride_name'] ?? 'Bride' }} & {{ $invitation->groom_name ?? $details['groom_name'] ?? 'Groom' }}</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --bg-color: #070606;
            --text-main:  #B89047;;
            --text-light: #777777;
            --accent: #ebf0e2;
            --font-main: 'Inter', sans-serif;
            --gold: #B89047;
        }
        
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            min-height: 100vh;
            background: radial-gradient(ellipse at top, #faf8f5, #eae3d8),
                        url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='80' height='80' viewBox='0 0 80 80'%3E%3Cg fill='%23b89047' fill-opacity='0.03'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7z'/%3E%3C/g%3E%3C/svg%3E");
            background-attachment: fixed;
            font-family: var(--font-main);
            color: var(--text-main);
            display: flex;
            justify-content: center;
        }
        
        .template-wrapper {
            width: 100%;
            max-width: 600px;
            background: var(--bg-color);
            box-shadow: 0 25px 60px rgba(42, 36, 30, 0.12);
            border-left: 2px solid rgba(184, 144, 71, 0.15);
            border-right: 2px solid rgba(184, 144, 71, 0.15);
            padding-bottom: 60px;
            position: relative;
        }

        .hero-img {
            width: 100%;
            height: 450px;
            object-fit: cover;
        }

        .content-container {
            padding: 40px 30px;
            text-align: center;
        }

        .names {
            font-size: 2.5rem;
            font-weight: 300;
            letter-spacing: -1px;
            margin-bottom: 5px;
            color: var(--text-main);
        }

        .and-divider {
            font-size: 1.2rem;
            color: var(--text-light);
            margin: 10px 0;
            font-weight: 300;
        }

        .divider {
            width: 40px;
            height: 2px;
            background: var(--text-main);
            margin: 30px auto;
        }

        .date {
            font-size: 1.2rem;
            font-weight: 500;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .time {
            font-size: 1rem;
            color: var(--text-light);
            margin-bottom: 30px;
        }

        .venue-label {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--text-light);
            margin-bottom: 5px;
        }

        .venue-name {
            font-size: 1.3rem;
            font-weight: 500;
            margin-bottom: 5px;
        }

        .venue-address {
            font-size: 1rem;
            color: var(--text-light);
            margin-bottom: 40px;
        }

        .gallery-section .venue-label {
            color: var(--gold, #B89047);
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .message {
            font-size: 1.1rem;
            line-height: 1.6;
            font-weight: 300;
            color: var(--text-main);
            margin-bottom: 40px;
            padding: 0 20px;
        }

        .rsvp-box {
            background: var(--accent);
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
        }

        .rsvp-label {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .rsvp-contact {
            font-size: 1.1rem;
        }

        /* Hide required hooks that don't fit simple design perfectly but are needed for the platform */
        .hidden { display: none; }
        /* Gallery */
        .gallery-item {
            aspect-ratio: 1/1;
            overflow: hidden;
            border-radius: 4px;
            width: 100%;
            
        }

        /* Couple Section styling */
        .couple-section {
            display: flex;
            justify-content: center;
            gap: 40px;
            margin: 40px auto;
            max-width: 440px;
        }

        .couple-portrait {
            flex: 1;
            text-align: center;
        }

        .portrait-frame {
            position: relative;
            width: 100%;
            aspect-ratio: 1/1;
            border-radius: 50%;
            overflow: hidden;
            border: 2px solid rgba(184, 144, 71, 0.2);
            margin-bottom: 12px;
            padding: 6px;
            background: #fff;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
            transition: all 0.4s ease;
        }

        .portrait-frame:hover {
            border-color: var(--gold, #B89047);
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(184, 144, 71, 0.15);
        }

        .portrait-frame img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .portrait-name {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.4rem;
            font-weight: 600;
            font-style: italic;
            color: var(--text-main);
            margin-bottom: 2px;
        }

        .portrait-role {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: var(--gold, #B89047);
            font-weight: 500;
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
        
        <img class="hero-img pv-main-img-src" src="{{ $invitation->main_image_url ?? 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=800&q=80' }}" alt="Main Photo">
        
        <div class="content-container">
            
            <!-- Ornamental Divider -->
            <div style="margin-bottom: 2rem; display: flex; justify-content: center;">
                <svg width="80" height="24" viewBox="0 0 80 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="opacity: 0.85;">
                    <path d="M40 2C35 8.5 22 12 5 12" stroke="var(--gold, #B89047)" stroke-width="1.5" stroke-linecap="round"/>
                    <path d="M40 2C45 8.5 58 12 75 12" stroke="var(--gold, #B89047)" stroke-width="1.5" stroke-linecap="round"/>
                    <circle cx="40" cy="12" r="4" fill="var(--gold, #B89047)"/>
                    <circle cx="26" cy="12" r="2.5" fill="var(--gold, #B89047)" opacity="0.6"/>
                    <circle cx="54" cy="12" r="2.5" fill="var(--gold, #B89047)" opacity="0.6"/>
                    <circle cx="14" cy="12" r="1.5" fill="var(--gold, #B89047)" opacity="0.4"/>
                    <circle cx="66" cy="12" r="1.5" fill="var(--gold, #B89047)" opacity="0.4"/>
                    <path d="M40 22C35 15.5 22 12 5 12" stroke="var(--gold, #B89047)" stroke-width="1.5" stroke-linecap="round"/>
                    <path d="M40 22C45 15.5 58 12 75 12" stroke="var(--gold, #B89047)" stroke-width="1.5" stroke-linecap="round"/>
                </svg>
            </div>
            
            <div class="names" data-preview="bride_name">{{ $invitation->bride_name ?? $details['bride_name'] ?? 'Sarah' }}</div>

            <div class="and-divider">&</div>
            <div class="names" data-preview="groom_name">{{ $invitation->groom_name ?? $details['groom_name'] ?? 'James' }}</div>
            
            <div class="divider"></div>
            
            <div class="date" data-preview="wedding_date">
                {{ \Carbon\Carbon::parse($invitation->wedding_date ?? $details['wedding_date'] ?? now())->format('F j, Y') }}
            </div>
            <div class="time" data-preview="time">{{ $invitation->time ?? $details['time'] ?? '4:00 PM' }}</div>
            
            <div class="message" data-preview="personal_message">
                {!! nl2br(e($invitation->personal_message ?? $details['personal_message'] ?? "Please join us to celebrate our wedding day.")) !!}
            </div>

            <!-- Couple Portraits -->
            <div class="couple-section">
                <div class="couple-portrait">
                    <div class="portrait-frame">
                        <img class="pv-bride-img-src" src="{{ !empty($invitation->bride_image_url) ? $invitation->bride_image_url : (!empty($details['bride_image_url']) ? $details['bride_image_url'] : 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=400&q=80') }}" alt="Bride">
                    </div>
                    <div class="portrait-name" data-preview="bride_name">{{ $invitation->bride_name ?? $details['bride_name'] ?? 'Sarah' }}</div>
                    <div class="portrait-role">The Bride</div>
                </div>
                <div class="couple-portrait">
                    <div class="portrait-frame">
                        <img class="pv-groom-img-src" src="{{ !empty($invitation->groom_image_url) ? $invitation->groom_image_url : (!empty($details['groom_image_url']) ? $details['groom_image_url'] : 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?auto=format&fit=crop&w=400&q=80') }}" alt="Groom">
                    </div>
                    <div class="portrait-name" data-preview="groom_name">{{ $invitation->groom_name ?? $details['groom_name'] ?? 'James' }}</div>
                    <div class="portrait-role">The Groom</div>
                </div>
            </div>
            
            <div class="venue-label">Location</div>
            <div class="venue-name" data-preview="venue_name">{{ $invitation->venue_name ?? $details['venue_name'] ?? 'City Hall' }}</div>
            <div class="venue-address" data-preview="venue_address">{{ $invitation->venue_address ?? $details['venue_address'] ?? '100 Main Street' }}</div>
                @php
                    $locationUrl = $invitation->location_url ?? $details['location_url'] ?? '';
                    $hasValidLocationUrl = !empty($locationUrl) && filter_var($locationUrl, FILTER_VALIDATE_URL);
                @endphp
                <div style="margin-top: 1.5rem; width: 100%; max-width: 440px; margin-left: auto; margin-right: auto;">
                    <div style="display:flex; flex-wrap:wrap; align-items:center; justify-content:space-between; gap:0.8rem; padding: 1rem 1.2rem; border-radius: 12px; border: 1px solid rgba(184, 144, 71, 0.2); background: rgba(184, 144, 71, 0.05); text-align: left;">
                        <div style="flex:1 1 180px; min-width: 180px;">
                            <p style="font-family:'Inter',sans-serif; font-weight:600; font-size:0.75rem; letter-spacing:1px; text-transform:uppercase; color:var(--gold, #B89047); margin:0 0 0.3rem;">Venue directions</p>
                            <p style="font-family:'Inter',sans-serif; font-size:0.75rem; color:#777; line-height:1.4; margin:0;">Open the location in Maps to find the venue with ease.</p>
                        </div>
                        <a class="pv-location-url" href="{{ $hasValidLocationUrl ? $locationUrl : 'javascript:void(0)' }}" target="_blank" rel="noopener noreferrer" style="display: {{ $hasValidLocationUrl ? 'inline-flex' : 'none' }}; align-items:center; justify-content:center; gap:0.45rem; padding:0.7rem 1.1rem; border-radius:8px; background: var(--gold, #B89047); color: #fff; text-decoration:none; font-family:'Inter', sans-serif; font-size:0.8rem; font-weight:600; letter-spacing:0.5px; box-shadow: 0 4px 12px rgba(184,144,71,0.15);">
                            View on map
                        </a>
                    </div>
                </div>

            
            <div class="rsvp-box">
                <div class="rsvp-label">RSVP</div>
                <div class="rsvp-contact" data-preview="rsvp_contact">{{ $invitation->rsvp_contact ?? $details['rsvp_contact'] ?? 'reply@wedding.com' }}</div>
            </div>
            
        </div>

        <!-- Hidden mandatory image hooks are no longer needed here as they are visible above -->
        
        <!-- Gallery -->
        @php
            $hasGalleries = isset($invitation) && $invitation->galleries && $invitation->galleries->count() > 0;
            $showGallery = $hasGalleries || !isset($invitation);
        @endphp
        <div class="gallery-section" style="{{ $showGallery ? 'margin-top: 20px; padding: 0 30px;' : 'display:none;' }}">
            <div class="venue-label" style="margin-bottom: 15px; text-align: center;">Captured Memories</div>
            <div class="gallery-grid" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px;">
                @if($hasGalleries)
                    @foreach($invitation->galleries as $gallery)
                        <div class="gallery-item">
                            <img src="{{ $gallery->image_url }}" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                    @endforeach
                @else
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=400&q=80" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=400&q=80" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1530103043960-ef38714abb15?auto=format&fit=crop&w=400&q=80" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?auto=format&fit=crop&w=400&q=80" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                @endif
            </div>
        </div>
        
    </div>
</body>
</html>
