@extends('pangkat.layoutLTE.app')
@section('isi')
<section class="content-header">
         <h1>
           UPLOAD DOKUMEN SK CPNS ASLI
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

           <div class="row">
              <div class="col-md-4">
                          <div class="box box-primary">
                            <div class="box-body">
                              @if(empty($berkas_cpns))
                              <form action="{{ url('pangkat/upload_cpns') }}" method="post" enctype="multipart/form-data" id="cpns">
                                @else
                              <form action="{{ url('pangkat/upload_update_cpns') }}" method="post" enctype="multipart/form-data" id="cpns">
                              @endif
                                  {{ csrf_field() }}
                                      <div class="form-group">
                                      <label for="no_sk" class="labelfrm">No. SK CPNS</label>
                                      <input type="text" class="form-control" name ="no_sk" @if(!empty($berkas_cpns)) value="{{$berkas_cpns[0]->no_sk}} @endif" class="required" id="no_sk">
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_sk" class="labelfrm">Tanggal SK</label>
                                        <div class="input-group">
                                          <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                          </div>
                                          <input class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" @if(!empty($berkas_cpns)) value="{{tgl_indo($berkas_cpns[0]->tgl_sk)}}" @endif name="tgl_sk" type="text" class="required" id="tgl_sk">
                                        </div><!-- /.input group -->
                                      </div><!-- /.form group -->
                                  <input type="file" name="file" accept="application/pdf">
                                  <input type="hidden" name="nip" value="{{$pns->nip_baru}}">
                                  <input type="hidden" name="kd_berkas" value=1>
                                  @if(empty($berkas_cpns))
                                  <input type="hidden" name="id" value="{{$pns->id}}">
                                  @else
                                  <input type="hidden" name="id" value="{{$berkas_cpns[0]->id}}">
                                  @endif
                                  <br><button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                            </div><!-- /.box-body -->

                          </div><!-- /.box -->

                        </div>

                @if(!empty($berkas_cpns))
                <div class="col-md-8">
                    <div class="box box-primary">
                      <div class="box-body">
                        <div id="pdf"></div>
                        <script>PDFObject.embed("{{asset($berkas_cpns[0]->lokasi)}}", "#pdf");</script>
                      </div><!-- /.box-body -->

                    </div><!-- /.box -->

                  </div>
                @endif

          </div>




@stop
