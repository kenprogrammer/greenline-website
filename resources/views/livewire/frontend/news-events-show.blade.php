@once
    @push('page-styles')
        <link rel="stylesheet" href="{{ asset('frontend/css/news-events-show.css') }}">
    @endpush
@endonce

<div>
    <!-- Page Header -->
    <!--<section class="page-header">
        <div class="page-header-content">
            <h1>{{ $post['type_label'] }}</h1>
            <div class="breadcrumb">
                <a href="/" wire:navigate>Home</a>
                <i class="fas fa-chevron-right"></i>
                <a href="{{ route('news-events.index') }}" wire:navigate>News &amp; Events</a>
                <i class="fas fa-chevron-right"></i>
                <span>{{ $post['title'] }}</span>
            </div>
        </div>
    </section>-->

    <!-- Article -->
    <section class="post-section">
        <div class="post-layout">
            <article class="post-main">
                <div class="post-meta">
                    <span class="category-tag category-{{ $post['type'] }}">{{ $post['type_label'] }}</span>
                    <span><i class="far fa-calendar"></i> {{ $post['date'] }}</span>
                    <span><i class="far fa-clock"></i> {{ $post['read_time'] }}</span>
                    <span><i class="far fa-user"></i> {{ $post['author'] }}</span>
                </div>

                <h1 class="post-title">{{ $post['title'] }}</h1>

                @if ($post['type'] === 'event')
                    <div class="event-details-bar">
                        <div>
                            <i class="far fa-clock"></i>
                            <div>
                                <span class="label">Time</span>
                                <span class="value">{{ $post['time'] }}</span>
                            </div>
                        </div>
                        <div>
                            <i class="fas fa-map-marker-alt"></i>
                            <div>
                                <span class="label">Location</span>
                                <span class="value">{{ $post['location'] }}</span>
                            </div>
                        </div>
                        <a href="{{ route('contact') }}" wire:navigate class="cta-button">Reserve Your Spot</a>
                    </div>
                @endif

                <div class="post-featured-image">
                    <i class="fas {{ $post['icon'] }}"></i>
                </div>

                <div class="post-content">
                    <p>Cross-border trade rules shift more often than most businesses can track on their own, and the upcoming FY26 duty changes are one of the more significant updates we've seen in recent years. This session breaks down what's changing, who it affects, and what you should do about it before your next shipment leaves the dock.</p>

                    <h2>What's Changing</h2>
                    <p>The revised duty structure adjusts rates across several tariff categories commonly used by SME importers, alongside updated valuation rules for related-party transactions. Getting classification wrong under the new structure carries a higher cost than it used to.</p>

                    <h2>Who Should Attend</h2>
                    <ul>
                        <li>Import/export managers responsible for landed cost calculations</li>
                        <li>Finance teams budgeting duty and compliance costs for FY26</li>
                        <li>Anyone who has been stung by a misclassification penalty before</li>
                    </ul>

                    <p>Seats are limited to keep the Q&amp;A portion useful — register early to hold your spot.</p>
                </div>

                <div class="post-share">
                    <span>Share:</span>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fas fa-link"></i></a>
                </div>
            </article>

            <aside class="post-sidebar">
                <div>
                    <h3>Upcoming Events</h3>
                    <a href="{{ route('news-events.show', 4) }}" wire:navigate class="related-post">
                        <div class="related-thumb"><i class="fas fa-calendar-days"></i></div>
                        <div class="related-info">
                            <h4>Logistics Excellence Summit 2026</h4>
                            <span>Aug 02, 2026</span>
                        </div>
                    </a>
                    <a href="{{ route('news-events.show', 7) }}" wire:navigate class="related-post">
                        <div class="related-thumb"><i class="fas fa-chalkboard"></i></div>
                        <div class="related-info">
                            <h4>Export Documentation Essentials Workshop</h4>
                            <span>Apr 22, 2026</span>
                        </div>
                    </a>
                </div>

                <div>
                    <h3>Latest News</h3>
                    <a href="{{ route('news-events.show', 1) }}" wire:navigate class="related-post">
                        <div class="related-thumb"><i class="fas fa-warehouse"></i></div>
                        <div class="related-info">
                            <h4>New Bonded Warehouse In Nhava Sheva</h4>
                            <span>Jun 28, 2026</span>
                        </div>
                    </a>
                    <a href="{{ route('news-events.show', 3) }}" wire:navigate class="related-post">
                        <div class="related-thumb"><i class="fas fa-certificate"></i></div>
                        <div class="related-info">
                            <h4>AEO Tier-2 Certification Achieved</h4>
                            <span>Jun 15, 2026</span>
                        </div>
                    </a>
                </div>

                <div class="sidebar-cta">
                    <h3>Have A Question?</h3>
                    <p>Talk to our team about how this affects your shipments.</p>
                    <a href="{{ route('contact') }}" wire:navigate class="cta-button">Contact Us</a>
                </div>
            </aside>
        </div>
    </section>
</div>