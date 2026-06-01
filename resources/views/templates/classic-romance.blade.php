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
