<!-- ══════════════════════════════════════════
     HEADER PARTIAL
     ══════════════════════════════════════════ -->
<style>
    /* Premium Nav Styles */
    .premium-nav {
        position: sticky;
        top: 0;
        z-index: 1000;
        background: rgba(255, 253, 249, 0.88);
        backdrop-filter: blur(25px);
        border-bottom: 1px solid rgba(184, 144, 71, 0.08);
        transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
        padding: 0.9rem 0;
    }

    .premium-nav.scrolled {
        box-shadow: 0 10px 30px rgba(140, 109, 59, 0.04);
        padding: 0.65rem 0;
    }

    .navbar-brand {
        font-family: 'Outfit', sans-serif;
        font-weight: 800;
        font-size: 1.45rem;
        letter-spacing: -0.5px;
        color: #2A241E !important;
        display: flex;
        align-items: center;
        gap: 0.6rem;
        text-decoration: none;
    }

    .navbar-brand span {
        color: #B89047;
    }

    .nav-link {
        font-weight: 500;
        color: #7A7065 !important;
        font-size: 0.92rem;
        padding: 0.5rem 1.1rem !important;
        border-radius: 99px;
        transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
        text-decoration: none;
    }

    .nav-link:hover {
        color: #8C6D3B !important;
        background: rgba(184, 144, 71, 0.05);
    }

    .nav-actions {
        display: flex;
        align-items: center;
        gap: 0.8rem;
    }

    .btn-premium-outline {
        border: 1.5px solid #DFCA9B;
        background: transparent;
        color: #8C6D3B;
        font-weight: 600;
        font-size: 0.86rem;
        padding: 0.55rem 1.4rem;
        border-radius: 99px;
        transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
        text-decoration: none;
    }

    .btn-premium-outline:hover {
        border-color: #B89047;
        color: #B89047;
        background: rgba(184, 144, 71, 0.03);
    }

    .btn-premium-solid {
        background: linear-gradient(135deg, #8C6D3B, #B89047);
        border: none;
        color: #fff !important;
        font-weight: 600;
        font-size: 0.86rem;
        padding: 0.6rem 1.6rem;
        border-radius: 99px;
        box-shadow: 0 4px 20px rgba(184, 144, 71, 0.2);
        transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
    }

    .btn-premium-solid:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(184, 144, 71, 0.35);
    }
</style>

<nav class="navbar navbar-expand-lg premium-nav">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <span><i class="bi bi-heart-fill"></i></span> Velvet Vows
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#premiumNav"
            aria-controls="premiumNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-list fs-3 text-dark"></i>
        </button>

        <div class="collapse navbar-collapse" id="premiumNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}#categories">Occasions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}#how-it-works">How It Works</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}#whatsapp-sim">WhatsApp Invite</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}#qr-hybrid">QR Scanning</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}#faqs">FAQs</a>
                </li>
            </ul>

            <div class="nav-actions">
                @guest
                    <button onclick="openSigninModal()" class="btn-premium-outline">Login</button>
                @endguest
                @auth
                    <a href="{{ route('my.cards') }}" class="btn-premium-outline">My Cards</a>
                @endauth
                <a href="{{ url('/') }}#categories" class="btn-premium-solid">
                    Create Card <i class="bi bi-arrow-right-short fs-5"></i>
                </a>
            </div>
        </div>
    </div>
</nav>
