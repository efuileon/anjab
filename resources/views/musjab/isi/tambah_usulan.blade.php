@extends('musjab.layoutLTE.app')
@section('isi')
 <section class="content-header">
          <h1>
            Input Usulan Mutasi Jabatan
            <small>Isi Nomor Usulan dan tanggal usulan</small>
          </h1>
         <hr>
         
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="box box-primary">
               
                <!-- form start -->
                <form role="form" action="tambah_usulan/add" method="POST">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nomor usulan</label>
                      <input class="form-control" id="exampleInputEmail1" placeholder="Nomor Usulan" type="text" name="nomor" >
                    </div>
                    <div class="form-group">
                    <label>Tanggal Usulan</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" type="text" name="tanggal">
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                   
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <button type="submit" class="btn btn-primary">Tambah Usulan</button>
                  </div>
                </form>
              </div>

</section>
@stop
