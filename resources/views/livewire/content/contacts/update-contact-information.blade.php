<div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Update Contact Info</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/" wire:navigate><i class="nav-icon fas fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
                    <li class="breadcrumb-item active">Update Contact Info</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Update Contact Info</h3>
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
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Main Phone Number:<span style="color:red;">*</span></label>
                            <input type="text" wire:model="main_phone_no" class="form-control" placeholder="Enter Main Phone Number">
                            @error('main_phone_no') <span class="text-danger"><strong>{{ $message }}</strong></span> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Secondary Phone Number:</label>
                            <input type="text" wire:model="phone_no_2" class="form-control" placeholder="Enter Secondary Phone Number (Optional)">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Tertiary Phone Number:</label>
                            <input type="text" wire:model="phone_no_3" class="form-control" placeholder="Enter Tertiary Phone Number (Optional)">
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Main Email:<span style="color:red;">*</span></label>
                            <input type="text" wire:model="main_email" class="form-control" placeholder="Enter Main Email">
                            @error('main_email') <span class="text-danger"><strong>{{ $message }}</strong></span> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Secondary Email:</label>
                            <input type="text" wire:model="email_2" class="form-control" placeholder="Enter Secondary Email">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Tertiary Email:</label>
                            <input type="text" wire:model="email_3" class="form-control" placeholder="Enter Tertiary Email">
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Postal Address:<span style="color:red;">*</span></label>
                            <input type="text" wire:model="postal_address" class="form-control" placeholder="Postal Address">
                            @error('postal_address') <span class="text-danger"><strong>{{ $message }}</strong></span> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Office Location:<span style="color:red;">*</span></label>
                            <input type="text" wire:model="office_location" class="form-control" placeholder="Enter Office Location">
                            @error('office_location') <span class="text-danger"><strong>{{ $message }}</strong></span> @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"
                    aria-hidden="true">&nbsp;</i>Update</button>
            </form>
        </div>
    <!-- /.card-body -->
    </div>
</div>
