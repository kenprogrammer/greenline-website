@once
    @push('page-styles')
        <link rel="stylesheet" href="{{ asset('frontend/css/news-events-show.css') }}">
    @endpush
@endonce

<div>
    <section class="post-section">
        <div class="post-layout">
            <article class="post-main">

                <h1 class="post-title">{{ $post->title }}</h1>

                <div class="post-content">
                    <div class="ckeditor-content">
                        {!! $post->content !!}
                   </div>
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
                    <h3>Other Services</h3>
                    
                    @foreach($posts as $post)
                    <a href="{{ route('services.show', $post->slug) }}" wire:navigate class="related-post">
                        <div class="related-thumb"><i class="fas fa-chalkboard"></i></div>
                        <div class="related-info">
                            <h4>{{ $post->title }}</h4>
                        </div>
                    </a>
                    @endforeach
                </div>

                <div class="sidebar-cta">
                    <h3>Have A Question?</h3>
                    <p>Talk to our team about how this service.</p>
                    <a href="{{ route('contact') }}" wire:navigate class="cta-button">Contact Us</a>
                </div>
            </aside>
        </div>
    </section>
</div>