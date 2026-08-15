@once
    @push('page-styles')
        <link rel="stylesheet" href="{{ asset('frontend/css/news-events-show.css') }}">
    @endpush
@endonce

<div>
    <!-- Article -->
    <section class="post-section">
        <div class="post-layout">
            <article class="post-main">
                <div class="post-meta">
                    @if($post['post_type']==='news')
                        <span class="category-tag category-news">News</span>
                    @else
                        <span class="category-tag category-event">Event</span>
                    @endif
                    
                    <span><i class="far fa-calendar"></i> {{ \Carbon\Carbon::parse($post['created_at'])->format('d-M-Y H:i:A') }}</span>
                </div>

                <h1 class="post-title">{{ $post['title'] }}</h1>

                <div class="post-featured-image">
                    <img src="{{ asset('storage/media/posts/' . $post->assoc_image) }}" alt="{{ $post->title }}" style="width: 100%; height: 250px; object-fit: cover;">
                </div>

                <div class="post-content">
                   <div class="ckeditor-content">
                        {!! $post['content'] !!}
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
                    <h3>Upcoming Events</h3>
                    @if(!$events->isEmpty())
                        @foreach($events as $event)
                            <a href="{{ route('news-events.show', $event->slug) }}" wire:navigate class="related-post">
                                <div class="related-thumb"><i class="fas fa-calendar-days"></i></div>
                                <div class="related-info">
                                    <h4>{{$event->title}}</h4>
                                    <span>Posted On: {{ \Carbon\Carbon::parse($event->updated_at)->format('d-M-Y H:i:A') }}</span>
                                </div>
                            </a>
                        @endforeach
                    @endif
                </div>

                <div>
                    <h3>Latest News</h3>
                     @if(!$news->isEmpty())
                        @foreach($news as $post)
                            <a href="{{ route('news-events.show', $post->slug) }}" wire:navigate class="related-post">
                                <div class="related-thumb"><i class="fas fa-warehouse"></i></div>
                                <div class="related-info">
                                    <h4>{{$post->title}}</h4>
                                    <span>Posted On: {{ \Carbon\Carbon::parse($post->updated_at)->format('d-M-Y H:i:A') }}</span>
                                </div>
                            </a>
                        @endforeach
                     @endif
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