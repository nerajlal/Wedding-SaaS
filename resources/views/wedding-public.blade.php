<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $details['bride_name'] ?? 'Wedding' }} & {{ $details['groom_name'] ?? 'Invitation' }}</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Great+Vibes&family=Inter:wght@400;500;600;700&family=Cinzel:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            background: #F4ECE1;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
        }

        /* ────────────────────────────────────────────────────
           Invitation styles
           ──────────────────────────────────────────────────── */
        
        .invitation-container {
            width: 100%;
            max-width: 480px;
            box-shadow: 0 40px 100px rgba(0,0,0,0.15);
            border-radius: 16px;
        }

        /* Royal Scroll */
        .inv-royal {
            background: #1A1A1A;
            border: 2px dashed #B89047;
            border-radius: 16px; padding: 3rem 2rem;
            text-align: center; font-family: 'Playfair Display', serif; color: #E4D1A6;
        }
        .inv-royal-small { font-size: .85rem; text-transform: uppercase; letter-spacing: 4px; color: #B89047; margin-bottom: .8rem; font-style: italic; }
        .inv-royal-names { font-size: 2.4rem; font-weight: 700; color: #FFFDF9; line-height: 1.15; }
        .inv-royal-weds  { font-size: 1.2rem; font-style: italic; color: #B89047; margin: .8rem 0; }
        .inv-royal-divider { width: 70%; height: 1px; background: linear-gradient(90deg,transparent,#B89047,transparent); margin: 1.5rem auto; }
        .inv-royal-detail { font-size: 1rem; color: #B89047; letter-spacing: 1.5px; }
        .inv-royal-venue  { font-size: 1.2rem; font-weight: 600; color: #FFFDF9; margin-top: .6rem; }
        .inv-royal-addr   { font-size: .9rem; color: #857B72; margin-top: .4rem; }
        .inv-royal-rsvp   { font-size: .9rem; color: rgba(197,155,39,.8); margin-top: 1.2rem; }
        .inv-royal-msg    { font-size: .95rem; color: #B89047; font-style: italic; margin-top: 1.2rem; }

        /* Golden Minimalist */
        .inv-minimalist {
            background: #fff; border: 1px solid #E4D1A6; border-radius: 16px;
            padding: 3rem 2rem; text-align: center;
            font-family: 'Playfair Display', serif; color: #1A1A1A;
        }
        .inv-min-mono  { font-size: 1rem; font-weight: 700; color: #B89047; letter-spacing: 3px; text-transform: uppercase; margin-bottom: .8rem; }
        .inv-min-sub   { font-size: .8rem; text-transform: uppercase; letter-spacing: 3px; color: #C8A882; font-family: 'Inter',sans-serif; margin-bottom: 1.2rem; }
        .inv-min-names { font-size: 2.2rem; font-weight: 900; color: #111; line-height: 1.15; }
        .inv-min-amp   { font-family: 'Great Vibes', cursive; font-size: 1.8rem; color: #B89047; margin: .4rem 0; }
        .inv-min-row   { display: flex; justify-content: center; gap: 2rem; margin: 1.5rem 0; padding: 1rem 0; border-top: 1px solid #f0f0f0; border-bottom: 1px solid #f0f0f0; }
        .inv-min-col   { text-align: center; }
        .inv-min-col-label { font-size: .75rem; text-transform: uppercase; letter-spacing: 2px; color: #aaa; font-family: 'Inter',sans-serif; }
        .inv-min-col-val   { font-size: 1.1rem; font-weight: 700; color: #333; font-family: 'Inter',sans-serif; margin-top: .3rem; }
        .inv-min-venue { font-size: 1.1rem; font-weight: 700; color: #333; margin-top: .8rem; }
        .inv-min-addr  { font-size: .9rem; color: #666; margin-top: .3rem; }
        .inv-min-rsvp  { font-size: .9rem; color: #999; background: #f9f9f9; border-radius: 8px; padding: .8rem; margin-top: 1rem; }

        /* Garden Celestial */
        .inv-celestial {
            background: #0A1628; border: 2px solid #E8C55A;
            border-radius: 16px; padding: 3rem 2rem; text-align: center;
            color: #E8C55A;
        }
        .inv-cel-stars  { font-size: 1.4rem; margin-bottom: .8rem; }
        .inv-cel-sub    { font-size: .8rem; text-transform: uppercase; letter-spacing: 3px; color: rgba(255,255,255,.7); font-family: 'Inter',sans-serif; margin-bottom: 1rem; }
        .inv-cel-names  { font-family: 'Great Vibes', cursive; font-size: 2.6rem; color: #fff; line-height: 1.15; }
        .inv-cel-amp    { font-size: 1rem; text-transform: uppercase; letter-spacing: 2px; color: #E8C55A; margin: .4rem 0; }
        .inv-cel-divider { width: 60px; height: 1px; background: #E8C55A; margin: 1rem auto; }
        .inv-cel-date   { font-size: .95rem; font-weight: 700; color: #fff; letter-spacing: 2px; text-transform: uppercase; font-family: 'Cinzel', serif; }
        .inv-cel-time   { font-size: .85rem; color: rgba(255,255,255,.75); font-family: 'Inter',sans-serif; margin-top: .3rem; }
        .inv-cel-venue-box { border: 1px solid rgba(232,197,90,.25); border-radius: 10px; padding: 1rem; background: rgba(10,22,40,.6); margin: 1rem 0; }
        .inv-cel-venue-label { font-size: .75rem; text-transform: uppercase; letter-spacing: 3px; color: #E8C55A; font-family: 'Cinzel',serif; }
        .inv-cel-venue-name  { font-size: 1.1rem; font-weight: 700; color: #fff; margin-top: .3rem; }
        .inv-cel-venue-addr  { font-size: .85rem; color: rgba(255,255,255,.65); font-family: 'Inter',sans-serif; margin-top: .3rem; }
        .inv-cel-rsvp   { font-size: .85rem; color: rgba(255,255,255,.75); font-family: 'Inter',sans-serif; margin-top: .8rem; }
        .inv-cel-msg    { font-size: .9rem; color: rgba(255,255,255,.55); font-family: 'Inter',sans-serif; font-style: italic; margin-top: 1rem; }

        @media (max-width: 480px) {
            .inv-royal, .inv-minimalist, .inv-celestial { padding: 2rem 1.2rem; }
        }
    </style>
</head>
<body>
    <div class="invitation-container">
        @if($template === 'royal-scroll')
            <div class="inv-royal">
                <p class="inv-royal-small">✦ Request the Honour ✦</p>
                <p style="font-size:.9rem;font-style:italic;color:rgba(197,155,39,.75);margin-bottom:1rem">of your presence at the marriage of</p>
                @if(!empty($photo))
                    <div style="width:120px;height:120px;border-radius:50%;overflow:hidden;border:2px solid #B89047;margin:0 auto 1rem;"><img src="{{ $photo }}" style="width:100%;height:100%;object-fit:cover"></div>
                @endif
                <p class="inv-royal-names">{{ $details['bride_name'] }}</p>
                <p class="inv-royal-weds">&amp;</p>
                <p class="inv-royal-names">{{ $details['groom_name'] }}</p>
                <div class="inv-royal-divider"></div>
                <p class="inv-royal-detail">{{ \Carbon\Carbon::parse($details['wedding_date'])->format('l · j F Y') }}</p>
                <p class="inv-royal-detail" style="margin-top:.3rem">{{ $details['time'] }} onwards</p>
                <div class="inv-royal-divider"></div>
                <p class="inv-royal-venue">{{ $details['venue_name'] }}</p>
                <p class="inv-royal-addr">{{ $details['venue_address'] }}</p>
                <p class="inv-royal-rsvp">
                    @if(isset($details['rsvp_deadline']))
                        RSVP by {{ \Carbon\Carbon::parse($details['rsvp_deadline'])->format('j F') }} &bull; {{ $details['rsvp_contact'] }}
                    @else
                        RSVP: {{ $details['rsvp_contact'] }}
                    @endif
                </p>
                <p class="inv-royal-msg">✦ {{ $details['personal_message'] ?? 'With joy in our hearts, we welcome you' }} ✦</p>
            </div>

        @elseif($template === 'golden-minimalist')
            <div class="inv-minimalist">
                <p class="inv-min-mono">{{ substr($details['bride_name'],0,1) }} &amp; {{ substr($details['groom_name'],0,1) }}</p>
                @if(!empty($photo))
                    <div style="width:100px;height:100px;border-radius:50%;overflow:hidden;border:2px solid #B89047;margin:0 auto 1rem;"><img src="{{ $photo }}" style="width:100%;height:100%;object-fit:cover"></div>
                @endif
                <p class="inv-min-sub">Join Us To Celebrate The Wedding Of</p>
                <p class="inv-min-names">{{ $details['bride_name'] }}</p>
                <p class="inv-min-amp">&amp;</p>
                <p class="inv-min-names">{{ $details['groom_name'] }}</p>
                <div class="inv-min-row">
                    <div class="inv-min-col">
                        <div class="inv-min-col-label">Date</div>
                        <div class="inv-min-col-val">{{ \Carbon\Carbon::parse($details['wedding_date'])->format('M j, Y') }}</div>
                    </div>
                    <div style="width:1px;background:#e0e0e0;align-self:stretch"></div>
                    <div class="inv-min-col">
                        <div class="inv-min-col-label">Time</div>
                        <div class="inv-min-col-val">{{ $details['time'] }}</div>
                    </div>
                </div>
                <p class="inv-min-venue">{{ $details['venue_name'] }}</p>
                <p class="inv-min-addr">{{ $details['venue_address'] }}</p>
                <p class="inv-min-rsvp">RSVP: {{ $details['rsvp_contact'] }}</p>
                @if($details['personal_message'] ?? false)
                    <p style="font-size:.9rem;color:#999;font-style:italic;margin-top:1rem">"{{ $details['personal_message'] }}"</p>
                @endif
            </div>

        @elseif($template === 'garden-celestial')
            <div class="inv-celestial">
                <p class="inv-cel-stars">🌙 ✨ ⭐</p>
                @if(!empty($photo))
                    <div style="width:100px;height:100px;border-radius:50%;overflow:hidden;border:2px solid rgba(232,197,90,.6);margin:0 auto 1rem;"><img src="{{ $photo }}" style="width:100%;height:100%;object-fit:cover"></div>
                @endif
                <p class="inv-cel-sub">Under the starlit sky, join the wedding of</p>
                <p class="inv-cel-names">{{ $details['bride_name'] }}</p>
                <p class="inv-cel-amp">&amp;</p>
                <p class="inv-cel-names">{{ $details['groom_name'] }}</p>
                <div class="inv-cel-divider"></div>
                <p class="inv-cel-date">{{ \Carbon\Carbon::parse($details['wedding_date'])->format('l · F j, Y') }}</p>
                <p class="inv-cel-time">at {{ $details['time'] }} onwards</p>
                <div class="inv-cel-venue-box">
                    <p class="inv-cel-venue-label">Celestial Venue</p>
                    <p class="inv-cel-venue-name">{{ $details['venue_name'] }}</p>
                    <p class="inv-cel-venue-addr">{{ $details['venue_address'] }}</p>
                </div>
                <p class="inv-cel-rsvp">RSVP: {{ $details['rsvp_contact'] }}</p>
                @if($details['personal_message'] ?? false)
                    <p class="inv-cel-msg">"{{ $details['personal_message'] }}"</p>
                @endif
            </div>
        @endif
    </div>
</body>
</html>
