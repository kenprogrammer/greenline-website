<div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Update Social Media Url</h3>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/" wire:navigate><i class="nav-icon fas fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/social-media" wire:navigate><i class="fa fa-list-ul"></i>&nbsp;View Social Media Urls</a></li>
                <li class="breadcrumb-item active">Update Social Media Url</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Update Social Media Url</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if (session()->has('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form wire:submit.prevent="updateUrl">
                <div class="modal-header">
                    <h5 class="modal-title">Edit {{ ucfirst($editPlatform ?? '') }} URL</h5>
                </div>
                <div class="row clearfix">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="editUrl">URL</label>
                            <input type="url" 
                                   id="editUrl" 
                                   class="form-control @error('editUrl') is-invalid @enderror" 
                                   wire:model="editUrl" 
                                   placeholder="https://example.com">
                            @error('editUrl')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">
                        <span wire:loading.remove wire:target="updateUrl">Save</span>
                        <span wire:loading wire:target="updateUrl">Saving...</span>
                    </button>
            </form>
        </div>
    <!-- /.card-body -->
    </div>
</div>
