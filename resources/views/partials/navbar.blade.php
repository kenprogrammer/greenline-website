 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

     <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="{{ asset('img/no_image.jpg') }}" class="user-image img-circle elevation-2" alt="User Image">
                <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <!-- User image -->
            <li class="user-header bg-primary">
                <img src="{{ asset('img/no_image.jpg') }}" class="img-circle elevation-2" alt="User Image">

                <p>
                    {{ Auth::user()->name }}
                </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
                <a href="/change-my-password" class="btn btn-default btn-flat" wire:navigate>Change Password</a>
                <a href="javascript:{document.getElementById('logout').submit()}" class="btn btn-default btn-flat float-right">Sign out</a>
            </li>
            </ul>
        </li>
    </ul>
  </nav>
   <form action="/logout" method="POST" id="logout">
        @csrf
        <input type="hidden">
   </form>