@once
    @push('page-styles')
        <link rel="stylesheet" href="{{ asset('frontend/css/news-events.css') }}">
    @endpush
@endonce

<div>
    <!-- Filters + Grid -->
    <section class="news-events-section">
        <div class="news-events-wrap">
            <div class="filter-tabs">
                <button type="button"
                        wire:click="setFilter('all')"
                        class="filter-tab {{ $filter === 'all' ? 'active' : '' }}">
                    All
                </button>
                <button type="button"
                        wire:click="setFilter('news')"
                        class="filter-tab {{ $filter === 'news' ? 'active' : '' }}">
                    News
                </button>
                <button type="button"
                        wire:click="setFilter('event')"
                        class="filter-tab {{ $filter === 'event' ? 'active' : '' }}">
                    Events
                </button>
            </div>

            <div class="news-events-grid" wire:loading.class="is-loading">
                @forelse ($posts as $post)
                    <a href="{{ route('news-events.show', $post['slug']) }}" wire:navigate class="post-card">
                        <div class="post-image">
                            <img src="{{ asset('storage/media/posts/' . $post->assoc_image) }}" alt="{{ $post->title }}" style="width: 100%; height: 250px; object-fit: cover;">
                        </div>
                        <div class="post-body">
                            <span class="post-date"><i class="far fa-calendar"></i> {{ \Carbon\Carbon::parse($post['created_at'])->format('d-M-Y H:i:A') }}</span>
                            <h3>{{ $post['title'] }}</h3>
                            <p>{{ Str::words(strip_tags($post['content']), 23, '...') }}</p>
                            <span class="post-readmore">Read More <i class="fas fa-arrow-right"></i></span>
                        </div>
                    </a>
                @empty
                    <div class="empty-state">
                        <i class="fas fa-newspaper"></i>
                        <p>No news or evants available — check back soon.</p>
                    </div>
                @endforelse
            </div>

            @if ($posts->hasPages())
                <div class="news-pagination">
                    {{ $posts->links('livewire.frontend.partials.pagination') }}
                </div>
            @endif
        </div>
    </section>
</div>