@extends('musjab.layoutLTE.app')
@section('isi')
 <section class="content-header">
          <h1>
            Daftar Pejabat Pemerintah di Kabupaten Situbondo
            <small>dan Struktur Organisasi</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
                        <?php
              function nama($text,$dpn,$blk)
              {
                  if($dpn!="" && $blk!=""){
                      $nama = $dpn.". ".$text.", ".$blk;
                  } else
                  { if($dpn !="")
                          {
                          $nama = $dpn.". ".$text;
                          } else
                              { if($blk!="")
                                  {
                                  $nama = $text.", ".$blk;
                                  } else
                                      {
                                      $nama = $text;
                                      }

                              }
                  }
                  return $nama;
              }
              function warna($text)
                  {
                      switch (substr($text,0,1)) {
                          case "2":
                              $warna = "red";
                              break;
                          case "3":
                              $warna = "blue";
                              break;
                          case "4":
                              $warna = "green";
                              break;
                          default:
                              $warna = "white";
                      }
                      return $warna;
                  }
              ?>

              <div class="row">
                  <div class="col-md-12">
                  <div class="nav-tabs-custom">
                      <ul class="nav nav-tabs">
                  <!-- Untuk Semua Tab.. pastikan a href=”#nama_id” sama dengan nama id di “Tap Pane” dibawah-->
                    <li class="active"><a href="#home" role="tab" data-toggle="tab">Home</a></li> <!-- Untuk Tab pertama berikan li class=”active” agar pertama kali halaman di load tab langsung active-->

                    @foreach($kategori as $kat)
                    <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{$kat->kategori}} <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                          <?php
                          $unker = \App\unor_all::where('child','=','0')->where('kategori','=',$kat->kode)->get();
                          ?>
                          @foreach ($unker as $title)
                                <li role="presentation"><a href="#{{$title->KD_UNOR}}" role="tab" data-toggle="tab">{{$title->SINGKATAN}}</a></li>
                          @endforeach

                          </ul>
                        </li>
                    @endforeach

                  </ul>

                  <!-- Tab panes, ini content dari tab di atas -->
                  <div class="tab-content">
                    <div class="tab-pane active" id="home">
                        <div class="card card-plain">
                          <div class="card-header" data-background-color="blue">
                                <h4 class="title"><b></b></h4>
                          </div>
                        </div>

                        @foreach($unker_title as $tablehead)
                        <div class="card">
                          <div class="card-header" data-background-color="green">
                                <h3 class="title"><b>{{$tablehead->NM_UNOR}}</b></h3>
                          </div>
                          <?php
                          $opd = DB::table('pejabat')->where(DB::raw('LEFT(KD_UNOR,2)'),'=',substr($tablehead->KD_UNOR,0,2))->where('eselon','<>','')->orderby('KD_UNOR')->get();
                          $i= 1;
                          ?>
                              <div class="card-content table-responsive">
                                  <table class="table">
                                      <thead class="text-primary">
                                          <th width="10">No</th>
                                          <th width="300">Unit Kerja</th>
                                          <th>Nama / NIP</th>
                                          <th>Eselon / TMT</th>
                                          <th>Gol / TMT</th>
                                      </thead>
                                      <tbody>
                                      @foreach($opd as $datapjb)
                                          @if($datapjb->NIP_PJB=="")
                                          <tr bgcolor="ff0000">
                                          @else
                                          <tr>
                                          @endif
                                              <td>{{$i}}</td>
                                              <td>{{$datapjb->NM_UNOR}}</td>
                                              <td>{{nama($datapjb->PNS_PNSNAM,$datapjb->PNS_GLRDPN,$datapjb->PNS_GLRBLK)}}<br>{{$datapjb->NIP_PJB}}</td>
                                              <td>{{$datapjb->NM_ESELON}}<br>{{tgl_indo($datapjb->PNS_TMTECH)}}</td>
                                              <td>{{$datapjb->NM_GOL}}<br>{{tgl_indo($datapjb->PNS_TMTGOL)}}</td>
                                          </tr>
                                          <?php $i++; ?>
                                      @endforeach
                                      </tbody>
                                  </table>
                              </div>

                        </div>
                        @endforeach

                    </div><!-- Untuk Tab pertama berikan div class=”active” agar pertama kali halaman di load content langsung active-->

                        @foreach($unker_title as $title)
                    <div class="tab-pane" id="{{$title->KD_UNOR}}">
                        <div class="card">
                        <h4><b>{{$title->NM_UNOR}}</b></h4>

                              <script type='text/javascript'>//<![CDATA[
                                  $(window).load(function () {
                                      var options = new primitives.orgdiagram.Config();
                                      var items = [
                                          new primitives.orgdiagram.ItemConfig({
                                                  id: 0,
                                                  parent: null,
                                                  title: "PEMERINTAH KABUPATEN SITUBONDO",
                                                  description: "BUPATI SITUBONDO",
                                                  image: "images/photos/a.png",
                                                  isVisible : false
                                              }),
                                          <?php

                                          $query = DB::table('pejabat')->where(DB::raw('LEFT(KD_UNOR,2)'),'=',substr($title->KD_UNOR,0,2))->where('struk','=','1')->get();
                                          ?>
                                          @foreach($query as $data)
                                          <?php
                                          $text = nama($data->PNS_PNSNAM,$data->PNS_GLRDPN,$data->PNS_GLRBLK)."   (".$data->NIP_PJB.")";
                                          ?>
                                          new primitives.orgdiagram.ItemConfig({
                                              id: {{$data->parent}},
                                              parent: {{$data->child}},
                                              title: "{{$data->NM_UNOR}}",
                                              description: "{{$text}}",

                                              image: "{{asset('assets/images/photos/198708042009031001.jpg')}}",

                                              <?php
                                              if(substr($data->eselon,0,1)=="3"){
                                              ?>
                                                  childrenPlacementType: primitives.common.ChildrenPlacementType.Vertical,
                                              <?php
                                              };
                                              ?>
                                              itemTitleColor: "{{warna($data->eselon)}}",


                                          }),
                                          @endforeach

                                      ];

                                      options.items = items;
                                      options.cursorItem = 0;
                                      options.pageFitMode = primitives.common.PageFitMode.None;

                                   //   options.hasSelectorCheckbox = primitives.common.Enabled.True;

                                      jQuery("#struk{{$title->KD_UNOR}}").orgDiagram(options);
                                  });//]]>

                              </script>

                          <div id="struk{{$title->KD_UNOR}}" style="width: 1024px; height: 600px; border-style: dotted; border-width: 1px;" /></div>
                          tes
                        </div>
                        </div>
                    @endforeach
                  </div>
                    </div>
                  </div>
              </div>
        </section><!-- /.content -->
        @stop
