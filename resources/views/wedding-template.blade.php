<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Velvet Vows — Choose Your Template</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@300;400;500;600;700;800&family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Great+Vibes&display=swap" rel="stylesheet">
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
            animation: fadeDown .5s var(--ease) both;
        }
        @keyframes fadeDown { from{opacity:0;transform:translateY(-12px)} to{opacity:1;transform:translateY(0)} }
        @keyframes riseUp   { from{opacity:0;transform:translateY(28px)}  to{opacity:1;transform:translateY(0)} }

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

        /* Main card */
        .main-card {
            position: relative; z-index: 1;
            width: 100%; max-width: 620px;
            background: var(--cream-base);
            border: 1.5px solid var(--border-gold);
            border-radius: 28px;
            box-shadow: 0 20px 60px rgba(140,109,59,0.08);
            margin: 2rem 1rem 4rem;
            overflow: hidden;
            animation: riseUp .7s var(--ease) .1s both;
        }
        .card-top { padding: 2rem 2.4rem 1.6rem; border-bottom: 1px solid var(--border-gold); }
        .card-top h1 { font-family: var(--font-display); font-size: 1.5rem; font-weight: 800; color: var(--text-dark); letter-spacing: -.3px; margin-bottom: .3rem; }
        .card-top h1 span { color: var(--gold-primary); }
        .card-top p { font-size: .88rem; color: var(--text-muted); font-family: var(--font-serif); font-style: italic; }
        .card-body { padding: 1.8rem 2.4rem 2.4rem; }

        /* Template cards */
        .templates-grid { display: flex; flex-direction: column; gap: 1rem; }
        .template-card-wrapper {
            border: 2px solid var(--border-gold);
            border-radius: 18px; overflow: hidden;
            cursor: pointer;
            transition: all .35s var(--ease);
            position: relative;
        }
        .template-card-wrapper:hover { transform: translateY(-3px); box-shadow: 0 12px 30px rgba(140,109,59,0.1); }
        .template-card-wrapper.selected {
            border-color: var(--gold-primary);
            box-shadow: 0 0 0 4px rgba(184,144,71,0.12), 0 12px 30px rgba(140,109,59,0.12);
        }

        /* Selected badge */
        .selected-badge {
            position: absolute; top: .75rem; right: .75rem;
            background: var(--gold-primary); color: #fff;
            font-size: .6rem; font-weight: 800;
            text-transform: uppercase; letter-spacing: 1px;
            padding: .3rem .75rem; border-radius: 99px;
            opacity: 0; transform: scale(.85);
            transition: all .25s var(--ease);
        }
        .template-card-wrapper.selected .selected-badge {
            opacity: 1; transform: scale(1);
        }

        /* ── Royal Scroll card (dark, full width) */
        .tpl-royal {
            background: #1A1A1A;
            padding: 2rem;
            text-align: center;
            font-family: 'Playfair Display', serif;
            color: #E4D1A6;
            border: 2px dashed #B89047;
        }
        .tpl-royal-header { font-size: .6rem; text-transform: uppercase; letter-spacing: 4px; color: #B89047; margin-bottom: .5rem; }
        .tpl-royal-names  { font-size: 1.7rem; font-weight: 700; color: #FFFDF9; line-height: 1.2; }
        .tpl-royal-weds   { font-size: .95rem; font-style: italic; color: #B89047; margin: .3rem 0; }
        .tpl-royal-detail { font-size: .62rem; color: #B89047; letter-spacing: 2px; margin-top: .7rem; text-transform: uppercase; }

        /* ── Two-column smaller cards */
        .tpl-row { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }

        /* Golden Minimalist */
        .tpl-minimalist {
            background: #fff; padding: 1.4rem;
            text-align: center; font-family: 'Playfair Display', serif;
            min-height: 180px; display: flex; flex-direction: column; justify-content: center; gap: .4rem;
        }
        .tpl-min-mono { font-size: .62rem; font-weight: 700; color: #B89047; letter-spacing: 3px; text-transform: uppercase; }
        .tpl-min-names { font-size: 1.05rem; font-weight: 900; color: #1A1A1A; line-height: 1.2; }
        .tpl-min-amp   { font-size: .95rem; color: #B89047; }
        .tpl-min-date  { font-size: .62rem; color: #999; font-family: 'Inter', sans-serif; margin-top: .3rem; }

        /* Garden Celestial */
        .tpl-celestial {
            background: #0A1628; padding: 1.4rem;
            text-align: center; font-family: 'Great Vibes', cursive;
            min-height: 180px; display: flex; flex-direction: column; justify-content: center; gap: .4rem;
        }
        .tpl-cel-stars  { font-family: sans-serif; font-size: .9rem; color: #E8C55A; }
        .tpl-cel-names  { font-size: 1.5rem; color: #fff; line-height: 1.2; }
        .tpl-cel-amp    { font-family: 'Playfair Display', serif; font-size: .7rem; color: #E8C55A; text-transform: uppercase; letter-spacing: 2px; }
        .tpl-cel-date   { font-family: 'Inter', sans-serif; font-size: .6rem; color: rgba(255,255,255,.6); margin-top: .3rem; }

        /* Template label */
        .tpl-label {
            padding: .65rem 1rem;
            border-top: 1px solid var(--border-gold);
            display: flex; align-items: center; justify-content: space-between;
        }
        .tpl-label-name { font-size: .78rem; font-weight: 700; color: var(--gold-dark); }
        .tpl-label-hint { font-size: .72rem; color: var(--text-muted); font-style: italic; }
        .tpl-celestial .tpl-label { border-color: rgba(232,197,90,.15); }

        /* Hint text */
        .tpl-hint {
            text-align: center; font-family: var(--font-serif); font-style: italic;
            font-size: .85rem; color: var(--text-muted); margin-top: .6rem;
        }

        /* Submit button */
        .btn-continue {
            width: 100%; padding: 1rem;
            background: linear-gradient(135deg, var(--gold-dark), var(--gold-primary));
            border: none; border-radius: 99px; color: #fff;
            font-family: var(--font-body); font-weight: 700; font-size: 1rem;
            cursor: pointer;
            box-shadow: 0 6px 20px rgba(184,144,71,0.24);
            display: flex; align-items: center; justify-content: center; gap: .5rem;
            transition: all .3s var(--ease); margin-top: 1.6rem;
        }
        .btn-continue:hover { transform: translateY(-2px); box-shadow: 0 10px 28px rgba(184,144,71,0.32); }

        /* Back link */
        .back-link {
            display: inline-flex; align-items: center; gap: .3rem;
            font-size: .83rem; font-weight: 600; color: var(--gold-dark);
            text-decoration: none; margin-bottom: 1.2rem;
            transition: color .2s;
        }
        .back-link:hover { color: var(--gold-primary); }

        @media (max-width: 520px) {
            .main-card { margin: 1rem .75rem 3rem; border-radius: 20px; }
            .card-top  { padding: 1.4rem 1.2rem 1rem; }
            .card-body { padding: 1.2rem 1.2rem 1.6rem; }
            .tpl-row   { grid-template-columns: 1fr; }
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
            <span class="step-label">Step 2 of 3</span>
            <div class="step-pills">
                <div class="step-pill active"></div>
                <div class="step-pill active"></div>
                <div class="step-pill"></div>
            </div>
        </div>
    </header>

    <div class="main-card">
        <div class="card-top">
            <h1>Choose Your <span>Template</span></h1>
            <p>Your details are shown inside each design — tap to select</p>
        </div>

        <div class="card-body">
            <a href="{{ route('wedding.details.create') }}" class="back-link">
                <i class="bi bi-arrow-left-short fs-5"></i> Edit Details
            </a>

            <form action="{{ route('wedding.template.store') }}" method="POST">
                @csrf
                <input type="hidden" name="template" id="selected-template" value="royal-scroll">

                <div class="templates-grid">

                    {{-- ── Card 1: Royal Scroll (Full Width) ── --}}
                    <div class="template-card-wrapper selected" id="card-royal-scroll" onclick="selectTemplate('royal-scroll')">
                        <span class="selected-badge">✓ Selected</span>
                        <div class="tpl-royal">
                            @if(!empty($photo))
                                <div style="width:100px;height:100px;border-radius:50%;overflow:hidden;border:2px solid #B89047;margin:0 auto 1rem;"><img src="{{ $photo }}" alt="Couple" style="width:100%;height:100%;object-fit:cover"></div>
                            @endif
                            <p class="tpl-royal-header">✦ The Royal Scroll ✦</p>
                            <p class="tpl-royal-names">{{ $details['bride_name'] }}</p>
                            <p class="tpl-royal-weds">weds</p>
                            <p class="tpl-royal-names">{{ $details['groom_name'] }}</p>
                            <p class="tpl-royal-detail">{{ \Carbon\Carbon::parse($details['wedding_date'])->format('j F Y') }} &bull; {{ $details['venue_name'] }} &bull; {{ $details['time'] }}</p>
                        </div>
                        <div class="tpl-label">
                            <span class="tpl-label-name">The Royal Scroll</span>
                            <span class="tpl-label-hint">Dark luxury, gold foil</span>
                        </div>
                    </div>

                    {{-- ── Cards 2 & 3 (Half-width row) ── --}}
                    <div class="tpl-row">

                        {{-- Golden Minimalist --}}
                        <div class="template-card-wrapper" id="card-golden-minimalist" onclick="selectTemplate('golden-minimalist')">
                            <span class="selected-badge">✓ Selected</span>
                            <div class="tpl-minimalist">
                                @if(!empty($photo))
                                    <div style="width:56px;height:56px;border-radius:50%;overflow:hidden;border:1.5px solid #B89047;margin:0 auto .5rem;"><img src="{{ $photo }}" alt="Couple" style="width:100%;height:100%;object-fit:cover"></div>
                                @endif
                                <p class="tpl-min-mono">{{ substr($details['bride_name'],0,1) }} &amp; {{ substr($details['groom_name'],0,1) }}</p>
                                <p class="tpl-min-names">{{ $details['bride_name'] }}</p>
                                <p class="tpl-min-amp">&amp;</p>
                                <p class="tpl-min-names">{{ $details['groom_name'] }}</p>
                                <p class="tpl-min-date">{{ \Carbon\Carbon::parse($details['wedding_date'])->format('j F Y') }}</p>
                            </div>
                            <div class="tpl-label">
                                <span class="tpl-label-name">Golden Minimalist</span>
                                <span class="tpl-label-hint">Clean, modern</span>
                            </div>
                        </div>

                        {{-- Garden Celestial --}}
                        <div class="template-card-wrapper" id="card-garden-celestial" onclick="selectTemplate('garden-celestial')">
                            <span class="selected-badge">✓ Selected</span>
                            <div class="tpl-celestial">
                                @if(!empty($photo))
                                    <div style="width:52px;height:52px;border-radius:50%;overflow:hidden;border:1.5px solid #E8C55A;margin:0 auto .5rem;"><img src="{{ $photo }}" alt="Couple" style="width:100%;height:100%;object-fit:cover"></div>
                                @endif
                                <p class="tpl-cel-stars">🌙 ✨</p>
                                <p class="tpl-cel-names">{{ $details['bride_name'] }}</p>
                                <p class="tpl-cel-amp">&amp;</p>
                                <p class="tpl-cel-names">{{ $details['groom_name'] }}</p>
                                <p class="tpl-cel-date">{{ \Carbon\Carbon::parse($details['wedding_date'])->format('j F Y') }}</p>
                            </div>
                            <div class="tpl-label" style="background:#0A1628;border-top:1px solid rgba(232,197,90,.15)">
                                <span class="tpl-label-name" style="color:#E8C55A">Garden Celestial</span>
                                <span class="tpl-label-hint" style="color:rgba(255,255,255,.45)">Starlit, romantic</span>
                            </div>
                        </div>

                    </div>{{-- /tpl-row --}}
                </div>{{-- /templates-grid --}}

                <p class="tpl-hint">Tap a template to select it</p>

                <button type="submit" class="btn-continue">
                    <i class="bi bi-eye-fill"></i> Preview This Invitation
                </button>
            </form>
        </div>
    </div>

    <script>
        function selectTemplate(name) {
            document.getElementById('selected-template').value = name;
            const ids = ['royal-scroll', 'golden-minimalist', 'garden-celestial'];
            ids.forEach(id => {
                const el = document.getElementById('card-' + id);
                el.classList.toggle('selected', id === name);
            });
        }
        document.addEventListener('DOMContentLoaded', () => selectTemplate('royal-scroll'));
    </script>
</body>
</html>
