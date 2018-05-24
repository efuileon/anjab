@extends('diklat.layoutLTE.app')
@section('isi')
<section class="content-header">
         <h1>
           INPUT JENIS DIKLAT
           <small>tambahkan jenis diklat sebagai referensi input diklat</small>
         </h1>
</section>
<br>

           <div class="row">
            <div class="col-md-6">

              <div class="box box-success">
                <div class="box-header">
                  <h3 class="box-title">Tambah data</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="addJenis" method="post">
                  <div class="box-body">
                    <div class="form-group">
                        <label>Jenis Diklat</label>
                        <select class="form-control" name="jenis_diklat">
                          <option value="TEKNIS">TEKNIS</option>
                          <option value="FUNGSIONAL">FUNGSIONAL</option>
                          <option value="MANAJERIAL">MANAJERIAL</option>
                          <option value="PRAJABATAN">PRAJABATAN</option>
                        </select>
                      </div>
                    <div class="form-group">
                      <label>Nama Diklat</label>
                      <input class="form-control" placeholder="isi nama diklat" name="nama_diklat">
                    </div>

                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <button type="submit" class="btn btn-primary">Tambah Jenis</button>
                  </div>
                </form>
              </div>

            </div><!-- /.col -->
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="box box-info">
                <div class="box-header">
            <table id="example1" class="table table-bordered table-hover">

                                <thead>
                                  <th>No</th>
                                  <th>Jenis Diklat</th>
                                  <th>Nama Diklat</th>
                                  <th>Option</th>
                                </thead>
                                <tbody>
                                  <?php $i= 1;?>
                                @foreach ($jenis as $jenis)
                                    <tr>
                                      <td>{{$i}}</td>
                                      <td>{{$jenis->jenis_diklat}}</td>
                                      <td>{{$jenis->nama_diklat}}</td>
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
@stop
