@include('pangkat.layoutLTE.head')

@if(empty($edit_kp))
<form role="form" action="{{url('pangkat/list_kp/addKP')}}" method="post" enctype="multipart/form-data">
@else

<form role="form" action="{{url('pangkat/list_kp/editKP')}}" method="post" enctype="multipart/form-data">
@endif
  <div class="box-body">
    <div class="form-group">
      <label for="golongan">Golongan </label>
      <select class="form-control" name="golongan">
        @if(!empty($edit_kp))
        <option value="{{$edit_kp[0]->golongan}}" selected="selected">{{$edit_kp[0]->NM_GOL}}</option>
        @else
        @foreach($gol as $gol)
        <option value="{{$gol->KD_GOL}}">{{$gol->NM_GOL}}</option>
        @endforeach
        @endif
      </select>
    </div>

    <input type="file" name="file" accept="application/pdf">

  </div><!-- /.box-body -->

  <div class="box-footer">
    <input type="hidden" name="kd_berkas" value=3>
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
