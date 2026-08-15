<div class="dash">
    <style>
        .dash { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }

        .dash-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px;
            margin-bottom: 30px;
        }

        .dash-header h3 {
            font-size: 24px;
            color: #2c3e50;
            margin: 0;
        }

        .dash-header .actions {
            display: flex;
            gap: 12px;
        }

        .dash-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #008000;
            color: #fff;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            transition: background 0.2s;
        }

        .dash-btn:hover {
            background: #0FFF50;
            color: black;
        }

        .dash-btn.outline {
            background: white;
            border: 1px solid #008000;
            color: #2c3e50;
        }

        .dash-btn.outline:hover {
            border-color: #0FFF50;
            background: #fdf6ee;
        }

        /* Stat cards */
        .dash-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border: 1px solid #eee;
            border-radius: 12px;
            padding: 22px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.04);
        }

        .stat-card .stat-value {
            font-size: 30px;
            font-weight: 700;
            color: #2c3e50;
            line-height: 1;
            margin-bottom: 8px;
        }

        .stat-card .stat-label {
            font-size: 13px;
            color: #888;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        .stat-card.accent .stat-value { color: #008000; }
        .stat-card.warn .stat-value { color: #008000; }

        /* Breakdown row */
        .dash-section {
            background: white;
            border: 1px solid #eee;
            border-radius: 12px;
            padding: 26px;
            margin-bottom: 24px;
        }

        .dash-section h4 {
            font-size: 16px;
            color: #2c3e50;
            margin: 0 0 18px;
        }

        .type-breakdown {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 16px;
        }

        .type-pill {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #f8f9fa;
            border-radius: 10px;
            padding: 14px 18px;
        }

        .type-pill .type-name {
            font-size: 14px;
            font-weight: 600;
            color: #2c3e50;
        }

        .type-pill .type-count {
            font-size: 18px;
            font-weight: 700;
            color: #008000;
        }

        /* Two-column layout for recent activity */
        .dash-columns {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
        }

        .dash-table {
            width: 100%;
            border-collapse: collapse;
        }

        .dash-table th {
            text-align: left;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            color: #999;
            padding: 0 0 10px;
            border-bottom: 1px solid #eee;
        }

        .dash-table td {
            padding: 12px 0;
            border-bottom: 1px solid #f5f5f5;
            font-size: 14px;
            color: #444;
        }

        .dash-table tr:last-child td {
            border-bottom: none;
        }

        .badge {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .badge.published { background: rgba(39, 174, 96, 0.12); color: #219150; }
        .badge.draft { background: rgba(243, 156, 18, 0.15); color: #b9770e; }

        .empty-row {
            padding: 20px 0;
            color: #999;
            font-size: 14px;
            text-align: center;
        }

        @media (max-width: 900px) {
            .dash-columns {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="dash-header">
        <h3>Welcome</h3>
        <div class="actions">
            <a href="{{ route('admin.banners.create') }}" class="dash-btn outline">
                <i class="fas fa-image"></i> New Banner
            </a>
            <a href="{{ route('admin.posts.create') }}" class="dash-btn">
                <i class="fas fa-plus"></i> New Post
            </a>
        </div>
    </div>

    <!-- Stat Cards -->
    <div class="dash-stats">
        <div class="stat-card">
            <div class="stat-value">{{ $totalPosts }}</div>
            <div class="stat-label">Total Posts</div>
        </div>
        <div class="stat-card accent">
            <div class="stat-value">{{ $publishedPosts }}</div>
            <div class="stat-label">Published</div>
        </div>
        <div class="stat-card">
            <div class="stat-value">{{ $draftPosts }}</div>
            <div class="stat-label">Drafts</div>
        </div>
        <div class="stat-card">
            <div class="stat-value">{{ $totalBanners }}</div>
            <div class="stat-label">Banners</div>
        </div>
        <div class="stat-card accent">
            <div class="stat-value">{{ $activeBanners }}</div>
            <div class="stat-label">Active Banners</div>
        </div>
        @if ($missingSeoCount > 0)
            <div class="stat-card warn">
                <div class="stat-value">{{ $missingSeoCount }}</div>
                <div class="stat-label">Missing SEO Fields</div>
            </div>
        @endif
    </div>

    <!-- Breakdown by post type -->
    <div class="dash-section">
        <h4>Posts By Type</h4>
        <div class="type-breakdown">
            <div class="type-pill">
                <span class="type-name"><i class="fas fa-briefcase"></i> Services</span>
                <span class="type-count">{{ $servicesCount }}</span>
            </div>
            <div class="type-pill">
                <span class="type-name"><i class="fas fa-newspaper"></i> News</span>
                <span class="type-count">{{ $newsCount }}</span>
            </div>
            <div class="type-pill">
                <span class="type-name"><i class="fas fa-calendar-days"></i> Events</span>
                <span class="type-count">{{ $eventsCount }}</span>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="dash-columns">
        <div class="dash-section">
            <h4>Recent Posts</h4>
            @if ($recentPosts->isEmpty())
                <p class="empty-row">No posts yet.</p>
            @else
                <table class="dash-table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recentPosts as $post)
                            <tr>
                                <td>
                                    <a href="{{ route('admin.posts.edit', $post) }}" style="color:#2c3e50; text-decoration:none; font-weight:600;">
                                        {{ $post->title }}
                                    </a>
                                </td>
                                <td style="text-transform: capitalize;">{{ $post->post_type }}</td>
                                <td>
                                    @if ($post->published)
                                        <span class="badge published">Published</span>
                                    @else
                                        <span class="badge draft">Draft</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

        <div class="dash-section">
            <h4>Recent Banners</h4>
            @if ($recentBanners->isEmpty())
                <p class="empty-row">No banners yet.</p>
            @else
                <table class="dash-table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Links To</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recentBanners as $banner)
                            <tr>
                                <td>
                                    <a href="{{ route('admin.banners.edit', $banner) }}" style="color:#2c3e50; text-decoration:none; font-weight:600;">
                                        {{ $banner->title ?: '(untitled)' }}
                                    </a>
                                </td>
                                <td style="text-transform: capitalize;">{{ str_replace('_', ' ', $banner->links_to) }}</td>
                                <td>
                                    @if ($banner->published)
                                        <span class="badge published">Active</span>
                                    @else
                                        <span class="badge draft">Hidden</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>