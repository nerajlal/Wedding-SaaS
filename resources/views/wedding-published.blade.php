<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Velvet Vows — Your Invitation is Live! 🎉</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@300;400;500;600;700;800&family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

    <style>
        :root {
            --gold-dark:    #8C6D3B;
            --gold-primary: #B89047;
            --gold-light:   #DFCA9B;
            --text-dark:    #2A241E;
            --text-muted:   #7A7065;
            --border-gold:  rgba(184,144,71,0.25);
            --font-display: 'Outfit', sans-serif;
            --font-body:    'Inter', sans-serif;
            --font-serif:   'Cormorant Garamond', serif;
        }
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: var(--font-body);
            background: #FFFDF9;
            color: var(--text-dark);
            min-height: 100vh;
            display: flex; flex-direction: column;
            overflow-x: hidden;
        }

        /* Hero Section */
        .pub-hero {
            background: linear-gradient(135deg, #F9F6F0 0%, #FFFDF9 100%);
            padding: 5rem 2rem 6rem;
            position: relative;
            overflow: hidden;
            border-bottom: 1px solid rgba(184,144,71,0.15);
        }
        .pub-hero::before {
            content: ''; position: absolute; top: -50%; right: -10%; width: 600px; height: 600px;
            background: radial-gradient(circle, rgba(184,144,71,0.1) 0%, transparent 70%); border-radius: 50%;
        }
        .pub-hero::after {
            content: ''; position: absolute; bottom: -50%; left: -10%; width: 500px; height: 500px;
            background: radial-gradient(circle, rgba(16,185,129,0.08) 0%, transparent 70%); border-radius: 50%;
        }

        .hero-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            gap: 2rem;
            position: relative; z-index: 10;
        }
        .hero-icon {
            width: 90px; height: 90px; border-radius: 50%;
            background: linear-gradient(135deg, #10B981, #34D399);
            display: flex; align-items: center; justify-content: center;
            color: #fff; font-size: 2.5rem;
            box-shadow: 0 15px 35px rgba(16,185,129,0.3), inset 0 2px 5px rgba(255,255,255,0.5);
        }
        .hero-text h1 {
            font-family: var(--font-display); font-size: 3rem; font-weight: 800;
            color: var(--text-dark); letter-spacing: -1px; margin-bottom: .2rem;
        }
        .hero-text h1 span {
            background: linear-gradient(135deg, var(--gold-dark), var(--gold-primary));
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
        }
        .hero-text p {
            font-family: var(--font-serif); font-style: italic; font-size: 1.4rem; color: var(--text-muted);
        }

        /* Main Content */
        .pub-main {
            flex: 1;
            padding: 4rem 0 6rem;
            background: #fff;
        }

        .pub-card {
            background: #FFFDF9;
            border: 1px solid rgba(184,144,71,0.15);
            border-radius: 24px;
            padding: 2.5rem;
            box-shadow: 0 20px 50px rgba(0,0,0,0.02);
            height: 100%;
            display: flex; flex-direction: column;
        }

        .section-title {
            font-family: var(--font-display); font-size: 1.2rem; font-weight: 700; color: var(--text-dark);
            margin-bottom: 1.5rem; display: flex; align-items: center; gap: .8rem;
        }
        .section-title i { color: var(--gold-primary); font-size: 1.4rem; }

        /* Link Box */
        .link-box {
            background: #fff; border: 1px solid var(--border-gold); border-radius: 16px;
            padding: 1rem 1.5rem; display: flex; align-items: center; justify-content: space-between; gap: 1rem;
            box-shadow: 0 8px 20px rgba(184,144,71,0.05); margin-bottom: 2.5rem;
        }
        .link-text {
            font-family: 'Inter', monospace; font-size: 1.1rem; color: var(--gold-dark); font-weight: 600;
            white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
        }
        .btn-copy {
            background: linear-gradient(135deg, var(--gold-dark), var(--gold-primary));
            color: #fff; border: none; padding: .8rem 2rem; border-radius: 12px; font-weight: 600; font-size: 1rem;
            transition: all .3s; white-space: nowrap; box-shadow: 0 8px 15px rgba(184,144,71,0.2);
        }
        .btn-copy:hover { transform: translateY(-2px); box-shadow: 0 12px 20px rgba(184,144,71,0.3); }

        /* Stats Grid */
        .stats-grid {
            display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem; margin-bottom: 2.5rem;
        }
        .stat-item {
            background: #fff; border: 1px solid #f0f0f0; border-radius: 16px; padding: 1.5rem; text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.02); transition: transform .3s;
        }
        .stat-item:hover { transform: translateY(-5px); }
        .stat-val { font-family: var(--font-display); font-size: 2rem; font-weight: 800; color: var(--gold-primary); line-height: 1; margin-bottom: .5rem; }
        .stat-label { font-size: .75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: var(--text-muted); }

        /* QR Layout */
        .qr-layout {
            display: flex; gap: 2.5rem; align-items: center;
        }
        .qr-card {
            background: #fff; padding: 1.5rem; border-radius: 20px; border: 1px solid #f0f0f0;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05); text-align: center;
        }
        .qr-canvas { width: 160px; height: 160px; margin: 0 auto 1rem; }
        .qr-canvas img, .qr-canvas canvas { max-width: 100%; border-radius: 8px; }
        .btn-dl { background: #f8f9fa; border: 1px solid #ddd; padding: .5rem 1rem; border-radius: 8px; font-weight: 600; font-size: .85rem; color: var(--text-dark); transition: all .2s; }
        .btn-dl:hover { background: #fff; border-color: var(--gold-primary); color: var(--gold-primary); }

        .share-actions { flex: 1; display: flex; flex-direction: column; gap: 1rem; }
        .btn-share {
            display: flex; align-items: center; gap: 1rem; padding: 1rem 1.5rem; border-radius: 12px;
            background: #fff; border: 1px solid #f0f0f0; color: var(--text-dark); font-weight: 600; font-size: 1.05rem;
            text-decoration: none; transition: all .3s; box-shadow: 0 5px 15px rgba(0,0,0,0.02);
        }
        .btn-share:hover { transform: translateY(-3px); box-shadow: 0 10px 25px rgba(0,0,0,0.08); }
        .btn-share i { font-size: 1.4rem; }
        .btn-share.wa i { color: #10B981; }
        .btn-share.em i { color: #3B82F6; }

        /* Actions Footer */
        .actions-bar {
            display: flex; align-items: center; justify-content: space-between;
            margin-top: 3rem; padding-top: 2rem; border-top: 1px solid #eaeaea;
        }
        .btn-edit {
            color: var(--gold-dark); font-weight: 600; text-decoration: none; display: flex; align-items: center; gap: .5rem; font-size: 1.05rem; transition: color .3s;
        }
        .btn-edit:hover { color: var(--gold-primary); }

        .copy-toast { position: fixed; bottom: 2rem; left: 50%; transform: translateX(-50%) translateY(80px); background: var(--text-dark); color: var(--gold-primary); border: 1px solid rgba(255,255,255,0.1); font-size: .9rem; font-weight: 700; padding: .8rem 2rem; border-radius: 99px; box-shadow: 0 15px 40px rgba(0,0,0,.2); z-index: 9999; opacity: 0; transition: all .4s cubic-bezier(0.16,1,0.3,1); pointer-events: none; white-space: nowrap; }
        .copy-toast.show { transform: translateX(-50%) translateY(0); opacity: 1; }

        @media (max-width: 992px) {
            .hero-content { flex-direction: column; text-align: center; }
            .qr-layout { flex-direction: column; align-items: stretch; }
        }
    </style>
</head>
<body>
    @include('partials.header')

    <section class="pub-hero">
        <div class="hero-content">
            <div class="hero-icon"><i class="bi bi-check-lg"></i></div>
            <div class="hero-text">
                <h1>Your Invitation is <span>Live!</span></h1>
                <p>Beautifully published and ready to be shared with the world.</p>
            </div>
        </div>
    </section>

    <section class="pub-main">
        <div class="container-xl">
            <div class="row g-5">
                
                <!-- Left Column: Links & Stats -->
                <div class="col-lg-7">
                    <div class="pub-card">
                        <div class="section-title"><i class="bi bi-link-45deg"></i> Shareable Link</div>
                        <div class="link-box">
                            <div class="link-text" id="invite-link">{{ $publicUrl }}</div>
                            <button class="btn-copy" onclick="copyLink()">Copy Link</button>
                        </div>

                        <div class="section-title"><i class="bi bi-bar-chart-line-fill"></i> Performance Stats</div>
                        <div class="stats-grid">
                            <div class="stat-item">
                                <div class="stat-val">0</div>
                                <div class="stat-label">Views</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-val" style="font-size:1.3rem; margin-top:.4rem">{{ now()->format('M d') }}</div>
                                <div class="stat-label">Published</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-val" style="font-size:1.1rem; margin-top:.5rem">
                                    @if($template === 'royal-scroll') Royal
                                    @elseif($template === 'golden-minimalist') Minimal
                                    @else Celestial
                                    @endif
                                </div>
                                <div class="stat-label">Template</div>
                            </div>
                        </div>

                        <div style="background: rgba(184,144,71,0.05); padding: 1.5rem; border-radius: 16px; border: 1px dashed rgba(184,144,71,0.3);">
                            <h5 style="color:var(--gold-dark); font-weight:700; font-size:1rem; margin-bottom:.5rem;">💡 Developer Testing Tip</h5>
                            <p style="margin:0; font-size:.9rem; color:var(--text-muted);">Since you are running on <code>127.0.0.1</code>, scanning the QR code on a mobile device won't work unless you start the server with <code>php artisan serve --host 0.0.0.0</code> and use your local Wi-Fi IP address.</p>
                        </div>
                    </div>
                </div>

                <!-- Right Column: QR & Share -->
                <div class="col-lg-5">
                    <div class="pub-card">
                        <div class="section-title"><i class="bi bi-qr-code-scan"></i> QR & Quick Share</div>
                        
                        <div class="qr-layout">
                            <div class="qr-card">
                                <div class="qr-canvas" id="qrcode"></div>
                                <div class="d-flex gap-2">
                                    <button class="btn-dl flex-fill" onclick="downloadInvitation('png')">PNG</button>
                                    <button class="btn-dl flex-fill" onclick="downloadInvitation('svg')">SVG</button>
                                </div>
                            </div>
                            
                            <div class="share-actions">
                                <a href="https://api.whatsapp.com/send?text={{ urlencode('You are cordially invited to our wedding! View our digital invitation here: '.$publicUrl) }}" target="_blank" class="btn-share wa">
                                    <i class="bi bi-whatsapp"></i> WhatsApp
                                </a>
                                <a href="mailto:?subject={{ urlencode('Wedding Invitation') }}&body={{ urlencode('We invite you to join us on our special day! View details here: '.$publicUrl) }}" class="btn-share em">
                                    <i class="bi bi-envelope-fill"></i> Email Invite
                                </a>
                                <a href="{{ route('wedding.edit', $slug) }}" class="btn-share" style="color:var(--gold-dark)">
                                    <i class="bi bi-pencil-square"></i> Edit Details
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            
            <!-- <div class="actions-bar">
                <a href="{{ route('my.cards') }}" class="btn-edit">
                    <i class="bi bi-arrow-left"></i> Back to Dashboard
                </a>
                <div style="font-size:.85rem; color:var(--text-muted); font-weight:600;">
                    ✦ velvetvows.com ✦
                </div>
            </div> -->
        </div>
    </section>

    @include('partials.popups')
    @include('partials.footer')

    <div class="copy-toast" id="copy-toast"><i class="bi bi-check2"></i> &nbsp;Link copied!</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const publicUrl = @json($publicUrl);
        const template  = @json($template);
        const details   = @json($details);

        /* QR code */
        window.addEventListener('DOMContentLoaded', () => {
            new QRCode(document.getElementById('qrcode'), {
                text: publicUrl, width: 160, height: 160,
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
