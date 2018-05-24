@extends('musjab.layoutLTE.app')
@section('isi')
<section class="content-header">
         <h1>
           Usulan nomor {{$usulan->nomor}}
           <small>Tanggal usulan {{tgl_indo($usulan->tanggal)}}</small>
         </h1>
</section>
<br>

           <div class="row">
            <div class="col-md-12">
              <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li <?php if(session()->get('tab')==1){echo "class='active'";}else{echo "class=''";}?>><a aria-expanded="false" href="#tab_1" data-toggle="tab">Jabatan Kosong</a></li>
                  <li <?php if(session()->get('tab')==2){echo "class='active'";}else{echo "class=''";}?>><a aria-expanded="false" href="#tab_2" data-toggle="tab">Semua Jabatan</a></li>
                  <li <?php if(session()->get('tab')==3){echo "class='active'";}else{echo "class=''";}?>><a aria-expanded="true" href="#tab_3" data-toggle="tab">Daftar Mutasi</a></li>

                  <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                </ul>
                <div class="tab-content">
                  <div <?php if(session()->get('tab')==1){echo "class='tab-pane active'";}else{echo "class='tab-pane'";}?> id="tab_1">
                  <!-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\Pane 1 -->
                      <div class="row">
                        <div class="col-md-12">
                        <p><a href="#" class="show"><div class='btn btn-default'>Expand / Collapse All</div></a></p>
                            <div class="box box-warning">
                             <div class="box-header with-border">
                               <h3 class="box-title"><span class ="badge bg-purple">Total Jabatan Kosong</span> &nbsp; <span class ="badge bg-purple">{{count($total)}}</span></h3><br>
                               <div class="box-tools pull-right">
                                 <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                               </div><!-- /.box-tools -->
                             </div><!-- /.box-header -->
                             <div class="box-body">
                               @foreach($jum_esl as $jum_esl)
                               <span class= "{{warna_esl($jum_esl->eselon)}}">{{$jum_esl->NM_ESELON}}</span> &nbsp; <span class= "{{warna_esl($jum_esl->eselon)}}">{{$jum_esl->jum}}</span>&nbsp; &nbsp; &nbsp; &nbsp;
                               @endforeach
                             </div><!-- /.box-body -->
                           </div><!-- /.box -->
                         </div><!-- /.col -->
                      </div>

                      <?php $i =0; ?>

                      @foreach($unker_kosong as $unker_kosong)
                      <?php
                      $list = DB::table('m_temp_unors')->leftjoin('eselons','eselon','=','KD_ESELON')->where('UNIT_KERJA','=',$unker_kosong->UNIT_KERJA)->where('NIP_PJB','=',null)->where('mulai_berlaku','=','2017-01-01')->where('eselon','<>','')->orderby('KD_UNOR')->get();
                      $jumlah = DB::table('m_temp_unors')->selectRaw('eselon,NM_ESELON,count(*) as jum')->leftjoin('eselons','eselon','=','KD_ESELON')->where('UNIT_KERJA','=',$unker_kosong->UNIT_KERJA)->where('NIP_PJB','=',null)->where('mulai_berlaku','=','2017-01-01')->where('eselon','<>','')->groupby('NM_ESELON')->get();
                      ?>
                      <div class='row'>
                        <div class="col-md-12">
                           <div class="box box-success collapsed-box">
                             <div class="box-header with-border">
                               <h3 class="box-title">{{$unker_kosong->UNIT_KERJA}}</h3><br>
                               @foreach($jumlah as $jumlah)
                               <span class= "{{warna_esl($jumlah->eselon)}}">{{$jumlah->NM_ESELON}}</span> &nbsp; <span class= "{{warna_esl($jumlah->eselon)}}">{{$jumlah->jum}}</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                               @endforeach
                               <div class="box-tools pull-right">
                                 <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                               </div><!-- /.box-tools -->
                             </div><!-- /.box-header -->
                             <div class="box-body">
                               <table class="table table-striped">

                                 @foreach($list as $list)
                                 <tr>
                                  <td style="width: 400px">{{$list->NM_JAB}}</td>
                                  <td><span class= "{{warna_esl($list->eselon)}}">{{$list->NM_ESELON}}</span></td>
                                  <td><a href="#myModal" id="id" class='btn btn-info' data-toggle='modal' data-id="{{$list->id}}"><i class="fa fa-user-plus"></i> Isi Pejabat</a></td>
                                 </tr>
                                 @endforeach
                               </table>
                             </div><!-- /.box-body -->
                           </div><!-- /.box -->
                         </div><!-- /.col -->

                      <?php $i++; ?>
                       </div>
                      @endforeach
                      <!-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\Pane 1 -->
                  </div><!-- /.tab-pane -->
                  <div <?php if(session()->get('tab')==2){echo "class='tab-pane active'";}else{echo "class='tab-pane'";}?> id="tab_2">
                  <!-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\Pane 2 -->
                      @foreach($unker as $unker)
                      <?php
                       $list_ada = DB::table('m_temp_unors')->leftjoin('eselons','eselon','=','KD_ESELON')->where('UNIT_KERJA','=',$unker->UNIT_KERJA)->where('mulai_berlaku','=','2017-01-01')->where('eselon','<>','')->orderby('KD_UNOR')->get();
                       ?>
                        <div class="row">
                          <div class="col-md-12">
                             <div class="box box-success">
                               <div class="box-header with-border">
                                 <h3 class="box-title">{{$unker->UNIT_KERJA}}</h3>
                                 <div class="box-tools pull-right">
                                   <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                 </div><!-- /.box-tools -->
                               </div><!-- /.box-header -->
                               <div class="box-body">
                                 <table class="table table-hover">
                                   <tr>
                                     <th>Jabatan</th>
                                     <th>NAMA<br>NIP<br>Tempat Lahir</th>
                                     <th>ESELON <br> TMT ESELON</th>
                                     <th>TMT JABATAN</th>
                                     <th>GOLONGAN <br> TMT GOLONGAN</th>
                                     <th>DIKLAT <br> TMT DIKLAT</th>
                                     <th>Proses</th>
                                   </tr>
                                   @foreach($list_ada as $list_ada)
                                   <tr @if($list_ada->NIP_PJB==null) style="background-color:red" @elseif($list_ada->status==1) style="background-color:yellow" @endif>
                                    <td style="width: 300px">{{$list_ada->NM_JAB}}</td>
                                    <td style="width: 250px"><b>{{nama($list_ada->PNS_GLRDPN,$list_ada->PNS_PNSNAM,$list_ada->PNS_GLRBLK)}}</b><br>{{$list_ada->NIP_PJB}}<br><div style="font-size:10px">{{$list_ada->NM_KABUPAT}}, {{tgl_sambung($list_ada->PNS_TGLLHR)}}</div></td>
                                    <td><span class= "{{warna_esl($list_ada->eselon)}}">{{$list_ada->NM_ESELON}}</span><br>{{tgl_tmt($list_ada->PNS_TMTECH)}}</td>
                                    <td>{{tgl_tmt($list_ada->PNS_TMTJAB)}}</td>
                                    <td>{{$list_ada->NM_GOL}}<br>{{tgl_tmt($list_ada->PNS_TMTGOL)}}</td>
                                    <td>{{$list_ada->DIK_DIKNAM}}<br>{{tgl_sambung($list_ada->PNS_TMTLAT)}}</td>
                                   </tr>
                                   @endforeach
                                 </table>
                               </div><!-- /.box-body -->
                             </div><!-- /.box -->
                           </div><!-- /.col -->
                          </div>
                          <!-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\Pane 2 -->
                      @endforeach
                  </div><!-- /.tab-pane -->
                  <div <?php if(session()->get('tab')==3){echo "class='tab-pane active'";}else{echo "class='tab-pane'";}?> id="tab_3">
                    <!-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\Pane 3 -->
                    <div class="row">
                      <div class="col-md-12">
                         <div class="box box-primary">
                           <div class="box-header with-border">
                             <h3 class="box-title">DAFTAR MUTASI</h3>
                             <div class="box-tools pull-right">
                               <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                             </div><!-- /.box-tools -->
                           </div><!-- /.box-header -->
                           <div class="box-body">
                             <table class="table table-hover">
                               <tr>
                                 <th>No</th>
                                 <th>Jabatan Yang Akan Diisi</th>
                                 <th>NAMA<br>NIP<br>Tempat Lahir</th>
                                 <th>Pangkat <br> Golongan Ruang / TMT</th>
                                 <th>Jabatan Terakhir<br>TMT Jabatan</th>
                                 <th>ESELON <br> TMT ESELON</th>
                                 <th>Proses</th>
                               </tr>
                               @php
                               $i = 1;
                               @endphp
                               @foreach($ba as $ba)
                               <tr>
                                <td>{{$i}}</td>
                                <td style="width: 200px">{{$ba->NM_JAB_BR}}<br><span class= "{{warna_esl($ba->eselon_br)}}">{{$ba->NM_ESELON_BR}}</span></td>
                                <td style="width: 200px"><b>{{nama($ba->PNS_GLRDPN,$ba->PNS_PNSNAM,$ba->PNS_GLRBLK)}}</b><br>{{$ba->nip}}<br><div style="font-size:10px">{{$ba->NM_KABUPAT}}, {{tgl_sambung($ba->PNS_TGLLHR)}}</div></td>
                                <td style="width: 100px">{{$ba->NM_GOL}}<br>{{tgl_tmt($ba->PNS_TMTGOL)}}</td>
                                <td style="width: 200px">@if($ba->eselon_lm==61){{$ba->NM_FPOS}}{{$ba->NM_GENPOS}} pada {{$ba->NM_UNOR}}@else {{$ba->NM_JAB}}@endif<br>{{tgl_tmt($ba->PNS_TMTJAB)}}</td>
                                <td style="width: 100px">{{$ba->NM_ESELON}}<br>{{tgl_tmt($ba->PNS_TMTECH)}}</td>
                                <td><div class="btn-group">
                                  <a href="batal/{{$ba->id}}"><button type="button" class="btn btn-danger" tooltip="Batalkan Jabatan"><i class="fa fa-close"></i></button></a>
                                </div></td>
                               </tr>
                               @php
                               $i++;
                               @endphp
                               @endforeach
                             </table>
                           </div><!-- /.box-body -->
                         </div><!-- /.box -->
                       </div><!-- /.col -->
                      </div>
                    <!-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\Pane 3 -->
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- nav-tabs-custom -->
            </div><!-- /.col -->

<div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Isi Jabatan</h4>
                </div>
                <div class="modal-body">
                    <div class="fetched-data"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>
<meta name="_token" content="{!! csrf_token() !!}" />
    <script type="text/javascript">
    $(document).ready(function(){
        $('#myModal').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
 //           $.ajaxSetup({
 //               headers: {
 //                  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
 //               }
//          })
 //           e.preventDefault();
            $.ajax({
                type : 'get',
                url : 'isipns/'+ rowid,
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });

      $('a.show').click (function() {
          $("[data-widget='collapse']").click();
       });

    });
  </script>
@stop
