<!DOCTYPE html>
<html>
@include('pangkat.layoutLTE.head')
  <body class="skin-purple layout-boxed sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        @include('pangkat.layoutLTE.header')
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        @include('pangkat.layoutLTE.sidebar')
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
          @include('pangkat.layoutLTE.footer')
            </footer>

      <!-- Control Sidebar -->
      @include('pangkat.layoutLTE.control')
      <!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class='control-sidebar-bg'></div>
    </div><!-- ./wrapper -->

@include('pangkat.layoutLTE.script')

  </body>
</html>
