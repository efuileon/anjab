<!DOCTYPE html>
<html>
@include('musjab.layoutLTE.head')
  <body class="skin-blue layout-boxed sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        @include('musjab.layoutLTE.header')
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        @include('musjab.layoutLTE.sidebar')
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
          @include('musjab.layoutLTE.footer')
            </footer>

      <!-- Control Sidebar -->
      @include('musjab.layoutLTE.control')
      <!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class='control-sidebar-bg'></div>
    </div><!-- ./wrapper -->

@include('musjab.layoutLTE.script')

  </body>
</html>
