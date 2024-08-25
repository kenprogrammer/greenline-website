<div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>New User</h3>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/" wire:navigate><i class="nav-icon fas fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/users" wire:navigate><i class="fa fa-list-ul"></i>&nbsp;Users List</a></li>
                <li class="breadcrumb-item active">New User</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
<!-- /.content-header -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">New User</h3>
        </div>
    <!-- /.card-header -->
        <div class="card-body">
            @if (session()->has('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <form wire:submit="store">
                <div class="row clearfix">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Name:<span style="color:red;">*</span></label>
                            <input type="text" wire:model="name" class="form-control" placeholder="Name" value="">
                             @error('name') <span class="text-danger"><strong>{{ $message }}</strong></span> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Email:<span style="color:red;">*</span></label>
                            <input type="text" wire:model="email" class="form-control" placeholder="Email" value="">
                             @error('email') <span class="text-danger"><strong>{{ $message }}</strong></span> @enderror
                        </div>
                    </div>
                     <div class="col-md-4">
                        <div class="form-group">
                            <label>Username:<span style="color:red;">*</span></label>
                            <input type="text" wire:model="username" class="form-control" placeholder="Username" value="">
                             @error('username') <span class="text-danger"><strong>{{ $message }}</strong></span> @enderror
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Password:<span style="color:red;">*</span></label>
                            <input type="password" wire:model="password" class="form-control" placeholder="Password" value="">
                             @error('password') <span class="text-danger"><strong>{{ $message }}</strong></span> @enderror
                        </div>
                    </div>
                     <div class="col-md-4">
                        <div class="form-group">
                            <label>Confirm Password:<span style="color:red;">*</span></label>
                            <input type="password" wire:model="confirm_password" class="form-control" placeholder="Confirm Password" value="">
                             @error('confirm_password') <span class="text-danger"><strong>{{ $message }}</strong></span> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Role:<span style="color:red;">*</span></label>
                            <select wire:model="role" class="form-control">
                                <option value="">Select</option>
                                @if(!$roles->isEmpty())
                                    @foreach($roles as $role)
                                        <option value="{{$role->name}}">{{$role->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('role') <span class="text-danger"><strong>{{ $message }}</strong></span> @enderror
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
