       <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
           <!-- Sidebar user panel -->
           <div class="user-panel">
                       <div align="center">
                         <img src="{{asset('storage/files/situbondo.gif')}}" class="img-circle wow swing" data-wow-delay="0.3s" alt="User Image" />
                       </div>
                       <div align="center">
                         <p style="color:white;">Badan Kepegawaian dan <br> Pengembangan Sumber Daya<br> Manusia Kab. Situbondo</p>
                       </div>
                     </div>
          <!-- search form -->

          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
          @if (Auth::user()->level == 2)
                    @if ($sidebar =="home")
                    <li class="active">
                    @else
                    <li>
                    @endif
                        <a href="{{url('pangkat')}}">
                            <i class="fa fa-home"></i> <span>Home</span>
                        </a>
                    </li>


                    @if ($sidebar =="usul_pangkat")
                    <li class="treeview active">
                    @else
                    <li class="treeview" >
                    @endif
                      <a href="#">
                        <i class="fa fa-line-chart"></i>
                        <span>Usul Pangkat</span>
                        <i class="fa fa-angle-left pull-right"></i>
                      </a>
                      <ul class="treeview-menu">
                        @if ($msidebar =="reguler")<li class="active">@else<li>@endif <a href="{{url('pangkat/reguler')}}"><i class="fa fa-circle-o"></i>Reguler</a></li>
                        @if ($msidebar =="jft")<li class="active">@else<li>@endif<a href="{{url('pangkat/jft')}}"><i class="fa fa-circle-o"></i>Jab. Fung. Tertentu</a></li>
                        @if ($msidebar =="struk")<li class="active">@else<li>@endif<a href="{{url('pangkat/struk')}}"><i class="fa fa-circle-o"></i>Jab. Struktural</a></li>
                        @if ($msidebar =="pi_jfu")<li class="active">@else<li>@endif<a href="{{url('pangkat/pi_jfu')}}"><i class="fa fa-circle-o"></i>Penyesuaian Ijazah JFU</a></li>
                        @if ($msidebar =="pi_jft")<li class="active">@else<li>@endif<a href="{{url('pangkat/pi_jft')}}"><i class="fa fa-circle-o"></i>Penyesuaian Ijazah JFT</a></li>
                      </ul>
                    </li>

                    @if ($sidebar =="daftar_usulan")
                    <li class="active" >
                    @else
                    <li>
                    @endif

                    @php $cek_tingkat = \App\opd::find(Auth::user()->OPD); @endphp
                    @if($cek_tingkat->tingkat==0)
                    @php $jum_usul = \App\z_pangkat::leftjoin('z_pangkat_jeniskps','jenis_kp','=','id_jenis_kp')->where('opd','=',Auth::user()->OPD)->where('per_bln','=',session()->get('per'))->where('per_thn','=',session()->get('thn'))->whereRaw('((verifikasi = 2) or (verifikasi = 1))')->count(); @endphp
                    @else
                    @php $jum_usul = \App\z_pangkat::where('opd','=',Auth::user()->OPD)->where('per_bln','=',session()->get('per'))->where('per_thn','=',session()->get('thn'))->where('verifikasi', '=', '2')->count(); @endphp
                    @endif
                        <a href="{{url('pangkat/daftar_usulan')}}">
                            <i class="fa fa-files-o"></i> <span>Datar Usulan</span>
                            <span class="label label-primary pull-right">{{$jum_usul}}</span>
                        </a>
                    </li>


                    @if ($sidebar =="daftar_revisi")
                    <li class="active">
                    @else
                    <li>
                    @endif
                        <a href="{{url('pangkat/daftar_revisi')}}">
                            <i class="fa fa-edit"></i> <span>Datar Revisi</span>
                            <span class="label label-danger pull-right">0</span>
                        </a>
                    </li>
                    </li>
            @else
                @if ($sidebar =="home")
                <li class="active">
                @else
                <li>
                @endif
                    <a href="{{url('pangkat/admin')}}">
                        <i class="fa fa-home"></i> <span>Home</span>
                    </a>
                </li>

                @if ($sidebar =="user")
                <li class="active">
                @else
                <li>
                @endif
                    <a href="{{url('pangkat/admin/manajemen_user')}}">
                        <i class="fa fa-users"></i> <span>Manajemen User</span>
                    </a>
                </li>

                @if ($sidebar =="verifikasi")
                <li class="active">
                @else
                <li>
                @endif
                    <a href="{{url('pangkat/admin/verifikasi')}}">
                        <i class="fa fa-search-plus"></i> <span>Verifikasi</span>
                    </a>
                </li>

            @endif
            </ul>

            <form action="{{url('pangkat/periode')}}" method="post" class="sidebar-form">
              <div class="input-group">

                <?php
                $per = session()->get('per');
                $thn = session()->get('thn');
                if($per=="" || $thn==""){
                $bln = date("m");
                $thn = date("Y");
                if($bln < 4)
                {
                  $per = 4;
                } elseif($bln <10)
                {
                  $per = 10 ;
                } else {
                $per = 4;
                $thn = $thn+1;
                }
                session()->put('per',$per);
                session()->put('thn',$thn);
                }
                 ?>
                 <div style="background-color:red;">
                  <marquee> {{"Periode aktif : ".bulan($per)." ".$thn}} </marquee>
                 </div>
                <form action="#" method="post">
                  <select class="form-control" name="per_bln">
                    <option value={{$per}}>{{bulan($per)}}</option>
                    <option value="4">April</option>
                    <option value="10">Oktober</option>
                  </select>
                  <select class="form-control" name="per_thn">
                    <option value={{$thn}}>{{$thn}}</option>
                    @for($i=2018;$i<=$thn;$i++)
                    <option value={{$i}}>{{$i}}</option>
                    @endfor
                  </select>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                  <button type="submit" class="btn btn-primary">Ubah</button>
                </form>
              </div>
            </form>

        </section>
        <!-- /.sidebar -->
