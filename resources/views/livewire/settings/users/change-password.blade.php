<div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Change User Password</h3>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/" wire:navigate><i class="nav-icon fas fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/users" wire:navigate><i class="fa fa-list-ul"></i>&nbsp;Users List</a></li>
                <li class="breadcrumb-item active">Change User Password</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Change User Password</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if (session()->has('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <form wire:submit="changePassword">
                <div class="box-body"> 
                    <div class="form-group">
                        <label>New Password<span style="color:red;">*</span></label>
                        <input type="password" class="form-control" wire:model="new_password" id="password" placeholder="New password">
                        @error('new_password') <span class="text-danger"><strong>{{ $message }}</strong></span> @enderror
                    </div>
                </div><!-- /.box-body -->
        
                <div class="box-body"> 
                    <div class="form-group">
                        <label>Confirm Password<span style="color:red;">*</span></label>
                        <input type="password" class="form-control" wire:model="confirm_password" id="password" placeholder="Confirm password">
                        @error('confirm_password') <span class="text-danger"><strong>{{ $message }}</strong></span> @enderror
                    </div>
                </div><!-- /.box-body -->

                <button type="submit" class="btn btn-success"><i class="fa fa-save"
                    aria-hidden="true">&nbsp;</i>Save</button>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
</div>
