<a href="#" class="logo">
  <!-- mini logo for sidebar mini 50x50 pixels -->
  <span class="logo-mini"><b>A</b>LT</span>
  <!-- logo for regular state and mobile devices -->
@if(Auth::user()->level==0)
  <span class="logo-lg"><b>ADMIN</b> KP</span>
  @else
  <span class="logo-lg"><b>Usulan</b> KP</span>
@endif
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">
  <!-- Sidebar toggle button-->
  <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </a>
  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <!-- Messages: style can be found in dropdown.less-->


      <!-- Tasks: style can be found in dropdown.less -->

      <!-- User Account: style can be found in dropdown.less -->
      <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          @if(empty(Auth::user()->img))
          <img src="{{asset('storage/files/foto/def.jpg')}}" class="user-image" alt="User Image"/>
          @else
          <img src="{{asset(Auth::user()->lokasi)}}" class="user-image" alt="User Image"/>
          @endif
          <span class="hidden-xs">{{ Auth::user()->name }}</span>
        </a>
        <ul class="dropdown-menu">
          <!-- User image -->
          <li class="user-header">
            @if(empty(Auth::user()->img))
            <img src="{{asset('storage/files/foto/def.jpg')}}" class="img-circle" alt="User Image" />
            @else
            <img src="{{asset(Auth::user()->lokasi)}}" class="img-circle" alt="User Image" />
            @endif
            <p>
              {{ Auth::user()->name }}
              @php
              $user = \App\opd::where('id_opd','=',Auth::user()->OPD)->get();
              @endphp
              <small>{{ $user[0]->nm_opd }}</small>
            </p>
          </li>
          <!-- Menu Body -->
          <!-- Menu Footer-->
          <li class="user-footer">
            <div class="pull-left">
              <a href="{{url('pangkat/profil')}}" class="btn btn-default btn-flat">Profil</a>
            </div>
            <div class="pull-right">
              <a href="{{ route('logout') }}" class="btn btn-default btn-flat"
                  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                  Logout
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
            </div>
          </li>
        </ul>
      </li>
      <!-- Control Sidebar Toggle Button -->
      <li>
        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
      </li>
    </ul>
  </div>
</nav>
