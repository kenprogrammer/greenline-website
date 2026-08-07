<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Greenline Holdings Company Ltd - Clearing And Forwarding Solutions</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">
    @stack('page-styles')
</head>
<body>
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="top-bar-content">
            <div class="social-links">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-pinterest"></i></a>
            </div>
            <div class="contact-info">
                <span><i class="fas fa-phone"></i> +254722514846</span>
                <span><i class="fas fa-envelope"></i> info@greenlineholdings.co.ke</span>
                <div class="location">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Mombasa,Kenya</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav x-data="{ mobileOpen: false }">
        <div class="nav-content">
            <a href="/" class="logo" wire:navigate>
                <img src="{{ asset('img/logo.png') }}" alt="Logo" width="100" height="65">
                <div>
                    <div style="font-size: 20px; color:#008000;">Greenline</div>
                    <div style="font-size: 16px; font-weight: normal; color: #666;">Holdings Company Ltd</div>
                </div>
            </a>
            <ul class="nav-links" :class="{ 'is-open': mobileOpen }">
                <li>
                    <a href="/" class="{{ request()->is('/') ? 'active' : '' }}" wire:navigate @click="mobileOpen = false">HOME</a>
                </li>
                <li>
                    <a href="{{ request()->is('/') ? '#services' : '/#services' }}" @click="mobileOpen = false">SERVICES</a>
                </li>
                <li>
                    <a href="/about" class="{{ request()->is('about') ? 'active' : '' }}" wire:navigate @click="mobileOpen = false">ABOUT US</a>
                </li>
                <li>
                    <a href="/news-events" class="{{ request()->is('news-events*') ? 'active' : '' }}" wire:navigate @click="mobileOpen = false">NEWS & EVENTS</a>
                </li>
                <li>
                    <a href="/contact" class="{{ request()->is('contact') ? 'active' : '' }}" wire:navigate @click="mobileOpen = false">CONTACT US</a>
                </li>
            </ul>
            <button
                type="button"
                class="mobile-menu-btn"
                @click="mobileOpen = !mobileOpen"
                :aria-expanded="mobileOpen"
                aria-label="Toggle navigation menu">
                <i class="fas fa-bars" x-show="!mobileOpen"></i>
                <i class="fas fa-times" x-show="mobileOpen" style="display: none;"></i>
            </button>
        </div>
    </nav>
    {{ $slot }}
    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>Greenline Holdings Ltd</h3>
                <p>Your trusted partner in clearing and forwarding solutions. We provide comprehensive logistics services with reliability and professionalism.</p>
                <div class="footer-social">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>

            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="/" wire:navigate><i class="fas fa-chevron-right"></i> Home</a></li>
                    <li><a href="{{ request()->is('/') ? '#services' : '/#services' }}"><i class="fas fa-chevron-right"></i> Services</a></li>
                    <li><a href="/about" wire:navigate><i class="fas fa-chevron-right"></i> About Us</a></li>
                    <li><a href="/news-events" wire:navigate><i class="fas fa-chevron-right"></i> News & Events</a></li>
                    <li><a href="/contact" wire:navigate><i class="fas fa-chevron-right"></i> Contact Us</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h3>Our Services</h3>
                <ul>
                    <li><a href="index.html#services"><i class="fas fa-chevron-right"></i> Sea Freight</a></li>
                    <li><a href="index.html#services"><i class="fas fa-chevron-right"></i> Air Freight</a></li>
                    <li><a href="index.html#services"><i class="fas fa-chevron-right"></i> Customs Clearance</a></li>
                    <li><a href="index.html#services"><i class="fas fa-chevron-right"></i> Warehousing</a></li>
                    <li><a href="index.html#services"><i class="fas fa-chevron-right"></i> Documentation</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h3>Contact Info</h3>
                <ul>
                    <li><a href="tel:+918888888888"><i class="fas fa-phone"></i> +254722514846</a></li>
                    <li><a href="mailto:info@greenlineholdings.co.ke"><i class="fas fa-envelope"></i> info@greenlineholdings.co.ke</a></li>
                    <li><a href="/contact"><i class="fas fa-map-marker-alt"></i> Mombasa-Kenya, Taiyebi Building</a></li>
                    <li><a href="#"><i class="fas fa-clock"></i> Mon - Sat: 9:00 AM - 6:00 PM</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> Greenline Holdings Ltd. All Rights Reserved. | Designed with care for logistics excellence.</p>
        </div>
    </footer>

    <script>
        (function() {
            const slides = document.querySelectorAll('.slide');
            const dots = document.querySelectorAll('.slider-dot');
            const prevBtn = document.querySelector('.slider-arrow.prev');
            const nextBtn = document.querySelector('.slider-arrow.next');
            let current = 0;
            let autoplayTimer;
            const AUTOPLAY_DELAY = 6000;

            function goToSlide(index) {
                slides[current].classList.remove('active');
                dots[current].classList.remove('active');
                current = (index + slides.length) % slides.length;
                slides[current].classList.add('active');
                dots[current].classList.add('active');
            }

            function nextSlide() {
                goToSlide(current + 1);
            }

            function prevSlide() {
                goToSlide(current - 1);
            }

            function startAutoplay() {
                autoplayTimer = setInterval(nextSlide, AUTOPLAY_DELAY);
            }

            function resetAutoplay() {
                clearInterval(autoplayTimer);
                startAutoplay();
            }

            nextBtn.addEventListener('click', function() {
                nextSlide();
                resetAutoplay();
            });

            prevBtn.addEventListener('click', function() {
                prevSlide();
                resetAutoplay();
            });

            dots.forEach(function(dot) {
                dot.addEventListener('click', function() {
                    goToSlide(parseInt(dot.getAttribute('data-slide'), 10));
                    resetAutoplay();
                });
            });

            startAutoplay();
        })();
    </script>
</body>
</html>