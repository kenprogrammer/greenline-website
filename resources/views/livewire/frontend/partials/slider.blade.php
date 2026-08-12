<div>
    <!-- Hero Banner Slider -->
   <section class="hero" id="home">
        <div class="slider">
            @foreach ($banners as $index => $banner)

                <div class="slide {{ $index === 0 ? 'active' : '' }}">

                    {{-- Banner image --}}
                    <img
                        src="{{ asset('storage/media/banners/' . $banner->assoc_image) }}"
                        alt="{{ $banner->title }}"
                        class="banner-image"
                    >

                    {{-- Banner content --}}
                    <div class="hero-content">

                        @if (!empty($banner->title))
                            <h2>{{ $banner->title }}</h2>
                        @endif

                        @if (!empty($banner->description))
                            <h1>{{ $banner->description }}</h1>
                        @endif

                        @if ($banner->links_to !== 'none')

                            @php
                                $bannerUrl = '#';

                                if ($banner->links_to === 'external_url') {
                                    $bannerUrl = $banner->linked_url;
                                } elseif (
                                    $banner->links_to === 'article' &&
                                    !empty($banner->linked_article_slug)
                                ) {
                                    $bannerUrl = route(
                                        'services.show',
                                        $banner->linked_article_slug
                                    );
                                } elseif (
                                    $banner->links_to === 'news_event' &&
                                    !empty($banner->linked_article_slug)
                                ) {
                                    $bannerUrl = route(
                                        'news-events.show',
                                        $banner->linked_article_slug
                                    );
                                }
                            @endphp

                            <a
                                href="{{ $bannerUrl }}"
                                class="cta-button"
                                @if ($banner->links_to === 'external_url')
                                    target="_blank"
                                    rel="noopener noreferrer"
                                @endif
                            >
                                Learn More
                            </a>

                        @endif

                    </div>

                </div>

            @endforeach

            {{-- Slider arrows --}}
            <button class="slider-arrow prev" aria-label="Previous slide">
                <i class="fas fa-chevron-left"></i>
            </button>

            <button class="slider-arrow next" aria-label="Next slide">
                <i class="fas fa-chevron-right"></i>
            </button>

            {{-- Slider dots --}}
            <div class="slider-dots">
                @foreach ($banners as $index => $banner)
                    <button
                        class="slider-dot {{ $index === 0 ? 'active' : '' }}"
                        data-slide="{{ $index }}"
                        aria-label="Slide {{ $index + 1 }}"
                    ></button>
                @endforeach
            </div>
        </div>
    </section>
</div>
