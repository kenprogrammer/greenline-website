<div>
    @once
        @push('page-styles')
            <link rel="stylesheet" href="{{ asset('frontend/css/about.css') }}">
        @endpush
    @endonce

    <!-- About Section -->
    <section class="about-section">
        <div class="about-grid">
            <div class="about-image">
                @if(empty($about->assoc_image))
                    <i class="fas fa-warehouse"></i>
                @else
                     <img src="{{ asset('storage/media/posts/' . $about->assoc_image) }}" alt="About Us Image"  style="width: 100%; height: 100%; object-fit: cover;">
                @endif
                <div class="about-badge">
                    <strong>15+</strong>
                    <span>YEARS</span>
                </div>
            </div>
            <div class="about-text">
                <span class="eyebrow">Who We Are</span>
                <h2>{{ $about->title }}</h2>
                {!! $about->content !!}<br><br><br>
                <a href="/contact" class="cta-button" wire:navigate>Talk To Our Team</a>
            </div>
        </div>
    </section>

    <!-- Stats Strip -->
    <section class="stats-strip">
        <div class="stats-grid">
            <div class="stat-item">
                <strong>15+</strong>
                <span>YEARS OF EXPERIENCE</span>
            </div>
            <div class="stat-item">
                <strong>4,200+</strong>
                <span>SHIPMENTS HANDLED</span>
            </div>
            <div class="stat-item">
                <strong>3+</strong>
                <span>COUNTRIES SERVED</span>
            </div>
            <div class="stat-item">
                <strong>98%</strong>
                <span>ON-TIME CLEARANCE RATE</span>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="why-section">
        <h2>Why Choose Us</h2>
        <p class="section-sub">We combine regulatory know-how with a service mindset, so your cargo moves without surprises.</p>
        <div class="why-grid">
            <div class="why-card">
                <div class="why-icon"><i class="fas fa-bolt"></i></div>
                <h3>Fast Turnaround</h3>
                <p>Streamlined documentation and strong port relationships keep clearance times short.</p>
            </div>
            <div class="why-card">
                <div class="why-icon"><i class="fas fa-shield-halved"></i></div>
                <h3>Fully Compliant</h3>
                <p>Every shipment is handled in line with the latest customs and trade regulations.</p>
            </div>
            <div class="why-card">
                <div class="why-icon"><i class="fas fa-headset"></i></div>
                <h3>Dedicated Support</h3>
                <p>A single point of contact who knows your shipment, not a call centre queue.</p>
            </div>
            <div class="why-card">
                <div class="why-icon"><i class="fas fa-globe"></i></div>
                <h3>Global Network</h3>
                <p>Partner agents at major ports and airports worldwide for seamless handovers.</p>
            </div>
        </div>
    </section>
</div>
