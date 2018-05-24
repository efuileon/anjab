@extends('diklat.layoutLTE.app')
@section('isi')
<section class="content-header">
         <h1>
           Input Data Diklat
           <small>DIKLAT {{$jenis}} </small>
         </h1>
</section>
<br>

           <div class="row">
            <div class="col-md-12">
              <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li <?php if($jenis == "MANAJERIAL"){echo "class='active'";} else {echo "class=''";} ?>><a aria-expanded="false" href="{{url('diklat/manajerial')}}">Diklat Manajerial</a></li>
                  <li <?php if($jenis == "TEKNIS"){echo "class='active'";} else {echo "class=''";} ?>><a aria-expanded="false" href="{{url('diklat/teknis')}}" >Diklat Teknis</a></li>
                  <li <?php if($jenis == "FUNGSIONAL"){echo "class='active'";} else {echo "class=''";} ?>><a aria-expanded="false" href="{{url('diklat/fungsional')}}" >Diklat Fungsional</a></li>
                  <li <?php if($jenis == "PRAJABATAN"){echo "class='active'";} else {echo "class=''";} ?>><a aria-expanded="false" href="{{url('diklat/prajabatan')}}" >Diklat Prajabatan</a></li>
                  <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                </ul>
                <div class="tab-content">
                  <div class='tab-pane active'>
                  <!-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\Pane 1 -->
                      <div class="row">
                        <div class="col-md-12">
                        <a href="#tambahModal" class='btn btn-success' data-toggle='modal'><i class="fa fa-plus"></i> Tambah Diklat {{ucwords(strtolower($jenis))}}</a>
                        <hr>
                        <table id="example1" class="table table-bordered table-hover">


      	                                    <thead>
      	                                    	<th>No</th>
      	                                    	<th>Nama Diklat <br> Instansi Penyelenggara</th>
      	                                    	<th>Instansi Pembina</th>
                                              <th>Tanggal Pelaksanaan</th>
                                              <th>Angkatan</th>
                                              <th>Option</th>
                                              <th>KelolaPeserta</th>

      	                                    </thead>
      	                                    <tbody>
                                              <?php $i= 1;?>
      	                                    @foreach ($diklat as $diklat)
      	                                        <tr>
      	                                        	<td>{{$i}}</td>
      	                                        	<td>{{$diklat->nama_diklat}}<br>{{$diklat->instansi}}</td>
                                                  <td>{{$diklat->instansi_pembina}}</td>
      	                                        	<td>{{tgl_lengkap($diklat->awal_pelaksanaan)}} s/d {{tgl_lengkap($diklat->akhir_pelaksanaan)}}</td>
                                                  <td>Angkatan {{$diklat->angkatan}}</td>
                                                  <td>
                                                    <a href="#" class="btn-xs btn-warning" tooltip="Edit"><i class="fa fa-pencil"></i> Edit</a><br>
                                                    <a href="#" class="btn-xs btn-danger" tooltip="Hapus"><i class="fa fa-trash"></i> Delete</a>
                                                  </td>
                                                  <td>

                                                      <form action="peserta" method="post">
                                                        <input type="hidden" name="kd_prog" value="{{$diklat->kd_prog}}" />
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                        <button type="submit" class="btn btn-info"><i class="fa fa-users"></i> Kelola</button>
                                                      </form>
                                                  </td>
      	                                        </tr>
                                                  <?php $i++; ?>
      	                                    @endforeach
      	                                    </tbody>
      	                                </table>
                      </div>
                    </div>
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- nav-tabs-custom -->
            </div><!-- /.col -->

  <div class="modal fade" id="tambahModal" role="dialog">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Tambah Diklat {{ucwords(strtolower($jenis))}}</h4>
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
  //            var rowid = $(e.relatedTarget).data('id');
              //menggunakan fungsi ajax untuk pengambilan data
   //           $.ajaxSetup({
   //               headers: {
   //                  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
   //               }
  //          })
   //           e.preventDefault();
              var dik = '{{$jenis}}';
              $.ajax({
                  type : 'get',
                  url : 'addDiklat/'+dik,
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
