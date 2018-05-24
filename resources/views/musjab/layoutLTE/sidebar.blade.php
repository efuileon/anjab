       <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>Alexander Pierce</p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>-->
          <!-- search form
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form> -->
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

            @if ($sidebar =="home")
            <li class="active">
            @else
            <li>
            @endif
                <a href="{{url('musjab')}}">
                    <i class="fa fa-home"></i> <span>Home</span>
                </a>
            </li>

            @if ($sidebar =="peta_jabatan")
            <li class="active">
            @else
            <li>
            @endif
                <a href="{{url('musjab/peta_jabatan')}}">
                   <i class="fa fa-sitemap"></i> <span>Peta Jabatan</span>
                </a>
            </li>

            @if ($sidebar =="jabatan_kosong")
            <li class="active">
            @else
            <li>
            @endif
                <a href="{{url('musjab/jabatan_kosong')}}">
                   <i class="fa fa-newspaper-o"></i> <span>Jabatan Kosong</span>
                  <?php
                    $tot = DB::table('unor_alls')->where('NIP_PJB','=',null)->where('mulai_berlaku','=','2017-01-01')->where('eselon','<>','')->get();
                  ?>
                   <small class="label pull-right bg-red">{{count($tot)}}</small>

                </a>
            </li>

            @if ($sidebar =="rancangan")
            <li class="active">
            @else
            <li>
            @endif
                <a href="{{url('musjab/rancangan')}}">
                   <i class="fa fa-pencil-square-o"></i> <span>Usulan Mutasi Jabatan</span>
                </a>
            </li>
            @if ($sidebar =="peremajaan")
            <li class="active">
            @else
            <li>
            @endif
                <a href="{{url('musjab/peremajaan')}}">
                   <i class="fa fa-users"></i> <span>Peremajaan Data</span>

                </a>
            </li>
            </ul>
        </section>
        <!-- /.sidebar -->
