@include('pangkat.layoutLTE.head')

@if(empty($edit_transkrip))
<form role="form" action="{{url('pangkat/list_transkrip/addTranskrip')}}" method="post" enctype="multipart/form-data">
@else
<form role="form" action="{{url('pangkat/list_transkrip/editTranskrip')}}" method="post" enctype="multipart/form-data">
@endif
  <div class="box-body">
    <div class="form-group">
      <label for="transkrip">Transkrip </label>
      <select class="form-control" name="transkrip">
        @if(!empty($edit_transkrip))
        <option value="{{$edit_transkrip[0]->id_ijazah}}" selected="selected">{{$edit_transkrip[0]->nm_ijazah}}</option>
        @else
        @foreach($transkrip as $transkrip)
        <option value="{{$transkrip->id_ijazah}}">{{$transkrip->nm_ijazah}}</option>
        @endforeach
        @endif
      </select>
    </div>

    <input type="file" name="file" accept="application/pdf">

  </div><!-- /.box-body -->

  <div class="box-footer">
    <input type="hidden" name="kd_berkas" value=5>
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
