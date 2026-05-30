<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Velvet Vows — Your Invitation is Live! 🎉</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@300;400;500;600;700;800&family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

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

        /* Step header (success state) */
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
        .published-badge {
            display: flex; align-items: center; gap: .45rem;
            background: rgba(34,197,94,0.1); border: 1px solid rgba(34,197,94,0.25);
            border-radius: 99px; padding: .35rem .9rem;
            font-size: .75rem; font-weight: 700; color: #16a34a;
        }
        .published-badge i { font-size: .9rem; }

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
        @keyframes riseUp { from{opacity:0;transform:translateY(28px)} to{opacity:1;transform:translateY(0)} }
        @keyframes popIn  { from{opacity:0;transform:scale(.8)} to{opacity:1;transform:scale(1)} }

        /* Success hero */
        .success-hero {
            padding: 2.4rem 2.4rem 2rem;
            text-align: center;
            border-bottom: 1px solid var(--border-gold);
            background: linear-gradient(to bottom, rgba(184,144,71,0.04), transparent);
        }
        .success-icon {
            width: 64px; height: 64px; border-radius: 50%;
            background: linear-gradient(135deg, #16a34a, #22c55e);
            display: flex; align-items: center; justify-content: center;
            color: #fff; font-size: 1.6rem;
            margin: 0 auto 1rem;
            box-shadow: 0 8px 24px rgba(34,197,94,0.25);
            animation: popIn .5s var(--ease) .3s both;
        }
        .success-title {
            font-family: var(--font-display); font-size: 1.55rem; font-weight: 800;
            color: var(--text-dark); letter-spacing: -.3px; margin-bottom: .3rem;
        }
        .success-title span { color: var(--gold-primary); }
        .success-subtitle {
            font-family: var(--font-serif); font-style: italic;
            font-size: .95rem; color: var(--text-muted);
        }

        /* Card body */
        .card-body { padding: 2rem 2.4rem 2.4rem; display: flex; flex-direction: column; gap: 1.6rem; }

        /* Section headers */
        .section-title {
            font-size: .7rem; font-weight: 700;
            text-transform: uppercase; letter-spacing: 1px;
            color: var(--gold-dark); margin-bottom: .75rem;
            display: flex; align-items: center; gap: .5rem;
        }
        .section-title::after { content: ''; flex: 1; height: 1px; background: var(--border-gold); }

        /* Share link */
        .link-row {
            display: flex; gap: .6rem;
        }
        .link-display {
            flex: 1;
            padding: .75rem 1rem;
            background: #fff;
            border: 1.5px solid var(--border-gold);
            border-radius: 12px;
            font-size: .82rem; color: var(--text-dark);
            font-weight: 500; overflow: hidden;
            text-overflow: ellipsis; white-space: nowrap;
            user-select: all;
        }
        .btn-copy {
            padding: .75rem 1.2rem;
            background: linear-gradient(135deg, var(--gold-dark), var(--gold-primary));
            border: none; border-radius: 12px;
            color: #fff; font-weight: 700; font-size: .85rem;
            cursor: pointer; white-space: nowrap;
            transition: all .25s;
        }
        .btn-copy:hover { transform: translateY(-1px); box-shadow: 0 5px 14px rgba(184,144,71,0.25); }

        /* QR + Share row */
        .qr-share-row { display: grid; grid-template-columns: auto 1fr; gap: 1.4rem; align-items: start; }
        .qr-box {
            background: #fff; border: 1.5px solid var(--border-gold);
            border-radius: 16px; padding: .75rem;
            display: flex; flex-direction: column; align-items: center; gap: .6rem;
            min-width: 130px;
        }
        .qr-canvas { width: 110px; height: 110px; border-radius: 8px; overflow: hidden; display: flex; align-items: center; justify-content: center; }
        .qr-canvas img, .qr-canvas canvas { max-width: 100%; max-height: 100%; border-radius: 6px; }
        .qr-dl-row { display: flex; gap: .5rem; width: 100%; }
        .btn-qr-dl {
            flex: 1; padding: .4rem .3rem;
            border-radius: 99px; font-size: .62rem; font-weight: 800;
            cursor: pointer; text-align: center; text-transform: uppercase; letter-spacing: .5px;
            transition: all .2s;
        }
        .btn-qr-dl-dark { background: var(--text-dark); color: #fff; border: none; }
        .btn-qr-dl-dark:hover { background: #3a3a3a; }
        .btn-qr-dl-outline { background: transparent; color: var(--gold-dark); border: 1.5px solid var(--border-gold); }
        .btn-qr-dl-outline:hover { border-color: var(--gold-primary); }

        /* Share buttons */
        .share-buttons { display: flex; flex-direction: column; gap: .6rem; }
        .btn-share {
            display: flex; align-items: center; justify-content: center; gap: .5rem;
            padding: .75rem; border-radius: 12px;
            font-weight: 700; font-size: .88rem;
            text-decoration: none; cursor: pointer; transition: all .25s;
        }
        .btn-whatsapp { background: #25D366; color: #fff; border: none; }
        .btn-whatsapp:hover { background: #20ba59; transform: translateY(-1px); }
        .btn-email { background: var(--text-dark); color: var(--gold-primary); border: none; }
        .btn-email:hover { background: #3a3a3a; transform: translateY(-1px); }
        .btn-copylink { background: transparent; color: var(--text-dark); border: 1.5px solid var(--border-gold); }
        .btn-copylink:hover { border-color: var(--gold-primary); transform: translateY(-1px); }

        /* Stats grid */
        .stats-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: .75rem; }
        .stat-card {
            background: #fff; border: 1.5px solid var(--border-gold);
            border-radius: 14px; padding: .9rem .75rem;
            text-align: center;
        }
        .stat-val { font-size: 1.25rem; font-weight: 800; color: var(--gold-primary); }
        .stat-label { font-size: .6rem; font-weight: 700; text-transform: uppercase; letter-spacing: .8px; color: var(--text-muted); margin-top: .2rem; }

        /* Tip alert */
        .tip-alert {
            background: rgba(184,144,71,0.05);
            border: 1px solid rgba(184,144,71,0.18);
            border-radius: 16px; padding: 1.1rem 1.2rem;
            font-size: .8rem; color: var(--text-dark); line-height: 1.6;
        }
        .tip-alert-title { font-weight: 800; color: var(--gold-dark); margin-bottom: .5rem; font-size: .82rem; }
        .tip-alert code { background: #fff; border: 1px solid var(--border-gold); padding: .15rem .4rem; border-radius: 5px; font-size: .74rem; color: var(--gold-dark); }
        .tip-alert ul { padding-left: 1.1rem; margin-top: .35rem; }
        .tip-alert li { margin-bottom: .3rem; color: var(--text-muted); }

        /* Edit link */
        .btn-edit {
            display: flex; align-items: center; justify-content: center; gap: .45rem;
            padding: .85rem; border-radius: 12px;
            border: 1.5px solid var(--border-gold);
            color: var(--gold-dark); text-decoration: none; font-weight: 600; font-size: .9rem;
            transition: all .25s;
        }
        .btn-edit:hover { border-color: var(--gold-primary); color: var(--gold-primary); }

        /* Footer text */
        .pub-footer { text-align: center; font-size: .72rem; color: var(--text-muted); padding-bottom: .5rem; }
        .pub-footer span { color: var(--gold-primary); font-weight: 700; }

        /* Copy toast */
        .copy-toast {
            position: fixed; bottom: 2rem; left: 50%; transform: translateX(-50%) translateY(80px);
            background: var(--text-dark); color: var(--gold-primary);
            border: 1px solid var(--border-gold);
            font-size: .82rem; font-weight: 700;
            padding: .7rem 1.6rem; border-radius: 99px;
            box-shadow: 0 8px 24px rgba(0,0,0,.15);
            z-index: 9999; opacity: 0;
            transition: all .35s var(--ease); pointer-events: none; white-space: nowrap;
        }
        .copy-toast.show { transform: translateX(-50%) translateY(0); opacity: 1; }

        @media (max-width: 520px) {
            .main-card { margin: 1rem .75rem 3rem; border-radius: 20px; }
            .success-hero { padding: 1.6rem 1.2rem 1.4rem; }
            .card-body { padding: 1.4rem 1.2rem 1.6rem; gap: 1.3rem; }
            .qr-share-row { grid-template-columns: 1fr; }
            .stats-grid { grid-template-columns: repeat(3,1fr); }
        }
    </style>
</head>
<body>

    <header class="step-header">
        <a class="step-brand" href="{{ url('/') }}">
            <div class="step-brand-icon"><i class="bi bi-heart-fill"></i></div>
            <span>Velvet</span>&nbsp;Vows
        </a>
        <div class="published-badge">
            <i class="bi bi-check-circle-fill"></i> Published
        </div>
    </header>

    <div class="main-card">
        <!-- Success hero -->
        <div class="success-hero">
            <div class="success-icon"><i class="bi bi-check-lg"></i></div>
            <h1 class="success-title">Your Invitation is <span>Live!</span></h1>
            <p class="success-subtitle">Share it with your guests — the link is ready instantly</p>
        </div>

        <div class="card-body">

            <!-- Shareable link -->
            <div>
                <p class="section-title">Shareable Link</p>
                <div class="link-row">
                    <div class="link-display" id="invite-link">{{ $publicUrl }}</div>
                    <button class="btn-copy" onclick="copyLink()">Copy</button>
                </div>
            </div>

            <!-- QR + Share buttons -->
            <div>
                <p class="section-title">QR Code &amp; Share</p>
                <div class="qr-share-row">
                    <div class="qr-box">
                        <div class="qr-canvas" id="qrcode"></div>
                        <div class="qr-dl-row">
                            <button class="btn-qr-dl btn-qr-dl-dark" onclick="downloadInvitation('png')">PNG ↓</button>
                            <button class="btn-qr-dl btn-qr-dl-outline" onclick="downloadInvitation('svg')">SVG ↓</button>
                        </div>
                    </div>

                    <div class="share-buttons">
                        <a href="https://api.whatsapp.com/send?text={{ urlencode('You are cordially invited to our wedding! View our digital invitation here: '.$publicUrl) }}"
                           target="_blank" class="btn-share btn-whatsapp">
                            <i class="bi bi-whatsapp"></i> Share on WhatsApp
                        </a>
                        <a href="mailto:?subject={{ urlencode('Wedding Invitation') }}&body={{ urlencode('We invite you to join us on our special day! View details here: '.$publicUrl) }}"
                           class="btn-share btn-email">
                            <i class="bi bi-envelope-fill"></i> Share via Email
                        </a>
                        <button onclick="copyLink()" class="btn-share btn-copylink">
                            <i class="bi bi-link-45deg"></i> Copy Link
                        </button>
                    </div>
                </div>
            </div>

            <!-- Stats -->
            <div>
                <p class="section-title">Invitation Stats</p>
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-val">0</div>
                        <div class="stat-label">Guest Views</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-val" style="font-size:.82rem">{{ now()->format('d M Y') }}</div>
                        <div class="stat-label">Published</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-val" style="font-size:.78rem">
                            @if($template === 'royal-scroll') Royal
                            @elseif($template === 'golden-minimalist') Minimal
                            @else Celestial
                            @endif
                        </div>
                        <div class="stat-label">Template</div>
                    </div>
                </div>
            </div>

            <!-- Tip -->
            <div class="tip-alert">
                <p class="tip-alert-title">💡 Local Network Testing Tip</p>
                <p>On <code>127.0.0.1 / localhost</code>, the QR won't work on a phone. Try:</p>
                <ul>
                    <li><strong>Option A (PC)</strong>: Click "Copy Link" and paste into a new browser tab.</li>
                    <li><strong>Option B (Phone)</strong>: Run <code>php artisan serve --host 0.0.0.0</code> and use your Wi-Fi IP to open the site.</li>
                </ul>
            </div>

            <!-- Edit button -->
            <a href="{{ route('wedding.details.create') }}" class="btn-edit">
                <i class="bi bi-pencil-fill"></i> Edit Invitation Details
            </a>

            <p class="pub-footer">✦ <span>velvetvows.com</span> ✦</p>
        </div>
    </div>

    <!-- Copy toast -->
    <div class="copy-toast" id="copy-toast"><i class="bi bi-check2"></i> &nbsp;Link copied!</div>

    <script>
        const publicUrl = @json($publicUrl);
        const template  = @json($template);
        const details   = @json($details);

        /* QR code */
        window.addEventListener('DOMContentLoaded', () => {
            new QRCode(document.getElementById('qrcode'), {
                text: publicUrl, width: 110, height: 110,
                colorDark: '#1A1A1A', colorLight: '#FFFFFF',
                correctLevel: QRCode.CorrectLevel.H
            });
        });

        /* Copy link */
        function copyLink() {
            navigator.clipboard.writeText(publicUrl).then(() => {
                const t = document.getElementById('copy-toast');
                t.classList.add('show');
                setTimeout(() => t.classList.remove('show'), 2000);
            });
        }

        /* SVG generators */
        function getRoyalScrollSVG(d) {
            if (d.wedding_date) {
                const rd = new Date(d.wedding_date);
                d.wedding_date_formatted = rd.toLocaleDateString('en-US', { weekday:'long',day:'numeric',month:'long',year:'numeric' }).replace(/,/g,'');
            }
            if (d.rsvp_deadline) {
                const rv = new Date(d.rsvp_deadline);
                d.rsvp_deadline_formatted = rv.toLocaleDateString('en-US', { day:'numeric',month:'long',year:'numeric' });
            }
            const date = d.wedding_date_formatted || d.wedding_date;
            const rsvp = d.rsvp_deadline_formatted ? `RSVP by ${d.rsvp_deadline_formatted} • ${d.rsvp_contact}` : `RSVP: ${d.rsvp_contact}`;
            const dress = (d.dress_code || 'Formal').replace('_',' ').toUpperCase();
            const msg = d.personal_message || 'With joy in our hearts, we welcome you';
            return `<svg width="800" height="1200" viewBox="0 0 800 1200" xmlns="http://www.w3.org/2000/svg"><rect width="800" height="1200" fill="#1A1A1A"/><rect x="25" y="25" width="750" height="1150" rx="20" stroke="#C59B27" stroke-width="4" stroke-dasharray="12 8" fill="none"/><text x="400" y="150" text-anchor="middle" font-family="Playfair Display,serif" font-size="16" fill="#C59B27" letter-spacing="5" font-weight="bold">✦ REQUEST THE HONOUR ✦</text><text x="400" y="195" text-anchor="middle" font-family="Playfair Display,serif" font-size="20" fill="#C59B27" font-style="italic">of your presence at the marriage of</text><text x="400" y="320" text-anchor="middle" font-family="Playfair Display,serif" font-size="64" font-weight="800" fill="#FFFDF9">${d.bride_name}</text><text x="400" y="380" text-anchor="middle" font-family="Playfair Display,serif" font-size="40" font-style="italic" fill="#C59B27">&amp;</text><text x="400" y="470" text-anchor="middle" font-family="Playfair Display,serif" font-size="64" font-weight="800" fill="#FFFDF9">${d.groom_name}</text><path d="M200 530 L600 530" stroke="#C59B27" stroke-width="2"/><text x="400" y="590" text-anchor="middle" font-family="Playfair Display,serif" font-size="26" fill="#FFFDF9">${date}</text><text x="400" y="630" text-anchor="middle" font-family="Lato,sans-serif" font-size="18" fill="#C59B27">${d.time} onwards</text><path d="M200 680 L600 680" stroke="#C59B27" stroke-width="2"/><text x="400" y="745" text-anchor="middle" font-family="Lato,sans-serif" font-size="16" fill="#C59B27" letter-spacing="5" font-weight="bold">THE VENUE</text><text x="400" y="785" text-anchor="middle" font-family="Playfair Display,serif" font-size="28" font-weight="700" fill="#FFFDF9">${d.venue_name}</text><text x="400" y="825" text-anchor="middle" font-family="Lato,sans-serif" font-size="16" fill="#857B72">${d.venue_address}</text><path d="M200 880 L600 880" stroke="#C59B27" stroke-width="2"/><text x="400" y="935" text-anchor="middle" font-family="Lato,sans-serif" font-size="16" fill="#C59B27">${rsvp}</text><text x="400" y="975" text-anchor="middle" font-family="Lato,sans-serif" font-size="14" fill="#FFFDF9" letter-spacing="4" font-weight="bold">DRESS CODE: ${dress}</text><text x="400" y="1070" text-anchor="middle" font-family="Playfair Display,serif" font-size="18" fill="#C59B27" font-style="italic">✦ ${msg} ✦</text><text x="400" y="1135" text-anchor="middle" font-family="Lato,sans-serif" font-size="12" fill="#857B72" letter-spacing="2">CREATED WITH VELVETVOWS.COM</text></svg>`;
        }

        function downloadInvitation(format) {
            const svgStr = getRoyalScrollSVG({...details});
            const fileName = `velvet_vows_${(details.bride_name||'').toLowerCase().replace(/\s+/g,'_')}_${(details.groom_name||'').toLowerCase().replace(/\s+/g,'_')}`;
            if (format === 'svg') {
                const blob = new Blob([svgStr], {type:'image/svg+xml;charset=utf-8'});
                const a = document.createElement('a');
                a.href = URL.createObjectURL(blob); a.download = fileName+'.svg';
                document.body.appendChild(a); a.click(); document.body.removeChild(a);
            } else {
                const blob = new Blob([svgStr], {type:'image/svg+xml;charset=utf-8'});
                const url = URL.createObjectURL(blob);
                const img = new Image();
                img.onload = () => {
                    const c = document.createElement('canvas'); c.width=800; c.height=1200;
                    c.getContext('2d').drawImage(img,0,0,800,1200);
                    const a = document.createElement('a');
                    a.href = c.toDataURL('image/png'); a.download = fileName+'.png';
                    document.body.appendChild(a); a.click(); document.body.removeChild(a);
                    URL.revokeObjectURL(url);
                };
                img.src = url;
            }
        }
    </script>
</body>
</html>
