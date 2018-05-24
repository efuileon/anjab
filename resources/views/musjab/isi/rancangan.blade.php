@extends('musjab.layoutLTE.app')
@section('isi')
 <section class="content-header">
          <h1>
            Draft dan Penetapan Mutasi Jabatan
            <small>List Data</small>
          </h1>
        <hr>
          <a href="tambah_usulan"><button id="btn_add" name="btn_add" class="btn btn-success">Tambah Usulan</button></a>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-success">
                <div class="box-header">
                  <h3 class="box-title">Daftar Usulan</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">


	                                    <thead>
	                                    	<th>No</th>
	                                    	<th>Nomor Usulan</th>
	                                    	<th>Tanggal Usulan</th>
                                          <th>Option</th>
                                          <th>Proses Mutasi</th>

	                                    </thead>
	                                    <tbody id="usul-list" name="usul-list">
                                        <?php $i= 1;?>
	                                    @foreach ($usulan as $usul)
	                                        <tr>
	                                        	<td>{{$i}}</td>
	                                        	<td>{{$usul->nomor}}</td>
	                                        	<td>{{tgl_indo($usul->tanggal)}}</td>
                    												<td>
                    													<a href='#' onclick="return confirm ('Naikkan surat hari ini?')"><button class="btn btn-warning btn-detail open_modal" value="{{$usul->id}}">Edit</button></a>
                                              <?php
                                              $usulan = DB::table('m_temp_unors')->where('id_usulan','=',$usul->id)->get();
                                              $adaisi=count($usulan);
                                              ?>
                                              <a href="tambah_usulan/destroy/{{$usul->id}}" @if($adaisi!=0) disabled="disabled" @endif class="btn btn-danger">Delete</a>
                    												</td>
                                            <td><!--<a href="tambah_usulan/fill/{{$usul->id}}"><button class="btn btn-success">Kelola Jabatan</button></a>-->
                                                <form action="tambah_usulan/fill" method="post">
                                                  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                  <input type="hidden" name="id" value="{{$usul->id}}" />
                                                  <button type="submit" class="btn btn-success">Kelola Jabatan</button>
                                                </form>
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


<script type="text/javascript">
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
