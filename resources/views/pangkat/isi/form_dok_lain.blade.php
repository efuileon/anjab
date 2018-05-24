@include('pangkat.layoutLTE.head')

@if(empty($edit_dok))
<form role="form" action="{{url('pangkat/uploadreg/add_dok_lain')}}" method="post" enctype="multipart/form-data">
@else
<form role="form" action="{{url('pangkat/uploadreg/edit_dok_lain')}}" method="post" enctype="multipart/form-data">
@endif
  <div class="box-body">
    <div class="form-group">
      <label for="dok">Dokumen Pendukung Lainnya </label>
      <select class="form-control" name="id_dok">
        @if(!empty($edit_dok))
        <option value="{{$edit_dok[0]->id_dok}}" selected="selected">{{$edit_dok[0]->nm_dok}}</option>
        @else
        @foreach($dok as $dok)
        <option value="{{$dok->id_dok}}">{{$dok->nm_dok}}</option>
        @endforeach
        @endif
      </select>
    </div>
    <div class="form-group">
    <label for="tahun" class="labelfrm">Tahun SK</label>
    <input type="text" class="form-control" name ="tahun" @if(!empty($edit_dok)) value="{{$edit_dok[0]->tahun}} @endif" class="required" id="tahun">
    </div>
  <input type="file" name="file" accept="application/pdf">

  </div><!-- /.box-body -->

  <div class="box-footer">
    <input type="hidden" name="id" value="{{$id}}" />
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <button type="submit" class="btn btn-primary">Pilih</button>
  </div>
</form>

<script src="{{asset('LTE/plugins/input-mask/jquery.inputmask.js')}}" type="text/javascript"></script>
<script src="{{asset('LTE/plugins/input-mask/jquery.inputmask.date.extensions.js')}}" type="text/javascript"></script>
<script src="{{asset('LTE/plugins/input-mask/jquery.inputmask.extensions.js')}}" type="text/javascript"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{asset('LTE/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
