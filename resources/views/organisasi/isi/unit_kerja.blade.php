@extends('organisasi.layoutLTE.app')
@section('isi')
        <section class="content">
          <div class="box box-success">
                <div class="box-header">
                  <h3 class="box-title">Daftar Unit Kerja Kabupaten Situbondo</h3>
                  <br>
                </div><!-- /.box-header -->
                <div class="box-header">
                  <h3 class="box-title"><a href="#modalUnker" data-toggle="modal" class="btn btn-block btn-success btn-sm"><i class="fa fa-plus"></i> Tambah Unit Kerja</a></h3>
                  <br>
                </div><!-- /.box-header -->

                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Unit Kerja</th>
                        <th>Ubah</th>
                        <th>Hapus</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $i = 1; @endphp
                      @foreach($unit_kerja as $unit_kerja)
                      <tr>
                        <td>{{$i}}</td>
                        <td>{{$unit_kerja->unit_kerja}}</td>
                        <td><a href="#modalEditUnker" data-toggle="modal" data-id="{{$unit_kerja->id_unker}}" class="btn btn-block btn-warning btn-sm"><i class="fa fa-edit"></i></a></td>
                        <td><a class="btn btn-block btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>
                      </tr>
                      @php $i++; @endphp
                      @endforeach
                    </tbody>

                  </table>
                </div><!-- /.box-body -->
              </div>


    <div class="modal fade modal-info" id="modalUnker" role="dialog">
      <div class="modal-dialog" role="documentq">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Tambah Unit Kerja</h4>
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

    <div class="modal fade modal-info" id="modalEditUnker" role="dialog">
      <div class="modal-dialog" role="documentq">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Edit Unit Kerja</h4>
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

</section>

<script type="text/javascript">
$(document).ready(function(){
    $('#modalUnker').on('show.bs.modal', function (e) {

        $.ajax({
            type : 'get',
            url : 'unit_kerja/tambah',
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
$('#modalEditUnker').on('show.bs.modal', function (e) {
  var rowid = $(e.relatedTarget).data('id');

    $.ajax({
        type : 'get',
        url : 'unit_kerja/edit/'+rowid,
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
