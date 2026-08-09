<div>
    @once
        @push('page-styles')
            <link rel="stylesheet" href="{{ asset('frontend/css/slider.css') }}">
            <link rel="stylesheet" href="{{ asset('frontend/css/services.css') }}">
        @endpush
    @endonce
    
    @livewire('frontend.partials.slider')

     <!-- Services Section -->
    <section class="services" id="services">
        <h2>Our Services</h2>
        <div class="services-grid">
            <div class="service-card">
                <div class="service-image">
                    <i class="fas fa-ship" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 80px; color: rgba(255,255,255,0.3);"></i>
                </div>
                <div class="service-content">
                    <h3>Sea Freight</h3>
                    <p>Comprehensive sea freight solutions for your international cargo needs. We handle full container loads and less than container loads with efficiency and care.</p>
                    <span class="service-readmore">Read More <i class="fas fa-arrow-right"></i></span>
                </div>
            </div>

            <div class="service-card">
                <div class="service-image">
                    <i class="fas fa-plane" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 80px; color: rgba(255,255,255,0.3);"></i>
                </div>
                <div class="service-content">
                    <h3>Air Freight</h3>
                    <p>Fast and reliable air freight services for time-sensitive shipments. We ensure your cargo reaches its destination quickly and securely.</p>
                </div>
            </div>

            <div class="service-card">
                <div class="service-image">
                    <i class="fas fa-file-invoice" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 80px; color: rgba(255,255,255,0.3);"></i>
                </div>
                <div class="service-content">
                    <h3>Customs Clearance</h3>
                    <p>Expert customs clearance services to streamline your import and export processes. We handle all documentation and regulatory requirements.</p>
                </div>
            </div>

            <div class="service-card">
                <div class="service-image">
                    <i class="fas fa-plane" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 80px; color: rgba(255,255,255,0.3);"></i>
                </div>
                <div class="service-content">
                    <h3>One more service</h3>
                    <p>Fast and reliable air freight services for time-sensitive shipments. We ensure your cargo reaches its destination quickly and securely.</p>
                </div>
            </div>

            <div class="service-card">
                <div class="service-image">
                    <i class="fas fa-plane" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 80px; color: rgba(255,255,255,0.3);"></i>
                </div>
                <div class="service-content">
                    <h3>Another service</h3>
                    <p>Fast and reliable air freight services for time-sensitive shipments. We ensure your cargo reaches its destination quickly and securely.</p>
                </div>
            </div>

            <div class="service-card">
                <div class="service-image">
                    <i class="fas fa-plane" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 80px; color: rgba(255,255,255,0.3);"></i>
                </div>
                <div class="service-content">
                    <h3>And another service</h3>
                    <p>Fast and reliable air freight services for time-sensitive shipments. We ensure your cargo reaches its destination quickly and securely.</p>
                </div>
            </div>
        </div>
    </section>
</div>
