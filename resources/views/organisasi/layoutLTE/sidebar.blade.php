       <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
           <!-- Sidebar user panel -->
           <div class="user-panel">
                       <div align="center">
                         <img src="{{asset('storage/files/situbondo.gif')}}" class="img-circle wow swing" data-wow-delay="0.3s" alt="User Image" />
                       </div>
                       <div align="center">
                         <p style="color:white;">Bagian Organisasi <br> Sekretariat Daerah<br> Kab. Situbondo</p>
                       </div>
                     </div>
          <!-- search form -->

          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <?php
            $menu_0 = \App\z_menu::where('id_parent',0)->get();
            foreach ($menu_0 as $key) {
              get_menu_child($key->id_menu);
            }
            function get_menu_child($parent=0){
              $menu = \App\z_menu::where('id_parent',$parent)->get();
              $parent = \App\z_menu::where('id_menu',$parent)->first();
              ?>
              @if(sizeof($menu)>0 || $parent->list_unker==1)
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-angle-left pull-right"></i>
              @else
              <li>
                <a href="{{url($parent->menu_link)}}">
              @endif
                  <i class="{{$parent->icon}}"></i> <span>{{$parent->menu}}</span>

              </a>

                @if(sizeof($menu)>0)
                <ul class="treeview-menu">
                  <?php
                  foreach ($menu as $key) {
                    get_menu_child($key->id_menu);
                  }
                  ?>
                </ul>
                @endif
                @if($parent->list_unker==1)
                <ul class="treeview-menu">
                  <?php
                  $unker = \App\z_unit_kerja::all();
                  foreach ($unker as $unker) { ?>
                    <li><a href="{{url($parent->menu_link).'/'.$unker->id_unker}}"><i class="fa fa-circle-o"></i> {{$unker->unit_kerja}}</a></li>
                <?php }
                ?>
                </ul>
                @endif
              </li>
            <?php } ?>


            </ul>




        </section>
