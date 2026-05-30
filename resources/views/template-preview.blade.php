<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Preview {{ $template['name'] }} — Velvet Vows</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@400;600;700;800;900&family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Great+Vibes&family=Cinzel:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        :root {
            --gold:        #B89047;
            --gold-dk:     #8C6D3B;
            --cream:       #FFFDF9;
            --cream-2:     #F7F3EB;
            --text:        #1E1812;
            --muted:       #7A7065;
            --border:      rgba(184,144,71,0.18);
            --ease:        cubic-bezier(0.16,1,0.3,1);
            --display:     'Outfit', sans-serif;
            --body:        'Inter', sans-serif;
        }
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body { 
            font-family: var(--body); 
            background: var(--cream-2); 
            color: var(--text); 
            -webkit-font-smoothing: antialiased; 
            overflow: hidden; /* Prevent full page scroll */
        }

        .preview-layout {
            display: flex;
            height: calc(100vh - 74px); /* Fixed height minus header */
            width: 100%;
            overflow: hidden;
        }

        /* ── Left Side (Preview) ── */
        .preview-pane {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            background: var(--cream-2);
            position: relative;
            overflow: hidden; /* Left side fixed, no scroll */
        }
        .preview-header {
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(255,253,249,0.9);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--border);
            z-index: 10;
        }
        .btn-back {
            display: flex; align-items: center; gap: .5rem;
            font-weight: 600; font-size: .95rem; color: var(--muted);
            text-decoration: none; transition: color .2s;
        }
        .btn-back:hover { color: var(--gold-dk); }
        .template-name-badge {
            background: rgba(184,144,71,0.1);
            color: var(--gold-dk);
            padding: 0.4rem 1rem;
            border-radius: 99px;
            font-family: var(--display);
            font-weight: 700;
            font-size: 0.9rem;
            border: 1px solid var(--border);
        }

        .preview-content {
            flex-grow: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            overflow: hidden;
        }

        .phone-mockup {
            width: 320px;
            height: 650px;
            border: 12px solid #2A241E;
            border-radius: 40px;
            background: #fff;
            position: relative;
            box-shadow: 0 30px 60px rgba(140, 109, 59, 0.15);
            overflow: hidden;
        }
        .phone-island {
            width: 100px;
            height: 25px;
            background: #2A241E;
            border-radius: 99px;
            position: absolute;
            top: 6px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 10;
        }
        .phone-mockup img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: top center;
        }

        /* ── Right Side (Sidebar) ── */
        .sidebar-pane {
            width: 550px; /* Increased right side width (reduces left side) */
            background: #FFFDF9;
            border-left: 1px solid var(--border);
            box-shadow: -10px 0 30px rgba(140, 109, 59, 0.05);
            display: flex;
            flex-direction: column;
            overflow-y: auto;
            flex-shrink: 0;
        }

        .sidebar-inner {
            padding: 3rem 2.4rem 2rem;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        /* Reused Modal Styles for Sidebar */
        .modal-brand-icon {
            width: 46px; height: 46px;
            border-radius: 14px;
            background: linear-gradient(135deg, #8C6D3B, #B89047);
            display: flex; align-items: center; justify-content: center;
            color: #fff; font-size: 1.2rem;
            margin: 0 auto 1rem;
            box-shadow: 0 6px 16px rgba(184,144,71,0.22);
        }
        .modal-brand-name {
            font-family: var(--display);
            font-weight: 800;
            font-size: 1.6rem;
            color: #2A241E;
            letter-spacing: -0.4px;
            text-align: center;
            margin-bottom: 0.25rem;
        }
        .modal-brand-name span { color: #B89047; }
        .modal-brand-tag {
            font-family: 'Cormorant Garamond', serif;
            font-style: italic;
            color: #7A7065;
            font-size: 1rem;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .modal-divider {
            position: relative;
            text-align: center;
            margin: 1.8rem 0 1.2rem;
        }
        .modal-divider::before, .modal-divider::after {
            content: '';
            position: absolute; top: 50%; width: 25%; height: 1px;
            background: rgba(184,144,71,0.2);
        }
        .modal-divider::before { left: 0; }
        .modal-divider::after { right: 0; }
        .modal-divider span {
            font-size: 0.65rem; font-weight: 800; color: #B89047;
            text-transform: uppercase; letter-spacing: 1.5px;
            padding: 0 0.5rem; background: #FFFDF9; position: relative; z-index: 1;
        }

        .modal-google-btn {
            width: 100%; display: flex; align-items: center; justify-content: center;
            gap: 0.75rem; padding: 0.85rem;
            background: #fff; border: 1.5px solid rgba(184,144,71,0.18);
            border-radius: 14px; font-weight: 600; font-size: 0.95rem; color: #2A241E;
            cursor: pointer; box-shadow: 0 2px 8px rgba(0,0,0,0.02);
            transition: all 0.3s; margin-bottom: 1.2rem;
        }
        .modal-google-btn:hover {
            background: #F7F3EB; border-color: #B89047;
            transform: translateY(-2px); box-shadow: 0 6px 16px rgba(184,144,71,0.08);
        }
        .modal-g-circle {
            width: 20px; height: 20px; border-radius: 50%;
            background: #ea4335; color: #fff; font-size: 0.7rem; font-weight: bold;
            display: flex; align-items: center; justify-content: center;
        }

        .modal-or { text-align: center; position: relative; margin-bottom: 1.5rem; }
        .modal-or::before, .modal-or::after {
            content: ''; position: absolute; top: 50%; width: 25%; height: 1px; background: rgba(184,144,71,0.15);
        }
        .modal-or::before { left: 0; } .modal-or::after { right: 0; }
        .modal-or span {
            background: #FFFDF9; padding: 0 0.8rem; font-size: 0.75rem; color: #7A7065; font-style: italic;
        }

        .modal-field-group { margin-bottom: 1rem; }
        .modal-field-label {
            display: block; font-size: 0.7rem; font-weight: 700; color: #8C6D3B;
            text-transform: uppercase; letter-spacing: 0.8px; margin-bottom: 0.4rem; padding-left: 0.2rem;
        }
        .modal-field-wrapper { position: relative; }
        .modal-field-input {
            width: 100%; padding: 0.9rem 1rem 0.9rem 2.8rem;
            background: #fff; border: 1.5px solid rgba(184,144,71,0.18);
            border-radius: 12px; font-family: 'Inter', sans-serif;
            font-size: 0.95rem; color: #2A241E; outline: none; transition: all 0.3s;
        }
        .modal-field-input::placeholder { color: #7A7065; opacity: .6; }
        .modal-field-input:focus {
            border-color: #B89047; box-shadow: 0 0 0 4px rgba(184,144,71,0.12);
            background: #FFFDF9;
        }
        .modal-field-icon {
            position: absolute; left: 1rem; top: 0; height: 100%;
            display: flex; align-items: center; color: #DFCA9B;
            font-size: 1rem; pointer-events: none; transition: color 0.3s;
        }
        .modal-field-wrapper:focus-within .modal-field-icon { color: #B89047; }
        .modal-field-eye {
            position: absolute; right: 1rem; top: 0; height: 100%;
            display: flex; align-items: center; color: #DFCA9B;
            font-size: 1rem; cursor: pointer; transition: color 0.3s;
        }
        .modal-field-eye:hover { color: #8C6D3B; }

        .modal-error-alert {
            background: #FFF5F5; border: 1px solid #FFD6D6; border-radius: 10px;
            padding: 0.75rem 1rem; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;
        }
        .modal-error-alert i { color: #E53E3E; font-size: 1rem; }
        .modal-error-alert span { font-size: 0.8rem; color: #C53030; font-weight: 500; }

        .modal-signin-btn {
            width: 100%; display: flex; align-items: center; justify-content: center; gap: 0.6rem;
            padding: 0.95rem; background: linear-gradient(135deg, #8C6D3B, #B89047);
            border: none; border-radius: 14px; color: #fff; font-family: var(--display);
            font-weight: 700; font-size: 1.05rem; cursor: pointer;
            box-shadow: 0 6px 20px rgba(184,144,71,0.28); transition: all 0.3s; margin-top: 1.5rem;
        }
        .modal-signin-btn:hover {
            transform: translateY(-2px); box-shadow: 0 10px 28px rgba(184,144,71,0.38);
        }

        .signin-sidebar-footer {
            padding: 1.5rem; text-align: center; background: rgba(184,144,71,0.04);
            border-top: 1px solid rgba(184,144,71,0.1); font-size: 0.75rem; color: #7A7065;
            margin-top: auto;
        }

        /* ── Live Previews ── */
        .inv-royal { background: #1A1A1A; border: 2px dashed #B89047; border-radius: 16px; padding: 1.6rem; text-align: center; font-family: 'Playfair Display', serif; color: #E4D1A6; height: 100%; display: flex; flex-direction: column; justify-content: center; }
        .inv-royal-small { font-size: .55rem; text-transform: uppercase; letter-spacing: 4px; color: #B89047; margin-bottom: .5rem; font-style: italic; }
        .inv-royal-names { font-size: 1.4rem; font-weight: 700; color: #FFFDF9; line-height: 1.15; }
        .inv-royal-weds  { font-size: .85rem; font-style: italic; color: #B89047; margin: .3rem 0; }
        .inv-royal-divider { width: 70%; height: 1px; background: linear-gradient(90deg,transparent,#B89047,transparent); margin: .7rem auto; }
        .inv-royal-detail { font-size: .65rem; color: #B89047; letter-spacing: 1.5px; }
        .inv-royal-venue  { font-size: .75rem; font-weight: 600; color: #FFFDF9; margin-top: .4rem; }
        .inv-royal-addr   { font-size: .6rem; color: #857B72; }
        .inv-royal-rsvp   { font-size: .6rem; color: rgba(197,155,39,.8); margin-top: .6rem; }

        .inv-minimalist { background: #fff; border: 1px solid #E4D1A6; border-radius: 16px; padding: 1.6rem; text-align: center; font-family: 'Playfair Display', serif; color: #1A1A1A; height: 100%; display: flex; flex-direction: column; justify-content: center; }
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

        .inv-celestial { background: #0A1628; border: 2px solid #E8C55A; border-radius: 16px; padding: 1.6rem; text-align: center; color: #E8C55A; height: 100%; display: flex; flex-direction: column; justify-content: center; }
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

        @media (max-width: 992px) {
            .preview-layout {
                flex-direction: column;
                height: auto;
                overflow-y: auto;
            }
            body { overflow: auto; }
            .sidebar-pane {
                width: 100%;
                border-left: none;
                border-top: 1px solid var(--border);
            }
            .preview-content {
                padding: 4rem 2rem;
            }
        }
    </style>
</head>
<body>
    @include('partials.header')

    <div class="preview-layout">
        <!-- Left Pane: Template Preview -->
        <div class="preview-pane">
            <div class="preview-header">
                <a href="{{ route('templates.index') }}" class="btn-back">
                    <i class="bi bi-arrow-left"></i> Back to Templates
                </a>
                <div class="template-name-badge">
                    {{ $template['name'] }}
                </div>
            </div>
            
            <div class="preview-content">
                <div class="phone-mockup">
                    <div class="phone-island"></div>
                    @if($template['id'] === 'royal-scroll')
                        <div class="inv-royal">
                            <p class="inv-royal-small">✦ Request the Honour ✦</p>
                            <p style="font-size:.58rem;font-style:italic;color:rgba(197,155,39,.75);margin-bottom:.6rem">of your presence at the marriage of</p>
                            <p class="inv-royal-names pv-bride">Bride Name</p>
                            <p class="inv-royal-weds">&amp;</p>
                            <p class="inv-royal-names pv-groom">Groom Name</p>
                            <div class="inv-royal-divider"></div>
                            <p class="inv-royal-detail pv-date">Your Wedding Date</p>
                            <p class="inv-royal-detail pv-time" style="margin-top:.2rem">7:00 PM onwards</p>
                            <div class="inv-royal-divider"></div>
                            <p class="inv-royal-venue pv-venue">The Grand Palace</p>
                            <p class="inv-royal-addr pv-addr">123 Royal Road, City</p>
                            <p class="inv-royal-rsvp pv-rsvp">RSVP: Your Contact</p>
                        </div>
                    @elseif($template['id'] === 'golden-minimalist')
                        <div class="inv-minimalist">
                            <p class="inv-min-mono"><span class="pv-bride-ini">B</span> &amp; <span class="pv-groom-ini">G</span></p>
                            <p class="inv-min-sub">Join Us To Celebrate The Wedding Of</p>
                            <p class="inv-min-names pv-bride">Bride Name</p>
                            <p class="inv-min-amp">&amp;</p>
                            <p class="inv-min-names pv-groom">Groom Name</p>
                            <div class="inv-min-row">
                                <div class="inv-min-col">
                                    <div class="inv-min-col-label">Date</div>
                                    <div class="inv-min-col-val pv-date">Dec 1, 2026</div>
                                </div>
                                <div style="width:1px;background:#e0e0e0;align-self:stretch"></div>
                                <div class="inv-min-col">
                                    <div class="inv-min-col-label">Time</div>
                                    <div class="inv-min-col-val pv-time">7:00 PM</div>
                                </div>
                            </div>
                            <p class="inv-min-venue pv-venue">The Grand Palace</p>
                            <p class="inv-min-addr pv-addr">123 Royal Road, City</p>
                            <p class="inv-min-rsvp pv-rsvp">RSVP: Your Contact</p>
                        </div>
                    @elseif($template['id'] === 'garden-celestial')
                        <div class="inv-celestial">
                            <p class="inv-cel-stars">🌙 ✨ ⭐</p>
                            <p class="inv-cel-sub">Under the starlit sky, join the wedding of</p>
                            <p class="inv-cel-names pv-bride">Bride Name</p>
                            <p class="inv-cel-amp">&amp;</p>
                            <p class="inv-cel-names pv-groom">Groom Name</p>
                            <div class="inv-cel-divider"></div>
                            <p class="inv-cel-date pv-date">Friday · Dec 1, 2026</p>
                            <p class="inv-cel-time pv-time">at 7:00 PM onwards</p>
                            <div class="inv-cel-venue-box">
                                <p class="inv-cel-venue-label">Celestial Venue</p>
                                <p class="inv-cel-venue-name pv-venue">The Grand Palace</p>
                                <p class="inv-cel-venue-addr pv-addr">123 Royal Road, City</p>
                            </div>
                            <p class="inv-cel-rsvp pv-rsvp">RSVP: Your Contact</p>
                        </div>
                    @else
                        <img src="{{ $template['image'] }}" alt="{{ $template['name'] }} preview">
                    @endif
                </div>
            </div>
        </div>

        <!-- Right Pane: Signin Sidebar -->
        <div class="sidebar-pane">
            <div class="sidebar-inner">
                @guest
                    <div class="modal-brand-icon"><i class="bi bi-heart-fill"></i></div>
                    <h2 class="modal-brand-name"><span>Velvet</span> Vows</h2>
                    <p class="modal-brand-tag">Sign in to begin your invitation</p>

                    <div class="modal-divider"><span>✦ Welcome Back ✦</span></div>

                    @if ($errors->any())
                        <div class="modal-error-alert">
                            <i class="bi bi-exclamation-circle-fill"></i>
                            <span>{{ $errors->first('email') }}</span>
                        </div>
                    @endif

                    <button type="button" class="modal-google-btn" onclick="focusSidebarEmail()">
                        <div class="modal-g-circle">G</div>
                        Continue with Google
                    </button>

                    <div class="modal-or"><span>or sign in with email</span></div>

                    <form action="{{ route('signin.process') }}" method="POST" autocomplete="off" id="sidebar-signin-form">
                        @csrf
                        <!-- Pass the selected template ID directly -->
                        <input type="hidden" name="selected_template" value="{{ $template['id'] }}">
                        
                        <div class="modal-field-group">
                            <label class="modal-field-label">Email Address</label>
                            <div class="modal-field-wrapper">
                                <i class="bi bi-envelope-fill modal-field-icon"></i>
                                <input type="email" name="email" id="sidebar-email" class="modal-field-input" placeholder="you@example.com" required value="{{ old('email', 'admin@gmail.com') }}">
                            </div>
                        </div>

                        <div class="modal-field-group" style="margin-bottom:0">
                            <label class="modal-field-label">Password</label>
                            <div class="modal-field-wrapper">
                                <i class="bi bi-lock-fill modal-field-icon"></i>
                                <input type="password" name="password" id="sidebar-password" class="modal-field-input" placeholder="••••••••" required value="password">
                                <i class="bi bi-eye modal-field-eye" id="sidebar-eye" onclick="toggleSidebarPwd()"></i>
                            </div>
                        </div>

                        <button type="submit" class="modal-signin-btn">
                            <i class="bi bi-arrow-right-circle-fill"></i> Sign In to Use Theme
                        </button>
                    </form>

                    <p style="text-align:center;font-size:.72rem;color:#7A7065;margin-top:1.5rem">
                        By continuing you agree to our
                        <a href="#" style="color:#8C6D3B;font-weight:600;text-decoration:none">Terms</a> &amp;
                        <a href="#" style="color:#8C6D3B;font-weight:600;text-decoration:none">Privacy</a>
                    </p>
                @else
                    <div class="modal-brand-icon"><i class="bi bi-envelope-heart-fill"></i></div>
                    <h2 class="modal-brand-name"><span>Create</span> Invitation</h2>
                    <p class="modal-brand-tag">Fill the details to publish your site</p>
                    
                    @if(isset($invitation))
                        <form action="{{ route('wedding.update.all', $invitation->slug) }}" method="POST" enctype="multipart/form-data" autocomplete="off" style="flex-grow:1; display:flex; flex-direction:column;">
                            @method('PUT')
                    @else
                        <form action="{{ route('wedding.store.all') }}" method="POST" enctype="multipart/form-data" autocomplete="off" style="flex-grow:1; display:flex; flex-direction:column;">
                    @endif
                        @csrf
                        <input type="hidden" name="template" value="{{ $template['id'] }}">

                        <div class="modal-field-group">
                            <label class="modal-field-label">Couple Names</label>
                            <div style="display:flex; gap:0.5rem;">
                                <input type="text" name="bride_name" id="inp-bride" class="modal-field-input" style="padding-left:1rem;" placeholder="Bride Name" required value="{{ $invitation->bride_name ?? '' }}">
                                <input type="text" name="groom_name" id="inp-groom" class="modal-field-input" style="padding-left:1rem;" placeholder="Groom Name" required value="{{ $invitation->groom_name ?? '' }}">
                            </div>
                        </div>

                        <div class="modal-field-group">
                            <label class="modal-field-label">Date & Time</label>
                            <div style="display:flex; gap:0.5rem;">
                                <input type="date" name="wedding_date" id="inp-date" class="modal-field-input" style="padding-left:1rem; color: var(--text);" required value="{{ $invitation->wedding_date ?? '' }}">
                                <input type="time" name="time" id="inp-time" class="modal-field-input" style="padding-left:1rem; color: var(--text);" required value="{{ $invitation->time ?? '' }}">
                            </div>
                        </div>

                        <div class="modal-field-group">
                            <label class="modal-field-label">Venue</label>
                            <input type="text" name="venue_name" id="inp-venue" class="modal-field-input" style="padding-left:1rem; margin-bottom:0.5rem;" placeholder="Venue Name" required value="{{ $invitation->venue_name ?? '' }}">
                            <textarea name="venue_address" id="inp-addr" class="modal-field-input" style="padding-left:1rem; padding-top: 0.6rem; resize: none;" rows="2" placeholder="Full Address" required>{{ $invitation->venue_address ?? '' }}</textarea>
                        </div>

                        <div class="modal-field-group">
                            <label class="modal-field-label">RSVP Contact</label>
                            <input type="text" name="rsvp_contact" id="inp-rsvp" class="modal-field-input" style="padding-left:1rem;" placeholder="Phone or Email" required value="{{ $invitation->rsvp_contact ?? '' }}">
                        </div>

                        <!-- Image URLs -->
                        <div class="modal-divider" style="margin: 2rem 0 1rem;"><span>✦ Theme Images ✦</span></div>

                        <div class="modal-field-group">
                            <label class="modal-field-label">Main Hero Image Link (Drive/URL)</label>
                            <input type="url" name="main_image_url" class="modal-field-input" style="padding-left:1rem; font-size: 0.85rem;" placeholder="Paste image link here..." value="{{ $invitation->main_image_url ?? '' }}">
                        </div>

                        <div class="modal-field-group">
                            <label class="modal-field-label">Bride Image Link</label>
                            <input type="url" name="bride_image_url" class="modal-field-input" style="padding-left:1rem; font-size: 0.85rem;" placeholder="Paste bride image link..." value="{{ $invitation->bride_image_url ?? '' }}">
                        </div>

                        <div class="modal-field-group">
                            <label class="modal-field-label">Groom Image Link</label>
                            <input type="url" name="groom_image_url" class="modal-field-input" style="padding-left:1rem; font-size: 0.85rem;" placeholder="Paste groom image link..." value="{{ $invitation->groom_image_url ?? '' }}">
                        </div>

                        <!-- Gallery Section -->
                        <div class="modal-divider" style="margin: 2rem 0 1rem;"><span>✦ Photo Gallery ✦</span></div>
                        <p style="font-size: 0.75rem; color: var(--muted); text-align: center; margin-bottom: 1rem;">Add links to images you want in your gallery.</p>
                        
                        <div id="gallery-container">
                            @if(isset($invitation) && $invitation->galleries->count() > 0)
                                @foreach($invitation->galleries as $gallery)
                                    <div class="modal-field-group gallery-input-group" style="display:flex; gap:0.5rem; align-items:center;">
                                        <input type="url" name="gallery_urls[]" class="modal-field-input" style="padding-left:1rem; font-size: 0.85rem; flex:1;" placeholder="Gallery image link..." value="{{ $gallery->image_url }}">
                                        <button type="button" class="btn btn-outline-danger btn-sm" onclick="this.parentElement.remove()" style="border-radius:10px;"><i class="bi bi-trash"></i></button>
                                    </div>
                                @endforeach
                            @else
                                <div class="modal-field-group gallery-input-group" style="display:flex; gap:0.5rem; align-items:center;">
                                    <input type="url" name="gallery_urls[]" class="modal-field-input" style="padding-left:1rem; font-size: 0.85rem; flex:1;" placeholder="Gallery image link...">
                                    <button type="button" class="btn btn-outline-danger btn-sm" onclick="this.parentElement.remove()" style="border-radius:10px;"><i class="bi bi-trash"></i></button>
                                </div>
                            @endif
                        </div>
                        
                        <button type="button" onclick="addGalleryInput()" style="background:none; border:1px dashed var(--gold); color:var(--gold-dk); padding:0.6rem; border-radius:12px; font-weight:600; font-size:0.85rem; width:100%; margin-bottom: 1.5rem; cursor:pointer;">
                            <i class="bi bi-plus-circle"></i> Add another image link
                        </button>

                        <button type="submit" class="modal-signin-btn" style="margin-top:auto;">
                            <i class="bi bi-magic"></i> {{ isset($invitation) ? 'Update Invitation' : 'Publish My Invitation' }}
                        </button>
                    </form>
                @endguest
            </div>

            <div class="signin-sidebar-footer">
                <i class="bi bi-shield-lock-fill" style="color:#B89047"></i>
                &nbsp;Secure &amp; Private &nbsp;&bull;&nbsp; No persistent account needed
            </div>
        </div>
    </div>

    @include('partials.popups')
    <!-- Footer removed for full-screen editor mode -->
    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function focusSidebarEmail() {
            const inp = document.getElementById('sidebar-email');
            if(inp) {
                inp.focus();
                inp.style.borderColor = '#B89047';
                inp.style.boxShadow = '0 0 0 4px rgba(184,144,71,0.12)';
                setTimeout(() => { inp.style.borderColor = ''; inp.style.boxShadow = ''; }, 1800);
            }
        }
        function toggleSidebarPwd() {
            const inp = document.getElementById('sidebar-password');
            const eye = document.getElementById('sidebar-eye');
            if (inp && eye) {
                if (inp.type === 'password') {
                    inp.type = 'text';
                    eye.className = 'bi bi-eye-slash modal-field-eye';
                } else {
                    inp.type = 'password';
                    eye.className = 'bi bi-eye modal-field-eye';
                }
            }
        }

        // Live preview sync
        const updateField = (inputId, targetClasses, prefix = '', suffix = '') => {
            const inp = document.getElementById(inputId);
            if (!inp) return;
            inp.addEventListener('input', (e) => {
                const val = e.target.value.trim();
                const targets = document.querySelectorAll(targetClasses);
                targets.forEach(t => {
                    if (val) t.textContent = prefix + val + suffix;
                    else t.textContent = t.getAttribute('data-default') || '...';
                });
            });
            // Init data-default
            document.querySelectorAll(targetClasses).forEach(t => {
                if(!t.getAttribute('data-default')) t.setAttribute('data-default', t.textContent);
            });
        };

        const updateInitial = (inputId, targetClasses) => {
            const inp = document.getElementById(inputId);
            if (!inp) return;
            inp.addEventListener('input', (e) => {
                const val = e.target.value.trim();
                const targets = document.querySelectorAll(targetClasses);
                targets.forEach(t => {
                    if (val) t.textContent = val.charAt(0).toUpperCase();
                    else t.textContent = '·';
                });
            });
        };

        updateField('inp-bride', '.pv-bride');
        updateField('inp-groom', '.pv-groom');
        updateInitial('inp-bride', '.pv-bride-ini');
        updateInitial('inp-groom', '.pv-groom-ini');
        updateField('inp-date', '.pv-date');
        updateField('inp-time', '.pv-time', '', ' onwards');
        updateField('inp-venue', '.pv-venue');
        updateField('inp-addr', '.pv-addr');
        updateField('inp-rsvp', '.pv-rsvp', 'RSVP: ');

        // trigger input to sync initial values if any
        ['inp-bride', 'inp-groom', 'inp-date', 'inp-time', 'inp-venue', 'inp-addr', 'inp-rsvp'].forEach(id => {
            const el = document.getElementById(id);
            if (el && el.value) el.dispatchEvent(new Event('input'));
        });

        function addGalleryInput() {
            const container = document.getElementById('gallery-container');
            const div = document.createElement('div');
            div.className = 'modal-field-group gallery-input-group';
            div.style.display = 'flex';
            div.style.gap = '0.5rem';
            div.style.alignItems = 'center';
            div.innerHTML = `
                <input type="url" name="gallery_urls[]" class="modal-field-input" style="padding-left:1rem; font-size: 0.85rem; flex:1;" placeholder="Gallery image link...">
                <button type="button" class="btn btn-outline-danger btn-sm" onclick="this.parentElement.remove()" style="border-radius:10px;"><i class="bi bi-trash"></i></button>
            `;
            container.appendChild(div);
        }
    </script>
</body>
</html>
