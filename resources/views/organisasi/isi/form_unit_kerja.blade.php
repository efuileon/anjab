@if (!empty($unker))
<form action="{{url('organisasi/unit_kerja/edit')}}" method="post">
@else
<form action="{{url('organisasi/unit_kerja/tambah')}}" method="post">
@endif

<div class="form-group has-danger">
                      <label class="control-label" for="inputdanger"><i class="fa fa-check"></i> Silahkan isi Nama Unit Kerja</label>
                      @if (!empty($unker))
                      <input type="text" name="unit_kerja" value="{{$unker->unit_kerja}}" class="form-control" id="inputdanger" placeholder="Enter ...">
                      @else
                      <input type="text" name="unit_kerja" class="form-control" id="inputdanger" placeholder="Enter ...">
                      @endif

                    </div>
                  {{ csrf_field() }}
                  @if (!empty($unker))
                  <input type="hidden" name="id_unker" value="{{$unker->id_unker}}">
                  <input type="submit" class="btn btn-success" name="submit" value="Ubah">
                  @else
                  <input type="submit" class="btn btn-success" name="submit" value="Tambah">
                  @endif

</form>
