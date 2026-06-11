<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Velvet Vows — Your Wedding Details</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@300;400;500;600;700;800&family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Flatpickr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <style>
        :root {
            --gold-dark:     #8C6D3B;
            --gold-primary:  #B89047;
            --gold-light:    #DFCA9B;
            --cream-base:    #FFFDF9;
            --cream-dark:    #F7F3EB;
            --text-dark:     #2A241E;
            --text-muted:    #7A7065;
            --border-gold:   rgba(184,144,71,0.18);
            --font-display:  'Outfit', sans-serif;
            --font-body:     'Inter', sans-serif;
            --font-serif:    'Cormorant Garamond', serif;
            --ease:          cubic-bezier(0.16,1,0.3,1);
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: var(--font-body);
            background: var(--cream-dark);
            min-height: 100vh;
            color: var(--text-dark);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Decorative background */
        body::before {
            content: '';
            position: fixed; inset: 0;
            background:
                radial-gradient(circle at 80% 10%, rgba(184,144,71,0.07) 0%, transparent 55%),
                radial-gradient(circle at 15% 90%, rgba(184,144,71,0.05) 0%, transparent 45%);
            pointer-events: none; z-index: 0;
        }

        /* ── Step header bar ─────────────────────────────────── */
        .step-header {
            width: 100%; position: sticky; top: 0; z-index: 100;
            background: rgba(255,253,249,0.9);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border-gold);
            padding: 1rem 1.5rem;
            display: flex; align-items: center; justify-content: space-between;
            animation: fadeDown .5s var(--ease) both;
        }
        @keyframes fadeDown {
            from { opacity:0; transform:translateY(-12px); }
            to   { opacity:1; transform:translateY(0); }
        }
        .step-brand {
            font-family: var(--font-display);
            font-weight: 800; font-size: 1.1rem;
            color: var(--text-dark);
            display: flex; align-items: center; gap: .5rem;
            text-decoration: none;
        }
        .step-brand span { color: var(--gold-primary); }
        .step-brand-icon {
            width: 32px; height: 32px; border-radius: 10px;
            background: linear-gradient(135deg, var(--gold-dark), var(--gold-primary));
            display: flex; align-items: center; justify-content: center;
            color: #fff; font-size: .85rem;
        }
        .step-info {
            display: flex; align-items: center; gap: .75rem;
        }
        .step-label {
            font-size: .78rem; font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase; letter-spacing: .8px;
        }
        .step-pills {
            display: flex; gap: .35rem;
        }
        .step-pill {
            width: 28px; height: 5px; border-radius: 99px;
            background: rgba(184,144,71,0.15);
        }
        .step-pill.active { background: var(--gold-primary); }

        /* ── Main card ───────────────────────────────────────── */
        .main-card {
            position: relative; z-index: 1;
            width: 100%; max-width: 560px;
            background: var(--cream-base);
            border: 1.5px solid var(--border-gold);
            border-radius: 28px;
            box-shadow: 0 20px 60px rgba(140,109,59,0.08);
            margin: 2rem 1rem 4rem;
            overflow: hidden;
            animation: riseUp .7s var(--ease) .1s both;
        }
        @keyframes riseUp {
            from { opacity:0; transform:translateY(28px); }
            to   { opacity:1; transform:translateY(0); }
        }
        .card-top {
            padding: 2.2rem 2.4rem 1.8rem;
            border-bottom: 1px solid var(--border-gold);
        }
        .card-top h1 {
            font-family: var(--font-display);
            font-size: 1.55rem; font-weight: 800;
            color: var(--text-dark); letter-spacing: -.3px;
            margin-bottom: .3rem;
        }
        .card-top h1 span { color: var(--gold-primary); }
        .card-top p {
            font-size: .9rem; color: var(--text-muted);
            font-family: var(--font-serif); font-style: italic;
        }
        .card-body { padding: 2rem 2.4rem 2.4rem; }

        /* ── Form field styles ───────────────────────────────── */
        .field-section-title {
            font-size: .72rem; font-weight: 700;
            text-transform: uppercase; letter-spacing: 1px;
            color: var(--gold-dark);
            margin: 1.6rem 0 1rem;
            display: flex; align-items: center; gap: .5rem;
        }
        .field-section-title::after {
            content: ''; flex: 1;
            height: 1px; background: var(--border-gold);
        }
        .field-row { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem; }
        .field-full { margin-bottom: 1rem; }
        .field-group { position: relative; }
        .field-label {
            display: block;
            font-size: .76rem; font-weight: 700;
            color: var(--gold-dark);
            text-transform: uppercase; letter-spacing: .7px;
            margin-bottom: .4rem;
        }
        .optional-tag {
            font-size: .67rem; font-weight: 400;
            text-transform: none; letter-spacing: 0;
            color: var(--text-muted); font-style: italic;
        }
        .field-input {
            width: 100%;
            padding: .82rem 1rem .82rem 2.75rem;
            border: 1.5px solid var(--border-gold);
            border-radius: 12px;
            background: #fff;
            font-family: var(--font-body);
            font-size: .94rem; color: var(--text-dark);
            outline: none;
            transition: all .28s var(--ease);
        }
        .field-input.no-icon { padding-left: 1rem; }
        .field-input::placeholder { color: var(--text-muted); opacity: .6; }
        .field-input:focus {
            border-color: var(--gold-primary);
            box-shadow: 0 0 0 4px rgba(184,144,71,0.09);
        }
        .field-input-icon {
            position: absolute;
            left: .9rem; bottom: 0;
            height: 46px; /* match input height */
            display: flex; align-items: center;
            color: var(--gold-light); font-size: .95rem;
            transition: color .25s; pointer-events: none;
        }
        .field-group:focus-within .field-input-icon { color: var(--gold-primary); }
        textarea.field-input { padding-left: 1rem; resize: none; }
        select.field-input { padding-left: 1rem; appearance: none; cursor: pointer; }
        .select-wrapper { position: relative; }
        .select-caret {
            position: absolute; right: .9rem; top: 50%;
            transform: translateY(-50%);
            color: var(--gold-light); font-size: .8rem;
            pointer-events: none;
        }

        /* ── Photo dropzone ──────────────────────────────────── */
        .photo-dropzone {
            border: 2px dashed rgba(184,144,71,0.28);
            border-radius: 14px;
            background: rgba(184,144,71,0.03);
            padding: 1.6rem 1rem;
            display: flex; flex-direction: column;
            align-items: center; justify-content: center;
            gap: .5rem;
            cursor: pointer;
            transition: all .28s var(--ease);
        }
        .photo-dropzone:hover {
            background: rgba(184,144,71,0.07);
            border-color: var(--gold-primary);
        }
        .photo-dropzone.drag-over {
            background: rgba(184,144,71,0.1);
            border-color: var(--gold-primary);
        }
        .dropzone-icon {
            width: 40px; height: 40px; border-radius: 12px;
            background: rgba(184,144,71,0.1);
            display: flex; align-items: center; justify-content: center;
            color: var(--gold-primary); font-size: 1.1rem;
        }
        .dropzone-text { font-size: .85rem; color: var(--gold-dark); font-weight: 600; }
        .dropzone-hint { font-size: .74rem; color: var(--text-muted); }

        /* ── Error alert ──────────────────────────────────────── */
        .error-alert {
            display: flex; gap: .6rem;
            padding: .9rem 1.1rem;
            background: rgba(184,144,71,0.06);
            border: 1px solid rgba(184,144,71,0.22);
            border-radius: 12px;
            margin-bottom: 1.4rem;
        }
        .error-alert-icon { color: var(--gold-dark); font-size: 1.05rem; margin-top: .05rem; }
        .error-alert ul { margin: .3rem 0 0 .5rem; padding: 0; list-style: disc inside; }
        .error-alert li { font-size: .84rem; color: var(--gold-dark); font-weight: 500; }

        /* ── Submit button ───────────────────────────────────── */
        .btn-continue {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, var(--gold-dark), var(--gold-primary));
            border: none; border-radius: 99px;
            color: #fff;
            font-family: var(--font-body);
            font-weight: 700; font-size: 1rem;
            cursor: pointer;
            box-shadow: 0 6px 20px rgba(184,144,71,0.24);
            display: flex; align-items: center; justify-content: center;
            gap: .5rem;
            transition: all .3s var(--ease);
            margin-top: 1.6rem;
        }
        .btn-continue:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 28px rgba(184,144,71,0.32);
        }
        .btn-continue:active { transform: scale(.98); }

        /* ── Flatpickr reskin ────────────────────────────────── */
        .flatpickr-calendar {
            background: var(--cream-base) !important;
            border: 1.5px solid var(--border-gold) !important;
            box-shadow: 0 12px 30px rgba(140,109,59,0.12) !important;
            border-radius: 16px !important;
            font-family: var(--font-body);
        }
        .flatpickr-months .flatpickr-month {
            background: var(--text-dark) !important;
            color: var(--gold-primary) !important;
            border-top-left-radius: 14px;
            border-top-right-radius: 14px;
        }
        .flatpickr-current-month .flatpickr-monthDropdown-months,
        .flatpickr-monthDropdown-month { background: var(--text-dark) !important; color: var(--gold-primary) !important; }
        .flatpickr-current-month input.cur-year { color: var(--gold-primary) !important; }
        .flatpickr-months .flatpickr-prev-month,
        .flatpickr-months .flatpickr-next-month { color: var(--gold-primary) !important; fill: var(--gold-primary) !important; }
        .flatpickr-day.selected, .flatpickr-day.startRange, .flatpickr-day.endRange {
            background: var(--gold-primary) !important;
            border-color: var(--gold-primary) !important; color: #fff !important;
        }
        .flatpickr-day:hover { background: rgba(184,144,71,0.12) !important; }
        span.flatpickr-weekday { color: var(--text-muted) !important; font-weight: 700; }

        /* ── Responsive ──────────────────────────────────────── */
        @media (max-width: 520px) {
            .main-card { margin: 1rem .75rem 3rem; border-radius: 20px; }
            .card-top { padding: 1.6rem 1.4rem 1.2rem; }
            .card-body { padding: 1.4rem 1.4rem 1.8rem; }
            .field-row { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

    <!-- Step Header -->
    <header class="step-header">
        <a class="step-brand" href="{{ url('/') }}">
            <div class="step-brand-icon"><i class="bi bi-heart-fill"></i></div>
            <span>Velvet</span>&nbsp;Vows
        </a>
        <div class="step-info">
            <span class="step-label">Step 1 of 3</span>
            <div class="step-pills">
                <div class="step-pill active"></div>
                <div class="step-pill"></div>
                <div class="step-pill"></div>
            </div>
        </div>
    </header>

    <!-- Main Card -->
    <div class="main-card">
        <div class="card-top">
            <h1>Your <span>Wedding</span> Details</h1>
            <p>Fill in the details below and we'll build your invitation instantly</p>
        </div>

        <div class="card-body">
            <!-- Error block -->
            @if ($errors->any())
                <div class="error-alert">
                    <i class="bi bi-exclamation-circle-fill error-alert-icon"></i>
                    <div>
                        <strong style="font-size:.84rem;color:var(--gold-dark)">Please fix the following:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <form action="{{ route('wedding.details.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                @csrf

                <!-- Couple Names -->
                <div class="field-section-title">Couple Names</div>
                <div class="field-row">
                    <div class="field-group">
                        <label class="field-label">Bride's Name</label>
                        <div style="position:relative">
                            <i class="bi bi-person-heart field-input-icon"></i>
                            <input type="text" name="bride_name" class="field-input" value="{{ old('bride_name') }}" placeholder="Enter name…" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="field-group">
                        <label class="field-label">Groom's Name</label>
                        <div style="position:relative">
                            <i class="bi bi-person-heart field-input-icon"></i>
                            <input type="text" name="groom_name" class="field-input" value="{{ old('groom_name') }}" placeholder="Enter name…" autocomplete="off" required>
                        </div>
                    </div>
                </div>

                <!-- Date & Time -->
                <div class="field-section-title">Date &amp; Time</div>
                <div class="field-row">
                    <div class="field-group">
                        <label class="field-label">Wedding Date</label>
                        <div style="position:relative">
                            <i class="bi bi-calendar-heart field-input-icon"></i>
                            <input type="text" name="wedding_date" class="field-input datepicker" value="{{ old('wedding_date') }}" placeholder="Pick a date…" required>
                        </div>
                    </div>
                    <div class="field-group">
                        <label class="field-label">Start Time</label>
                        <div style="position:relative">
                            <i class="bi bi-clock field-input-icon"></i>
                            <input type="text" name="time" class="field-input timepicker" value="{{ old('time') }}" placeholder="7:00 PM" required>
                        </div>
                    </div>
                </div>

                <!-- Venue -->
                <div class="field-section-title">Venue</div>
                <div class="field-full">
                    <div class="field-group">
                        <label class="field-label">Venue Name</label>
                        <div style="position:relative">
                            <i class="bi bi-geo-alt field-input-icon"></i>
                            <input type="text" name="venue_name" class="field-input" value="{{ old('venue_name') }}" placeholder="Enter venue name…" autocomplete="off" required>
                        </div>
                    </div>
                </div>
                <div class="field-full">
                    <div class="field-group">
                        <label class="field-label">Venue Address</label>
                        <textarea name="venue_address" rows="2" class="field-input" placeholder="Street / Area…&#10;City, State" required>{{ old('venue_address') }}</textarea>
                    </div>
                </div>
                <div class="field-full">
                    <div class="field-group">
                        <label class="field-label">Location Map URL <span class="optional-tag">(optional)</span></label>
                        <div style="position:relative">
                            <i class="bi bi-link-45deg field-input-icon"></i>
                            <input type="url" name="location_url" class="field-input" value="{{ old('location_url') }}" placeholder="https://maps.google.com/..." autocomplete="off">
                        </div>
                    </div>
                </div>

                <!-- RSVP & Dress Code -->
                <div class="field-section-title">RSVP &amp; Details</div>
                <div class="field-row">
                    <div class="field-group">
                        <label class="field-label">RSVP Deadline <span class="optional-tag">(optional)</span></label>
                        <div style="position:relative">
                            <i class="bi bi-calendar-check field-input-icon"></i>
                            <input type="text" name="rsvp_deadline" class="field-input datepicker" value="{{ old('rsvp_deadline') }}" placeholder="Pick date…">
                        </div>
                    </div>
                    <div class="field-group">
                        <label class="field-label">RSVP Contact</label>
                        <div style="position:relative">
                            <i class="bi bi-telephone field-input-icon"></i>
                            <input type="text" name="rsvp_contact" class="field-input" value="{{ old('rsvp_contact') }}" placeholder="Phone / email…" autocomplete="off" required>
                        </div>
                    </div>
                </div>
                <div class="field-full">
                    <label class="field-label">Dress Code <span class="optional-tag">(optional)</span></label>
                    <div class="select-wrapper">
                        <select name="dress_code" class="field-input">
                            <option value="formal">Formal</option>
                            <option value="casual">Casual</option>
                            <option value="black_tie">Black Tie</option>
                        </select>
                        <i class="bi bi-chevron-down select-caret"></i>
                    </div>
                </div>

                <!-- Personal message -->
                <div class="field-section-title">Personal Message <span class="optional-tag">(optional · 200 chars)</span></div>
                <div class="field-full">
                    <textarea name="personal_message" rows="3" class="field-input" placeholder="A warm note from the couple…" maxlength="200">{{ old('personal_message') }}</textarea>
                </div>

                <!-- Photo upload -->
                <div class="field-section-title">Couple's Photo <span class="optional-tag">(optional)</span></div>
                <div class="photo-dropzone" id="photo-dropzone" onclick="document.getElementById('photo-input').click()">
                    <div class="dropzone-icon" id="dropzone-icon"><i class="bi bi-image"></i></div>
                    <span class="dropzone-text" id="dropzone-text">Tap to upload a photo</span>
                    <span class="dropzone-hint">PNG, JPG up to 5MB</span>
                    <input type="file" id="photo-input" name="couples_photo" accept="image/*" class="hidden" style="display:none" onchange="updateDropzone(this)">
                </div>

                <!-- Bride's Photo upload -->
                <div class="field-section-title">Bride's Photo <span class="optional-tag">(optional)</span></div>
                <div class="photo-dropzone" id="bride-dropzone" onclick="document.getElementById('bride-input').click()">
                    <div class="dropzone-icon" id="bride-icon"><i class="bi bi-image"></i></div>
                    <span class="dropzone-text" id="bride-text">Tap to upload Bride's photo</span>
                    <span class="dropzone-hint">PNG, JPG up to 5MB</span>
                    <input type="file" id="bride-input" name="bride_image" accept="image/*" class="hidden" style="display:none" onchange="updateBrideDropzone(this)">
                </div>

                <!-- Groom's Photo upload -->
                <div class="field-section-title">Groom's Photo <span class="optional-tag">(optional)</span></div>
                <div class="photo-dropzone" id="groom-dropzone" onclick="document.getElementById('groom-input').click()">
                    <div class="dropzone-icon" id="groom-icon"><i class="bi bi-image"></i></div>
                    <span class="dropzone-text" id="groom-text">Tap to upload Groom's photo</span>
                    <span class="dropzone-hint">PNG, JPG up to 5MB</span>
                    <input type="file" id="groom-input" name="groom_image" accept="image/*" class="hidden" style="display:none" onchange="updateGroomDropzone(this)">
                </div>

                <!-- Gallery upload -->
                <div class="field-section-title">Gallery Photos <span class="optional-tag">(optional)</span></div>
                <div class="photo-dropzone" id="gallery-dropzone" onclick="document.getElementById('gallery-input').click()" style="margin-bottom: 1.5rem;">
                    <div class="dropzone-icon" id="gallery-icon"><i class="bi bi-images"></i></div>
                    <span class="dropzone-text" id="gallery-text">Tap to upload gallery photos</span>
                    <span class="dropzone-hint">PNG, JPG up to 5MB (Multiple)</span>
                    <input type="file" id="gallery-input" name="gallery_images[]" accept="image/*" multiple class="hidden" style="display:none" onchange="updateGalleryDropzone(this)">
                </div>

                <!-- Submit -->
                <button type="submit" class="btn-continue">
                    <i class="bi bi-arrow-right-circle-fill"></i>
                    Continue to Templates
                </button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            flatpickr('.datepicker', { altInput: true, altFormat: 'F j, Y', dateFormat: 'Y-m-d', minDate: 'today' });
            flatpickr('.timepicker', { enableTime: true, noCalendar: true, dateFormat: 'h:i K', defaultDate: '19:00' });

            const dropzone = document.getElementById('photo-dropzone');
            const fileInput = document.getElementById('photo-input');
            ['dragenter','dragover'].forEach(ev => dropzone.addEventListener(ev, e => { e.preventDefault(); dropzone.classList.add('drag-over'); }));
            ['dragleave','drop'].forEach(ev => dropzone.addEventListener(ev, e => { e.preventDefault(); dropzone.classList.remove('drag-over'); }));
            dropzone.addEventListener('drop', e => { if (e.dataTransfer.files[0]) { fileInput.files = e.dataTransfer.files; updateDropzone(fileInput); } });

            const brideDz = document.getElementById('bride-dropzone');
            const brideInput = document.getElementById('bride-input');
            if (brideDz && brideInput) {
                ['dragenter','dragover'].forEach(ev => brideDz.addEventListener(ev, e => { e.preventDefault(); brideDz.classList.add('drag-over'); }));
                ['dragleave','drop'].forEach(ev => brideDz.addEventListener(ev, e => { e.preventDefault(); brideDz.classList.remove('drag-over'); }));
                brideDz.addEventListener('drop', e => { if (e.dataTransfer.files[0]) { brideInput.files = e.dataTransfer.files; updateBrideDropzone(brideInput); } });
            }

            const groomDz = document.getElementById('groom-dropzone');
            const groomInput = document.getElementById('groom-input');
            if (groomDz && groomInput) {
                ['dragenter','dragover'].forEach(ev => groomDz.addEventListener(ev, e => { e.preventDefault(); groomDz.classList.add('drag-over'); }));
                ['dragleave','drop'].forEach(ev => groomDz.addEventListener(ev, e => { e.preventDefault(); groomDz.classList.remove('drag-over'); }));
                groomDz.addEventListener('drop', e => { if (e.dataTransfer.files[0]) { groomInput.files = e.dataTransfer.files; updateGroomDropzone(groomInput); } });
            }
        });

        function updateDropzone(input) {
            const text = document.getElementById('dropzone-text');
            const icon = document.getElementById('dropzone-icon');
            if (input.files && input.files[0]) {
                text.textContent = input.files[0].name;
                icon.innerHTML = '<i class="bi bi-check-circle-fill" style="color:var(--gold-primary)"></i>';
            } else {
                text.textContent = 'Tap to upload a photo';
                icon.innerHTML = '<i class="bi bi-image"></i>';
            }
        }

        function updateBrideDropzone(input) {
            const text = document.getElementById('bride-text');
            const icon = document.getElementById('bride-icon');
            if (input.files && input.files[0]) {
                text.textContent = input.files[0].name;
                icon.innerHTML = '<i class="bi bi-check-circle-fill" style="color:var(--gold-primary)"></i>';
            } else {
                text.textContent = "Tap to upload Bride's photo";
                icon.innerHTML = '<i class="bi bi-image"></i>';
            }
        }

        document.getElementById('bride-dropzone').addEventListener('change', (e) => {
            updateBrideDropzone(document.getElementById('bride-input'));
        });

        function updateGroomDropzone(input) {
            const text = document.getElementById('groom-text');
            const icon = document.getElementById('groom-icon');
            if (input.files && input.files[0]) {
                text.textContent = input.files[0].name;
                icon.innerHTML = '<i class="bi bi-check-circle-fill" style="color:var(--gold-primary)"></i>';
            } else {
                text.textContent = "Tap to upload Groom's photo";
                icon.innerHTML = '<i class="bi bi-image"></i>';
            }
        }

        document.getElementById('groom-dropzone').addEventListener('change', (e) => {
            updateGroomDropzone(document.getElementById('groom-input'));
        });

        function updateGalleryDropzone(input) {
            const text = document.getElementById('gallery-text');
            const icon = document.getElementById('gallery-icon');
            if (input.files && input.files.length > 0) {
                text.textContent = input.files.length + ' photo(s) selected';
                icon.innerHTML = '<i class="bi bi-check-circle-fill" style="color:var(--gold-primary)"></i>';
            } else {
                text.textContent = 'Tap to upload gallery photos';
                icon.innerHTML = '<i class="bi bi-images"></i>';
            }
        }
    </script>
</body>
</html>
