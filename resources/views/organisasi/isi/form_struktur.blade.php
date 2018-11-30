<link rel="stylesheet" type="text/css" href="{{asset('chosen_v1.8.7/chosen.css')}}"/>

<form action="{{url('organisasi/struktur/buat')}}" method="post">

                      <div class="form-group">
                      <label>Jabatan</label>
                        <select data-placeholder="Pilih Jabatan..." class="form-control chosen-select" tabindex="2" name="id_jabatan">
                        <option value=""></option>
                        @foreach($jabatan as $jabatan)
                        <option value="{{$jabatan->id_jabatan}}">{{$jabatan->nama_jabatan}}</option>
                        @endforeach
                      </select>
                    </div>
                  {{ csrf_field() }}
                  <input type="hidden" name="id_unker" value="{{$unker->id_unker}}">
                  <input type="hidden" name="id_struktur" value="{{$id_struktur}}">
                  <input type="submit" class="btn btn-success" name="submit" value="Simpan">

</form>
<script src="{{asset('chosen_v1.8.7/chosen.jquery.js')}}" type="text/javascript"></script>
<script src="{{asset('chosen_v1.8.7/docsupport/init.js')}}" type="text/javascript"></script>
