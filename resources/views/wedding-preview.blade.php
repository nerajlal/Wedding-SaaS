<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Velvet Vows — Preview &amp; Publish</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@300;400;500;600;700;800&family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Great+Vibes&family=Cinzel:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        :root {
            --gold-dark:    #8C6D3B;
            --gold-primary: #B89047;
            --gold-light:   #DFCA9B;
            --cream-base:   #FFFDF9;
            --cream-dark:   #F7F3EB;
            --text-dark:    #2A241E;
            --text-muted:   #7A7065;
            --border-gold:  rgba(184,144,71,0.18);
            --font-display: 'Outfit', sans-serif;
            --font-body:    'Inter', sans-serif;
            --font-serif:   'Cormorant Garamond', serif;
            --ease:         cubic-bezier(0.16,1,0.3,1);
        }
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: var(--font-body);
            background: var(--cream-dark);
            min-height: 100vh;
            color: var(--text-dark);
            display: flex; flex-direction: column; align-items: center;
        }
        body::before {
            content: ''; position: fixed; inset: 0;
            background:
                radial-gradient(circle at 85% 10%, rgba(184,144,71,0.07) 0%, transparent 55%),
                radial-gradient(circle at 10% 85%, rgba(184,144,71,0.05) 0%, transparent 45%);
            pointer-events: none; z-index: 0;
        }

        /* Step header */
        .step-header {
            width: 100%; position: sticky; top: 0; z-index: 100;
            background: rgba(255,253,249,0.9); backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border-gold);
            padding: 1rem 1.5rem;
            display: flex; align-items: center; justify-content: space-between;
        }
        .step-brand {
            font-family: var(--font-display); font-weight: 800; font-size: 1.1rem;
            color: var(--text-dark); display: flex; align-items: center; gap: .5rem; text-decoration: none;
        }
        .step-brand span { color: var(--gold-primary); }
        .step-brand-icon {
            width: 32px; height: 32px; border-radius: 10px;
            background: linear-gradient(135deg, var(--gold-dark), var(--gold-primary));
            display: flex; align-items: center; justify-content: center;
            color: #fff; font-size: .85rem;
        }
        .step-info { display: flex; align-items: center; gap: .75rem; }
        .step-label { font-size: .78rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase; letter-spacing: .8px; }
        .step-pills { display: flex; gap: .35rem; }
        .step-pill { width: 28px; height: 5px; border-radius: 99px; background: rgba(184,144,71,0.15); }
        .step-pill.active { background: var(--gold-primary); }

        /* Main layout */
        .main-card {
            position: relative; z-index: 1;
            width: 100%; max-width: 700px;
            background: var(--cream-base);
            border: 1.5px solid var(--border-gold);
            border-radius: 28px;
            box-shadow: 0 20px 60px rgba(140,109,59,0.08);
            margin: 2rem 1rem 4rem;
            overflow: hidden;
            animation: riseUp .7s var(--ease) .1s both;
        }
        @keyframes riseUp { from{opacity:0;transform:translateY(28px)} to{opacity:1;transform:translateY(0)} }

        .card-top { padding: 2rem 2.4rem 1.6rem; border-bottom: 1px solid var(--border-gold); }
        .card-top h1 { font-family: var(--font-display); font-size: 1.5rem; font-weight: 800; letter-spacing: -.3px; margin-bottom: .3rem; }
        .card-top h1 span { color: var(--gold-primary); }
        .card-top p { font-size: .88rem; color: var(--text-muted); font-family: var(--font-serif); font-style: italic; }

        /* Preview + sidebar layout */
        .preview-layout {
            display: grid; grid-template-columns: 1fr 1fr;
            gap: 0; min-height: 400px;
        }
        .preview-pane {
            padding: 2rem;
            border-right: 1px solid var(--border-gold);
            overflow-y: auto;
        }
        .preview-pane::-webkit-scrollbar { width: 4px; }
        .preview-pane::-webkit-scrollbar-thumb { background: rgba(184,144,71,.3); border-radius: 2px; }

        .preview-label {
            font-size: .7rem; font-weight: 700; text-transform: uppercase;
            letter-spacing: 1px; color: var(--gold-dark);
            margin-bottom: .8rem; display: flex; align-items: center; gap: .4rem;
        }
        .preview-label::before {
            content: ''; width: 8px; height: 8px; border-radius: 50%;
            background: var(--gold-primary); display: inline-block;
        }

        .info-pane {
            padding: 2rem;
            display: flex; flex-direction: column; gap: 1.2rem;
        }

        /* Alert banner */
        .preview-alert {
            padding: .7rem 1rem;
            background: rgba(184,144,71,0.06);
            border: 1px solid rgba(184,144,71,0.2);
            border-radius: 10px;
            font-size: .76rem; font-weight: 600;
            color: var(--gold-dark);
            display: flex; align-items: center; gap: .5rem;
        }

        /* Info blocks */
        .info-block { }
        .info-block-label {
            font-size: .68rem; font-weight: 700; text-transform: uppercase;
            letter-spacing: .9px; color: var(--text-muted); margin-bottom: .3rem;
        }
        .info-block-value {
            font-size: .9rem; font-weight: 600; color: var(--text-dark);
        }
        .info-block-divider {
            height: 1px; background: var(--border-gold); margin: .2rem 0;
        }

        /* Action buttons */
        .btn-publish {
            width: 100%; padding: .9rem;
            background: linear-gradient(135deg, var(--gold-dark), var(--gold-primary));
            border: none; border-radius: 99px; color: #fff;
            font-family: var(--font-body); font-weight: 700; font-size: .97rem;
            cursor: pointer;
            box-shadow: 0 5px 18px rgba(184,144,71,0.24);
            display: flex; align-items: center; justify-content: center; gap: .45rem;
            transition: all .3s var(--ease);
        }
        .btn-publish:hover { transform: translateY(-2px); box-shadow: 0 9px 26px rgba(184,144,71,0.32); }
        .btn-change {
            display: flex; align-items: center; justify-content: center; gap: .35rem;
            font-size: .85rem; font-weight: 600; color: var(--gold-dark);
            text-decoration: none; padding: .65rem;
            border: 1.5px solid var(--border-gold); border-radius: 99px;
            transition: all .25s;
        }
        .btn-change:hover { border-color: var(--gold-primary); color: var(--gold-primary); background: rgba(184,144,71,.04); }

        /* ────────────────────────────────────────────────────
           Invitation preview cards (same designs as template)
           ──────────────────────────────────────────────────── */

        /* Royal Scroll */
        .inv-royal {
            background: #1A1A1A;
            border: 2px dashed #B89047;
            border-radius: 16px; padding: 1.6rem;
            text-align: center; font-family: 'Playfair Display', serif; color: #E4D1A6;
        }
        .inv-royal-small { font-size: .55rem; text-transform: uppercase; letter-spacing: 4px; color: #B89047; margin-bottom: .5rem; font-style: italic; }
        .inv-royal-names { font-size: 1.4rem; font-weight: 700; color: #FFFDF9; line-height: 1.15; }
        .inv-royal-weds  { font-size: .85rem; font-style: italic; color: #B89047; margin: .3rem 0; }
        .inv-royal-divider { width: 70%; height: 1px; background: linear-gradient(90deg,transparent,#B89047,transparent); margin: .7rem auto; }
        .inv-royal-detail { font-size: .65rem; color: #B89047; letter-spacing: 1.5px; }
        .inv-royal-venue  { font-size: .75rem; font-weight: 600; color: #FFFDF9; margin-top: .4rem; }
        .inv-royal-addr   { font-size: .6rem; color: #857B72; }
        .inv-royal-rsvp   { font-size: .6rem; color: rgba(197,155,39,.8); margin-top: .6rem; }
        .inv-royal-msg    { font-size: .62rem; color: #B89047; font-style: italic; margin-top: .7rem; }

        /* Golden Minimalist */
        .inv-minimalist {
            background: #fff; border: 1px solid #E4D1A6; border-radius: 16px;
            padding: 1.6rem; text-align: center;
            font-family: 'Playfair Display', serif; color: #1A1A1A;
        }
        .inv-min-mono  { font-size: .6rem; font-weight: 700; color: #B89047; letter-spacing: 3px; text-transform: uppercase; margin-bottom: .5rem; }
        .inv-min-sub   { font-size: .52rem; text-transform: uppercase; letter-spacing: 3px; color: #C8A882; font-family: 'Inter',sans-serif; margin-bottom: .8rem; }
        .inv-min-names { font-size: 1.3rem; font-weight: 900; color: #111; line-height: 1.15; }
        .inv-min-amp   { font-family: 'Great Vibes', cursive; font-size: 1.1rem; color: #B89047; margin: .2rem 0; }
        .inv-min-row   { display: flex; justify-content: center; gap: 1.5rem; margin: .8rem 0; padding: .6rem 0; border-top: 1px solid #f0f0f0; border-bottom: 1px solid #f0f0f0; }
        .inv-min-col   { text-align: center; }
        .inv-min-col-label { font-size: .5rem; text-transform: uppercase; letter-spacing: 2px; color: #aaa; font-family: 'Inter',sans-serif; }
        .inv-min-col-val   { font-size: .72rem; font-weight: 700; color: #333; font-family: 'Inter',sans-serif; margin-top: .2rem; }
        .inv-min-venue { font-size: .68rem; font-weight: 700; color: #333; margin-top: .5rem; }
        .inv-min-addr  { font-size: .6rem; color: #666; }
        .inv-min-rsvp  { font-size: .6rem; color: #999; background: #f9f9f9; border-radius: 8px; padding: .5rem; margin-top: .6rem; }

        /* Garden Celestial */
        .inv-celestial {
            background: #0A1628; border: 2px solid #E8C55A;
            border-radius: 16px; padding: 1.6rem; text-align: center;
            color: #E8C55A;
        }
        .inv-cel-stars  { font-size: .9rem; margin-bottom: .5rem; }
        .inv-cel-sub    { font-size: .52rem; text-transform: uppercase; letter-spacing: 3px; color: rgba(255,255,255,.7); font-family: 'Inter',sans-serif; margin-bottom: .7rem; }
        .inv-cel-names  { font-family: 'Great Vibes', cursive; font-size: 1.5rem; color: #fff; line-height: 1.15; }
        .inv-cel-amp    { font-size: .65rem; text-transform: uppercase; letter-spacing: 2px; color: #E8C55A; margin: .25rem 0; }
        .inv-cel-divider { width: 40px; height: 1px; background: #E8C55A; margin: .6rem auto; }
        .inv-cel-date   { font-size: .62rem; font-weight: 700; color: #fff; letter-spacing: 2px; text-transform: uppercase; font-family: 'Cinzel', serif; }
        .inv-cel-time   { font-size: .58rem; color: rgba(255,255,255,.75); font-family: 'Inter',sans-serif; margin-top: .2rem; }
        .inv-cel-venue-box { border: 1px solid rgba(232,197,90,.25); border-radius: 10px; padding: .65rem; background: rgba(10,22,40,.6); margin: .7rem 0; }
        .inv-cel-venue-label { font-size: .5rem; text-transform: uppercase; letter-spacing: 3px; color: #E8C55A; font-family: 'Cinzel',serif; }
        .inv-cel-venue-name  { font-size: .72rem; font-weight: 700; color: #fff; margin-top: .2rem; }
        .inv-cel-venue-addr  { font-size: .58rem; color: rgba(255,255,255,.65); font-family: 'Inter',sans-serif; }
        .inv-cel-rsvp   { font-size: .58rem; color: rgba(255,255,255,.75); font-family: 'Inter',sans-serif; margin-top: .5rem; }
        .inv-cel-msg    { font-size: .6rem; color: rgba(255,255,255,.55); font-family: 'Inter',sans-serif; font-style: italic; margin-top: .6rem; }

        /* ── Payment modal ────────────────────────────────── */
        .pay-overlay {
            position: fixed; inset: 0; z-index: 9990;
            background: rgba(42,36,30,0.5); backdrop-filter: blur(8px);
            display: flex; align-items: center; justify-content: center; padding: 1.5rem;
            opacity: 0; visibility: hidden;
            transition: opacity .35s var(--ease), visibility .35s var(--ease);
        }
        .pay-overlay.open { opacity: 1; visibility: visible; }
        .pay-modal {
            width: 100%; max-width: 400px;
            background: #fff; border-radius: 24px; overflow: hidden;
            box-shadow: 0 30px 80px rgba(0,0,0,.2);
            transform: translateY(28px) scale(.97);
            transition: transform .4s var(--ease);
        }
        .pay-overlay.open .pay-modal { transform: translateY(0) scale(1); }

        .pay-header {
            background: #0F1C3F; padding: 1.1rem 1.4rem;
            display: flex; align-items: center; justify-content: space-between;
        }
        .pay-header-left { display: flex; align-items: center; gap: .65rem; }
        .pay-rp-badge {
            background: #2563EB; color: #fff; font-size: .58rem;
            font-weight: 900; font-family: monospace; padding: .28rem .55rem;
            border-radius: 6px; letter-spacing: .5px;
        }
        .pay-brand-name  { font-size: .82rem; font-weight: 700; color: #fff; }
        .pay-brand-sub   { font-size: .58rem; color: rgba(255,255,255,.6); margin-top: .05rem; }
        .pay-amount { text-align: right; }
        .pay-amount-label { font-size: .5rem; text-transform: uppercase; letter-spacing: 2px; color: rgba(255,255,255,.5); }
        .pay-amount-val { font-size: 1.1rem; font-weight: 700; color: #E8C55A; }

        .pay-body { padding: 1.4rem; }
        .pay-method-row {
            display: flex; align-items: center; justify-content: space-between;
            margin-bottom: .8rem;
        }
        .pay-method-label { font-size: .65rem; text-transform: uppercase; letter-spacing: 1px; font-weight: 700; color: #999; }
        .pay-cancel-btn { font-size: .72rem; font-weight: 700; color: #bbb; cursor: pointer; background: none; border: none; }
        .pay-cancel-btn:hover { color: #555; }

        .pay-option {
            display: flex; align-items: center; justify-content: space-between;
            padding: .75rem 1rem; border-radius: 12px;
            border: 1.5px solid #f0f0f0; margin-bottom: .6rem;
            cursor: pointer; transition: all .2s;
        }
        .pay-option:first-of-type { border-color: #2563EB; background: rgba(37,99,235,.04); }
        .pay-option:hover { border-color: #2563EB; background: rgba(37,99,235,.04); }
        .pay-option-left { display: flex; align-items: center; gap: .75rem; }
        .pay-option-icon { font-size: 1.1rem; }
        .pay-option-name { font-size: .75rem; font-weight: 700; color: #1a1a1a; }
        .pay-option-sub  { font-size: .6rem; color: #888; }

        .pay-btn {
            width: 100%; padding: .85rem;
            background: #2563EB; border: none; border-radius: 12px;
            color: #fff; font-weight: 700; font-size: .9rem;
            cursor: pointer; margin-top: .4rem;
            display: flex; align-items: center; justify-content: center; gap: .4rem;
            transition: background .2s;
        }
        .pay-btn:hover { background: #1d4ed8; }
        .pay-footer {
            background: #f9f9f9; border-top: 1px solid #f0f0f0;
            padding: .75rem; text-align: center;
            font-size: .58rem; font-weight: 700; color: #aaa; text-transform: uppercase; letter-spacing: 1.5px;
        }
        .pay-loader { padding: 2.5rem; display: none; flex-direction: column; align-items: center; gap: 1.2rem; }
        .pay-spinner {
            width: 40px; height: 40px;
            border: 3px solid #E3E9F5; border-top-color: #2563EB;
            border-radius: 50%; animation: spin 1s linear infinite;
        }
        @keyframes spin { to { transform: rotate(360deg); } }
        .pay-loader-text { font-size: .82rem; font-weight: 700; color: #333; text-align: center; }

        @media (max-width: 620px) {
            .main-card { margin: 1rem .75rem 3rem; border-radius: 20px; }
            .preview-layout { grid-template-columns: 1fr; }
            .preview-pane { border-right: none; border-bottom: 1px solid var(--border-gold); }
            .card-top { padding: 1.4rem 1.2rem 1rem; }
            .preview-pane, .info-pane { padding: 1.2rem; }
        }
    </style>
</head>
<body>

    <header class="step-header">
        <a class="step-brand" href="{{ url('/') }}">
            <div class="step-brand-icon"><i class="bi bi-heart-fill"></i></div>
            <span>Velvet</span>&nbsp;Vows
        </a>
        <div class="step-info">
            <span class="step-label">Step 3 of 3</span>
            <div class="step-pills">
                <div class="step-pill active"></div>
                <div class="step-pill active"></div>
                <div class="step-pill active"></div>
            </div>
        </div>
    </header>

    <div class="main-card">
        <div class="card-top">
            <h1>Preview &amp; <span>Publish</span></h1>
            <p>This is exactly how your guests will see the invitation</p>
        </div>

        <div class="preview-layout">

            <!-- Left: Live preview pane -->
            <div class="preview-pane">
                <p class="preview-label">Live Preview</p>

                @if($template === 'royal-scroll')
                    <div class="inv-royal">
                        <p class="inv-royal-small">✦ Request the Honour ✦</p>
                        <p style="font-size:.58rem;font-style:italic;color:rgba(197,155,39,.75);margin-bottom:.6rem">of your presence at the marriage of</p>
                        @if(!empty($photo))
                            <div style="width:90px;height:90px;border-radius:50%;overflow:hidden;border:1.5px solid #B89047;margin:0 auto .7rem;"><img src="{{ $photo }}" style="width:100%;height:100%;object-fit:cover"></div>
                        @endif
                        <p class="inv-royal-names">{{ $details['bride_name'] }}</p>
                        <p class="inv-royal-weds">&amp;</p>
                        <p class="inv-royal-names">{{ $details['groom_name'] }}</p>
                        <div class="inv-royal-divider"></div>
                        <p class="inv-royal-detail">{{ \Carbon\Carbon::parse($details['wedding_date'])->format('l · j F Y') }}</p>
                        <p class="inv-royal-detail" style="margin-top:.2rem">{{ $details['time'] }} onwards</p>
                        <div class="inv-royal-divider"></div>
                        <p class="inv-royal-venue">{{ $details['venue_name'] }}</p>
                        <p class="inv-royal-addr">{{ $details['venue_address'] }}</p>
                        @if(!empty($details['location_url']))
                            <div style="margin-top: 0.8rem; width: 100%; text-align: left;">
                                <div style="display:flex; flex-wrap:wrap; align-items:center; justify-content:space-between; gap:0.4rem; padding: 0.5rem 0.6rem; border-radius: 8px; border: 1px solid rgba(184, 144, 71, 0.25); background: rgba(184, 144, 71, 0.05);">
                                    <div style="flex:1 1 120px; min-width: 120px;">
                                        <p style="font-family:'Playfair Display',serif; font-size:0.6rem; color:#B89047; margin:0 0 0.1rem; font-weight: bold; font-style: italic;">Venue directions</p>
                                        <p style="font-family:'Inter', sans-serif; font-size:0.5rem; color:#aaa; line-height:1.3; margin:0;">Open in Maps to find venue.</p>
                                    </div>
                                    <a class="pv-location-url" href="{{ $details['location_url'] }}" target="_blank" style="display: inline-flex; align-items:center; justify-content:center; gap:0.2rem; padding: 0.35rem 0.7rem; background: #B89047; color: #fff; text-decoration: none; border-radius: 6px; font-size: 0.55rem; font-family: 'Inter', sans-serif; letter-spacing: 0.5px; font-weight: 600;">
                                        📍 View on Map
                                    </a>
                                </div>
                            </div>
                        @endif
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
                            <div style="width:72px;height:72px;border-radius:50%;overflow:hidden;border:1.5px solid #B89047;margin:0 auto .5rem;"><img src="{{ $photo }}" style="width:100%;height:100%;object-fit:cover"></div>
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
                        @if(!empty($details['location_url']))
                            <div style="margin-top: 0.8rem; width: 100%; text-align: left;">
                                <div style="display:flex; flex-wrap:wrap; align-items:center; justify-content:space-between; gap:0.4rem; padding: 0.5rem 0.6rem; border-radius: 8px; border: 1px solid rgba(184, 144, 71, 0.25); background: rgba(184, 144, 71, 0.03);">
                                    <div style="flex:1 1 120px; min-width: 120px;">
                                        <p style="font-family:'Playfair Display',serif; font-size:0.6rem; color:#B89047; margin:0 0 0.1rem; font-weight: bold;">Venue directions</p>
                                        <p style="font-family:'Inter', sans-serif; font-size:0.5rem; color:#666; line-height:1.3; margin:0;">Open in Maps to find venue.</p>
                                    </div>
                                    <a class="pv-location-url" href="{{ $details['location_url'] }}" target="_blank" style="display: inline-flex; align-items:center; justify-content:center; gap:0.2rem; padding: 0.35rem 0.7rem; background: #B89047; color: #fff; text-decoration: none; border-radius: 6px; font-size: 0.55rem; font-family: 'Inter', sans-serif; letter-spacing: 0.5px; font-weight: 600;">
                                        📍 View on Map
                                    </a>
                                </div>
                            </div>
                        @endif
                        <p class="inv-min-rsvp">RSVP: {{ $details['rsvp_contact'] }}</p>
                        @if($details['personal_message'] ?? false)
                            <p style="font-size:.62rem;color:#999;font-style:italic;margin-top:.5rem">"{{ $details['personal_message'] }}"</p>
                        @endif
                    </div>

                @elseif($template === 'garden-celestial')
                    <div class="inv-celestial">
                        <p class="inv-cel-stars">🌙 ✨ ⭐</p>
                        @if(!empty($photo))
                            <div style="width:72px;height:72px;border-radius:50%;overflow:hidden;border:1.5px solid rgba(232,197,90,.6);margin:0 auto .5rem;"><img src="{{ $photo }}" style="width:100%;height:100%;object-fit:cover"></div>
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
                            @if(!empty($details['location_url']))
                                <div style="margin-top: 0.8rem; width: 100%; text-align: left;">
                                    <div style="display:flex; flex-wrap:wrap; align-items:center; justify-content:space-between; gap:0.4rem; padding: 0.5rem 0.6rem; border-radius: 8px; border: 1px solid rgba(232, 197, 90, 0.25); background: rgba(232, 197, 90, 0.05);">
                                        <div style="flex:1 1 120px; min-width: 120px;">
                                            <p style="font-family:'Cinzel',serif; font-size:0.6rem; color:#E8C55A; margin:0 0 0.1rem; font-weight: bold; letter-spacing:1px; text-transform:uppercase;">Directions</p>
                                            <p style="font-family:'Inter', sans-serif; font-size:0.5rem; color:rgba(255,255,255,0.7); line-height:1.3; margin:0;">Open location in Maps.</p>
                                        </div>
                                        <a class="pv-location-url" href="{{ $details['location_url'] }}" target="_blank" style="display: inline-flex; align-items:center; justify-content:center; gap:0.2rem; padding: 0.35rem 0.7rem; background: #E8C55A; color: #0A1628; text-decoration: none; border-radius: 6px; font-size: 0.55rem; font-family: 'Inter', sans-serif; letter-spacing: 0.5px; font-weight: 600;">
                                            📍 View on Map
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <p class="inv-cel-rsvp">RSVP: {{ $details['rsvp_contact'] }}</p>
                        @if($details['personal_message'] ?? false)
                            <p class="inv-cel-msg">"{{ $details['personal_message'] }}"</p>
                        @endif
                    </div>
                @endif
            </div>

            <!-- Right: Action pane -->
            <div class="info-pane">
                <div class="preview-alert">
                    <i class="bi bi-lock-fill" style="color:var(--gold-primary)"></i>
                    Preview only — payment required to publish
                </div>

                <div class="info-block">
                    <div class="info-block-label">Couple</div>
                    <div class="info-block-value">{{ $details['bride_name'] }} &amp; {{ $details['groom_name'] }}</div>
                </div>
                <div class="info-block-divider"></div>
                <div class="info-block">
                    <div class="info-block-label">Date &amp; Time</div>
                    <div class="info-block-value">{{ \Carbon\Carbon::parse($details['wedding_date'])->format('j F Y') }}, {{ $details['time'] }}</div>
                </div>
                <div class="info-block-divider"></div>
                <div class="info-block">
                    <div class="info-block-label">Venue</div>
                    <div class="info-block-value">{{ $details['venue_name'] }}</div>
                    <div style="font-size:.8rem;color:var(--text-muted);margin-top:.15rem">{{ $details['venue_address'] }}</div>
                </div>
                <div class="info-block-divider"></div>
                <div class="info-block">
                    <div class="info-block-label">Template</div>
                    <div class="info-block-value" style="text-transform:capitalize">
                        @if($template === 'royal-scroll') Royal Scroll
                        @elseif($template === 'golden-minimalist') Golden Minimalist
                        @else Garden Celestial
                        @endif
                    </div>
                </div>

                <button onclick="openPayment()" class="btn-publish">
                    <i class="bi bi-lightning-fill"></i> Proceed to Payment &rarr;
                </button>

                <a href="{{ route('wedding.template.show') }}" class="btn-change">
                    <i class="bi bi-arrow-left-short fs-5"></i> Change Template
                </a>
            </div>
        </div>
    </div>

    <!-- ── Payment Modal ────────────────────────────────── -->
    <div class="pay-overlay" id="pay-overlay" onclick="handlePayOverlay(event)">
        <div class="pay-modal">
            <div class="pay-header">
                <div class="pay-header-left">
                    <span class="pay-rp-badge">RP</span>
                    <div>
                        <div class="pay-brand-name">Velvet Vows</div>
                        <div class="pay-brand-sub">Premium Invitation Publishing</div>
                    </div>
                </div>
                <div class="pay-amount">
                    <div class="pay-amount-label">Amount</div>
                    <div class="pay-amount-val">₹499.00</div>
                </div>
            </div>

            <div class="pay-body" id="pay-form">
                <div class="pay-method-row">
                    <span class="pay-method-label">Select Payment Method</span>
                    <button class="pay-cancel-btn" onclick="closePayment()">✕ Cancel</button>
                </div>

                <label class="pay-option">
                    <div class="pay-option-left">
                        <span class="pay-option-icon">💳</span>
                        <div>
                            <div class="pay-option-name">Credit / Debit Card</div>
                            <div class="pay-option-sub">Visa, Mastercard, RuPay</div>
                        </div>
                    </div>
                    <input type="radio" name="pay_method" checked style="accent-color:#2563EB">
                </label>
                <label class="pay-option">
                    <div class="pay-option-left">
                        <span class="pay-option-icon">⚡</span>
                        <div>
                            <div class="pay-option-name">UPI / QR Code</div>
                            <div class="pay-option-sub">Google Pay, PhonePe, Paytm</div>
                        </div>
                    </div>
                    <input type="radio" name="pay_method" style="accent-color:#2563EB">
                </label>
                <label class="pay-option">
                    <div class="pay-option-left">
                        <span class="pay-option-icon">🏦</span>
                        <div>
                            <div class="pay-option-name">Net Banking</div>
                            <div class="pay-option-sub">All major Indian banks</div>
                        </div>
                    </div>
                    <input type="radio" name="pay_method" style="accent-color:#2563EB">
                </label>

                <button class="pay-btn" onclick="startPayment()">
                    🔒 Pay ₹499.00 Securely
                </button>
            </div>

            <div class="pay-loader" id="pay-loader">
                <div class="pay-spinner"></div>
                <div>
                    <div class="pay-loader-text">Processing Payment…</div>
                    <div style="font-size:.7rem;color:#999;margin-top:.3rem;text-align:center">Please do not close this window</div>
                </div>
            </div>

            <div class="pay-footer">🛡️ Secured by Razorpay</div>
        </div>
    </div>

    <script>
        function openPayment()  { document.getElementById('pay-overlay').classList.add('open'); }
        function closePayment() { document.getElementById('pay-overlay').classList.remove('open'); }
        function handlePayOverlay(e) { if (e.target === document.getElementById('pay-overlay')) closePayment(); }
        function startPayment() {
            document.getElementById('pay-form').style.display = 'none';
            const loader = document.getElementById('pay-loader');
            loader.style.display = 'flex';
            setTimeout(() => { window.location.href = "{{ route('wedding.published.show') }}"; }, 2200);
        }
        document.addEventListener('keydown', e => { if (e.key === 'Escape') closePayment(); });
    </script>
</body>
</html>
