<div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
               
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/" wire:navigate><i class="nav-icon fas fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
                <li class="breadcrumb-item active">Social Media Links</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Social Media Links</h3>
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
                    <th>Platform</th>
                    <th>Created On</th>
                    <th>Updated On</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if(!$links->isEmpty())
                    @foreach($links as $link)
                        <tr>
                            <td>{{ucfirst($link->platform)}}</td>
                            <td>{{\Carbon\Carbon::parse($link->created_at)->format('d-m-Y h:i:A')}}</td>
                            <td>{{\Carbon\Carbon::parse($link->updated_at)->format('d-m-Y h:i:A')}}</td>
                            <td>
                                <a href="{{ $link->url }}" target="_blank" rel="noopener noreferrer" class="btn btn-info" role="button"><i class="fa fa-link" aria-hidden="true">&nbsp;</i>Test Link</a>
                            </td>
                            <td>
                                <a href="/admin/social-media/update-url/{{$link->id}}" class="btn btn-success" role="button" wire:navigate><i class="fa fa-edit" aria-hidden="true">&nbsp;</i>Edit</a>
                            </td>
                            @if($link->is_enabled)
                                <td>
                                  <a href="#" class="btn btn-danger" role="button" wire:click="disable({{$link->id}})" wire:confirm="Are you sure you want to disable this link?"><i class="fas fa-arrow-alt-circle-left" aria-hidden="true">&nbsp;</i>Disable</a>
                                </td>
                            @else
                                <td>
                                  <a href="#" class="btn btn-primary" role="button" wire:click="enable({{$link->id}})" wire:confirm="Are you sure you want to enable this link?"><i class="fas fa-arrow-alt-circle-right" aria-hidden="true">&nbsp;</i>Enable</a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                @endif
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
</div>