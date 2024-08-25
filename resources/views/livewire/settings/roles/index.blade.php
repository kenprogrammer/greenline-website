<div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
                 <a href="/roles/create" wire:navigate class="btn btn-success pull-left" class="btn btn-success"><i
                class="fa fa-plus-circle" aria-hidden="true">&nbsp;</i>New Role</a>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/" wire:navigate><i class="nav-icon fas fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
                <li class="breadcrumb-item active">Roles</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Roles</h3>
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
                    <th>Role Name</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if(!$roles->isEmpty())
                    @foreach($roles as $role)
                         <tr>
                            <td>{{$role->name}}</td>
                            <td>
                              <a href="/roles/edit/{{$role->id}}" class="btn btn-success" role="button" wire:navigate><i class="fa fa-edit" aria-hidden="true">&nbsp;</i>Edit</a>
                            </td>
                            <td>
                              <a href="#" class="btn btn-danger" role="button" wire:click="delete({{$role->id}})" wire:confirm="Are you sure you want to delete this role?"><i class="fa fa-trash" aria-hidden="true">&nbsp;</i>Delete</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
          </table>
          {{ $roles->links() }}
        </div>
        <!-- /.card-body -->
      </div>
</div>