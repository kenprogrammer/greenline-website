<div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
                 <a href="/admin/services/create" wire:navigate class="btn btn-success pull-left" class="btn btn-success"><i
                class="fa fa-plus-circle" aria-hidden="true">&nbsp;</i>Add Service</a>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin/home" wire:navigate><i class="nav-icon fas fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
                <li class="breadcrumb-item active">Services</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Services</h3>
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
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if(!$posts->isEmpty())
                    @foreach($posts as $post)
                        <tr>
                            <td><img src="{{ asset('storage/media/posts/'.$post->assoc_image) }}" class="elevation-2" height="40" width="60" alt="Image"></td>
                            <td>{{$post->title}}</td>
                            <td>{{\Carbon\Carbon::parse($post->created_at)->format('d-m-Y h:m A')}}</td>
                            <td>{{\Carbon\Carbon::parse($post->updated_at)->format('d-m-Y h:m A')}}</td>
                            <td>
                              <div class="dropdown">
                                    <button class="btn btn-default dropdown-toggle" type="button"
                                      data-toggle="dropdown">Action
                                      <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="/admin/services/edit/{{$post->id}}" wire:navigate><i class="fa fa-edit" aria-hidden="true">&nbsp;</i>Edit</a></li>
                                        <li><a class="dropdown-item" href="#" wire:click="delete({{$post->id}})" wire:confirm="Are you sure you want to delete this post?"><i class="fa fa-trash" aria-hidden="true">&nbsp;</i>Delete</a></li>
                                        @if($post->published==1)
                                        <li><a class="dropdown-item" href="#" wire:click="unpublish({{$post->id}})" wire:confirm="Are you sure you want to unpublish this post?"><i class="fas fa-window-close" aria-hidden="true">&nbsp;</i>Unpublish</a></li>
                                        @else
                                        <li><a class="dropdown-item" href="#" wire:click="publish({{$post->id}})" wire:confirm="Are you sure you want to publish this post?"><i class="fas fa-window-restore" aria-hidden="true">&nbsp;</i>Publish</a></li>
                                        @endif
                                    </ul>
                              </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
          </table>
          {{ $posts->links() }}
        </div>
        <!-- /.card-body -->
      </div>
</div>