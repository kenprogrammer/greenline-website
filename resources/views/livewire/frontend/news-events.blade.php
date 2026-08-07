@once
    @push('page-styles')
        <link rel="stylesheet" href="{{ asset('frontend/css/news-events.css') }}">
    @endpush
@endonce

<div>
    <!-- Page Header -->
    <!--<section class="page-header">
        <div class="page-header-content">
            <h1>News &amp; Events</h1>
            <div class="breadcrumb">
                <a href="/" wire:navigate>Home</a>
                <i class="fas fa-chevron-right"></i>
                <span>News &amp; Events</span>
            </div>
        </div>
    </section>-->

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
                    <a href="{{ route('news-events.show', $post['id']) }}" wire:navigate class="post-card">
                        <div class="post-thumb post-thumb-{{ $post['type'] }}">
                            <i class="fas {{ $post['icon'] }}"></i>
                            <span class="post-type-badge post-type-{{ $post['type'] }}">
                                {{ $post['type'] === 'event' ? 'Event' : 'News' }}
                            </span>
                        </div>
                        <div class="post-body">
                            <span class="post-date"><i class="far fa-calendar"></i> {{ $post['date'] }}</span>
                            <h3>{{ $post['title'] }}</h3>
                            <p>{{ $post['excerpt'] }}</p>
                            <span class="post-readmore">Read More <i class="fas fa-arrow-right"></i></span>
                        </div>
                    </a>
                @empty
                    <div class="empty-state">
                        <i class="fas fa-newspaper"></i>
                        <p>Nothing here yet for this filter — check back soon.</p>
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