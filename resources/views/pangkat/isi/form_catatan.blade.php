@include('pangkat.layoutLTE.head')

<form role="form" action="{{url('pangkat/catat')}}" method="post" enctype="multipart/form-data">
  <div class="box-body">
    <div class="form-group">
      <textarea name="catatan" style="width:400px;height:70px;">{{$pns->catatan}}</textarea>
    </div>
    <div style="color:red;">Contoh: <br>- Diajukan Ijazah S2 beserta Gelarnya, dilampirkan Ijin Belajar <br>
    - Diajukan gelar Ners, dilampirkan Ijazah ners, dan PAK yang diakui <br>
    - Unit kerja tidak sesuai dilampirkan SK Mutasi<br>- dll</div>
  </div><!-- /.box-body -->

  <div class="box-footer">
    <input type="hidden" name="id" value="{{$pns->id}}" />
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <button type="submit" class="btn btn-primary">Simpan</button>
  </div>
</form>

<script src="{{asset('LTE/plugins/input-mask/jquery.inputmask.js')}}" type="text/javascript"></script>
<script src="{{asset('LTE/plugins/input-mask/jquery.inputmask.date.extensions.js')}}" type="text/javascript"></script>
<script src="{{asset('LTE/plugins/input-mask/jquery.inputmask.extensions.js')}}" type="text/javascript"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{asset('LTE/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
