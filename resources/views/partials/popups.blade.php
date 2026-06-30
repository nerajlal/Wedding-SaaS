<!-- ══════════════════════════════════════════
     POPUPS PARTIAL (Signin & Info)
     ══════════════════════════════════════════ -->
<style>
    /* ── Modal Overlay ─────────────────────────── */
    .signin-overlay {
        position: fixed;
        inset: 0;
        z-index: 9990;
        background: rgba(42, 36, 30, 0.48);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1.5rem;
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.35s cubic-bezier(0.16,1,0.3,1),
                    visibility 0.35s cubic-bezier(0.16,1,0.3,1);
    }
    .signin-overlay.open {
        opacity: 1;
        visibility: visible;
    }

    /* ── Modal Card ────────────────────────────── */
    .signin-modal {
        position: relative;
        width: 100%;
        max-width: 420px;
        background: #FFFDF9;
        border: 1.5px solid rgba(184,144,71,0.18);
        border-radius: 28px;
        overflow: hidden;
        box-shadow: 0 30px 80px rgba(140,109,59,0.16);
        transform: translateY(32px) scale(0.97);
        transition: transform 0.4s cubic-bezier(0.16,1,0.3,1);
    }
    .signin-overlay.open .signin-modal {
        transform: translateY(0) scale(1);
    }

    .signin-modal-inner {
        padding: 2.4rem 2.4rem 1.6rem;
        position: relative;
    }
    .signin-modal-inner::before {
        content: '';
        position: absolute;
        inset: 8px;
        border: 1px solid rgba(184,144,71,0.09);
        border-radius: 22px;
        pointer-events: none;
    }

    /* Close button */
    .signin-close, .modal-close {
        position: absolute;
        top: 1rem;
        right: 1rem;
        width: 32px; height: 32px;
        border-radius: 50%;
        border: 1px solid rgba(184,144,71,0.18);
        background: transparent;
        color: #7A7065;
        font-size: 1.1rem;
        line-height: 1;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all .25s;
        z-index: 2;
    }
    .signin-close:hover, .modal-close:hover {
        background: rgba(184,144,71,0.07);
        color: #8C6D3B;
    }

    /* Brand inside modal */
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
        font-family: 'Outfit', sans-serif;
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

    /* Divider inside modal */
    .modal-divider {
        position: relative;
        text-align: center;
        margin: 1.8rem 0 1.2rem;
    }
    .modal-divider::before, .modal-divider::after {
        content: '';
        position: absolute; top: 50%; width: 30%; height: 1px;
        background: rgba(184,144,71,0.2);
    }
    .modal-divider::before { left: 0; }
    .modal-divider::after { right: 0; }
    .modal-divider span {
        font-size: 0.65rem; font-weight: 800; color: #B89047;
        text-transform: uppercase; letter-spacing: 1.5px;
        padding: 0 0.5rem; background: #FFFDF9; position: relative; z-index: 1;
    }

    /* Google button inside modal */
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

    /* Form fields inside modal */
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

    /* Error alert inside modal */
    .modal-error-alert {
        background: #FFF5F5; border: 1px solid #FFD6D6; border-radius: 10px;
        padding: 0.75rem 1rem; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;
    }
    .modal-error-alert i { color: #E53E3E; font-size: 1rem; }
    .modal-error-alert span { font-size: 0.8rem; color: #C53030; font-weight: 500; }

    /* Submit button inside modal */
    .modal-signin-btn {
        width: 100%; display: flex; align-items: center; justify-content: center; gap: 0.6rem;
        padding: 0.95rem; background: linear-gradient(135deg, #8C6D3B, #B89047);
        border: none; border-radius: 14px; color: #fff; font-family: 'Outfit', sans-serif;
        font-weight: 700; font-size: 1.05rem; cursor: pointer;
        box-shadow: 0 6px 20px rgba(184,144,71,0.28); transition: all 0.3s; margin-top: 1.5rem;
    }
    .modal-signin-btn:hover {
        transform: translateY(-2px); box-shadow: 0 10px 28px rgba(184,144,71,0.38);
    }

    .signin-modal-footer {
        padding: 1.2rem; text-align: center; background: rgba(184,144,71,0.04);
        border-top: 1px solid rgba(184,144,71,0.1); font-size: 0.75rem; color: #7A7065;
    }
    .signin-modal-footer a { color: #8C6D3B; font-weight: 600; text-decoration: none; }

    /* Info popup styles */
    .info-modal {
        background: #FFFDF9; border: 1.5px solid rgba(184,144,71,0.2);
        border-radius: 28px; width: 100%; max-width: 460px;
        box-shadow: 0 24px 64px rgba(0,0,0,0.15), 0 0 0 1px rgba(184,144,71,0.1);
        position: relative; opacity: 0; transform: translateY(40px) scale(0.96);
        transition: all .4s cubic-bezier(0.16,1,0.3,1);
        overflow: hidden; padding: 2.5rem 2rem 2rem;
        text-align: center;
    }
    .signin-overlay.open .info-modal { opacity: 1; transform: translateY(0) scale(1); }
    .info-modal h3 { font-family: 'Outfit', sans-serif; font-size: 1.6rem; font-weight: 800; color: #2A241E; margin-bottom: 1rem; }
    .info-modal h3 span { color: #B89047; }
    .info-modal p { font-size: 0.95rem; color: #7A7065; line-height: 1.6; margin-bottom: 2rem; }
    .info-list { text-align: left; margin-bottom: 1.5rem; display: flex; flex-direction: column; gap: 1rem; }
    .info-list-item { display: flex; align-items: flex-start; gap: 0.8rem; }
    .info-list-item i { color: #B89047; font-size: 1.2rem; }
    .info-list-item div { font-size: 0.9rem; color: #2A241E; font-weight: 500; }
    .info-list-item div span { display: block; font-size: 0.8rem; color: #7A7065; font-weight: 400; margin-top: 0.2rem; }
    .info-note { font-size: 0.75rem; color: #8C6D3B; font-weight: 600; margin-bottom: 1.5rem; background: rgba(184,144,71,0.1); padding: 0.5rem 1rem; border-radius: 8px; display: inline-block; }
    
    .btn-continue {
        width: 100%; padding: 1rem;
        background: linear-gradient(135deg, #8C6D3B, #B89047);
        border: none; border-radius: 99px; color: #fff;
        font-weight: 700; font-size: 1rem; cursor: pointer;
        box-shadow: 0 8px 24px rgba(184,144,71,0.25);
        transition: all 0.3s;
    }
    .btn-continue:hover { transform: translateY(-2px); box-shadow: 0 12px 32px rgba(184,144,71,0.35); }
</style>

<!-- Sign-In Overlay Modal -->
<div id="signin-overlay" class="signin-overlay" onclick="handleOverlayClick(event)" role="dialog" aria-modal="true" aria-label="Sign In">
    <div class="signin-modal">
        <button class="signin-close" onclick="closeSigninModal()" aria-label="Close modal">
            <i class="bi bi-x"></i>
        </button>

        <div class="signin-modal-inner">
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

            <button type="button" class="modal-google-btn" onclick="focusModalEmail()">
                <div class="modal-g-circle">G</div>
                Continue with Google
            </button>

            <div class="modal-or"><span>or sign in with email</span></div>

            <form action="{{ route('signin.process') }}" method="POST" autocomplete="off" id="modal-signin-form">
                @csrf
                <input type="hidden" name="selected_template" id="selected_template" value="">
                
                <div class="modal-field-group">
                    <label class="modal-field-label">Email Address</label>
                    <div class="modal-field-wrapper">
                        <i class="bi bi-envelope-fill modal-field-icon"></i>
                        <input type="email" name="email" id="modal-email" class="modal-field-input" placeholder="you@example.com" required value="{{ old('email', 'admin@gmail.com') }}">
                    </div>
                </div>

                <div class="modal-field-group" style="margin-bottom:0">
                    <label class="modal-field-label">Password</label>
                    <div class="modal-field-wrapper">
                        <i class="bi bi-lock-fill modal-field-icon"></i>
                        <input type="password" name="password" id="modal-password" class="modal-field-input" placeholder="••••••••" required value="password">
                        <i class="bi bi-eye modal-field-eye" id="modal-eye" onclick="toggleModalPwd()"></i>
                    </div>
                </div>

                <button type="submit" class="modal-signin-btn">
                    <i class="bi bi-arrow-right-circle-fill"></i> Sign In
                </button>
            </form>

            <p style="text-align:center;font-size:.72rem;color:#7A7065;margin-top:1.2rem">
                By continuing you agree to our
                <a href="#" style="color:#8C6D3B;font-weight:600;text-decoration:none">Terms</a> &amp;
                <a href="#" style="color:#8C6D3B;font-weight:600;text-decoration:none">Privacy</a>
            </p>
        </div>

        <div class="signin-modal-footer">
            <i class="bi bi-shield-lock-fill" style="color:#B89047"></i>
            &nbsp;Secure &amp; Private &nbsp;&bull;&nbsp; No persistent account needed
        </div>
    </div>
</div>

<!-- Info Popup Overlay (How it works) -->
<div id="info-overlay" class="signin-overlay" onclick="handleInfoOverlayClick(event)" role="dialog" aria-modal="true">
    <div class="info-modal" style="position:relative;">
        <div class="modal-brand-icon" style="margin: 0 auto 1.5rem;"><i class="bi bi-heart-fill"></i></div>
        <h3>Create Your <span>Invitation</span></h3>
        <p>Ready to build your invitation website in just 3 simple steps?</p>
        
        <div class="info-list">
            <div class="info-list-item">
                <i class="bi bi-1-circle-fill"></i>
                <div>Pick a Premium Theme<span>Explore our gallery of exclusive luxury designs.</span></div>
            </div>
            <div class="info-list-item">
                <i class="bi bi-2-circle-fill"></i>
                <div>Add Your Details<span>Enter names, venue, and special moments.</span></div>
            </div>
            <div class="info-list-item">
                <i class="bi bi-3-circle-fill"></i>
                <div>Share Instantly<span>Get a custom link to send via WhatsApp.</span></div>
            </div>
        </div>

        <div class="info-note">
            <i class="bi bi-credit-card"></i> Free to design. Pay only when you are ready to go live!
        </div>

        <button type="button" class="btn-continue" onclick="window.location.href='{{ url('/wedding') }}'">
            Continue to Themes &rarr;
        </button>
        <button class="modal-close" style="position:absolute; top: 1.5rem; right: 1.5rem; background: transparent; border: none; font-size: 1.8rem; color: #7A7065; cursor: pointer; transition: color 0.2s;" onclick="closeInfoModal()" aria-label="Close modal">
            <i class="bi bi-x"></i>
        </button>
    </div>
</div>

<script>
    function openSigninModal() {
        document.getElementById('signin-overlay').classList.add('open');
        document.body.style.overflow = 'hidden';
        setTimeout(() => {
            const e = document.getElementById('modal-email');
            if (e) e.focus();
        }, 350);
    }
    function closeSigninModal() {
        document.getElementById('signin-overlay').classList.remove('open');
        document.body.style.overflow = '';
    }
    function handleOverlayClick(e) {
        if (e.target === document.getElementById('signin-overlay')) closeSigninModal();
    }

    function openInfoModal() {
        document.getElementById('info-overlay').classList.add('open');
        document.body.style.overflow = 'hidden';
    }
    function closeInfoModal() {
        document.getElementById('info-overlay').classList.remove('open');
        document.body.style.overflow = '';
    }
    function handleInfoOverlayClick(e) {
        if (e.target === document.getElementById('info-overlay')) closeInfoModal();
    }
    function focusModalEmail() {
        const inp = document.getElementById('modal-email');
        inp.focus();
        inp.style.borderColor = '#B89047';
        inp.style.boxShadow = '0 0 0 4px rgba(184,144,71,0.12)';
        setTimeout(() => { inp.style.borderColor = ''; inp.style.boxShadow = ''; }, 1800);
    }
    function toggleModalPwd() {
        const inp = document.getElementById('modal-password');
        const eye = document.getElementById('modal-eye');
        if (inp.type === 'password') {
            inp.type = 'text';
            eye.className = 'bi bi-eye-slash modal-field-eye';
        } else {
            inp.type = 'password';
            eye.className = 'bi bi-eye modal-field-eye';
        }
    }
    // Auto-open modal if Laravel returned errors (after failed login)
    @if ($errors->any())
        document.addEventListener('DOMContentLoaded', function() {
            openSigninModal();
            // Scroll to top so modal is fully visible
            window.scrollTo(0, 0);
        });
    @endif
    // Close on Escape key
    document.addEventListener('keydown', e => { if (e.key === 'Escape') closeSigninModal(); });
</script>
