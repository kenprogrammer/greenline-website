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
        <div class="services-grid" wire:loading.class="is-loading">
            @forelse ($posts as $post)
                <div class="service-card">
                    <div class="service-image">
                        <img src="{{ asset('storage/media/posts/' . $post->assoc_image) }}" alt="{{ $post->title }}" style="width: 100%; height: 250px; object-fit: cover;">
                    </div>
                    <div class="service-content">
                        <h3>{{$post->title}}</h3>
                        {{ Str::words(strip_tags($post->content), 23, '...') }}
                        <a href="{{ route('services.show', $post->slug) }}" wire:navigate>
                            <span class="service-readmore">Read More <i class="fas fa-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
            @empty
                <div class="empty-state">
                    <i class="fas fa-newspaper"></i>
                    <p>No service content available — check back soon.</p>
                </div>
            @endforelse
        </div>
        @if ($posts->hasPages())
            <div class="services-pagination">
                {{ $posts->links('livewire.frontend.partials.pagination') }}
            </div>
        @endif
    </section>
</div>
