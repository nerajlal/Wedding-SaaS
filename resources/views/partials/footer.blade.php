<footer class="footer">
    <div class="container footer-main">
        <div class="row g-5">

            <!-- Col 1: Brand -->
            <div class="col-lg-4 col-md-6 footer-brand">
                <h3 style="font-family:var(--font-hero);font-size:2rem;color:var(--gold-primary);margin-bottom:0.5rem;">Velvet Vows</h3>
                <p style="font-family:var(--font-heading);font-style:italic;color:var(--gold-light);font-size:0.9rem;margin-bottom:1.2rem;">Where Love Meets Legacy</p>
                <p>Premium digital wedding invitations crafted with elegance. Share your love story with stunning designs that leave a lasting impression.</p>
                <div class="footer-social">
                    <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" aria-label="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                    <a href="#" aria-label="Pinterest"><i class="bi bi-pinterest"></i></a>
                    <a href="#" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                </div>
            </div>

            <!-- Col 2: Quick Links -->
            <div class="col-lg-2 col-md-6 col-6">
                <h4 class="footer-heading">Quick Links</h4>
                <ul class="footer-links-list">
                    <li><a href="#hero">Home</a></li>
                    <li><a href="#how-it-works">How It Works</a></li>
                    <li><a href="#live-preview">Live Preview</a></li>
                    <li><a href="#templates">Templates</a></li>
                    <li><a href="#collections">Collections</a></li>
                    <li><a href="#faq">FAQ</a></li>
                </ul>
            </div>

            <!-- Col 3: Support & Legal -->
            <div class="col-lg-3 col-md-6 col-6">
                <h4 class="footer-heading">Support</h4>
                <ul class="footer-links-list">
                    <li><a href="/privacy-policy">Privacy Policy</a></li>
                    <li><a href="/terms-of-service">Terms of Service</a></li>
                    <li><a href="/refund-policy">Refund Policy</a></li>
                    <li><a href="/cookie-policy">Cookie Policy</a></li>
                    <li><a href="mailto:hello@velvetvows.in">Help & Support</a></li>
                </ul>
            </div>

            <!-- Col 4: Contact -->
            <div class="col-lg-3 col-md-6">
                <h4 class="footer-heading">Get In Touch</h4>
                <div class="footer-contact-item">
                    <i class="bi bi-envelope"></i>
                    <a href="mailto:hello@velvetvows.in">hello@velvetvows.in</a>
                </div>
                <div class="footer-contact-item">
                    <i class="bi bi-whatsapp"></i>
                    <a href="https://wa.me/919876543210">+91 98765 43210</a>
                </div>
                <div class="footer-contact-item">
                    <i class="bi bi-geo-alt"></i>
                    <span>Bangalore, India</span>
                </div>
                <div style="margin-top:1.5rem;padding:1rem;border:1px solid rgba(212,175,55,0.2);text-align:center;">
                    <p style="font-family:var(--font-heading);color:var(--gold-primary);font-size:0.85rem;margin-bottom:0.5rem;">Ready to start?</p>
                    <a href="{{ url('/register') }}" class="btn btn-gold btn-sm w-100" style="font-size:0.8rem;">Create Free Invitation</a>
                </div>
            </div>

        </div>
    </div>

    <!-- Bottom Bar -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p>&copy; {{ date('Y') }} Velvet Vows. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end mt-2 mt-md-0">
                    <a href="/privacy-policy">Privacy</a>
                    <span style="color:rgba(139,115,85,0.3);margin:0 0.5rem;">·</span>
                    <a href="/terms-of-service">Terms</a>
                    <span style="color:rgba(139,115,85,0.3);margin:0 0.5rem;">·</span>
                    <span style="color:var(--gray-warm);font-size:0.8rem;">Made by <a href="https://metora.in" target="_blank" rel="noopener noreferrer" style="color:var(--gold-primary);">Metora.in</a></span>
                </div>
            </div>
        </div>
    </div>
</footer>
