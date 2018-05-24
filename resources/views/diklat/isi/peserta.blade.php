@extends('diklat.layoutLTE.app')
@section('isi')
<section class="content-header">
         <h1>
           DAFTAR PESERTA
           <small>DIKLAT {{$diklat[0]->jenis_diklat}}</small>
         </h1>
</section>
<br>
           <div class="row">
            <div class="col-md-6">

              <div class="box box-success">
                <div class="box-header">
                  <h3 class="box-title">Data Diklat </h3>
                </div><!-- /.box-header -->
                <table class="table table-condensed">
                    <tr>
                      <td><label>Nama Diklat</label></td>
                      <td>{{$diklat[0]->nama_diklat}}</td>
                    </tr>
                    <tr>
                      <td><label>Instansi Penyelenggara</label></td>
                      <td>{{$diklat[0]->instansi}}</td>
                    </tr>
                    <tr>
                      <td><label>Instansi Pembina</label></td>
                      <td>{{$diklat[0]->instansi_pembina}}</td>
                    </tr>
                    <tr>
                      <td><label>Angkatan</label></td>
                      <td>Angkatan {{$diklat[0]->angkatan}}</td>
                    </tr>
                    <tr>
                      <td><label>Pelaksanaan</label></td>
                      <td>{{tgl_lengkap($diklat[0]->awal_pelaksanaan)}} s/d {{tgl_lengkap($diklat[0]->akhir_pelaksanaan)}}</td>
                    </tr>

                </table>
                <!-- form start -->
                <form role="form" action="addPeserta" method="post">
                  <div class="box-body">

                  </div><!-- /.box-body -->

              </div>

            </div><!-- /.col -->
          </div>
          <a href="#tambahpeserta" class="btn btn-success" data-toggle='modal'> <i class="fa fa-plus"></i> Tambah Peserta </a>

          <div class="row">
            <div class="col-md-12">
              <div class="box box-info">
                <div class="box-header">
            <table id="example1" class="table table-bordered table-hover">

                                <thead>
                                  <th>No</th>
                                  <th>NIP</th>
                                  <th>NAMA</th>
                                  <th>Nomor Registrasi</th>
                                  <th>Option</th>

                                </thead>
                                <tbody>
                                  <?php $i= 1;?>
                                @foreach ($peserta as $peserta)
                                    <tr>
                                      <td>{{$i}}</td>
                                      <td>{{$peserta->nip}}</td>
                                      <td>{{$peserta->nip}}</td>
                                      <td>{{$peserta->no_register}}</td>
                                      <td>
                                        <a href="#" class="btn btn-warning" tooltip="Edit"><i class="fa fa-pencil"></i> Edit</a>
                                        <a href="#" class="btn btn-danger" tooltip="Hapus"><i class="fa fa-trash"></i> Delete</a>
                                      </td>
                                    </tr>
                                      <?php $i++; ?>
                                @endforeach
                                </tbody>
                            </table>
          </div>
        </div>
      </div>
    </div>


      <div class="modal fade" id="tambahpeserta" role="dialog">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Tambah Peserta</h4>
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
              $('#tambahpeserta').on('show.bs.modal', function (e) {
      //            var rowid = $(e.relatedTarget).data('id');
                  //menggunakan fungsi ajax untuk pengambilan data
       //           $.ajaxSetup({
       //               headers: {
       //                  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
       //               }
      //          })
       //           e.preventDefault();
                  //var dik = '{{$jenis}}';
                  $.ajax({
                      type : 'get',
                      url : 'formPeserta',
    //                  data     : {nama='MANAJERIAL'},
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
