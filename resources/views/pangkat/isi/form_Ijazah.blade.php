@include('pangkat.layoutLTE.head')

@if(empty($edit_ijazah))
<form role="form" action="{{url('pangkat/list_ijazah/addIjazah')}}" method="post" enctype="multipart/form-data">
@else
<form role="form" action="{{url('pangkat/list_ijazah/editIjazah')}}" method="post" enctype="multipart/form-data">
@endif
  <div class="box-body">
    <div class="form-group">
      <label for="ijazah">Ijazah </label>
      <select class="form-control" name="ijazah">
        @if(!empty($edit_ijazah))
        <option value="{{$edit_ijazah[0]->id_ijazah}}" selected="selected">{{$edit_ijazah[0]->nm_ijazah}}</option>
        @else
        @foreach($ijazah as $ijazah)
        <option value="{{$ijazah->id_ijazah}}">{{$ijazah->nm_ijazah}}</option>
        @endforeach
        @endif
      </select>
    </div>

    <input type="file" name="file" accept="application/pdf">

  </div><!-- /.box-body -->

  <div class="box-footer">
    <input type="hidden" name="kd_berkas" value=4>
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
