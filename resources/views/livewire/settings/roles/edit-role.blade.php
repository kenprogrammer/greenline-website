<div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Edit Role</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/" wire:navigate><i class="nav-icon fas fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/roles" wire:navigate><i class="fa fa-list-ul"></i>&nbsp;Roles List</a></li>
                        <li class="breadcrumb-item active">Edit Role</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Role</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form wire:submit="store">
                <div class="row clearfix">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Role Name:<span style="color:red;">*</span></label>
                            <input type="text" wire:model="role_name" class="form-control" placeholder="Role Name">
                            @error('role_name') <span class="text-danger"><strong>{{ $message }}</strong></span> @enderror
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                   @foreach($groupedPermissions as $group => $permissions)
                        <p style="font-weight:bold">{{ $group }}</p>
                        <table class="table">
                            @foreach($permissions as $permission)
                            <tr>
                                <td>
                                    <input type="checkbox" wire:model="permissions" value="{{ $permission->name }}">
                                    {{ $permission->display_name }}
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    @endforeach
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-success"><i class="fa fa-save" aria-hidden="true">&nbsp;</i>Save</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
</div>