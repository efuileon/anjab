@extends('organisasi.layoutLTE.app')
@section('isi')

<section class="content">
  <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">{{$unker->unit_kerja}}<br>Dalam Jabatan {{$atasan->nama_jabatan}}</h3>
        </div><!-- /.box-header -->
        <!-- form start -->

        <div class="box-body">
          <form action="{{url('organisasi/struktur/jabfung/tambah')}}" method="post">

                                <div class="form-group">
                                <label>Jabatan Fungsional</label>
                                  <select data-placeholder="Pilih Jabatan..." class="form-control chosen-select" tabindex="2" name="id_fungsional">
                                  <option value=""></option>
                                  @foreach($jabatan as $jabatan)
                                  <option value="{{$jabatan->id_fungsional}}">{{$jabatan->nama_fungsional}}</option>
                                  @endforeach
                                </select>
                              </div>
                            {{ csrf_field() }}
                            <input type="hidden" name="id_unker" value="{{$unker->id_unker}}">
                            <input type="hidden" name="id_struktur" value="{{$id_struktur}}">
                            <input type="submit" class="btn btn-success" name="submit" value="Simpan">

          </form>
                  </div><!-- /.box-body -->


      </div>

</section>

@stop
