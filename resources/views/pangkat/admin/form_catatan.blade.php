@include('pangkat.layoutLTE.head')

<form role="form" action="{{url('pangkat/admin/berkas/no')}}" method="post" enctype="multipart/form-data">
  <div class="box-body">
    <div class="form-group">
      <textarea name="catatan" style="width:400px;height:70px;">{{$berkas->catat_ver}}</textarea>
    </div>

  <div class="box-footer">
    <input type="hidden" name="id" value="{{$berkas->id}}" />
    <input type="hidden" name="jenis" value="{{$jenis}}" />
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <button type="submit" class="btn btn-primary">Simpan</button>
  </div>
</form>

<script src="{{asset('LTE/plugins/input-mask/jquery.inputmask.js')}}" type="text/javascript"></script>
<script src="{{asset('LTE/plugins/input-mask/jquery.inputmask.date.extensions.js')}}" type="text/javascript"></script>
<script src="{{asset('LTE/plugins/input-mask/jquery.inputmask.extensions.js')}}" type="text/javascript"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{asset('LTE/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
