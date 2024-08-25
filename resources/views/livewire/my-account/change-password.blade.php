<div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Change My Password</h3>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/" wire:navigate><i class="nav-icon fas fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
                <li class="breadcrumb-item active">Change My Password</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Change My Password</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if (session()->has('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            
            <form wire:submit="changePassword">
                <div class="row clearfix">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Current Password:<span style="color:red;">*</span></label>
                            <input type="password" wire:model="current_password" class="form-control" placeholder="Current Password" value="">
                            @error('current_password') <span class="text-danger"><strong>{{ $message }}</strong></span> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>New Password:<span style="color:red;">*</span></label>
                            <input type="password" wire:model="new_password" class="form-control" placeholder="New Password" value="">
                            @error('new_password') <span class="text-danger"><strong>{{ $message }}</strong></span> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Confirm New Password:<span style="color:red;">*</span></label>
                            <input type="password" wire:model="confirm_password" class="form-control" placeholder="Confirm New Password" value="">
                            @error('confirm_password') <span class="text-danger"><strong>{{ $message }}</strong></span> @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"
                    aria-hidden="true">&nbsp;</i>Save</button>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
</div>