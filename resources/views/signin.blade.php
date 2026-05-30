<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Velvet Vows — Sign In</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@300;400;500;600;700;800&family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        /* ══════════════════════════════════════════
           LUXURY GOLD TOKENS – matches welcome.blade
           ══════════════════════════════════════════ */
        :root {
            --gold-dark:     #8C6D3B;
            --gold-primary:  #B89047;
            --gold-light:    #DFCA9B;
            --cream-base:    #FFFDF9;
            --cream-dark:    #F7F3EB;
            --text-dark:     #2A241E;
            --text-muted:    #7A7065;
            --border-gold:   rgba(184, 144, 71, 0.18);
            --border-gold-sm:rgba(184, 144, 71, 0.08);
            --shadow-premium:0 20px 60px rgba(140, 109, 59, 0.09);
            --font-display:  'Outfit', sans-serif;
            --font-body:     'Inter', sans-serif;
            --font-serif:    'Cormorant Garamond', serif;
            --ease-premium:  cubic-bezier(0.16, 1, 0.3, 1);
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        html { height: 100%; }

        body {
            font-family: var(--font-body);
            background: var(--cream-dark);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            position: relative;
            overflow: hidden;
        }

        /* ── Decorative background blobs ─────────────────────────── */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background:
                radial-gradient(circle at 85% 15%, rgba(184,144,71,0.08) 0%, transparent 55%),
                radial-gradient(circle at 10% 85%, rgba(184,144,71,0.05) 0%, transparent 45%);
            pointer-events: none;
            z-index: 0;
        }

        /* ── Floating ornamental elements ─────────────────────────── */
        .bg-ornament {
            position: fixed;
            pointer-events: none;
            z-index: 0;
            font-family: var(--font-serif);
            color: rgba(184,144,71,0.08);
            font-size: 12rem;
            font-style: italic;
            line-height: 1;
            user-select: none;
        }
        .bg-ornament-1 { top: -3rem;  left: -4rem; }
        .bg-ornament-2 { bottom: -4rem; right: -3rem; font-size: 9rem; }

        /* ── Card wrapper ─────────────────────────────────────────── */
        .signin-card {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 430px;
            background: var(--cream-base);
            border: 1.5px solid var(--border-gold);
            border-radius: 32px;
            box-shadow: var(--shadow-premium);
            overflow: hidden;
            animation: card-rise 0.8s var(--ease-premium) both;
        }

        @keyframes card-rise {
            from { opacity: 0; transform: translateY(30px) scale(0.97); }
            to   { opacity: 1; transform: translateY(0)   scale(1); }
        }

        /* ── Inner border accent ──────────────────────────────────── */
        .card-inner {
            padding: 2.6rem 2.6rem 2rem;
            position: relative;
        }

        .card-inner::before {
            content: '';
            position: absolute;
            inset: 8px;
            border: 1px solid rgba(184,144,71,0.1);
            border-radius: 26px;
            pointer-events: none;
        }

        /* ── Brand header ─────────────────────────────────────────── */
        .brand-icon {
            width: 52px;
            height: 52px;
            border-radius: 16px;
            background: linear-gradient(135deg, var(--gold-dark), var(--gold-primary));
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 1.4rem;
            margin: 0 auto 1.2rem;
            box-shadow: 0 8px 20px rgba(184,144,71,0.25);
        }

        .brand-name {
            font-family: var(--font-display);
            font-weight: 800;
            font-size: 1.8rem;
            color: var(--text-dark);
            letter-spacing: -0.5px;
            text-align: center;
            margin-bottom: 0.3rem;
        }

        .brand-name span { color: var(--gold-primary); }

        .brand-tagline {
            font-family: var(--font-serif);
            font-style: italic;
            color: var(--text-muted);
            font-size: 1.05rem;
            text-align: center;
            margin-bottom: 2rem;
        }

        /* ── Divider ──────────────────────────────────────────────── */
        .gold-divider {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            margin-bottom: 1.8rem;
        }
        .gold-divider::before,
        .gold-divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--border-gold);
        }
        .gold-divider span {
            font-size: 0.72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            color: var(--gold-dark);
            white-space: nowrap;
        }

        /* ── Google Button ────────────────────────────────────────── */
        .btn-google {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.85rem;
            padding: 0.9rem 1.5rem;
            border-radius: 99px;
            border: 1.5px solid var(--border-gold);
            background: #fff;
            color: var(--text-dark);
            font-family: var(--font-body);
            font-weight: 600;
            font-size: 0.96rem;
            cursor: pointer;
            transition: all 0.35s var(--ease-premium);
            text-decoration: none;
            margin-bottom: 1.5rem;
        }

        .btn-google:hover {
            border-color: var(--gold-primary);
            background: var(--cream-dark);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(184,144,71,0.1);
        }

        .btn-google .g-circle {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: linear-gradient(135deg, #EA4335 0%, #FBBC05 50%, #34A853 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 800;
            font-size: 0.9rem;
            flex-shrink: 0;
        }

        /* ── Separator ────────────────────────────────────────────── */
        .or-separator {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            margin-bottom: 1.5rem;
        }
        .or-separator::before, .or-separator::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--border-gold);
        }
        .or-separator span {
            font-size: 0.78rem;
            font-weight: 600;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* ── Form fields ──────────────────────────────────────────── */
        .field-group {
            margin-bottom: 1.1rem;
        }

        .field-label {
            display: block;
            font-size: 0.82rem;
            font-weight: 600;
            color: var(--gold-dark);
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 0.45rem;
        }

        .field-input {
            width: 100%;
            padding: 0.85rem 1.1rem 0.85rem 2.8rem;
            border: 1.5px solid var(--border-gold);
            border-radius: 14px;
            background: #fff;
            font-family: var(--font-body);
            font-size: 0.96rem;
            color: var(--text-dark);
            outline: none;
            transition: all 0.3s var(--ease-premium);
        }

        .field-input::placeholder { color: var(--text-muted); opacity: 0.65; }

        .field-input:focus {
            border-color: var(--gold-primary);
            box-shadow: 0 0 0 4px rgba(184,144,71,0.08);
        }

        .field-wrapper {
            position: relative;
        }

        .field-icon {
            position: absolute;
            left: 0.95rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gold-light);
            font-size: 1rem;
            transition: color 0.3s;
        }

        .field-wrapper:focus-within .field-icon {
            color: var(--gold-primary);
        }

        /* ── Toggle password eye ──────────────────────────────────── */
        .field-eye {
            position: absolute;
            right: 0.95rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gold-light);
            cursor: pointer;
            font-size: 1rem;
            transition: color 0.3s;
        }
        .field-eye:hover { color: var(--gold-dark); }

        /* ── Submit button ────────────────────────────────────────── */
        .btn-signin {
            width: 100%;
            padding: 0.9rem;
            background: linear-gradient(135deg, var(--gold-dark), var(--gold-primary));
            border: none;
            border-radius: 99px;
            color: #fff;
            font-family: var(--font-body);
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.35s var(--ease-premium);
            box-shadow: 0 6px 20px rgba(184,144,71,0.22);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 0.5rem;
        }

        .btn-signin:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 28px rgba(184,144,71,0.3);
        }

        .btn-signin:active { transform: scale(0.98); }

        /* ── Error alert ──────────────────────────────────────────── */
        .error-alert {
            display: flex;
            align-items: flex-start;
            gap: 0.6rem;
            padding: 0.85rem 1rem;
            background: rgba(184,144,71,0.06);
            border: 1px solid rgba(184,144,71,0.2);
            border-radius: 12px;
            color: var(--gold-dark);
            font-size: 0.88rem;
            font-weight: 500;
            margin-bottom: 1.2rem;
        }

        /* ── Footer strip ─────────────────────────────────────────── */
        .card-footer {
            background: var(--cream-dark);
            border-top: 1px solid var(--border-gold-sm);
            padding: 1.1rem 2.6rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .footer-trust {
            font-size: 0.78rem;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }

        .footer-back {
            font-size: 0.82rem;
            font-weight: 600;
            color: var(--gold-dark);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.35rem;
            transition: all 0.25s;
        }

        .footer-back:hover { color: var(--gold-primary); }

        /* ── Tiny terms ───────────────────────────────────────────── */
        .terms-note {
            text-align: center;
            font-size: 0.76rem;
            color: var(--text-muted);
            margin-top: 1.4rem;
            line-height: 1.5;
        }
        .terms-note a { color: var(--gold-dark); text-decoration: none; font-weight: 600; }
    </style>
</head>
<body>

    <!-- Decorative ornamental text in background -->
    <div class="bg-ornament bg-ornament-1">&amp;</div>
    <div class="bg-ornament bg-ornament-2">♡</div>

    <div class="signin-card">
        <div class="card-inner">

            <!-- Brand Header -->
            <div class="brand-icon">
                <i class="bi bi-heart-fill"></i>
            </div>
            <h1 class="brand-name"><span>Velvet</span> Vows</h1>
            <p class="brand-tagline">Sign in to begin your invitation</p>

            <!-- Gold section divider -->
            <div class="gold-divider"><span>✦ Welcome Back ✦</span></div>

            <!-- Error messages -->
            @if ($errors->any())
                <div class="error-alert">
                    <i class="bi bi-exclamation-circle-fill" style="font-size:1.1rem; margin-top:0.05rem;"></i>
                    <div>{{ $errors->first() }}</div>
                </div>
            @endif

            <!-- Google Sign-In (decorative — links to email form below) -->
            <button type="button" class="btn-google" id="google-btn" onclick="focusEmailField()">
                <div class="g-circle">G</div>
                <span>Continue with Google</span>
            </button>

            <!-- OR separator -->
            <div class="or-separator"><span>or sign in with email</span></div>

            <!-- Sign-In Form -->
            <form action="{{ route('signin.process') }}" method="POST" autocomplete="off" id="signin-form">
                @csrf

                <!-- Email -->
                <div class="field-group">
                    <label for="email" class="field-label">Email address</label>
                    <div class="field-wrapper">
                        <i class="bi bi-envelope field-icon"></i>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="field-input"
                            placeholder="admin@gmail.com"
                            value="{{ old('email') }}"
                            autocomplete="off"
                            required
                        >
                    </div>
                </div>

                <!-- Password -->
                <div class="field-group">
                    <label for="password" class="field-label">Password</label>
                    <div class="field-wrapper">
                        <i class="bi bi-lock field-icon"></i>
                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="field-input"
                            placeholder="Enter your password"
                            autocomplete="new-password"
                            required
                            style="padding-right: 2.8rem;"
                        >
                        <i class="bi bi-eye field-eye" id="toggle-eye" onclick="togglePassword()"></i>
                    </div>
                </div>

                <!-- Submit -->
                <button type="submit" class="btn-signin">
                    <i class="bi bi-arrow-right-circle-fill"></i>
                    Sign In
                </button>
            </form>

            <!-- Terms note -->
            <p class="terms-note">
                By continuing you agree to our
                <a href="#">Terms of Service</a> &amp; <a href="#">Privacy Policy</a>
            </p>

        </div>

        <!-- Footer strip -->
        <div class="card-footer">
            <span class="footer-trust">
                <i class="bi bi-shield-lock-fill" style="color: var(--gold-primary);"></i>
                Secure &amp; Private
            </span>
            <a href="{{ url('/') }}" class="footer-back">
                <i class="bi bi-arrow-left-short fs-5"></i>
                Back to Home
            </a>
        </div>
    </div>

    <script>
        // Toggle password visibility
        function togglePassword() {
            const input = document.getElementById('password');
            const eye   = document.getElementById('toggle-eye');
            if (input.type === 'password') {
                input.type = 'text';
                eye.className = 'bi bi-eye-slash field-eye';
            } else {
                input.type = 'password';
                eye.className = 'bi bi-eye field-eye';
            }
        }

        // When "Continue with Google" is clicked, scroll to email field and focus it
        function focusEmailField() {
            const emailInput = document.getElementById('email');
            emailInput.focus();
            emailInput.scrollIntoView({ behavior: 'smooth', block: 'center' });

            // Briefly highlight the field with a gold pulse animation
            emailInput.style.borderColor = 'var(--gold-primary)';
            emailInput.style.boxShadow   = '0 0 0 4px rgba(184,144,71,0.12)';
            setTimeout(() => {
                emailInput.style.borderColor = '';
                emailInput.style.boxShadow   = '';
            }, 1800);
        }

        // Auto-disable browser autocomplete on load
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('input').forEach(el => {
                el.setAttribute('autocomplete', 'off');
            });
        });
    </script>

</body>
</html>
