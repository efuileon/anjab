@extends('organisasi.layoutLTE.app')
@section('isi')
<link href="{{asset('orgchart2/jOrgChart-master/example/css/jquery.jOrgChart.css')}}" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="{{asset('orgchart2/jOrgChart-master/example/jquery.jOrgChart.js')}}"></script>
<script>
jQuery(document).ready(function() {
    $("#org").jOrgChart({
        chartElement : '#chart',
        dragAndDrop  : false
    });
});
</script>
<style>
.hr_str {
    display: block;
    margin-top: 1px;
    margin-bottom: 1px;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 1px;
}
</style>
<section class="content-header">
          <h1>
            Struktur Organisasi
            <small> {{$unker->unit_kerja}}</small>
          </h1>

        </section>
        <section class="content">
          <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">
                  @if(count($struktur)==0)
                  <a href="#modalStruktur2" data-unker="{{$unker->id_unker}}" data-id="0" data-toggle="modal" class="btn btn-block btn-primary btn-sm"><i class="fa fa-check"></i> Buat Atasan Struktur</a>
                  @endif

                </h3>
                </div><!-- /.box-header -->
                <!-- form start -->

                <div class="box-body anyClass">
                <ul id="org" style="display:none" >
                    <?php
                    $tt = $unker->id_unker;
                    $menu_0s = \App\z_struktur::where('child',0)->where('id_unker',$tt)->get();
                    foreach ($menu_0s as $keys) {
                      get_menu_childs($keys->id_struktur,$tt);?>
                    <?php }
                    function get_menu_childs($parents=0,$tt){
                      $menus = \App\z_struktur::leftjoin('z_jabatans','jabatan','id_jabatan')->where('child',$parents)->where('id_unker',$tt)->get();
                      $parents = \App\z_struktur::leftjoin('z_jabatans','jabatan','id_jabatan')->where('id_struktur',$parents)->where('id_unker',$tt)->first();
                      ?>
                      <li>{{$parents->nama_jabatan}}<hr class="hr_str"><a href="{{url('organisasi/struktur/buat2').'/'.$tt.'/'.$parents->id_struktur}}" class="btn btn-primary btn-xs" ><i class="fa fa-plus"></i> Pejabat</a>
                          <a href="{{url('organisasi/struktur/jabfung/tambah').'/'.$tt.'/'.$parents->id_struktur}}" class="btn btn-warning btn-xs" ><i class="fa fa-plus"></i> Pelaksana</a>
                          <hr  class="hr_str">
                          <?php
                          $jabfung = \App\z_jabfung::leftjoin('z_m_fungsionals','kd_fungsional','id_fungsional')->where('kd_struktur',$parents->id_struktur)->get();
                          foreach ($jabfung as $data_jabfung) {
                            ?>
                             <small class="label bg-teal"><a href="{{url('organisasi/struktur/jabfung').'/'.$data_jabfung->id_jabfung}}">{{$data_jabfung->nama_fungsional}}</a> <a href=# style="color:red"><i class="fa fa-close"></i></a></small> 
                            <?php
                          }
                          ?>
                        @if(sizeof($menus)>0)
                        <ul>
                          <?php
                          foreach ($menus as $keys) {
                            get_menu_childs($keys->id_struktur,$tt);
                          }
                          ?>
                        </ul>
                        @endif
                      </li>
                    <?php } ?>

                  </ul>
                  @if(count($struktur)!=0)
                  <div id="chart" class="orgChart"></div>



                @endif



                </div><!-- /.box-body -->


              </div>

</section>

<div class="modal fade modal" id="modalStruktur" role="dialog">
  <div class="modal-dialog" role="documentq">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Buat Atasan Struktur</h4>
      </div>
      <div class="modal-body">
        <div class="fetched-data"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline" data-dismiss="modal">Keluar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade modal" id="modalStruktur2" role="dialog">
  <div class="modal-dialog" role="documentq">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Struktur</h4>
      </div>
      <div class="modal-body">
        <div class="fetched-data"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline" data-dismiss="modal">Keluar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
$(document).ready(function(){
    $('#modalStruktur').on('show.bs.modal', function (e) {
      var id_unker = $(e.relatedTarget).data('id');

        $.ajax({
            type : 'get',
            url : 'buat/'+id_unker,
            success : function(data){
            $('.fetched-data').html(data);//menampilkan data ke dalam modal
            }
        });
     });

  $('a.show').click (function() {
      $("[data-widget='collapse']").click();
   });

});
$(document).ready(function(){
    $('#modalStruktur2').on('show.bs.modal', function (e) {
      var id_struktur = $(e.relatedTarget).data('id');
      var id_unker = $(e.relatedTarget).data('unker');

        $.ajax({
            type : 'get',
            url : 'buat/'+id_unker+'/'+id_struktur,
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
