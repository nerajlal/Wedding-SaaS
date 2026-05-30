<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Preview {{ $template['name'] }} — Velvet Vows</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@400;600;700;800;900&display=swap" rel="stylesheet">
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
            overflow: hidden; /* Prevent scrolling on the main body since it's a full-screen app-like view */
        }

        .preview-layout {
            display: flex;
            height: 100vh;
            width: 100vw;
        }

        /* ── Left Side (Preview) ── */
        .preview-pane {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            background: var(--cream-2);
            position: relative;
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
            overflow-y: auto;
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
            width: 440px;
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
                    <img src="{{ $template['image'] }}" alt="{{ $template['name'] }} preview">
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
                    
                    <form action="{{ route('wedding.store.all') }}" method="POST" enctype="multipart/form-data" autocomplete="off" style="flex-grow:1; display:flex; flex-direction:column;">
                        @csrf
                        <input type="hidden" name="template" value="{{ $template['id'] }}">

                        <div class="modal-field-group">
                            <label class="modal-field-label">Couple Names</label>
                            <div style="display:flex; gap:0.5rem;">
                                <input type="text" name="bride_name" class="modal-field-input" style="padding-left:1rem;" placeholder="Bride Name" required>
                                <input type="text" name="groom_name" class="modal-field-input" style="padding-left:1rem;" placeholder="Groom Name" required>
                            </div>
                        </div>

                        <div class="modal-field-group">
                            <label class="modal-field-label">Date & Time</label>
                            <div style="display:flex; gap:0.5rem;">
                                <input type="date" name="wedding_date" class="modal-field-input" style="padding-left:1rem; color: var(--text);" required>
                                <input type="time" name="time" class="modal-field-input" style="padding-left:1rem; color: var(--text);" required>
                            </div>
                        </div>

                        <div class="modal-field-group">
                            <label class="modal-field-label">Venue</label>
                            <input type="text" name="venue_name" class="modal-field-input" style="padding-left:1rem; margin-bottom:0.5rem;" placeholder="Venue Name" required>
                            <textarea name="venue_address" class="modal-field-input" style="padding-left:1rem; padding-top: 0.6rem; resize: none;" rows="2" placeholder="Full Address" required></textarea>
                        </div>

                        <div class="modal-field-group">
                            <label class="modal-field-label">RSVP Contact</label>
                            <input type="text" name="rsvp_contact" class="modal-field-input" style="padding-left:1rem;" placeholder="Phone or Email" required>
                        </div>

                        <button type="submit" class="modal-signin-btn" style="margin-top:auto;">
                            <i class="bi bi-magic"></i> Publish My Invitation
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

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function focusSidebarEmail() {
            const inp = document.getElementById('sidebar-email');
            inp.focus();
            inp.style.borderColor = '#B89047';
            inp.style.boxShadow = '0 0 0 4px rgba(184,144,71,0.12)';
            setTimeout(() => { inp.style.borderColor = ''; inp.style.boxShadow = ''; }, 1800);
        }
        function toggleSidebarPwd() {
            const inp = document.getElementById('sidebar-password');
            const eye = document.getElementById('sidebar-eye');
            if (inp.type === 'password') {
                inp.type = 'text';
                eye.className = 'bi bi-eye-slash modal-field-eye';
            } else {
                inp.type = 'password';
                eye.className = 'bi bi-eye modal-field-eye';
            }
        }
    </script>
</body>
</html>
