<div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Edit Banner</h3>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin/home" wire:navigate><i class="nav-icon fas fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/banners" wire:navigate><i class="fa fa-list-ul"></i>&nbsp;View Banners</a></li>
                <li class="breadcrumb-item active">Edit Banner</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Banner</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if (session()->has('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form wire:submit="update">
                <div class="row clearfix">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Title:</label>
                            <input type="text" wire:model="banner_title" class="form-control" placeholder="Add Banner Title (Optional)" value="">
                            @error('banner_title') <span class="text-danger"><strong>{{ $message }}</strong></span> @enderror
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Description:</label>
                            <input type="text" wire:model="banner_desc" class="form-control" placeholder="Add Banner Description (Optional)" value="">
                            @error('banner_desc') <span class="text-danger"><strong>{{ $message }}</strong></span> @enderror
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    {{-- Links To --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Links To:</label>

                            <select wire:model.live="links_to" class="form-control">
                                <option value="none">No Link</option>
                                <option value="article">Service Article</option>
                                <option value="news_event">News & Event Article</option>
                                <option value="external_url">External Link</option>
                            </select>

                            @error('links_to')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    {{-- Articles --}}
                    @if ($links_to === 'article' || $links_to === 'news_event')
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Articles:<span style="color:red;">*</span></label>

                                <select wire:model="article_slug" class="form-control">
                                    <option value="">Select Article</option>

                                    {{-- Service Articles --}}
                                    @if ($links_to === 'article')
                                        @foreach ($serviceArticles as $article)
                                            <option value="{{ $article->slug }}">
                                                {{ $article->title }}
                                            </option>
                                        @endforeach
                                    @endif

                                    {{-- News & Events --}}
                                    @if ($links_to === 'news_event')
                                        @foreach ($newsEvents as $article)
                                            <option value="{{ $article->id }}">
                                                {{ $article->title }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>

                                @error('article_slug')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    @endif

                    {{-- External Link --}}
                    @if ($links_to === 'external_url')
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>External Link:<span style="color:red;">*</span></label>

                                <input
                                    type="url"
                                    wire:model="external_url"
                                    class="form-control"
                                    placeholder="Paste External Link here"
                                >

                                @error('external_url')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    @endif
                </div>
                <div class="row clearfix">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Choose a new banner image (optional):<span style="color:red;">*</span></label>
                            <input type="file" wire:model="banner_image" class="form-control" accept="image/*">
                            @error('banner_image') <span class="text-danger"><strong>{{ $message }}</strong></span> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <br>
                        <img src="{{ asset('storage/media/banners/'.$banner->assoc_image) }}" class="elevation-2" height="70" width="150" alt="Banner">
                    </div>
                </div>
                <button type="submit" class="btn btn-success"><i class="fa fa-save" aria-hidden="true">&nbsp;</i>Save</button>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
</div>