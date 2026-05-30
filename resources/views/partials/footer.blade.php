<!-- ══════════════════════════════════════════
     FOOTER PARTIAL
     ══════════════════════════════════════════ -->
<style>
    /* Premium Footer Styles */
    .premium-footer {
        background: #F7F3EB;
        color: #7A7065;
        border-top: 1.5px solid rgba(184, 144, 71, 0.18);
        padding: 6.5rem 0 3.5rem;
        font-size: 0.92rem;
    }

    .footer-logo {
        font-family: 'Outfit', sans-serif;
        font-weight: 800;
        font-size: 1.65rem;
        letter-spacing: -0.5px;
        color: #2A241E;
        margin-bottom: 1.3rem;
        display: inline-block;
        text-decoration: none;
    }

    .footer-logo span {
        color: #B89047;
    }

    .footer-links-title {
        color: #2A241E;
        font-weight: 700;
        font-size: 0.95rem;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        margin-bottom: 1.6rem;
    }

    .footer-link-item {
        display: block;
        color: #7A7065;
        text-decoration: none;
        margin-bottom: 0.8rem;
        transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .footer-link-item:hover {
        color: #B89047;
        transform: translateX(3px);
    }

    .footer-bottom {
        border-top: 1px solid rgba(184, 144, 71, 0.18);
        padding-top: 2rem;
        margin-top: 4rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .hover-light {
        transition: color 0.3s ease;
    }

    .hover-light:hover {
        color: #8C6D3B !important;
    }
</style>

<footer class="premium-footer">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-4">
                <a href="{{ url('/') }}" class="footer-logo">
                    <span><i class="bi bi-heart-fill"></i></span> Velvet Vows
                </a>
                <p class="opacity-75">
                    Delivering the absolute highest quality digital and hybrid event invite systems to modern couples globally.
                </p>
            </div>

            <div class="col-6 col-md-4 col-lg-2 ms-lg-auto">
                <h3 class="footer-links-title">Occasions</h3>
                <a href="javascript:void(0)" onclick="openInfoModal()" class="footer-link-item">Weddings</a>
                <a href="javascript:void(0)" class="footer-link-item" style="opacity:.45;cursor:default">Birthdays</a>
                <a href="javascript:void(0)" class="footer-link-item" style="opacity:.45;cursor:default">Baptism</a>
                <a href="javascript:void(0)" class="footer-link-item" style="opacity:.45;cursor:default">Housewarmings</a>
            </div>

            <div class="col-6 col-md-4 col-lg-2">
                <h3 class="footer-links-title">Company</h3>
                <a href="{{ url('/') }}#how-it-works" class="footer-link-item">Process</a>
                <a href="{{ url('/') }}#categories" class="footer-link-item">Designs</a>
                <a href="{{ url('/') }}#faqs" class="footer-link-item">Support FAQs</a>
            </div>

            <div class="col-md-4 col-lg-3">
                <h3 class="footer-links-title">Support Channels</h3>
                <p class="opacity-75">Have questions or custom requirements? Shoot us an email!</p>
                <a href="mailto:support@velvetvows.invite" class="btn-premium-solid py-2 px-3">
                    <i class="bi bi-envelope-fill"></i> Contact Support
                </a>
            </div>
        </div>

        <div class="footer-bottom">
            <div>
                &copy; {{ date('Y') }} Velvet Vows & Bigdates. All rights reserved.
            </div>
            <div class="d-flex gap-3">
                <a href="#" class="text-muted text-decoration-none hover-light">Privacy Policy</a>
                <a href="#" class="text-muted text-decoration-none hover-light">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>
