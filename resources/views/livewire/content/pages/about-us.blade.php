<div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>About Us</h3>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin/home" wire:navigate><i class="nav-icon fas fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
                <li class="breadcrumb-item active">About Us</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">About Us</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if (session()->has('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form wire:submit="update">
                <div class="row clearfix">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Title:<span style="color:red;">*</span></label>
                            <input type="text" wire:model="post_title" class="form-control" placeholder="Add Title" value="">
                            @error('post_title') <span class="text-danger"><strong>{{ $message }}</strong></span> @enderror
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-md-9">
                        <div class="form-group" wire:ignore>
                            <label>Page Content:<span style="color:red;">*</span></label>
                            <textarea wire:model="post_content" class="form-control" rows="15" id="editor" placeholder="Add Page Content">{{$post_content}}</textarea>
                            @error('post_content') <span class="text-danger"><strong>{{ $message }}</strong></span> @enderror
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Choose an image:</label>
                            <input type="file" wire:model="post_image" class="form-control" accept="image/*">
                            @error('post_image') <span class="text-danger"><strong>{{ $message }}</strong></span> @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success"><i class="fa fa-save" aria-hidden="true">&nbsp;</i>Save</button>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
</div>