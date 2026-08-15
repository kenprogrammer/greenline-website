<div>
    <style>
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
    </style>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
                 <a href="/admin/banners/create" wire:navigate class="btn btn-success pull-left" class="btn btn-success"><i
                class="fa fa-plus-circle" aria-hidden="true">&nbsp;</i>New Banner</a>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin/home" wire:navigate><i class="nav-icon fas fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
                <li class="breadcrumb-item active">Banners</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Banners</h3>
            <div class="input-group" style="width: 260px; float: right;">
                <input type="text" wire:model.live="search" class="form-control" placeholder="Type here to search..." id="searchInput">
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if (session()->has('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
          <table id="users" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if(!$banners->isEmpty())
                    @foreach($banners as $banner)
                        <tr>
                            <td><img src="{{ asset('storage/media/banners/'.$banner->assoc_image) }}" class="elevation-2" height="40" width="60" alt="Banner"></td>
                            <td>{{$banner->title}}</td>
                            <td>{{$banner->description}}</td>
                            <td>
                                @if ($banner->published)
                                    <span class="badge published">Active</span>
                                @else
                                    <span class="badge draft">Hidden</span>
                                @endif
                            </td>
                            <td>{{\Carbon\Carbon::parse($banner->created_at)->format('d-m-Y h:m A')}}</td>
                            <td>{{\Carbon\Carbon::parse($banner->updated_at)->format('d-m-Y h:m A')}}</td>
                            <td>
                              <div class="dropdown">
                                    <button class="btn btn-default dropdown-toggle" type="button"
                                      data-toggle="dropdown">Action
                                      <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="/admin/banners/edit/{{$banner->banner_id}}" wire:navigate><i class="fa fa-edit" aria-hidden="true">&nbsp;</i>Edit</a></li>
                                        <li><a class="dropdown-item" href="#" wire:click="delete({{$banner->id}})" wire:confirm="Are you sure you want to delete this banner?"><i class="fa fa-trash" aria-hidden="true">&nbsp;</i>Delete</a></li>
                                        @if($banner->published==1)
                                        <li><a class="dropdown-item" href="#" wire:click="unpublish({{$banner->id}})" wire:confirm="Are you sure you want to unpublish this banner?"><i class="fas fa-window-close" aria-hidden="true">&nbsp;</i>Unpublish</a></li>
                                        @else
                                        <li><a class="dropdown-item" href="#" wire:click="publish({{$banner->id}})" wire:confirm="Are you sure you want to publish this banner?"><i class="fas fa-window-restore" aria-hidden="true">&nbsp;</i>Publish</a></li>
                                        @endif
                                    </ul>
                              </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
          </table>
          {{ $banners->links() }}
        </div>
        <!-- /.card-body -->
      </div>
</div>