<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $invitation->bride_name ?? 'Wedding' }} & {{ $invitation->groom_name ?? 'Invitation' }}</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Elegant serif fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&family=Montserrat:wght@300;400;500&family=Pinyon+Script&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #5A6D5C; /* Elegant muted green */
            --secondary: #D4AF37; /* Vintage gold */
            --bg-color: #FAF8F5; /* Off-white warm */
            --text-dark: #2C3531;
            --text-light: #F0EAD6;
            --font-heading: 'Cormorant Garamond', serif;
            --font-body: 'Montserrat', sans-serif;
            --font-accent: 'Pinyon Script', cursive;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body {
            font-family: var(--font-body);
            background-color: var(--bg-color);
            color: var(--text-dark);
            line-height: 1.6;
        }

        .section {
            padding: 5rem 2rem;
            text-align: center;
        }

        /* Hero Section */
        .hero {
            height: 100vh;
            min-height: 600px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            overflow: hidden;
            background: var(--text-dark);
        }

        .hero-img {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            object-fit: cover;
            opacity: 0.65;
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            color: var(--text-light);
            padding: 2rem;
        }

        .hero-subtitle {
            font-family: var(--font-body);
            text-transform: uppercase;
            letter-spacing: 4px;
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
        }

        .hero-names {
            font-family: var(--font-heading);
            font-size: 4.5rem;
            font-weight: 400;
            line-height: 1.1;
            margin-bottom: 1rem;
        }

        .hero-date {
            font-family: var(--font-body);
            font-size: 1.1rem;
            letter-spacing: 2px;
            margin-top: 1.5rem;
            border-top: 1px solid rgba(240, 234, 214, 0.4);
            border-bottom: 1px solid rgba(240, 234, 214, 0.4);
            padding: 0.8rem 0;
            display: inline-block;
        }

        /* Couple Section */
        .couple-section {
            background: #fff;
        }

        .section-title {
            font-family: var(--font-accent);
            font-size: 3.5rem;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        .section-subtitle {
            font-family: var(--font-body);
            text-transform: uppercase;
            letter-spacing: 3px;
            font-size: 0.85rem;
            color: var(--secondary);
            margin-bottom: 3rem;
        }

        .couple-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 3rem;
            max-width: 900px;
            margin: 0 auto;
        }

        .person {
            flex: 1;
            min-width: 300px;
        }

        .person-img-wrapper {
            width: 100%;
            aspect-ratio: 3/4;
            overflow: hidden;
            border-radius: 200px 200px 0 0;
            margin-bottom: 1.5rem;
            border: 1px solid rgba(90, 109, 92, 0.2);
            padding: 0.5rem;
        }

        .person-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 200px 200px 0 0;
        }

        .person-name {
            font-family: var(--font-heading);
            font-size: 2rem;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }

        /* Details Section */
        .details-section {
            background: var(--primary);
            color: var(--text-light);
        }

        .details-box {
            max-width: 600px;
            margin: 0 auto;
            padding: 3rem;
            border: 1px solid rgba(240, 234, 214, 0.3);
        }

        .detail-item {
            margin-bottom: 2rem;
        }
        .detail-item:last-child { margin-bottom: 0; }

        .detail-label {
            font-family: var(--font-accent);
            font-size: 2rem;
            color: var(--secondary);
            margin-bottom: 0.5rem;
        }

        .detail-value {
            font-size: 1.2rem;
            font-family: var(--font-heading);
        }

        .detail-sub {
            font-size: 0.9rem;
            opacity: 0.8;
            margin-top: 0.3rem;
        }

        /* Gallery Section */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 1.5rem;
            max-width: 1000px;
            margin: 0 auto;
        }

        .gallery-item {
            aspect-ratio: 1;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }

        .gallery-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .gallery-item:hover .gallery-img {
            transform: scale(1.05);
        }

        /* RSVP Section */
        .rsvp-section {
            background: #fff;
            padding: 6rem 2rem;
        }

        .rsvp-contact {
            font-family: var(--font-heading);
            font-size: 1.5rem;
            margin-top: 1.5rem;
            padding: 1rem 2rem;
            background: rgba(212, 175, 55, 0.1);
            display: inline-block;
            border-radius: 4px;
        }

        @media (max-width: 768px) {
            .hero-names { font-size: 3rem; }
            .couple-grid { flex-direction: column; }
            .details-box { padding: 2rem 1rem; }
        }
    </style>
