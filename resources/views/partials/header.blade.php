<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="/">VELVET VOWS</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
            aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-list"></i>
        </button>

        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link active" href="#hero">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#how-it-works">Process</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#templates">Designs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#collections">Collections</a>
                </li>
                <li class="nav-item ms-lg-3 mt-3 mt-lg-0">
                    <a href="{{ url('/register') }}" class="btn btn-gold py-2 px-4">Start Free</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const nav = document.querySelector('.navbar');
        const navLinks = document.querySelectorAll('.nav-link');
        const menuCollapse = document.getElementById('mainNav');
        const bsCollapse = new bootstrap.Collapse(menuCollapse, { toggle: false });

        // 1. Sticky Effect on Scroll
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }
        });

        // 2. Close-on-Click for Mobile
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth < 992) {
                    bsCollapse.hide();
                }

                // 3. Simple Active Highlighting logic
                navLinks.forEach(l => l.classList.remove('active'));
                link.classList.add('active');
            });
        });
    });
</script>
