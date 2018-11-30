<!DOCTYPE html>
<html>
@include('organisasi.layoutLTE.head')
  <body class="skin-purple layout-boxed sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        @include('organisasi.layoutLTE.header')
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        @include('organisasi.layoutLTE.sidebar')
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
          @yield('isi')
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
          @include('organisasi.layoutLTE.footer')
            </footer>

      <!-- Control Sidebar -->
      @include('organisasi.layoutLTE.control')
      <!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class='control-sidebar-bg'></div>
    </div><!-- ./wrapper -->

@include('organisasi.layoutLTE.script')

  </body>
</html>
