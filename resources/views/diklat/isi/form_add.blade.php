@include('diklat.layoutLTE.head')
<form role="form" action="isiDiklat" method="post">
  <div class="box-body">
<!--    <div class="form-group">
                          <label>Jenis Diklat</label>
                          <select class="form-control" disabled="">
                            <option value="MANAJERIAL">MANAJERIAL</option>
                            <option value="TEKNIS">TEKNIS</option>
                            <option value="FUNGSIONAL">FUNGSIONAL</option>
                            <option value="PRAJABATAN">PRAJABATAN</option>
                          </select>
      </div> -->
      <div class="form-group">
                            <label>Nama Diklat <br>
                            <span class ="badge bg-red"> * Jika tidak ada dalam pilihan, tambahkan pada menu <a href="jenis">tambah jenis diklat</a></span>
                            </label>
                            <select class="form-control" name="kd_diklat">
                              @foreach($diklat as $diklat)
                              <option value="{{$diklat->kd_diklat}}">{{$diklat->nama_diklat}}</option>
                              @endforeach
                            </select>
      </div>
    <div class="form-group">
      <label for="instansi">Instansi</label>
      <input type="text" class="form-control" name ="instansi" value="BADAN KEPEGAWAIAN DAN SUMBERDAYA MANUSIA">
    </div>
    <div class="form-group">
      <label for="instansi_pembina">Instansi Pembina</label>
      <input type="text" class="form-control" name ="instansi_pembina" placeholder="Instansi pembina diklat">
    </div>
    <div class="form-group">
        <label>Tanggal Pelaksanaan</label>
        <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
          <input class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" name="awal_pelaksanaan" type="text">
          <div class="input-group-addon">
          sampai dengan
          </div>
          <input class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" name="akhir_pelaksanaan" type="text">
        </div><!-- /.input group -->
      </div><!-- /.form group -->
    <div class="form-group">
      <label for="angkatan">Angkatan</label>
      <input type="text" class="form-control" name ="angkatan" placeholder="Angkatan">
    </div>

    </div>

  </div><!-- /.box-body -->

  <div class="box-footer">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <input type="hidden" name="jenis" value={{$jenis}} />
    <button type="submit" class="btn btn-primary">Pilih</button>
  </div>
</form>

<script src="{{asset('LTE/plugins/input-mask/jquery.inputmask.js')}}" type="text/javascript"></script>
<script src="{{asset('LTE/plugins/input-mask/jquery.inputmask.date.extensions.js')}}" type="text/javascript"></script>
<script src="{{asset('LTE/plugins/input-mask/jquery.inputmask.extensions.js')}}" type="text/javascript"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{asset('LTE/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>


<script type="text/javascript">
  $(function () {
    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();
  });
</script>
