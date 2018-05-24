@extends('pangkat.layoutLTE.app')
@section('isi')

<script>
function startCalc(){
interval = setInterval("calc()",1);}
function calc(){
kredit_utama = document.frmak.kredit_utama.value;
kredit_penunjang = document.frmak.kredit_penunjang.value;
document.frmak.total_kredit.value = (kredit_utama * 1) + (kredit_penunjang * 1);

}
function stopCalc(){
clearInterval(interval);}
</script>
<section class="content-header">
         <h1>
           DAFTAR UPLOAD PAK
           <small>{{$pns->nip_baru}} / {{$pns->nama}}</small>

         </h1>
</section>
<br>
@if(count($errors))
  <div class="alert alert-danger">
    <strong>Whoops!</strong> Anda Salah memasukkan input.
    <br/>
    <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  @if(Session::has('alert-success'))
                  <div class="alert alert-success">
                      <strong>{{ \Illuminate\Support\Facades\Session::get('alert-success') }}</strong>
                  </div>
  @endif
  @if(Session::has('alert-failed'))
                  <div class="alert alert-danger">
                      <strong>{{ \Illuminate\Support\Facades\Session::get('alert-failed') }}</strong>
                  </div>
  @endif
           <div class="row">

              <div class="col-md-12">
                          <div class="box box-primary">
                            <div class="box-body">
                              <a href="#tambahModal" class='btn btn-success' data-toggle='modal'><i class="fa fa-plus"></i> Tambah Pak</a>
                              <a href="{{url('pangkat/uploadreg').'/'.$pns->id}}" class='btn btn-primary'><i class="fa fa-backward"></i> Kembali</a>
                              <hr>

                              <table class="table table-bordered">
                    <tbody><tr>
                      <th style="width: 10px">NO</th>
                      <th style="width: 100px">Pak</th>
                      <th style="width: 100px">AK Utama</th>
                      <th style="width: 100px">AK Penunjang</th>
                      <th style="width: 100px">Total AK</th>
                      <th style="width: 100px">File</th>
                      <th style="width: 40px" colspan="2">Proses</th>
                    </tr>
                    @php $i=1;$total=0; @endphp
                    @foreach($list_pak as $list_pak)
                    <tr>
                      <td>{{$i}}</td>
                      <td>Pak {{$list_pak->tahun}}</td>
                      <td>{{$list_pak->kredit_utama}}</td>
                      <td>{{$list_pak->kredit_penunjang}}</td>
                      <td>{{$list_pak->total_kredit}}</td>
                      <td><a href="{{asset($list_pak->lokasi)}}">{{$list_pak->filename}}</a></td>
                      <td><a href="#editModal" class='btn btn-success' data-id="{{$list_pak->id}}" data-toggle='modal'><i class="fa fa-edit"></i></a></td>
                      <td><a href="{{url('pangkat/list_pak/delPak').'/'.$list_pak->id}}" class='btn btn-danger'><i class="fa fa-trash"></i></a></td>
                    </tr>
                    @php $i++; $total=$total+$list_pak->total_kredit; @endphp
                    @endforeach
                    <tr>
                      <td colspan ="4">Total</td>
                      <td>{{$total}}</td>
                    </tr>

                  </tbody></table>
                            </div><!-- /.box-body -->

                          </div><!-- /.box -->

                        </div>


          </div>

          <div class="modal fade" id="tambahModal" role="dialog">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Tambah Pak</h4>
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
              <div class="modal fade" id="editModal" role="dialog">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Edit Pak</h4>
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
                  $('#tambahModal').on('show.bs.modal', function (e) {
                      $.ajax({
                          type : 'get',
                          url : '{{url('pangkat/list_pak/addPak')}}/{{$pns->id}}',
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
                  $('#editModal').on('show.bs.modal', function (e) {
                    var rowid = $(e.relatedTarget).data('id');
                      $.ajax({
                          type : 'get',
                          url : '{{url('pangkat/list_pak/editPak')}}/'+ rowid,
                          success : function(data){
                          $('.fetched-data').html(data);//menampilkan data ke dalam modal
                          }
                      });
                   });

                $('a.show').click (function() {
                    $("[data-widget='collapse']").click();
                 });

              });

              $(document).on('click', '.btn-danger', function (e) {
                 e.preventDefault();
                var link = $(this);
                 swal({
                         title: "Hapus Konfirmasi",
                         text: "Apakah anda yakin menghapus data ini?",
                         type: "warning",
                         showCancelButton: true,
                         confirmButtonColor: "#DD6B55",
                         confirmButtonText: "Ya, Hapus!",
                         closeOnConfirm: true
                     },
                     function(isConfirm) {
                        if(isConfirm){
                             window.location = link.attr('href');
                          }
                          else{
                             swal("cancelled","Category deletion Cancelled", "error");
                          }

                 });
              });
            </script>


@stop
