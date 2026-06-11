<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $invitation->bride_name ?? $details['bride_name'] ?? 'Bride' }} & {{ $invitation->groom_name ?? $details['groom_name'] ?? 'Groom' }}</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&family=Montserrat:wght@300;400;500&family=Pinyon+Script&display=swap" rel="stylesheet">
    
    <style>
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            background: #FAF8F5;
            font-family: 'Montserrat', sans-serif;
            overflow-x: hidden;
        }
        
        /* The container ensures it behaves exactly like the mockup design */
        .inv-premium-vintage {
            width: 100%;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            text-align: center;
            position: relative;
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
        
        /* Groom photo placeholder handling */
        .pv-groom-placeholder {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #888;
            background-color: #f7f5f0;
            width: 100%;
            height: 100%;
            position: absolute;
            inset: 0;
            z-index: 1;
            transition: opacity 0.3s;
            border-radius: 50px 50px 0 0;
            border: 1px dashed rgba(90, 109, 92, 0.4);
            box-sizing: border-box;
        }
        .pv-groom-img-src[src]:not([src=""]) ~ .pv-groom-placeholder {
            opacity: 0;
            pointer-events: none;
        }
    </style>
</head>
<body>
    <div class="inv-premium-vintage">
        <!-- Hero Section (20% height) -->
        <div style="background-color:#5A6D5C; height:20vh; min-height: 180px; display:flex; align-items:center; justify-content:center; flex-direction:column; color:#F0EAD6; padding:1rem; position:relative; z-index:1;">
            <img class="hero-img pv-main-img-src" src="{{ $invitation->main_image_url ?? $photo ?? 'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?auto=format&fit=crop&w=800&q=80' }}" style="position:absolute; inset:0; width:100%; height:100%; object-fit:cover; z-index:-2;">
            <div style="position:absolute; inset:0; background:rgba(44,53,49,0.5); z-index:-1;"></div>

            
            <p style="font-family:'Montserrat',sans-serif; text-transform:uppercase; font-size:0.6rem; letter-spacing:2px; margin-bottom:0.8rem;">We are getting married</p>
            
            <p style="font-family:'Cormorant Garamond',serif; font-size:2.5rem; line-height:1; margin: 0;">
                <span data-preview="bride_name">{{ $invitation->bride_name ?? $details['bride_name'] ?? 'Bride' }}</span> 
                <br><span style="font-size: 1.5rem; color: #D4AF37;">&</span><br> 
                <span data-preview="groom_name">{{ $invitation->groom_name ?? $details['groom_name'] ?? 'Groom' }}</span>
            </p>
            
            <p data-preview="wedding_date" style="font-family:'Montserrat',sans-serif; font-size:0.75rem; letter-spacing:1px; margin-top:1rem; padding:0.4rem 0; border-top:1px solid rgba(240,234,214,0.4); border-bottom:1px solid rgba(240,234,214,0.4);">
                {{ \Carbon\Carbon::parse($invitation->wedding_date ?? $details['wedding_date'] ?? now())->format('F j, Y') }}
            </p>
        </div>

        <!-- Content Section -->
        <div style="padding:2.5rem 1rem; background:#fff; flex:1;">
            <p style="font-family:'Pinyon Script',cursive; font-size:2rem; color:#5A6D5C; margin-bottom: 1.5rem;">The Couple</p>
            
            <div style="display:flex; justify-content:center; gap:2rem; margin-bottom:2.5rem;">
                <div style="display:flex; flex-direction:column; align-items:center;">
                    <div style="width:100px; height:130px; border-radius:50px 50px 0 0; background-color:#eee; border:1px solid rgba(90, 109, 92, 0.2); padding: 3px; position:relative; overflow:hidden; margin-bottom: 0.8rem;">
                        <img class="person-img pv-bride-img-src" src="{{ !empty($invitation->bride_image_url) ? $invitation->bride_image_url : (!empty($details['bride_image_url']) ? $details['bride_image_url'] : 'https://images.unsplash.com/photo-1541250848049-b4f7141fca3f?auto=format&fit=crop&w=400&q=80') }}" style="width:100%; height:100%; object-fit:cover; border-radius: 50px 50px 0 0; opacity:0; transition:opacity 0.3s;" onload="this.style.opacity=1" onerror="this.style.opacity=0">
                    </div>
                    <p data-preview="bride_name" style="font-family:'Cormorant Garamond',serif; font-size:1.2rem; color:#2C3531; font-weight:600; margin:0;">
                        {{ $invitation->bride_name ?? $details['bride_name'] ?? 'Bride' }}
                    </p>
                </div>
                
                <div style="display:flex; flex-direction:column; align-items:center;">
                    @php
                        $groomImg = !empty($invitation->groom_image_url) ? $invitation->groom_image_url : (!empty($details['groom_image_url']) ? $details['groom_image_url'] : '');
                    @endphp
                    <div style="width:100px; height:130px; border-radius:50px 50px 0 0; background-color:#eee; border:1px solid rgba(90, 109, 92, 0.2); padding: 3px; position:relative; overflow:hidden; margin-bottom: 0.8rem;">
                        <img class="person-img pv-groom-img-src" src="{{ $groomImg }}" style="width:100%; height:100%; object-fit:cover; border-radius: 50px 50px 0 0; opacity:{{ $groomImg ? 1 : 0 }}; transition:opacity 0.3s; position: absolute; inset: 0;" onload="this.style.opacity=1" onerror="this.style.opacity=0">
                        <div class="pv-groom-placeholder"></div>
                    </div>
                    <p data-preview="groom_name" style="font-family:'Cormorant Garamond',serif; font-size:1.2rem; color:#2C3531; font-weight:600; margin:0;">
                        {{ $invitation->groom_name ?? $details['groom_name'] ?? 'Groom' }}
                    </p>
                </div>
            </div>

            <!-- When & Where -->
            <div style="background:#5A6D5C; color:#F0EAD6; padding: 2rem 1.5rem; margin: 1.5rem auto; max-width: 600px;">
                <p style="font-family:'Pinyon Script',cursive; font-size:1.8rem; color:#F0EAD6; margin-bottom: 0.5rem; margin-top:0;">When & Where</p>
                <div style="border: 1px solid rgba(240, 234, 214, 0.3); padding: 1.5rem; margin-top: 1rem;">
                    <p style="font-family:'Pinyon Script',cursive; font-size:1.3rem; color:#D4AF37; margin-bottom:0.5rem; margin-top:0;">The Venue</p>
                    <p data-preview="venue_name" style="font-family:'Cormorant Garamond',serif; font-size:1.4rem; font-weight:600; margin-bottom:0.5rem; margin-top:0;">{{ $invitation->venue_name ?? $details['venue_name'] ?? 'The Grand Palace' }}</p>
                    <p data-preview="venue_address" style="font-family:'Montserrat',sans-serif; font-size:0.8rem; opacity:0.9; margin-bottom:0.8rem; margin-top:0;">{{ $invitation->venue_address ?? $details['venue_address'] ?? '123 Royal Road, City' }}</p>
                    @php
                        $locationUrl = $invitation->location_url ?? $details['location_url'] ?? '';
                        $hasValidLocationUrl = !empty($locationUrl) && filter_var($locationUrl, FILTER_VALIDATE_URL);
                    @endphp
                    <p style="font-family:'Montserrat',sans-serif; font-size:0.8rem; opacity:0.9; margin: 0;">At <span data-preview="time">{{ $invitation->time ?? $details['time'] ?? '7:00 PM' }}</span></p>
                    <div style="margin-top: 0.85rem; width: 100%; max-width: 420px; margin-left: auto; margin-right: auto;">
                        <div style="display:flex; flex-wrap:wrap; align-items:center; justify-content:space-between; gap:0.65rem; padding: 0.9rem 1rem; border-radius: 20px; border: 1px solid rgba(240,234,214,0.18); background: rgba(240,234,214,0.14); backdrop-filter: blur(5px);">
                            <div style="flex:1 1 200px; min-width: 200px; text-align:left;">
                                <p style="font-family:'Pinyon Script',cursive; font-size:0.92rem; letter-spacing:0.12em; text-transform:none; color:#E8D8B7; margin:0 0 0.3rem; opacity:0.92;">Venue directions</p>
                                <p style="font-family:'Cormorant Garamond',serif; font-size:1rem; color:#F0EAD6; opacity:0.96; line-height:1.5; margin:0; font-style:italic; letter-spacing:0.03em;">Open the location in Maps to find the venue with ease.</p>
                            </div>
                            <a class="pv-location-url" href="{{ $hasValidLocationUrl ? $locationUrl : 'javascript:void(0)' }}" target="_blank" rel="noopener noreferrer" style="display: {{ $hasValidLocationUrl ? 'inline-flex' : 'none' }}; align-items:center; justify-content:center; gap:0.45rem; padding:0.8rem 1rem; border-radius:999px; background: rgba(212,175,55,0.96); color: #172012; text-decoration:none; font-family:'Pinyon Script',cursive; font-size:1rem; font-weight:600; letter-spacing:0.04em; box-shadow:0 12px 24px rgba(0,0,0,0.14); border:1px solid rgba(255,255,255,0.35);">
                                View on map
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- GALLERY SECTION -->
            <div class="gallery-section" style="{{ (isset($invitation) && $invitation->galleries && $invitation->galleries->count() > 0) ? 'display:block; margin: 3rem auto; max-width: 800px;' : 'display:none;' }}">
                <p style="font-family:'Pinyon Script',cursive; font-size:2.2rem; color:#5A6D5C; margin-bottom:0.5rem; margin-top:0;">Memories</p>
                <p style="font-family:'Montserrat',sans-serif; text-transform:uppercase; letter-spacing:2px; font-size:0.7rem; color:#D4AF37; margin-bottom: 2rem; margin-top:0;">Captured moments</p>
                
                <div class="gallery-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 0.5rem;">
                    @if(isset($invitation) && $invitation->galleries)
                        @foreach($invitation->galleries as $gallery)
                            <div class="gallery-item" style="aspect-ratio: 1; border-radius: 4px; overflow: hidden;">
                                <img src="{{ $gallery->image_url }}" class="gallery-img" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <!-- RSVP SECTION -->
            <div style="padding: 3rem 1rem 1rem;">
                <p style="font-family:'Pinyon Script',cursive; font-size:2.5rem; color:#5A6D5C; margin-bottom:0.5rem; margin-top:0;">RSVP</p>
                <p style="font-family:'Montserrat',sans-serif; text-transform:uppercase; letter-spacing:2px; font-size:0.7rem; color:#D4AF37; margin-bottom: 2rem; margin-top:0;">We look forward to celebrating with you</p>
                
                <p data-preview="personal_message" style="font-family:'Cormorant Garamond',serif; font-size:1.2rem; color:#2C3531; margin-bottom: 2rem; margin-top:0;">
                    {{ $invitation->personal_message ?? $details['personal_message'] ?? 'Please confirm your attendance' }}
                </p>

                <div style="background:rgba(212, 175, 55, 0.1); padding: 1rem 2rem; display:inline-block; border-radius:4px;">
                    <p style="font-family:'Cormorant Garamond',serif; font-size:1.1rem; color:#2C3531; margin:0;">
                        Contact: <span data-preview="rsvp_contact">{{ $invitation->rsvp_contact ?? $details['rsvp_contact'] ?? 'Your Contact' }}</span>
                    </p>
                </div>
            </div>

            <!-- VELVET VOWS FOOTER -->
            <div style="margin-top: 4rem; text-align: center; font-family: 'Inter', sans-serif; font-size: 0.75rem; color: #888; padding-bottom: 2rem; border-top: 1px solid rgba(0,0,0,0.05); padding-top: 2rem;">
                <p style="margin-bottom: 0.3rem; margin-top:0;">Created with love using <span style="color: #B89047; font-weight: 600;">Velvet Vows</span></p>
                <p style="font-size: 0.65rem; opacity: 0.7; margin-top:0;">Design your own beautiful digital invitation</p>
            </div>
        </div>
    </div>
</body>
</html>
