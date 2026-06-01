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
            --bg-color: #ffffff;
            --text-main: #333333;
            --text-light: #777777;
            --accent: #e2e8f0;
            --font-main: 'Inter', sans-serif;
        }
        
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            min-height: 100vh;
            background: #f8fafc;
            font-family: var(--font-main);
            color: var(--text-main);
            display: flex;
            justify-content: center;
        }
        
        .template-wrapper {
            width: 100%;
            max-width: 600px;
            background: var(--bg-color);
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            padding-bottom: 60px;
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
    </style>
</head>
<body>
    <div class="template-wrapper">
        
        <img class="hero-img pv-main-img-src" src="{{ $invitation->main_image_url ?? 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=800&q=80' }}" alt="Main Photo">
        
        <div class="content-container">
            
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
            
            <div class="venue-label">Location</div>
            <div class="venue-name" data-preview="venue_name">{{ $invitation->venue_name ?? $details['venue_name'] ?? 'City Hall' }}</div>
            <div class="venue-address" data-preview="venue_address">{{ $invitation->venue_address ?? $details['venue_address'] ?? '100 Main Street' }}</div>
            
            <div class="rsvp-box">
                <div class="rsvp-label">RSVP</div>
                <div class="rsvp-contact" data-preview="rsvp_contact">{{ $invitation->rsvp_contact ?? $details['rsvp_contact'] ?? 'reply@wedding.com' }}</div>
            </div>
            
        </div>

        <!-- Hidden mandatory image hooks to avoid breaking the platform's standard saving flow -->
        <div class="hidden">
            <img class="pv-bride-img-src" src="{{ $invitation->bride_image_url ?? '' }}">
            <img class="pv-groom-img-src" src="{{ $invitation->groom_image_url ?? '' }}">
            
            <div class="gallery-section" style="display:none;">
                <div class="gallery-grid"></div>
            </div>
        </div>
        
    </div>
</body>
</html>
