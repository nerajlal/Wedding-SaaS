<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $invitation->bride_name ?? 'Bride' }} & {{ $invitation->groom_name ?? 'Groom' }}</title>
    <style>
        body { margin: 0; padding: 0; font-family: 'Georgia', serif; background-color: #fdfbf7; color: #333; }
        .theme-wrapper { min-height: 100vh; display: flex; flex-direction: column; text-align: center; }
        .hero { height: 50vh; position: relative; }
        .hero::after { content: ''; position: absolute; inset: 0; background: rgba(0,0,0,0.2); }
        .hero-img { width: 100%; height: 100%; object-fit: cover; }
        .content { padding: 4rem 2rem; max-width: 800px; margin: 0 auto; flex: 1; }
        .names { font-size: 3.5rem; color: #c4a47c; margin-bottom: 2rem; font-style: italic; }
        .names h1 { margin: 0; font-weight: normal; font-size: inherit; display: inline; }
        .names span { display: inline-block; margin: 0 1rem; color: #555; font-size: 2rem; }
        .message { font-size: 1.2rem; line-height: 1.8; margin-bottom: 3rem; }
        .details { font-size: 1.1rem; line-height: 1.6; margin-bottom: 3rem; border-top: 1px solid #e0d5c1; border-bottom: 1px solid #e0d5c1; padding: 2rem 0; }
        .details strong { color: #c4a47c; display: block; margin-top: 1rem; }
        .gallery-section { padding: 4rem 2rem; background-color: #fff; }
        .gallery-section h2 { font-size: 2rem; color: #c4a47c; margin-bottom: 2rem; font-style: italic; }
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
        <!-- Hero Image -->
        <div class="hero">
            <img class="hero-img pv-main-img-src" src="{{ $invitation->main_image_url ?? '' }}" alt="Hero Image">
        </div>


        <div class="content">
            <p>You are joyfully invited to the wedding of</p>
            
            <div class="names">
                <h1 data-preview="bride_name">{{ $invitation->bride_name ?? $details['bride_name'] ?? 'Bride' }}</h1>
                <span>&</span>
                <h1 data-preview="groom_name">{{ $invitation->groom_name ?? $details['groom_name'] ?? 'Groom' }}</h1>
            </div>

            <p class="message" data-preview="personal_message">{{ $invitation->personal_message ?? $details['personal_message'] ?? 'We cant wait to celebrate with you!' }}</p>

            <div class="details">
                <strong>When</strong>
                <span data-preview="wedding_date">{{ \Carbon\Carbon::parse($invitation->wedding_date ?? $details['wedding_date'] ?? now())->format('F j, Y') }}</span> 
                at <span data-preview="time">{{ $invitation->time ?? $details['time'] ?? '12:00 PM' }}</span>
                
                <strong>Where</strong>
                <span data-preview="venue_name">{{ $invitation->venue_name ?? $details['venue_name'] ?? 'The Grand Venue' }}</span><br>
                <span data-preview="venue_address">{{ $invitation->venue_address ?? $details['venue_address'] ?? '123 Wedding Lane' }}</span>
                @php
                    $locationUrl = $invitation->location_url ?? $details['location_url'] ?? '';
                    $hasValidLocationUrl = !empty($locationUrl) && filter_var($locationUrl, FILTER_VALIDATE_URL);
                @endphp
                <div style="margin-top: 1.5rem; width: 100%; max-width: 480px; margin-left: auto; margin-right: auto;">
                    <div style="display:flex; flex-wrap:wrap; align-items:center; justify-content:space-between; gap:0.8rem; padding: 1.2rem; border-radius: 12px; border: 1px solid rgba(196, 164, 124, 0.25); background: rgba(196, 164, 124, 0.05); text-align: left;">
                        <div style="flex:1 1 200px; min-width: 200px;">
                            <p style="font-family:'Georgia',serif; font-style:italic; font-size:1.1rem; color:#c4a47c; margin:0 0 0.3rem; font-weight: bold;">Venue directions</p>
                            <p style="font-family:'Georgia',serif; font-size:0.85rem; color:#666; line-height:1.4; margin:0;">Open the location in Maps to find the venue with ease.</p>
                        </div>
                        <a class="pv-location-url" href="{{ $hasValidLocationUrl ? $locationUrl : 'javascript:void(0)' }}" target="_blank" rel="noopener noreferrer" style="display: {{ $hasValidLocationUrl ? 'inline-flex' : 'none' }}; align-items:center; justify-content:center; gap:0.45rem; padding:0.7rem 1.2rem; border-radius:8px; background: #c4a47c; color: #fff; text-decoration:none; font-family:'Inter', sans-serif; font-size:0.8rem; font-weight:600; letter-spacing:0.5px; box-shadow: 0 4px 12px rgba(0,0,0,0.15);">
                            View on map
                        </a>
                    </div>
                </div>

                
                <strong>RSVP</strong>
                <span data-preview="rsvp_contact">{{ $invitation->rsvp_contact ?? $details['rsvp_contact'] ?? 'rsvp@example.com' }}</span>
            </div>
        </div>

        <!-- Gallery -->
        <div class="gallery-section" style="{{ (isset($invitation) && $invitation->galleries && $invitation->galleries->count() > 0) ? '' : 'display:none;' }}">
            <h2>Beautiful Memories</h2>
            <div class="gallery-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem; max-width: 1000px; margin: 0 auto;">
                @if(isset($invitation) && $invitation->galleries)
                    @foreach($invitation->galleries as $gallery)
                        <div class="gallery-item" style="aspect-ratio: 1;">
                            <img src="{{ $gallery->image_url }}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 4px;">
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</body>
</html>
