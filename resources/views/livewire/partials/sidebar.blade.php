<div>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link" wire:navigate>
      <img src="{{ asset('img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('img/no_image.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
          <li class="nav-item">
            <a href="/admin/home" class="nav-link" wire:navigate>
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Content
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/banners" class="nav-link" wire:navigate>
                  <i class="fas fa-images nav-icon"></i>
                  <p>Banners</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/services" class="nav-link" wire:navigate>
                  <i class="fas fa-tint nav-icon"></i>
                  <p>Services</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/about-us" class="nav-link" wire:navigate>
                  <i class="fas fa-building nav-icon"></i>
                  <p>About Us</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/posts" class="nav-link">
                  <i class="fas fa-bullhorn nav-icon"></i>
                  <p>News & Events</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-address-book"></i>
                  <p>
                    Contacts
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/admin/contact-info" class="nav-link" wire:navigate>
                      <i class="fas fa-phone-alt"></i>&nbsp;
                      <p>Update Contact Info.</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/admin/social-media" class="nav-link" wire:navigate>
                      <i class="fas fa-link"></i>&nbsp;
                      <p>Update Social Media Links</p>
                    </a>
                  </li>
                </ul>
              </li>
              <!--<li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Submenu 3</p>
                </a>
              </li>-->
            </ul>
          </li>

           <!--<li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Menu
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Submenu 1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Submenu 2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Submenu 3</p>
                </a>
              </li>
            </ul>
          </li>-->

          <!--Settings-->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Settings
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/roles" class="nav-link" wire:navigate>
                  <i class="fa fa-lock nav-icon"></i>
                  <p>Manage Roles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/users" class="nav-link" wire:navigate>
                  <i class="fa fa-users nav-icon"></i>
                  <p>Manage Users</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
</div>