</head>
<body>

    <!-- HERO SECTION -->
    <section class="hero">
        @if(isset($invitation) && $invitation->main_image_url)
            <img src="{{ $invitation->main_image_url }}" alt="Hero Image" class="hero-img">
        @elseif(isset($photo) && $photo)
            <img src="{{ $photo }}" alt="Hero Image" class="hero-img">
        @else
            <!-- Fallback elegant gradient if no image -->
            <div class="hero-img" style="background: linear-gradient(45deg, #2C3531, #5A6D5C);"></div>
        @endif

        <div class="hero-content">
            <p class="hero-subtitle">We are getting married</p>
            <h1 class="hero-names">{{ $invitation->bride_name ?? $details['bride_name'] ?? 'Bride' }} <br>&<br> {{ $invitation->groom_name ?? $details['groom_name'] ?? 'Groom' }}</h1>
            <div class="hero-date">
                {{ \Carbon\Carbon::parse($invitation->wedding_date ?? $details['wedding_date'] ?? now())->format('l, F j, Y') }}
            </div>
        </div>
    </section>

    <!-- MEET THE COUPLE SECTION -->
    <section class="section couple-section">
        <h2 class="section-title">The Couple</h2>
        <p class="section-subtitle">Two souls, one heart</p>

        <div class="couple-grid">
            <!-- Bride -->
            <div class="person">
                <div class="person-img-wrapper">
                    @if(isset($invitation) && $invitation->bride_image_url)
                        <img src="{{ $invitation->bride_image_url }}" alt="Bride" class="person-img">
                    @else
                        <div class="person-img" style="background:#eee; display:flex; align-items:center; justify-content:center; color:#999; font-style:italic;">Bride Photo</div>
                    @endif
                </div>
                <h3 class="person-name">{{ $invitation->bride_name ?? $details['bride_name'] ?? 'Bride' }}</h3>
            </div>

            <!-- Groom -->
            <div class="person">
                <div class="person-img-wrapper">
                    @if(isset($invitation) && $invitation->groom_image_url)
                        <img src="{{ $invitation->groom_image_url }}" alt="Groom" class="person-img">
                    @else
                        <div class="person-img" style="background:#eee; display:flex; align-items:center; justify-content:center; color:#999; font-style:italic;">Groom Photo</div>
                    @endif
                </div>
                <h3 class="person-name">{{ $invitation->groom_name ?? $details['groom_name'] ?? 'Groom' }}</h3>
            </div>
        </div>
    </section>

    <!-- DETAILS SECTION -->
    <section class="section details-section">
        <h2 class="section-title" style="color:var(--text-light)">When & Where</h2>
        <p class="section-subtitle" style="color:rgba(255,255,255,0.7); margin-bottom: 2rem;">Join us in celebration</p>

        <div class="details-box">
            <div class="detail-item">
                <div class="detail-label">The Date</div>
                <div class="detail-value">{{ \Carbon\Carbon::parse($invitation->wedding_date ?? $details['wedding_date'] ?? now())->format('l, F j, Y') }}</div>
                <div class="detail-sub">At {{ $invitation->time ?? $details['time'] ?? '12:00' }}</div>
            </div>
            
            <div class="detail-item">
                <div class="detail-label">The Venue</div>
                <div class="detail-value">{{ $invitation->venue_name ?? $details['venue_name'] ?? 'Venue Name' }}</div>
                <div class="detail-sub">{{ $invitation->venue_address ?? $details['venue_address'] ?? 'Venue Address' }}</div>
            </div>
        </div>
    </section>

    <!-- GALLERY SECTION (Only show if there are images) -->
    @if(isset($invitation) && $invitation->galleries && $invitation->galleries->count() > 0)
    <section class="section">
        <h2 class="section-title">Memories</h2>
        <p class="section-subtitle">Captured moments</p>
        
        <div class="gallery-grid">
            @foreach($invitation->galleries as $gallery)
                <div class="gallery-item">
                    <img src="{{ $gallery->image_url }}" alt="Gallery Image" class="gallery-img">
                </div>
            @endforeach
        </div>
    </section>
    @endif

    <!-- RSVP SECTION -->
    <section class="section rsvp-section">
        <h2 class="section-title">RSVP</h2>
        <p class="section-subtitle">We look forward to celebrating with you</p>
        
        <p style="font-family:var(--font-heading); font-size:1.3rem;">
            {{ $invitation->personal_message ?? $details['personal_message'] ?? 'Please confirm your attendance' }}
        </p>

        <div class="rsvp-contact">
            Contact: {{ $invitation->rsvp_contact ?? $details['rsvp_contact'] ?? 'N/A' }}
        </div>
    </section>

    <!-- VELVET VOWS FOOTER -->
    <footer style="text-align: center; padding: 3rem 1rem; background: var(--bg-color); border-top: 1px solid rgba(0,0,0,0.05); font-family: var(--font-body); font-size: 0.85rem; color: #888;">
        <p style="margin-bottom: 0.3rem;">Created with love using <a href="{{ url('/') }}" style="color: var(--secondary); font-weight: 600; text-decoration: none;">Velvet Vows</a></p>
        <p style="font-size: 0.75rem; opacity: 0.7;">Design your own beautiful digital invitation</p>
    </footer>

</body>
</html>
