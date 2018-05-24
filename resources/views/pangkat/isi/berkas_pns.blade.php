@extends('pangkat.layoutLTE.app')
@section('isi')
<section class="content-header">
         <h1>
           UPLOAD DOKUMEN SK PNS ASLI
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
                              @if(empty($berkas_pns))
                              <form action="{{ url('pangkat/upload_pns') }}" method="post" enctype="multipart/form-data">
                                @else
                              <form action="{{ url('pangkat/upload_update_pns') }}" method="post" enctype="multipart/form-data">
                              @endif
                                  {{ csrf_field() }}
                                      <div class="form-group">
                                      <label for="no_sk" class="labelfrm">No. SK PNS</label>
                                      <input type="text" class="form-control" name ="no_sk" @if(!empty($berkas_pns)) value="{{$berkas_pns[0]->no_sk}} @endif" class="required">
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_sk">Tanggal SK</label>
                                        <div class="input-group">
                                          <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                          </div>
                                          <input class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" @if(!empty($berkas_pns)) value="{{tgl_indo($berkas_pns[0]->tgl_sk)}}" @endif name="tgl_sk" type="text" class="required">
                                        </div><!-- /.input group -->
                                      </div><!-- /.form group -->
                                      <div class="form-group">
                                      <label for="no_sk">No. Surat Ket. Sehat</label>
                                      <input type="text" class="form-control" name ="no_suket_sehat" @if(!empty($berkas_pns)) value="{{$berkas_pns[0]->no_suket_sehat}} @endif" class="required">
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_sk">Tanggal Ket Sehat</label>
                                        <div class="input-group">
                                          <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                          </div>
                                          <input class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" @if(!empty($berkas_pns)) value="{{tgl_indo($berkas_pns[0]->tgl_suket_sehat)}}" @endif name="tgl_suket_sehat" type="text" class="required">
                                        </div><!-- /.input group -->
                                      </div><!-- /.form group -->
                                      <div class="form-group">
                                      <label for="no_sk" class="labelfrm">No. STTPL Prajabatan</label>
                                      <input type="text" class="form-control" name ="no_sttpl_prajab" @if(!empty($berkas_pns)) value="{{$berkas_pns[0]->no_sttpl_prajab}} @endif" class="required">
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_sk" class="labelfrm">Tanggal STTPL Prajabatan</label>
                                        <div class="input-group">
                                          <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                          </div>
                                          <input class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" @if(!empty($berkas_pns)) value="{{tgl_indo($berkas_pns[0]->tgl_sttpl_prajab)}}" @endif name="tgl_sttpl_prajab" type="text" class="required">
                                        </div><!-- /.input group -->
                                      </div><!-- /.form group -->
                                  <input type="file" name="file" accept="application/pdf">
                                  <input type="hidden" name="nip" value="{{$pns->nip_baru}}">
                                  <input type="hidden" name="kd_berkas" value=2>
                                  @if(empty($berkas_pns))
                                  <input type="hidden" name="id" value="{{$pns->id}}">
                                  @else
                                  <input type="hidden" name="id" value="{{$berkas_pns[0]->id}}">
                                  @endif
                                  <br><button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                            </div><!-- /.box-body -->

                          </div><!-- /.box -->

                        </div>

                @if(!empty($berkas_pns))
                <div class="col-md-8">
                    <div class="box box-primary">
                      <div class="box-body">
                        <div id="pdf"></div>
                        <script>PDFObject.embed("{{asset($berkas_pns[0]->lokasi)}}", "#pdf");</script>
                      </div><!-- /.box-body -->

                    </div><!-- /.box -->

                  </div>
                @endif

          </div>




@stop
