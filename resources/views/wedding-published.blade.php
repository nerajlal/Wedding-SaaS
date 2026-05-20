<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Velvet Vows - Your Invitation is Live!</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <!-- QRCode.js CDN for live, scannable QR generation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Lato:wght@300;400;700&family=Great+Vibes&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #FFFFFF;
        }
        .preview-scroll::-webkit-scrollbar {
            width: 4px;
        }
        .preview-scroll::-webkit-scrollbar-track {
            background: transparent;
        }
        .preview-scroll::-webkit-scrollbar-thumb {
            background: rgba(197, 155, 39, 0.3);
            border-radius: 2px;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 antialiased">

    <!-- Device Frame / Main Container -->
    <div class="w-full max-w-[420px] bg-[#FDF9F1] rounded-[2.5rem] shadow-2xl overflow-hidden relative border-8 border-[#1A1A1A]">
        
        <!-- Header Section -->
        <div class="bg-[#1A1A1A] pt-10 pb-4 px-6 text-center">
            <h1 class="font-['Playfair_Display'] text-[1.4rem] font-bold text-[#C59B27] tracking-wide mb-1">Your Invitation is Live!</h1>
            <p class="font-['Lato'] text-[#857B72] text-xs mb-4">Share it with your guests</p>
        </div>

        <!-- Scrollable Content Container -->
        <div class="h-[480px] overflow-y-auto preview-scroll p-6 space-y-6 relative pb-10">
            
            <!-- Shareable Link Section -->
            <div class="space-y-2">
                <p class="text-[0.65rem] uppercase tracking-[0.2em] text-[#C59B27] font-bold font-['Lato']">Shareable Link</p>
                <div class="flex gap-2">
                    <div id="invite-link" class="flex-grow bg-white border border-[#E4D1A6] rounded-xl px-4 py-3 text-xs text-gray-700 font-medium select-all truncate">
                        {{ $publicUrl }}
                    </div>
                    <button onclick="copyInviteLink()" class="bg-[#C59B27] hover:bg-[#B58B22] text-black font-bold px-5 rounded-xl text-xs font-['Playfair_Display'] transition shadow cursor-pointer">
                        Copy
                    </button>
                </div>
            </div>

            <!-- QR Code and Social Sharing Grid -->
            <div class="grid grid-cols-5 gap-4 items-start pt-2">
                
                <!-- Left: QR Code Card -->
                <div class="col-span-2 flex flex-col items-center gap-3">
                    <p class="text-[0.65rem] uppercase tracking-[0.2em] text-[#C59B27] font-bold font-['Lato'] self-start">QR Code</p>
                    
                    <!-- QR Box -->
                    <div class="bg-white border border-[#E4D1A6] rounded-2xl p-2.5 shadow-inner w-full aspect-square flex items-center justify-center overflow-hidden">
                        <div id="qrcode" class="w-full h-full flex items-center justify-center"></div>
                    </div>

                    <!-- Download pills -->
                    <div class="flex gap-1.5 w-full justify-between">
                        <button onclick="downloadInvitation('png')" class="flex-grow bg-black hover:bg-gray-800 text-white text-[0.55rem] font-bold py-1 px-1.5 rounded-full uppercase tracking-wider text-center cursor-pointer">
                            PNG ↓
                        </button>
                        <button onclick="downloadInvitation('svg')" class="flex-grow bg-transparent border border-[#C59B27] text-[#C59B27] hover:bg-[#C59B27]/10 text-[0.55rem] font-bold py-1 px-1.5 rounded-full uppercase tracking-wider text-center cursor-pointer">
                            SVG ↓
                        </button>
                    </div>
                </div>

                <!-- Right: Share Via buttons -->
                <div class="col-span-3 flex flex-col gap-2.5">
                    <p class="text-[0.65rem] uppercase tracking-[0.2em] text-[#C59B27] font-bold font-['Lato']">Share Via</p>
                    
                    <!-- WhatsApp pill -->
                    <a href="https://api.whatsapp.com/send?text={{ urlencode('You are cordially invited to our wedding! View our digital invitation here: '.$publicUrl) }}" target="_blank" class="w-full bg-[#25D366] hover:bg-[#20ba59] text-white font-extrabold py-3 px-4 rounded-full shadow transition text-center text-xs flex items-center justify-center gap-2">
                        📱 WhatsApp
                    </a>

                    <!-- Email pill -->
                    <a href="mailto:?subject={{ urlencode('Wedding Invitation') }}&body={{ urlencode('We invite you to join us on our special day! View details here: '.$publicUrl) }}" class="w-full bg-[#1A1A1A] hover:bg-gray-800 text-[#C59B27] font-extrabold py-3 px-4 rounded-full shadow border border-gray-900 transition text-center text-xs flex items-center justify-center gap-2">
                        ✉ Email
                    </a>

                    <!-- Copy Link pill -->
                    <button onclick="copyInviteLink()" class="w-full bg-transparent border border-[#E4D1A6] hover:bg-[#C59B27]/10 text-gray-700 font-extrabold py-2.5 px-4 rounded-full transition text-center text-xs flex items-center justify-center gap-2 cursor-pointer">
                        🔗 Copy Link
                    </button>
                </div>

            </div>

            <!-- Local Testing Help Alert (Spans full width) -->
            <div class="bg-[#C59B27]/5 border border-[#C59B27]/25 rounded-2xl p-4 text-[0.7rem] text-gray-700 space-y-2 leading-relaxed font-['Lato']">
                <p class="font-extrabold text-[#C59B27] flex items-center gap-1 text-[0.75rem] uppercase tracking-wider">
                    <span>💡</span> Local Network Testing Tip
                </p>
                <p>
                    Because you are browsing on <span class="font-mono font-bold bg-white px-1 py-0.5 rounded text-gray-900 border border-gray-200">127.0.0.1 / localhost</span>, scanning the QR Code on a physical phone will refuse to connect since the phone treats "127.0.0.1" as itself.
                </p>
                <p class="font-bold text-gray-800">To view your custom template details successfully:</p>
                <ul class="list-disc pl-4 space-y-1.5 text-gray-600">
                    <li>
                        <span class="font-semibold text-gray-800">Option A (Fastest on PC)</span>: Click the <span class="font-bold">"Copy Link"</span> button above and paste it directly into a <span class="font-bold">new browser tab/window on this laptop</span>!
                    </li>
                    <li>
                        <span class="font-semibold text-gray-800">Option B (On Phone)</span>: Start your server using <code class="font-mono bg-white px-1 py-0.5 rounded text-[0.6rem] border border-gray-200 text-[#C59B27] font-bold">php artisan serve --host 0.0.0.0</code>, and open the site on this laptop using your Wi-Fi IP (e.g. <code class="font-mono bg-white px-1.5 py-0.5 rounded text-[0.6rem] border border-gray-200 text-gray-800">http://192.168.1.15:8000</code>) before scanning!
                    </li>
                </ul>
            </div>

            <!-- Divider -->
            <div class="w-full h-px bg-[#E4D1A6]/50 my-6"></div>

            <!-- Stats section -->
            <div class="space-y-3">
                <p class="text-[0.65rem] uppercase tracking-[0.2em] text-[#C59B27] font-bold font-['Lato']">Invitation Stats</p>
                <div class="grid grid-cols-3 gap-2.5">
                    
                    <!-- Views Stat -->
                    <div class="bg-white border border-[#E4D1A6] rounded-2xl p-3 text-center shadow-sm flex flex-col justify-center min-h-[75px]">
                        <span class="text-xl font-extrabold text-[#C59B27]">0</span>
                        <span class="text-[0.55rem] font-bold text-gray-400 uppercase tracking-wider mt-0.5 font-['Lato']">Guest Views</span>
                    </div>

                    <!-- Published Date Stat -->
                    <div class="bg-white border border-[#E4D1A6] rounded-2xl p-3 text-center shadow-sm flex flex-col justify-center min-h-[75px]">
                        <span class="text-[0.55rem] font-bold text-gray-400 uppercase tracking-wider mb-0.5 font-['Lato']">Published</span>
                        <span class="text-[0.65rem] font-extrabold text-[#C59B27]">{{ now()->format('d M Y') }}</span>
                    </div>

                    <!-- Template Selected Stat -->
                    <div class="bg-[#FFFDF9] border border-[#E4D1A6] rounded-2xl p-3 text-center shadow-sm flex flex-col justify-center min-h-[75px] ring-1 ring-[#C59B27]/15">
                        <span class="text-[0.55rem] font-bold text-gray-400 uppercase tracking-wider mb-0.5 font-['Lato']">Template</span>
                        <span class="text-[0.65rem] font-extrabold text-[#C59B27] uppercase tracking-wider">
                            @if($template === 'royal-scroll')
                                Royal Scroll
                            @elseif($template === 'golden-minimalist')
                                Minimalist
                            @elseif($template === 'garden-celestial')
                                Celestial
                            @else
                                Royal Scroll
                            @endif
                        </span>
                    </div>

                </div>
            </div>

            <!-- Edit Button at bottom -->
            <div class="pt-4">
                <a href="{{ route('wedding.details.create') }}" class="w-full border border-[#C59B27] hover:bg-[#C59B27]/10 text-[#C59B27] font-extrabold py-3.5 px-4 rounded-xl text-center transition duration-200 text-xs font-['Playfair_Display'] flex items-center justify-center gap-1.5 shadow-sm uppercase tracking-wide">
                    ✏ Edit Invitation Details
                </a>
            </div>

            <!-- Footer -->
            <p class="text-center text-[0.65rem] text-gray-400 pt-6">✦ velvetvows.com ✦</p>

        </div>
    </div>

    <!-- Small copy toast popup -->
    <div id="copy-toast" class="fixed bottom-10 bg-black text-[#C59B27] border border-[#C59B27] text-xs font-bold px-6 py-3 rounded-full shadow-2xl transition duration-300 transform translate-y-20 opacity-0 pointer-events-none z-[999] font-['Playfair_Display']">
        Link copied to clipboard! 📋
    </div>

    <!-- Exporter Script Block -->
    <script>
        const details = @json($details);
        const publicUrl = @json($publicUrl);
        const template = @json($template);

        if (details.wedding_date) {
            const rawDate = new Date(details.wedding_date);
            const dateOptions = { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' };
            details.wedding_date_formatted = rawDate.toLocaleDateString('en-US', dateOptions).replace(/,/g, '');
        }

        if (details.rsvp_deadline) {
            const rsvpDate = new Date(details.rsvp_deadline);
            details.rsvp_deadline_formatted = rsvpDate.toLocaleDateString('en-US', { day: 'numeric', month: 'long', year: 'numeric' });
        }

        function getRoyalScrollSVG(d) {
            const dateFormatted = d.wedding_date_formatted || d.wedding_date;
            const rsvpFormatted = d.rsvp_deadline_formatted || d.rsvp_deadline || '';
            const dressCode = (d.dress_code || 'Formal').replace('_', ' ').toUpperCase();
            const msg = d.personal_message || 'With joy in our hearts, we welcome you to celebrate this union';
            return `<svg width="800" height="1200" viewBox="0 0 800 1200" fill="none" xmlns="http://www.w3.org/2000/svg">
                <style>
                    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Lato:wght@300;400;700&display=swap');
                    .title-accent { font-family: 'Lato', sans-serif; font-size: 16px; fill: #C59B27; letter-spacing: 5px; font-weight: bold; text-transform: uppercase; }
                    .italic-subtitle { font-family: 'Playfair Display', serif; font-size: 20px; fill: #C59B27; font-style: italic; }
                    .couple-name { font-family: 'Playfair Display', serif; font-size: 64px; font-weight: 800; fill: #FFFDF9; letter-spacing: 2px; }
                    .ampersand { font-family: 'Playfair Display', serif; font-size: 40px; font-style: italic; fill: #C59B27; }
                    .date-time { font-family: 'Playfair Display', serif; font-size: 26px; fill: #FFFDF9; font-weight: bold; letter-spacing: 1px; }
                    .date-sub { font-family: 'Lato', sans-serif; font-size: 18px; fill: #C59B27; letter-spacing: 2px; }
                    .venue-title { font-family: 'Playfair Display', serif; font-size: 24px; font-weight: bold; fill: #FFFDF9; }
                    .venue-desc { font-family: 'Lato', sans-serif; font-size: 16px; fill: #857B72; font-weight: 300; }
                    .details-text { font-family: 'Lato', sans-serif; font-size: 16px; fill: #C59B27; letter-spacing: 1px; }
                    .dress-code { font-family: 'Lato', sans-serif; font-size: 14px; fill: #FFFDF9; letter-spacing: 4px; font-weight: bold; }
                    .bottom-msg { font-family: 'Playfair Display', serif; font-size: 18px; fill: #C59B27; font-style: italic; }
                </style>
                <rect width="800" height="1200" fill="#1A1A1A"/>
                <rect x="25" y="25" width="750" height="1150" rx="20" stroke="#C59B27" stroke-width="4" stroke-dasharray="12 8" fill="none"/>
                <rect x="35" y="35" width="730" height="1130" rx="16" stroke="#C59B27" stroke-width="2" fill="none"/>
                <text x="400" y="150" text-anchor="middle" class="title-accent">✦ Request the Honour ✦</text>
                <text x="400" y="195" text-anchor="middle" class="italic-subtitle">of your presence at the marriage of</text>
                <text x="400" y="320" text-anchor="middle" class="couple-name">${d.bride_name}</text>
                <text x="400" y="380" text-anchor="middle" class="ampersand">&amp;</text>
                <text x="400" y="470" text-anchor="middle" class="couple-name">${d.groom_name}</text>
                <path d="M 200 530 L 600 530" stroke="url(#goldGrad)" stroke-width="2"/>
                <text x="400" y="585" text-anchor="middle" class="date-time">${dateFormatted}</text>
                <text x="400" y="625" text-anchor="middle" class="date-sub">${d.time} onwards</text>
                <path d="M 200 680 L 600 680" stroke="url(#goldGrad)" stroke-width="2"/>
                <text x="400" y="745" text-anchor="middle" class="title-accent">The Venue</text>
                <text x="400" y="785" text-anchor="middle" class="venue-title">${d.venue_name}</text>
                <text x="400" y="825" text-anchor="middle" class="venue-desc">${d.venue_address}</text>
                <path d="M 200 880 L 600 880" stroke="url(#goldGrad)" stroke-width="2"/>
                <text x="400" y="935" text-anchor="middle" class="details-text">${rsvpFormatted ? 'RSVP by ' + rsvpFormatted + ' • ' + d.rsvp_contact : 'RSVP: ' + d.rsvp_contact}</text>
                <text x="400" y="975" text-anchor="middle" class="dress-code">DRESS CODE: ${dressCode}</text>
                <text x="400" y="1070" text-anchor="middle" class="bottom-msg">✦ ${msg} ✦</text>
                <text x="400" y="1135" text-anchor="middle" font-family="Lato" font-size="12" fill="#857B72" letter-spacing="2">CREATED WITH VELVETVOWS.COM</text>
                <defs>
                    <linearGradient id="goldGrad" x1="200" y1="0" x2="600" y2="0" gradientUnits="userSpaceOnUse">
                        <stop offset="0" stop-color="#C59B27" stop-opacity="0"/>
                        <stop offset="0.5" stop-color="#C59B27" stop-opacity="1"/>
                        <stop offset="1" stop-color="#C59B27" stop-opacity="0"/>
                    </linearGradient>
                </defs>
            </svg>`;
        }

        function getMinimalistSVG(d) {
            const dateFormatted = d.wedding_date_formatted || d.wedding_date;
            const rsvpFormatted = d.rsvp_deadline_formatted || d.rsvp_deadline || '';
            const dressCode = (d.dress_code || 'Formal').replace('_', ' ').toUpperCase();
            const msg = d.personal_message || 'Please join us to celebrate our special day';
            const monogramInitials = d.bride_name.substring(0, 1) + ' & ' + d.groom_name.substring(0, 1);
            return `<svg width="800" height="1200" viewBox="0 0 800 1200" fill="none" xmlns="http://www.w3.org/2000/svg">
                <style>
                    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Lato:wght@300;400;700&family=Great+Vibes&display=swap');
                    .mono-circle { stroke: #C59B27; stroke-width: 2; fill: none; }
                    .mono-text { font-family: 'Playfair Display', serif; font-size: 20px; font-weight: bold; fill: #C59B27; }
                    .minimal-sub { font-family: 'Lato', sans-serif; font-size: 14px; fill: #C8A882; font-weight: bold; letter-spacing: 5px; text-transform: uppercase; }
                    .couple-name-min { font-family: 'Playfair Display', serif; font-size: 56px; font-weight: 900; fill: #111111; }
                    .ampersand-min { font-family: 'Great Vibes', cursive; font-size: 48px; fill: #C59B27; }
                    .label-min { font-family: 'Lato', sans-serif; font-size: 12px; fill: #999999; font-weight: bold; letter-spacing: 3px; text-transform: uppercase; }
                    .val-min { font-family: 'Playfair Display', serif; font-size: 22px; font-weight: bold; fill: #333333; }
                    .venue-val { font-family: 'Playfair Display', serif; font-size: 22px; font-weight: bold; fill: #333333; }
                    .venue-desc-min { font-family: 'Lato', sans-serif; font-size: 16px; fill: #666666; font-weight: 300; }
                    .rsvp-box { fill: #F9F9F9; stroke: #E4D1A6; stroke-width: 1; }
                    .rsvp-text { font-family: 'Lato', sans-serif; font-size: 14px; fill: #444444; }
                    .dress-pill { stroke: #CCCCCC; stroke-width: 1; fill: none; }
                    .dress-text-min { font-family: 'Lato', sans-serif; font-size: 12px; fill: #333333; font-weight: bold; letter-spacing: 3px; }
                    .msg-min { font-family: 'Playfair Display', serif; font-size: 18px; fill: #666666; font-style: italic; }
                </style>
                <rect width="800" height="1200" fill="#FFFFFF"/>
                <rect x="30" y="30" width="740" height="1140" stroke="#E4D1A6" stroke-width="2" fill="none"/>
                <circle cx="400" cy="120" r="45" class="mono-circle"/>
                <text x="400" y="127" text-anchor="middle" class="mono-text">${monogramInitials}</text>
                <text x="400" y="230" text-anchor="middle" class="minimal-sub">Join Us To Celebrate The Wedding Of</text>
                <text x="400" y="310" text-anchor="middle" class="couple-name-min">${d.bride_name}</text>
                <text x="400" y="365" text-anchor="middle" class="ampersand-min">&amp;</text>
                <text x="400" y="445" text-anchor="middle" class="couple-name-min">${d.groom_name}</text>
                <path d="M 200 490 L 600 490" stroke="#F0F0F0" stroke-width="1"/>
                <text x="300" y="525" text-anchor="middle" class="label-min">Date</text>
                <text x="300" y="555" text-anchor="middle" class="val-min">${dateFormatted}</text>
                <path d="M 400 510 L 400 565" stroke="#E0E0E0" stroke-width="1"/>
                <text x="500" y="525" text-anchor="middle" class="label-min">Time</text>
                <text x="500" y="555" text-anchor="middle" class="val-min">${d.time}</text>
                <path d="M 200 585 L 600 585" stroke="#F0F0F0" stroke-width="1"/>
                <text x="400" y="640" text-anchor="middle" class="label-min">The Venue</text>
                <text x="400" y="675" text-anchor="middle" class="venue-val">${d.venue_name}</text>
                <text x="400" y="710" text-anchor="middle" class="venue-desc-min">${d.venue_address}</text>
                <rect x="180" y="760" width="440" height="90" rx="12" class="rsvp-box"/>
                <text x="400" y="795" text-anchor="middle" font-family="Lato" font-size="11" font-weight="bold" fill="#999999" letter-spacing="2">RSVP DETAILS</text>
                <text x="400" y="825" text-anchor="middle" class="rsvp-text">${rsvpFormatted ? 'RSVP by: ' + rsvpFormatted + '  |  Call: ' + d.rsvp_contact : 'RSVP Contact: ' + d.rsvp_contact}</text>
                <rect x="250" y="890" width="300" height="40" rx="20" class="dress-pill"/>
                <text x="400" y="915" text-anchor="middle" class="dress-text-min">DRESS: ${dressCode}</text>
                <text x="400" y="1010" text-anchor="middle" class="msg-min">"${msg}"</text>
                <text x="400" y="1120" text-anchor="middle" font-family="Lato" font-size="12" fill="#999999" letter-spacing="2">CREATED WITH VELVETVOWS.COM</text>
            </svg>`;
        }

        function getCelestialSVG(d) {
            const dateFormatted = d.wedding_date_formatted || d.wedding_date;
            const rsvpFormatted = d.rsvp_deadline_formatted || d.rsvp_deadline || '';
            const dressCode = (d.dress_code || 'Formal').replace('_', ' ').toUpperCase();
            const msg = d.personal_message || 'Under the starlit sky, we begin our journey';
            return `<svg width="800" height="1200" viewBox="0 0 800 1200" fill="none" xmlns="http://www.w3.org/2000/svg">
                <style>
                    @import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Great+Vibes&family=Lato:wght@300;400;700&display=swap');
                    .stars { font-family: 'Cinzel', serif; font-size: 36px; fill: #E8C55A; }
                    .celestial-sub { font-family: 'Cinzel', serif; font-size: 14px; fill: #FFFFFF; opacity: 0.8; letter-spacing: 4px; text-transform: uppercase; }
                    .couple-name-cel { font-family: 'Great Vibes', cursive; font-size: 80px; fill: #FFFFFF; }
                    .ampersand-cel { font-family: 'Cinzel', serif; font-size: 20px; fill: #E8C55A; letter-spacing: 2px; }
                    .celestial-title { font-family: 'Cinzel', serif; font-size: 24px; font-weight: bold; fill: #FFFFFF; letter-spacing: 3px; text-transform: uppercase; }
                    .celestial-time { font-family: 'Lato', sans-serif; font-size: 18px; fill: #FFFFFF; opacity: 0.9; letter-spacing: 2px; }
                    .venue-box-cel { stroke: rgba(232, 197, 90, 0.3); stroke-width: 1; fill: rgba(10, 22, 40, 0.6); }
                    .venue-label-cel { font-family: 'Cinzel', serif; font-size: 13px; font-weight: bold; fill: #E8C55A; letter-spacing: 3px; }
                    .venue-val-cel { font-family: 'Cinzel', serif; font-size: 22px; font-weight: bold; fill: #FFFFFF; }
                    .venue-desc-cel { font-family: 'Lato', sans-serif; font-size: 16px; fill: #E8C55A; opacity: 0.8; font-weight: 300; }
                    .details-cel { font-family: 'Lato', sans-serif; font-size: 16px; fill: #FFFFFF; opacity: 0.9; letter-spacing: 1px; }
                    .dress-badge-cel { stroke: #E8C55A; stroke-width: 1.5; fill: rgba(232, 197, 90, 0.1); }
                    .dress-text-cel { font-family: 'Cinzel', serif; font-size: 13px; font-weight: bold; fill: #FFFFFF; letter-spacing: 4px; }
                    .msg-cel { font-family: 'Lato', sans-serif; font-size: 16px; fill: #FFFFFF; opacity: 0.7; font-style: italic; }
                </style>
                <rect width="800" height="1200" fill="#0A1628"/>
                <rect x="25" y="25" width="750" height="1150" stroke="#E8C55A" stroke-width="3" fill="none"/>
                <text x="400" y="120" text-anchor="middle" class="stars">🌙 ✨ ⭐</text>
                <text x="400" y="200" text-anchor="middle" class="celestial-sub">Under the starlit sky, join the wedding of</text>
                <text x="400" y="295" text-anchor="middle" class="couple-name-cel">${d.bride_name}</text>
                <text x="400" y="340" text-anchor="middle" class="ampersand-cel">&amp;</text>
                <text x="400" y="445" text-anchor="middle" class="couple-name-cel">${d.groom_name}</text>
                <line x1="360" y1="495" x2="440" y2="495" stroke="#E8C55A" stroke-width="1.5"/>
                <text x="400" y="550" text-anchor="middle" class="celestial-title">${dateFormatted}</text>
                <text x="400" y="585" text-anchor="middle" class="celestial-time">at ${d.time} onwards</text>
                <rect x="150" y="630" width="500" height="150" rx="16" class="venue-box-cel"/>
                <text x="400" y="665" text-anchor="middle" class="venue-label-cel">CELESTIAL VENUE</text>
                <text x="400" y="705" text-anchor="middle" class="venue-val-cel">${d.venue_name}</text>
                <text x="400" y="745" text-anchor="middle" class="venue-desc-cel">${d.venue_address}</text>
                <text x="400" y="845" text-anchor="middle" class="details-cel">${rsvpFormatted ? 'RSVP BY: ' + rsvpFormatted + '  •  ' + d.rsvp_contact : 'RSVP TO: ' + d.rsvp_contact}</text>
                <rect x="220" y="890" width="360" height="42" rx="21" class="dress-badge-cel"/>
                <text x="400" y="916" text-anchor="middle" class="dress-text-cel">DRESS: ${dressCode}</text>
                <text x="400" y="1005" text-anchor="middle" class="msg-cel">"${msg}"</text>
                <text x="400" y="1120" text-anchor="middle" font-family="Cinzel" font-size="12" fill="#E8C55A" letter-spacing="2">CREATED WITH VELVETVOWS.COM</text>
            </svg>`;
        }

        function downloadInvitation(format) {
            let svgString = '';
            if (template === 'royal-scroll') {
                svgString = getRoyalScrollSVG(details);
            } else if (template === 'golden-minimalist') {
                svgString = getMinimalistSVG(details);
            } else if (template === 'garden-celestial') {
                svgString = getCelestialSVG(details);
            } else {
                svgString = getRoyalScrollSVG(details);
            }

            const fileName = `velvet_vows_${details.bride_name.toLowerCase().replace(/\s+/g, '_')}_${details.groom_name.toLowerCase().replace(/\s+/g, '_')}`;

            if (format === 'svg') {
                const svgBlob = new Blob([svgString], { type: 'image/svg+xml;charset=utf-8' });
                const downloadLink = document.createElement('a');
                downloadLink.href = URL.createObjectURL(svgBlob);
                downloadLink.download = fileName + '.svg';
                document.body.appendChild(downloadLink);
                downloadLink.click();
                document.body.removeChild(downloadLink);
            } else if (format === 'png') {
                const svgBlob = new Blob([svgString], { type: 'image/svg+xml;charset=utf-8' });
                const blobURL = URL.createObjectURL(svgBlob);
                const image = new Image();
                image.onload = () => {
                    const canvas = document.createElement('canvas');
                    canvas.width = 800;
                    canvas.height = 1200;
                    const context = canvas.getContext('2d');
                    context.drawImage(image, 0, 0, 800, 1200);
                    const pngURL = canvas.toDataURL('image/png');
                    const downloadLink = document.createElement('a');
                    downloadLink.href = pngURL;
                    downloadLink.download = fileName + '.png';
                    document.body.appendChild(downloadLink);
                    downloadLink.click();
                    document.body.removeChild(downloadLink);
                    URL.revokeObjectURL(blobURL);
                };
                image.onerror = (err) => {
                    console.error('Error compiling PNG invitation card:', err);
                };
                image.src = blobURL;
            }
        }

        function copyInviteLink() {
            navigator.clipboard.writeText(publicUrl).then(() => {
                const toast = document.getElementById('copy-toast');
                toast.classList.remove('translate-y-20', 'opacity-0');
                toast.classList.add('translate-y-0', 'opacity-100');
                setTimeout(() => {
                    toast.classList.add('translate-y-20', 'opacity-0');
                    toast.classList.remove('translate-y-0', 'opacity-100');
                }, 2000);
            }).catch(err => {
                console.error('Could not copy text: ', err);
            });
        }

        window.addEventListener('DOMContentLoaded', () => {
            new QRCode(document.getElementById('qrcode'), {
                text: publicUrl,
                width: 140,
                height: 140,
                colorDark: '#1A1A1A',
                colorLight: '#FFFFFF',
                correctLevel: QRCode.CorrectLevel.H
            });
            setTimeout(() => {
                const qrImg = document.querySelector('#qrcode img');
                const qrCanvas = document.querySelector('#qrcode canvas');
                if (qrImg) qrImg.classList.add('max-w-full', 'max-h-full', 'rounded-lg');
                if (qrCanvas) qrCanvas.classList.add('max-w-full', 'max-h-full', 'rounded-lg');
            }, 100);
        });
    </script>
</body>
</html>
