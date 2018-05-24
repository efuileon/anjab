@extends('musjab.layoutLTE.app')
@section('isi')
<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Kolom Pencarian
      <small>Pilih salah satu dari pencarian dibawah</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Forms</a></li>
      <li class="active">General Elements</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">

          <div class="box-header">
            <h3 class="box-title">Mode Pencarian berdasarkan NIP atau Nama</h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="peremajaan/cari" method="post">
            <div class="box-body">
              <div class="form-group">
                <label for="nip_baru">NIP 18 digit</label>
                <input type="text" class="form-control" id="nip_baru" name ="nip_baru" placeholder="NIP Baru">
              </div>
              <div class="form-group">
                <label for="nip_lama">NIP 9 digit</label>
                <input type="text" class="form-control" id="nip_lama" name ="nip_lama" placeholder="NIP Lama">
              </div>
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name ="nama" placeholder="Nama tanpa gelar">
              </div>

            </div><!-- /.box-body -->

            <div class="box-footer">
              <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
              <button type="submit" class="btn btn-primary">Cari</button>
            </div>
          </form>
        </div><!-- /.box -->


      </div><!--/.col (left) -->
      <!-- right column -->

    </div>   <!-- /.row -->
  </section><!-- /.content -->
@stop
