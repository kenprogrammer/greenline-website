@include('partials.header')
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
    @include('partials.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    @livewire('partials.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        {{ $slot }}
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  @include('partials.footer')
