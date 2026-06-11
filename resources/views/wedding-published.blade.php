@php
    $templateNames = [
        'premium-vintage' => 'Premium Vintage',
        'elegant-circle' => 'Elegant Circle',
        'geometric-polaroid' => 'Geometric Polaroid',
        'ethereal-glass' => 'Ethereal Glass',
        'simple-elegance' => 'Simple Elegance',
        'seaside-promise' => 'Seaside Promise',
        'heartfeltcollage' => 'Heartfelt Collage',
        'florallovesplash' => 'Floral Love Splash',
        'lovelocked' => 'Love Locked Cinematic',
        'pinkgreyelegance' => 'Pink & Grey Elegance',
        'eternalposter' => 'Eternal Poster',
        'celestial-navy' => 'Celestial Navy',
        'gatsby-luxury' => 'Gatsby Luxury',
        'enchanted-forest' => 'Enchanted Forest',
    ];
    $displayTemplateName = $templateNames[$template] ?? ucwords(str_replace('-', ' ', $template));
@endphp
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
                                    {{ $displayTemplateName }}
                                </div>
                                <div class="stat-label">Template</div>
                            </div>
                        </div>

                        <div style="background: rgba(184,144,71,0.05); padding: 1.5rem; border-radius: 16px; border: 1px dashed rgba(184,144,71,0.3);">
                            <h5 style="color:var(--gold-dark); font-weight:700; font-size:1rem; margin-bottom:.5rem;">💡 Developer Testing Tip</h5>
                            <p style="margin:0; font-size:.9rem; color:var(--text-muted);">Since you are running on <code>127.0.0.1</code>, scanning the QR code on a mobile device won't work unless you start the server with <code>php artisan serve --host 0.0.0.0</code> and use your local Wi-Fi IP address.</p>
                        </div>

                        <div class="section-title" style="margin-top:2rem;"><i class="bi bi-files"></i> Theme Details</div>
                        <button class="btn-copy" onclick="copyThemeDetails()" style="width:100%; margin-top:1rem;">
                            <i class="bi bi-clipboard"></i> Copy Theme with Image Details
                        </button>
                        <p style="font-size:.8rem; color:var(--text-muted); margin-top:.8rem; text-align:center;">Copies template name, images, and couple details</p>
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

        /* Copy Theme Details */
        function copyThemeDetails() {
            // Format image URLs
            const mainImage = details.main_image_url ? details.main_image_url : 'Not set';
            const brideImage = details.bride_image_url ? details.bride_image_url : 'Not set';
            const groomImage = details.groom_image_url ? details.groom_image_url : 'Not set';
            const accentImage = details.accent_image_url ? details.accent_image_url : 'Not set';
            
            // Format gallery images
            let galleryList = 'None';
            if (details.galleries && Array.isArray(details.galleries) && details.galleries.length > 0) {
                galleryList = details.galleries.map((g, i) => `  ${i + 1}. ${g.image_url || g}`).join('\n');
            }
            
            // Format RSVP info
            const rsvpContact = details.rsvp_contact || 'Not provided';
            const rsvpDeadline = details.rsvp_deadline ? new Date(details.rsvp_deadline).toLocaleDateString() : 'Not set';
            const dressCode = details.dress_code ? details.dress_code.replace('_', ' ').toUpperCase() : 'Not specified';
            
            // Format guest info
            const expectedGuestCount = details.expected_guest_count ? details.expected_guest_count : 'Not specified';
            const guestNotes = details.guest_notes || 'No special notes';
            
            // Calculate event duration info
            const eventDate = new Date(details.wedding_date);
            const eventDateStr = eventDate.toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
            
            // Build comprehensive theme info
            const themeInfo = `
╔════════════════════════════════════════════════════════════════╗
║                    WEDDING THEME DETAILS                      ║
╚════════════════════════════════════════════════════════════════╝

🎨 TEMPLATE & THEME
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
Theme Name: ${template}
Display Name: ${template.replace(/-/g, ' ').charAt(0).toUpperCase() + template.replace(/-/g, ' ').slice(1)}

👰 COUPLE INFORMATION
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
Bride: ${details.bride_name}
Groom: ${details.groom_name}

📅 EVENT DETAILS
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
Date: ${eventDateStr}
Time: ${details.time}
Venue: ${details.venue_name}
Address: ${details.venue_address}
Location URL: ${details.location_url ? details.location_url : 'Not set'}

👥 GUEST & CAPACITY INFO
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
Expected Guest Count: ${expectedGuestCount}
Special Guest Notes:
${guestNotes}

💌 RSVP & CEREMONY INFO
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
RSVP Contact: ${rsvpContact}
RSVP Deadline: ${rsvpDeadline}
Dress Code: ${dressCode}

📝 PERSONAL MESSAGE
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
${details.personal_message || 'No personal message added'}

🖼️  IMAGE ASSETS
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
Main Image: ${mainImage}
Bride Image: ${brideImage}
Groom Image: ${groomImage}
Accent Image: ${accentImage}

📸 GALLERY IMAGES
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
${galleryList}

🌐 SHARING & ACCESS
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
Public Invitation Link: ${publicUrl}
Payment Status: ${details.is_paid ? 'Paid ✓' : 'Pending'}
Published Date: ${new Date().toLocaleDateString()}

════════════════════════════════════════════════════════════════
Generated: ${new Date().toLocaleString()}
═══════════════════════════════════════════════════════════════
            `.trim();
            
            navigator.clipboard.writeText(themeInfo).then(() => {
                const t = document.getElementById('copy-toast');
                t.innerHTML = '<i class="bi bi-check2"></i> &nbsp;Complete theme details copied!';
                t.classList.add('show');
                setTimeout(() => {
                    t.classList.remove('show');
                    t.innerHTML = '<i class="bi bi-check2"></i> &nbsp;Link copied!';
                }, 2500);
            }).catch(() => {
                alert('Could not copy to clipboard');
            });
        }

        /* SVG generators */
        function normalizeImageUrl(src) {
            if (!src) return '';
            if (src.startsWith('data:')) return src;
            if (src.startsWith('http://') || src.startsWith('https://')) return src;
            if (src.startsWith('//')) return window.location.protocol + src;
            if (src.startsWith('/')) return `${window.location.origin}${src}`;
            return `${window.location.origin}/${src.replace(/^\/+/, '')}`;
        }

        function escapeXml(str) {
            return String(str || '').replace(/[&"'<>]/g, (c) => ({'&':'&amp;','"':'&quot;','\'':'&apos;','<':'&lt;','>':'&gt;'}[c]));
        }

        function getThemedSVG(t, d) {
            if (d.wedding_date) {
                const rd = new Date(d.wedding_date);
                d.wedding_date_formatted = rd.toLocaleDateString('en-US', { weekday:'long',day:'numeric',month:'long',year:'numeric' }).replace(/,/g,'');
            }
            if (d.rsvp_deadline) {
                const rv = new Date(d.rsvp_deadline);
                d.rsvp_deadline_formatted = rv.toLocaleDateString('en-US', { day:'numeric',month:'long',year:'numeric' });
            }
            const date = d.wedding_date_formatted || d.wedding_date;
            const rsvp = d.rsvp_deadline_formatted ? `RSVP by ${escapeXml(d.rsvp_deadline_formatted)} • ${escapeXml(d.rsvp_contact)}` : `RSVP: ${escapeXml(d.rsvp_contact)}`;
            const dress = escapeXml((d.dress_code || 'Formal').replace('_',' ').toUpperCase());
            const msg = escapeXml(d.personal_message || 'With joy in our hearts, we welcome you');
            const mainImageUrl = normalizeImageUrl(d.main_image_url || d.photo || d.accent_image_url || (d.galleries && d.galleries[0] ? d.galleries[0].image_url : ''));

            let baseSvg = '';
            if (t === 'heartfeltcollage' || t === 'florallovesplash' || t === 'lovelocked' || t === 'pinkgreyelegance') {
                const imageDefs = mainImageUrl ? `<defs><pattern id="mainPhoto" patternUnits="userSpaceOnUse" width="800" height="320"><image href="${mainImageUrl}" x="0" y="0" width="800" height="320" preserveAspectRatio="xMidYMid slice" /></pattern></defs>` : '';
                const imageFill = mainImageUrl ? `fill="url(#mainPhoto)"` : `fill="#fcecc8"`;
                baseSvg = `<svg width="800" height="1200" viewBox="0 0 800 1200" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    ${imageDefs}
                    <rect width="800" height="1200" fill="#fef7d5"/>
                    <rect x="35" y="45" width="730" height="320" rx="20" ${imageFill} />
                    <rect x="25" y="25" width="750" height="1150" rx="20" stroke="#3d2a1d" stroke-width="3" fill="none"/>
                    <rect x="35" y="35" width="730" height="1130" rx="15" stroke="#3d2a1d" stroke-width="1" fill="none"/>
                    <text x="400" y="130" text-anchor="middle" font-family="Cinzel, serif" font-size="28" fill="#c91111" font-weight="bold">♥️</text>
                    <text x="400" y="180" text-anchor="middle" font-family="Cinzel, serif" font-size="14" fill="#3d2a1d" letter-spacing="4" font-weight="600">TOGETHER WITH THEIR FAMILIES</text>
                    <text x="400" y="220" text-anchor="middle" font-family="Playfair Display, serif" font-size="20" fill="#3d2a1d" font-style="italic">invite you to celebrate the wedding of</text>
                    <text x="400" y="340" text-anchor="middle" font-family="Cinzel, serif" font-size="56" font-weight="bold" fill="#3d2a1d">${escapeXml(d.bride_name)}</text>
                    <text x="400" y="400" text-anchor="middle" font-family="Playfair Display, serif" font-size="36" font-style="italic" fill="#c91111">&amp;</text>
                    <text x="400" y="490" text-anchor="middle" font-family="Cinzel, serif" font-size="56" font-weight="bold" fill="#3d2a1d">${escapeXml(d.groom_name)}</text>
                    <path d="M 250 550 L 370 550 M 430 550 L 550 550" stroke="#3d2a1d" stroke-width="2"/>
                    <text x="400" y="556" text-anchor="middle" font-family="Arial" font-size="20" fill="#c91111">♥</text>
                    <text x="400" y="610" text-anchor="middle" font-family="Cinzel, serif" font-size="24" font-weight="bold" fill="#3d2a1d">${escapeXml(date)}</text>
                    <text x="400" y="650" text-anchor="middle" font-family="Montserrat, sans-serif" font-size="18" fill="#3d2a1d" font-weight="500">${escapeXml(d.time)}</text>
                    <text x="400" y="740" text-anchor="middle" font-family="Cinzel, serif" font-size="16" fill="#c91111" letter-spacing="4" font-weight="bold">THE VENUE</text>
                    <text x="400" y="785" text-anchor="middle" font-family="Cinzel, serif" font-size="26" font-weight="bold" fill="#3d2a1d">${escapeXml(d.venue_name)}</text>
                    <text x="400" y="825" text-anchor="middle" font-family="Montserrat, sans-serif" font-size="16" fill="#555" font-weight="400">${escapeXml(d.venue_address)}</text>
                    <line x1="300" y1="880" x2="500" y2="880" stroke="#3d2a1d" stroke-dasharray="5 5" stroke-width="1.5"/>
                    <text x="400" y="930" text-anchor="middle" font-family="Montserrat, sans-serif" font-size="16" fill="#3d2a1d" font-weight="600">${rsvp}</text>
                    <text x="400" y="970" text-anchor="middle" font-family="Montserrat, sans-serif" font-size="14" fill="#555" letter-spacing="3" font-weight="600">DRESS CODE: ${dress}</text>
                    <text x="400" y="1060" text-anchor="middle" font-family="Playfair Display, serif" font-size="18" fill="#3d2a1d" font-style="italic">"${msg}"</text>
                    <text x="400" y="1135" text-anchor="middle" font-family="Montserrat, sans-serif" font-size="11" fill="#7a7065" letter-spacing="2">CREATED WITH VELVETVOWS.COM</text>
                </svg>`;
            } else if (t === 'geometric-polaroid' || t === 'simple-elegance' || t === 'ethereal-glass') {
                baseSvg = `<svg width="800" height="1200" viewBox="0 0 800 1200" xmlns="http://www.w3.org/2000/svg">
                    <rect width="800" height="1200" fill="#f4f5e7"/>
                    <path d="M 0 0 L 800 800 M 800 0 L 0 800 M 0 400 L 800 1200" stroke="#e0e5d3" stroke-width="2" fill="none" opacity="0.5"/>
                    <rect x="30" y="30" width="740" height="1140" stroke="#8c9b74" stroke-width="2" fill="none"/>
                    <text x="400" y="140" text-anchor="middle" font-family="Montserrat, sans-serif" font-size="14" fill="#c9b183" letter-spacing="6" font-weight="bold">THE WEDDING INVITATION</text>
                    <text x="400" y="240" text-anchor="middle" font-family="Playball, cursive, sans-serif" font-size="72" fill="#2c3e2c">${d.bride_name}</text>
                    <text x="400" y="300" text-anchor="middle" font-family="Montserrat, sans-serif" font-size="16" fill="#c9b183" letter-spacing="4">&amp;</text>
                    <text x="400" y="390" text-anchor="middle" font-family="Playball, cursive, sans-serif" font-size="72" fill="#2c3e2c">${d.groom_name}</text>
                    <line x1="350" y1="450" x2="450" y2="450" stroke="#c9b183" stroke-width="2"/>
                    <text x="400" y="520" text-anchor="middle" font-family="Montserrat, sans-serif" font-size="24" fill="#2c3e2c" font-weight="bold" letter-spacing="2">${date}</text>
                    <text x="400" y="560" text-anchor="middle" font-family="Montserrat, sans-serif" font-size="16" fill="#2c3e2c" font-weight="500">${d.time}</text>
                    <rect x="150" y="620" width="500" height="200" rx="10" fill="#ffffff" stroke="#e0e5d3" stroke-width="1"/>
                    <text x="400" y="665" text-anchor="middle" font-family="Montserrat, sans-serif" font-size="13" fill="#c9b183" letter-spacing="4" font-weight="bold">THE VENUE</text>
                    <text x="400" y="710" text-anchor="middle" font-family="Montserrat, sans-serif" font-size="24" font-weight="bold" fill="#2c3e2c">${d.venue_name}</text>
                    <text x="400" y="750" text-anchor="middle" font-family="Montserrat, sans-serif" font-size="15" fill="#666">${d.venue_address}</text>
                    <text x="400" y="890" text-anchor="middle" font-family="Montserrat, sans-serif" font-size="16" fill="#2c3e2c" font-weight="600">${rsvp}</text>
                    <text x="400" y="930" text-anchor="middle" font-family="Montserrat, sans-serif" font-size="13" fill="#666" letter-spacing="3" font-weight="600">DRESS CODE: ${dress}</text>
                    <text x="400" y="1020" text-anchor="middle" font-family="Montserrat, sans-serif" font-size="16" fill="#2c3e2c" font-style="italic" font-weight="450">"${msg}"</text>
                    <text x="400" y="1135" text-anchor="middle" font-family="Montserrat, sans-serif" font-size="11" fill="#8c9b74" letter-spacing="2">CREATED WITH VELVETVOWS.COM</text>
                </svg>`;
            } else if (t === 'celestial-navy' || t === 'gatsby-luxury' || t === 'enchanted-forest') {
                baseSvg = `<svg width="800" height="1200" viewBox="0 0 800 1200" xmlns="http://www.w3.org/2000/svg">
                    <rect width="800" height="1200" fill="#0A1628"/>
                    <circle cx="100" cy="150" r="1.5" fill="#E8C55A" opacity="0.8"/>
                    <circle cx="700" cy="250" r="2" fill="#E8C55A"/>
                    <circle cx="200" cy="850" r="1" fill="#E8C55A" opacity="0.5"/>
                    <circle cx="650" cy="950" r="2.5" fill="#E8C55A"/>
                    <path d="M 400 60 L 400 90 M 385 75 L 415 75" stroke="#E8C55A" stroke-width="1.5"/>
                    <rect x="25" y="25" width="750" height="1150" rx="15" stroke="#E8C55A" stroke-width="2" fill="none" opacity="0.8"/>
                    <rect x="35" y="35" width="730" height="1130" rx="10" stroke="#E8C55A" stroke-width="0.75" fill="none" stroke-dasharray="10 5" opacity="0.6"/>
                    <text x="400" y="150" text-anchor="middle" font-family="Cinzel, serif" font-size="14" fill="#E8C55A" letter-spacing="5" font-weight="600">CELESTIAL UNION</text>
                    <text x="400" y="190" text-anchor="middle" font-family="Cinzel, serif" font-size="18" fill="#ffffff" font-style="italic" opacity="0.8">Written in the Stars</text>
                    <text x="400" y="320" text-anchor="middle" font-family="Great Vibes, cursive, serif" font-size="72" fill="#ffffff">${d.bride_name}</text>
                    <text x="400" y="380" text-anchor="middle" font-family="Cinzel, serif" font-size="20" fill="#E8C55A" letter-spacing="4">AND</text>
                    <text x="400" y="470" text-anchor="middle" font-family="Great Vibes, cursive, serif" font-size="72" fill="#ffffff">${d.groom_name}</text>
                    <path d="M 280 520 L 520 520" stroke="#E8C55A" stroke-width="1.5" opacity="0.7"/>
                    <text x="400" y="580" text-anchor="middle" font-family="Cinzel, serif" font-size="26" fill="#ffffff" font-weight="bold">${date}</text>
                    <text x="400" y="620" text-anchor="middle" font-family="Inter, sans-serif" font-size="18" fill="#E8C55A">${d.time}</text>
                    <text x="400" y="720" text-anchor="middle" font-family="Cinzel, serif" font-size="14" fill="#E8C55A" letter-spacing="4" font-weight="600">THE VENUE</text>
                    <text x="400" y="770" text-anchor="middle" font-family="Cinzel, serif" font-size="28" font-weight="bold" fill="#ffffff">${d.venue_name}</text>
                    <text x="400" y="810" text-anchor="middle" font-family="Inter, sans-serif" font-size="16" fill="#E8C55A" opacity="0.9">${d.venue_address}</text>
                    <path d="M 320 870 L 480 870" stroke="#E8C55A" stroke-width="1" opacity="0.5"/>
                    <text x="400" y="930" text-anchor="middle" font-family="Inter, sans-serif" font-size="16" fill="#ffffff" font-weight="600">${rsvp}</text>
                    <text x="400" y="970" text-anchor="middle" font-family="Inter, sans-serif" font-size="14" fill="#E8C55A" letter-spacing="3" font-weight="600">DRESS CODE: ${dress}</text>
                    <text x="400" y="1060" text-anchor="middle" font-family="Cinzel, serif" font-size="16" fill="#ffffff" font-style="italic" opacity="0.85">"${msg}"</text>
                    <text x="400" y="1135" text-anchor="middle" font-family="Inter, sans-serif" font-size="11" fill="#E8C55A" letter-spacing="2" opacity="0.7">CREATED WITH VELVETVOWS.COM</text>
                </svg>`;
            } else {
                baseSvg = `<svg width="800" height="1200" viewBox="0 0 800 1200" xmlns="http://www.w3.org/2000/svg"><rect width="800" height="1200" fill="#1A1A1A"/><rect x="25" y="25" width="750" height="1150" rx="20" stroke="#C59B27" stroke-width="4" stroke-dasharray="12 8" fill="none"/><text x="400" y="150" text-anchor="middle" font-family="Playfair Display,serif" font-size="16" fill="#C59B27" letter-spacing="5" font-weight="bold">✦ REQUEST THE HONOUR ✦</text><text x="400" y="195" text-anchor="middle" font-family="Playfair Display,serif" font-size="20" fill="#C59B27" font-style="italic">of your presence at the marriage of</text><text x="400" y="320" text-anchor="middle" font-family="Playfair Display,serif" font-size="64" font-weight="800" fill="#FFFDF9">${d.bride_name}</text><text x="400" y="380" text-anchor="middle" font-family="Playfair Display,serif" font-size="40" font-style="italic" fill="#C59B27">&amp;</text><text x="400" y="470" text-anchor="middle" font-family="Playfair Display,serif" font-size="64" font-weight="800" fill="#FFFDF9">${d.groom_name}</text><path d="M200 530 L600 530" stroke="#C59B27" stroke-width="2"/><text x="400" y="590" text-anchor="middle" font-family="Playfair Display,serif" font-size="26" fill="#FFFDF9">${date}</text><text x="400" y="630" text-anchor="middle" font-family="Lato,sans-serif" font-size="18" fill="#C59B27">${d.time} onwards</text><path d="M200 680 L600 680" stroke="#C59B27" stroke-width="2"/><text x="400" y="745" text-anchor="middle" font-family="Lato,sans-serif" font-size="16" fill="#C59B27" letter-spacing="5" font-weight="bold">THE VENUE</text><text x="400" y="785" text-anchor="middle" font-family="Playfair Display,serif" font-size="28" font-weight="700" fill="#FFFDF9">${d.venue_name}</text><text x="400" y="825" text-anchor="middle" font-family="Lato,sans-serif" font-size="16" fill="#857B72">${d.venue_address}</text><path d="M200 880 L600 880" stroke="#C59B27" stroke-width="2"/><text x="400" y="935" text-anchor="middle" font-family="Lato,sans-serif" font-size="16" fill="#C59B27">${rsvp}</text><text x="400" y="975" text-anchor="middle" font-family="Lato,sans-serif" font-size="14" fill="#FFFDF9" letter-spacing="4" font-weight="bold">DRESS CODE: ${dress}</text><text x="400" y="1070" text-anchor="middle" font-family="Playfair Display,serif" font-size="18" fill="#C59B27" font-style="italic">✦ ${msg} ✦</text><text x="400" y="1135" text-anchor="middle" font-family="Lato,sans-serif" font-size="12" fill="#857B72" letter-spacing="2">CREATED WITH VELVETVOWS.COM</text></svg>`;
            }

            // Extension Logic: Add uploaded images
            let svgHeight = 1200;
            let yOffset = 1200;
            let extraElements = '';

            const mainImg = d.main_image_url ? normalizeImageUrl(d.main_image_url) : '';
            const brideImg = d.bride_image_url ? normalizeImageUrl(d.bride_image_url) : '';
            const groomImg = d.groom_image_url ? normalizeImageUrl(d.groom_image_url) : '';
            const galleries = d.galleries || [];

            // 1. Add Main Image card if it exists and the template doesn't already display it
            if (mainImg && t !== 'heartfeltcollage' && t !== 'florallovesplash' && t !== 'lovelocked' && t !== 'pinkgreyelegance') {
                extraElements += `
                    <!-- Main Photo -->
                    <defs>
                        <pattern id="mainPhotoCard" patternUnits="userSpaceOnUse" width="670" height="380">
                            <image href="${mainImg}" x="0" y="0" width="670" height="380" preserveAspectRatio="xMidYMid slice" />
                        </pattern>
                    </defs>
                    <rect x="65" y="${yOffset + 40}" width="670" height="380" rx="15" fill="url(#mainPhotoCard)" stroke="#B89047" stroke-width="2"/>
                `;
                yOffset += 460;
                svgHeight += 460;
            }

            // 2. Add Bride & Groom Portraits if they exist
            if (brideImg || groomImg) {
                extraElements += `
                    <!-- Divider -->
                    <line x1="100" y1="${yOffset}" x2="700" y2="${yOffset}" stroke="#B89047" stroke-width="1" stroke-dasharray="8 6" opacity="0.6"/>
                    
                    <text x="400" y="${yOffset + 50}" text-anchor="middle" font-family="Cinzel, serif" font-size="20" fill="#B89047" letter-spacing="4" font-weight="bold">THE HAPPY COUPLE</text>
                `;
                
                if (brideImg && groomImg) {
                    extraElements += `
                        <!-- Bride Image -->
                        <defs>
                            <pattern id="bridePhoto" patternUnits="userSpaceOnUse" width="160" height="160">
                                <image href="${brideImg}" x="0" y="0" width="160" height="160" preserveAspectRatio="xMidYMid slice" />
                            </pattern>
                        </defs>
                        <circle cx="280" cy="${yOffset + 150}" r="80" fill="url(#bridePhoto)" stroke="#B89047" stroke-width="2"/>
                        <text x="280" y="${yOffset + 260}" text-anchor="middle" font-family="Playfair Display, serif" font-size="18" fill="#333" font-weight="bold">${escapeXml(d.bride_name || 'Bride')}</text>
                        <text x="280" y="${yOffset + 285}" text-anchor="middle" font-family="Montserrat, sans-serif" font-size="12" fill="#B89047" letter-spacing="1.5">THE BRIDE</text>

                        <!-- Groom Image -->
                        <defs>
                            <pattern id="groomPhoto" patternUnits="userSpaceOnUse" width="160" height="160">
                                <image href="${groomImg}" x="0" y="0" width="160" height="160" preserveAspectRatio="xMidYMid slice" />
                            </pattern>
                        </defs>
                        <circle cx="520" cy="${yOffset + 150}" r="80" fill="url(#groomPhoto)" stroke="#B89047" stroke-width="2"/>
                        <text x="520" y="${yOffset + 260}" text-anchor="middle" font-family="Playfair Display, serif" font-size="18" fill="#333" font-weight="bold">${escapeXml(d.groom_name || 'Groom')}</text>
                        <text x="520" y="${yOffset + 285}" text-anchor="middle" font-family="Montserrat, sans-serif" font-size="12" fill="#B89047" letter-spacing="1.5">THE GROOM</text>
                    `;
                } else if (brideImg) {
                    extraElements += `
                        <defs>
                            <pattern id="bridePhoto" patternUnits="userSpaceOnUse" width="160" height="160">
                                <image href="${brideImg}" x="0" y="0" width="160" height="160" preserveAspectRatio="xMidYMid slice" />
                            </pattern>
                        </defs>
                        <circle cx="400" cy="${yOffset + 150}" r="80" fill="url(#bridePhoto)" stroke="#B89047" stroke-width="2"/>
                        <text x="400" y="${yOffset + 260}" text-anchor="middle" font-family="Playfair Display, serif" font-size="18" fill="#333" font-weight="bold">${escapeXml(d.bride_name || 'Bride')}</text>
                        <text x="400" y="${yOffset + 285}" text-anchor="middle" font-family="Montserrat, sans-serif" font-size="12" fill="#B89047" letter-spacing="1.5">THE BRIDE</text>
                    `;
                } else {
                    extraElements += `
                        <defs>
                            <pattern id="groomPhoto" patternUnits="userSpaceOnUse" width="160" height="160">
                                <image href="${groomImg}" x="0" y="0" width="160" height="160" preserveAspectRatio="xMidYMid slice" />
                            </pattern>
                        </defs>
                        <circle cx="400" cy="${yOffset + 150}" r="80" fill="url(#groomPhoto)" stroke="#B89047" stroke-width="2"/>
                        <text x="400" y="${yOffset + 260}" text-anchor="middle" font-family="Playfair Display, serif" font-size="18" fill="#333" font-weight="bold">${escapeXml(d.groom_name || 'Groom')}</text>
                        <text x="400" y="${yOffset + 285}" text-anchor="middle" font-family="Montserrat, sans-serif" font-size="12" fill="#B89047" letter-spacing="1.5">THE GROOM</text>
                    `;
                }
                
                yOffset += 340;
                svgHeight += 340;
            }

            // 3. Add Gallery Images if they exist
            if (galleries.length > 0) {
                extraElements += `
                    <!-- Divider -->
                    <line x1="100" y1="${yOffset}" x2="700" y2="${yOffset}" stroke="#B89047" stroke-width="1" stroke-dasharray="8 6" opacity="0.6"/>
                    
                    <text x="400" y="${yOffset + 50}" text-anchor="middle" font-family="Cinzel, serif" font-size="20" fill="#B89047" letter-spacing="4" font-weight="bold">CAPTURED MEMORIES</text>
                `;
                
                const maxImages = Math.min(galleries.length, 4);
                
                if (maxImages === 1) {
                    const imgUrl = normalizeImageUrl(galleries[0].image_url || galleries[0]);
                    extraElements += `
                        <defs>
                            <pattern id="galPhoto0" patternUnits="userSpaceOnUse" width="400" height="250">
                                <image href="${imgUrl}" x="0" y="0" width="400" height="250" preserveAspectRatio="xMidYMid slice" />
                            </pattern>
                        </defs>
                        <rect x="200" y="${yOffset + 90}" width="400" height="250" rx="10" fill="url(#galPhoto0)" stroke="#B89047" stroke-width="1.5"/>
                    `;
                    yOffset += 380;
                    svgHeight += 380;
                } else if (maxImages === 2) {
                    const imgUrl1 = normalizeImageUrl(galleries[0].image_url || galleries[0]);
                    const imgUrl2 = normalizeImageUrl(galleries[1].image_url || galleries[1]);
                    extraElements += `
                        <defs>
                            <pattern id="galPhoto0" patternUnits="userSpaceOnUse" width="320" height="220">
                                <image href="${imgUrl1}" x="0" y="0" width="320" height="220" preserveAspectRatio="xMidYMid slice" />
                            </pattern>
                            <pattern id="galPhoto1" patternUnits="userSpaceOnUse" width="320" height="220">
                                <image href="${imgUrl2}" x="0" y="0" width="320" height="220" preserveAspectRatio="xMidYMid slice" />
                            </pattern>
                        </defs>
                        <rect x="65" y="${yOffset + 90}" width="320" height="220" rx="10" fill="url(#galPhoto0)" stroke="#B89047" stroke-width="1.5"/>
                        <rect x="415" y="${yOffset + 90}" width="320" height="220" rx="10" fill="url(#galPhoto1)" stroke="#B89047" stroke-width="1.5"/>
                    `;
                    yOffset += 350;
                    svgHeight += 350;
                } else if (maxImages >= 3) {
                    const imgUrl1 = normalizeImageUrl(galleries[0].image_url || galleries[0]);
                    const imgUrl2 = normalizeImageUrl(galleries[1].image_url || galleries[1]);
                    const imgUrl3 = normalizeImageUrl(galleries[2].image_url || galleries[2]);
                    const imgUrl4 = maxImages === 4 ? normalizeImageUrl(galleries[3].image_url || galleries[3]) : '';
                    
                    extraElements += `
                        <defs>
                            <pattern id="galPhoto0" patternUnits="userSpaceOnUse" width="320" height="220">
                                <image href="${imgUrl1}" x="0" y="0" width="320" height="220" preserveAspectRatio="xMidYMid slice" />
                            </pattern>
                            <pattern id="galPhoto1" patternUnits="userSpaceOnUse" width="320" height="220">
                                <image href="${imgUrl2}" x="0" y="0" width="320" height="220" preserveAspectRatio="xMidYMid slice" />
                            </pattern>
                            <pattern id="galPhoto2" patternUnits="userSpaceOnUse" width="320" height="220">
                                <image href="${imgUrl3}" x="0" y="0" width="320" height="220" preserveAspectRatio="xMidYMid slice" />
                            </pattern>
                    `;
                    if (imgUrl4) {
                        extraElements += `
                            <pattern id="galPhoto3" patternUnits="userSpaceOnUse" width="320" height="220">
                                <image href="${imgUrl4}" x="0" y="0" width="320" height="220" preserveAspectRatio="xMidYMid slice" />
                            </pattern>
                        `;
                    }
                    extraElements += `</defs>`;
                    
                    extraElements += `
                        <rect x="65" y="${yOffset + 90}" width="320" height="220" rx="10" fill="url(#galPhoto0)" stroke="#B89047" stroke-width="1.5"/>
                        <rect x="415" y="${yOffset + 90}" width="320" height="220" rx="10" fill="url(#galPhoto1)" stroke="#B89047" stroke-width="1.5"/>
                        <rect x="65" y="${yOffset + 330}" width="320" height="220" rx="10" fill="url(#galPhoto2)" stroke="#B89047" stroke-width="1.5"/>
                    `;
                    
                    if (imgUrl4) {
                        extraElements += `
                            <rect x="415" y="${yOffset + 330}" width="320" height="220" rx="10" fill="url(#galPhoto3)" stroke="#B89047" stroke-width="1.5"/>
                        `;
                    } else {
                        extraElements += `
                            <g transform="translate(415, ${yOffset + 330})">
                                <rect width="320" height="220" rx="10" fill="#ffffff" stroke="#B89047" stroke-width="1.5" stroke-dasharray="6 4" opacity="0.8"/>
                                <text x="160" y="100" text-anchor="middle" font-family="Cinzel, serif" font-size="16" fill="#B89047" font-weight="bold">VELVET VOWS</text>
                                <text x="160" y="130" text-anchor="middle" font-family="Playfair Display, serif" font-size="12" fill="#666" font-style="italic">Happily Ever After</text>
                            </g>
                        `;
                    }
                    yOffset += 590;
                    svgHeight += 590;
                }
            }

            if (svgHeight > 1200) {
                // Find background fill of the base SVG
                const fillMatch = baseSvg.match(/<rect\s+width="800"\s+height="1200"\s+fill="([^"]+)"/i) || 
                                  baseSvg.match(/<rect\s+x="0"\s+y="0"\s+width="800"\s+height="1200"\s+fill="([^"]+)"/i);
                const bgFill = fillMatch ? fillMatch[1] : (t === 'celestial-navy' || t === 'gatsby-luxury' || t === 'enchanted-forest' ? '#0A1628' : '#ffffff');
                
                // Replace opening tag dimensions
                baseSvg = baseSvg.replace(/width="800"\s+height="1200"\s+viewBox="0\s+0\s+800\s+1200"/i, `width="800" height="${svgHeight}" viewBox="0 0 800 ${svgHeight}"`);
                
                // Insert the extended background rect and new images before the closing </svg>
                baseSvg = baseSvg.trim();
                if (baseSvg.endsWith('</svg>')) {
                    const extension = `
                        <rect x="0" y="1200" width="800" height="${svgHeight - 1200}" fill="${bgFill}"/>
                        ${extraElements}
                    </svg>`;
                    baseSvg = baseSvg.slice(0, -6) + extension;
                }
            }

            return baseSvg;
        }

        function downloadInvitation(format) {
            const svgStr = getThemedSVG(template, {...details});
            const heightMatch = svgStr.match(/height="(\d+)"/i);
            const actualHeight = heightMatch ? parseInt(heightMatch[1]) : 1200;
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
                img.crossOrigin = 'anonymous';
                img.onload = () => {
                    const c = document.createElement('canvas'); c.width=800; c.height=actualHeight;
                    c.getContext('2d').drawImage(img,0,0,800,actualHeight);
                    const a = document.createElement('a');
                    a.href = c.toDataURL('image/png'); a.download = fileName+'.png';
                    document.body.appendChild(a); a.click(); document.body.removeChild(a);
                    URL.revokeObjectURL(url);
                };
                img.onerror = () => {
                    alert('Unable to render the invitation image for download. Please try again or download SVG instead.');
                    URL.revokeObjectURL(url);
                };
                img.src = url;
            }
        }
    </script>
</body>
</html>
