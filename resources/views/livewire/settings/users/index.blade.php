<div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
                <a href="/users/create" wire:navigate class="btn btn-success pull-left" class="btn btn-success"><i
                class="fa fa-plus-circle" aria-hidden="true">&nbsp;</i>New User</a>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/" wire:navigate><i class="nav-icon fas fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
                <li class="breadcrumb-item active">Users</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Users</h3>
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                     <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->username}}</td>
                        @if($user->is_active==1)
                            <td><span class="badge badge-success">Active</span></td>
                        @else
                            <td><span class="badge badge-danger">Inactive</span></td>
                        @endif
                        <td>
                          <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button"
                                  data-toggle="dropdown">Action
                                  <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/users/edit/{{$user->id}}" wire:navigate>Edit</a></li>
                                    <li><a class="dropdown-item" href="/users/change-password/{{$user->id}}" wire:navigate>Change Password</a></li>
                                    @if($user->is_active==1)
                                    <li><a class="dropdown-item" href="#" wire:click="deactivateAccount({{$user->id}})" wire:confirm="Are you sure you want to deactivate this account?">Deactivate</a></li>
                                    @else
                                    <li><a class="dropdown-item" href="#" wire:click="activateAccount({{$user->id}})" wire:confirm="Are you sure you want to deactivate this account?">Activate</a></li>
                                    @endif
                                </ul>
                          </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
          {{ $users->links() }}
        </div>
        <!-- /.card-body -->
      </div>
</div>