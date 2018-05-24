@extends('pangkat.layoutLTE.app')
@section('isi')
<script>
function round(number, precision) {
  var shift = function (number, precision, reverseShift) {
    if (reverseShift) {
      precision = -precision;
    }
    var numArray = ("" + number).split("e");
    return +(numArray[0] + "e" + (numArray[1] ? (+numArray[1] + precision) : precision));
  };
  return shift(Math.round(shift(number, precision, false)), precision, true);
}

function startCalc(){
interval = setInterval("calc()",1);}
function calc(){
skp = document.frmskp.skp.value;
o_pelayanan = document.frmskp.o_pelayanan.value;
integritas = document.frmskp.integritas.value;
komitmen = document.frmskp.komitmen.value;
disiplin = document.frmskp.disiplin.value;
kerjasama = document.frmskp.kerjasama.value;
kepemimpinan = document.frmskp.kepemimpinan.value;
skp60 = document.frmskp.skp60.value;
jumlah = document.frmskp.jumlah.value;
rata2 = document.frmskp.rata2.value;
rata240 = document.frmskp.rata240.value;
document.frmskp.skp60.value = round(skp * 60/100,2);
document.frmskp.jumlah.value = (o_pelayanan * 1) + (integritas * 1) + (komitmen * 1) + (disiplin * 1) + (kerjasama * 1) + (kepemimpinan * 1);
if (kepemimpinan == "" || kepemimpinan == 0) {
  document.frmskp.rata2.value = round((jumlah * 1) / 5,2);
} else {
  document.frmskp.rata2.value = round((jumlah * 1) / 6,2);

}
document.frmskp.rata240.value = round((rata2 * 1) * 40/100,2);
document.frmskp.total.value = round((rata240 * 1) + (skp60 * 1),2);

}
function stopCalc(){
clearInterval(interval);}
</script>

<section class="content-header">
         <h1>
           UPLOAD DOKUMEN SKP TAHUN {{session()->get('thn')-2}} ASLI
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
             @if(empty($berkas_skp1))
             <form action="{{ url('pangkat/upload_skp1') }}" method="post" enctype="multipart/form-data" name="frmskp">
               @else
             <form action="{{ url('pangkat/upload_update_skp1') }}" method="post" enctype="multipart/form-data" name="frmskp">
             @endif
              <div class="col-md-4">
                          <div class="box box-primary">
                            <div class="box-body">

                                  {{ csrf_field() }}
                                    <input readonly type="text" class="form-control" name ="tahun"  value="{{session()->get('thn')-2}}" class="required" background-color="#e5e5e5" readonly >
                                    <table class="table table-condensed">
                                      <tbody>
                                        <tr>
                                          <td style="width: 100px">Jabatan PNS</td>
                                          <td style="width: 70px"><input type='text' name='jab_pns' size='20' @if(!empty($berkas_skp1)) value="{{$berkas_skp1[0]->jab_pns}}" @endif/></td>
                                        </tr>
                                    </tbody>
                                  </table>
                                    <table class="table table-condensed">
                                      <tbody>
                                      <tr>
                                        <td style="width: 40px">Nilai Capaian (SKP)</td>
                                        <td style="width: 20px"><input type='text' name='skp' style="text-align:right;"  size='5'   onFocus="startCalc();" onBlur="stopCalc();" @if(!empty($berkas_skp1)) value="{{$berkas_skp1[0]->skp}}" @endif /></td>
                                      </tr>
                                      <tr>
                                        <td>Orientasi Pelayanan</td>
                                        <td><input type='text' name='o_pelayanan' style="text-align:right;"  size='5'   onFocus="startCalc();" onBlur="stopCalc();" @if(!empty($berkas_skp1)) value="{{$berkas_skp1[0]->o_pelayanan}}" @endif /></td>
                                      </tr>
                                      <tr>
                                        <td>Integritas</td>
                                        <td><input type='text' name='integritas' style="text-align:right;"  size='5'   onFocus="startCalc();" onBlur="stopCalc();" @if(!empty($berkas_skp1)) value="{{$berkas_skp1[0]->integritas}}" @endif /></td>
                                      <tr>
                                        <tr>
                                          <td>Komitmen</td>
                                          <td><input type='text' name='komitmen' style="text-align:right;"  size='5'   onFocus="startCalc();" onBlur="stopCalc();" @if(!empty($berkas_skp1)) value="{{$berkas_skp1[0]->komitmen}}" @endif/></td>
                                        <tr>
                                        <tr>
                                          <td>Disiplin</td>
                                          <td><input type='text' name='disiplin' style="text-align:right;"  size='5'   onFocus="startCalc();" onBlur="stopCalc();" @if(!empty($berkas_skp1)) value="{{$berkas_skp1[0]->disiplin}}" @endif /></td>
                                        <tr>
                                        <tr>
                                          <td>Kerjasama</td>
                                          <td><input type='text' name='kerjasama' style="text-align:right;"  size='5'   onFocus="startCalc();" onBlur="stopCalc();" @if(!empty($berkas_skp1)) value="{{$berkas_skp1[0]->kerjasama}}" @endif /></td>
                                        <tr>
                                        <tr>
                                          <td>Kepemimpinan</td>
                                          <td><input type='text' name='kepemimpinan' style="text-align:right;"  size='5'   onFocus="startCalc();" onBlur="stopCalc();" @if(!empty($berkas_skp1)) value="{{$berkas_skp1[0]->kepemimpinan}}" @endif/></td>
                                        <tr>
                                        <tr>
                                          <td>Jumlah</td>
                                          <td><input readonly type='text' onchange='tryNumberFormat(this.form.thirdBox);' name='jumlah' style="text-align:right;background-color:#e5e5e5;"  size='5' @if(!empty($berkas_skp1)) value="{{$berkas_skp1[0]->jumlah}}" @endif readonly></td>
                                        <tr>
                                        <tr>
                                          <td colspan="2">Rata2
                                          <input readonly type='text' name='rata2' onchange='tryNumberFormat(this.form.thirdBox);' style="text-align:right;background-color:#e5e5e5;"  size='5' @if(!empty($berkas_skp1)) value="{{$berkas_skp1[0]->rata2}}" @endif readonly/>
                                          x40% = <input readonly type='text' name='rata240' onchange='tryNumberFormat(this.form.thirdBox);' style="text-align:right;background-color:#e5e5e5;"  size='5' @if(!empty($berkas_skp1)) value="{{$berkas_skp1[0]->rata240}}" @endif readonly/>
                                        </td>
                                        <tr>
                                        <tr>
                                          <td>SKP 60%</td>
                                          <td><input readonly type='text' onchange='tryNumberFormat(this.form.thirdBox);'  name='skp60' style="text-align:right;background-color:#e5e5e5;"  size='5' @if(!empty($berkas_skp1)) value="{{$berkas_skp1[0]->skp60}}" @endif readonly/></td>
                                        <tr>
                                          <tr>
                                            <td>Total</td>
                                            <td><input readonly type='text' name='total' onchange='tryNumberFormat(this.form.thirdBox);'  style="text-align:right;background-color:#e5e5e5;"  size='5' @if(!empty($berkas_skp1)) value="{{$berkas_skp1[0]->total}}" @endif readonly/></td>
                                          <tr>

                                    </tbody>
                                  </table>
                                  <input type="file" name="file" accept="application/pdf">
                                  <input type="hidden" name="nip" value="{{$pns->nip_baru}}">
                                  <input type="hidden" name="kd_berkas" value=8>

                                  @if(empty($berkas_skp1))
                                  <input type="hidden" name="id" value="{{$pns->id}}">
                                  @else
                                  <input type="hidden" name="id" value="{{$berkas_skp1[0]->id}}">
                                  @endif
                                  <br><button type="submit" class="btn btn-primary">Simpan</button>

                            </div><!-- /.box-body -->

                          </div><!-- /.box -->

                        </div>
                        <div class="col-md-8">
                            <div class="box box-primary">
                              <div class="box-body">
                                <table class="table table-condensed">
                                  <tbody>
                                    <tr>
                                      <th colspan="2">Pejabat Penilai</th>
                                      <th colspan="2">Atasan Pejabat Penilai</th>
                                    </tr>
                                    <tr>
                                      <td style="width: 40px">NIP</td>
                                      <td style="width: 100px"><input type='text' name='nip_pjb' size='25' @if(!empty($berkas_skp1)) value="{{$berkas_skp1[0]->nip_pjb}}" @endif /></td>
                                      <td style="width: 40px">NIP</td>
                                      <td style="width: 100px"><input type='text' name='nip_pjb_ats' size='25' @if(!empty($berkas_skp1)) value="{{$berkas_skp1[0]->nip_pjb_ats}}" @endif /></td>
                                  </tr>
                                    <tr>
                                      <td style="width: 40px">Jabatan</td>
                                      <td style="width: 100px"><input type='text' name='jab_pjb' size='25' @if(!empty($berkas_skp1)) value="{{$berkas_skp1[0]->jab_pjb}}" @endif /></td>
                                      <td style="width: 40px">Jabatan</td>
                                      <td style="width: 100px"><input type='text' name='jab_pjb_ats' size='25' @if(!empty($berkas_skp1)) value="{{$berkas_skp1[0]->jab_pjb_ats}}" @endif /></td>
                                  </tr>
                                    <tr>
                                      <td style="width: 40px">Unit Kerja</td>
                                      <td style="width: 100px"><input type='text' name='unker_pjb' size='25' @if(!empty($berkas_skp1)) value="{{$berkas_skp1[0]->unker_pjb}}" @endif /></td>
                                      <td style="width: 40px">Unit Kerja</td>
                                      <td style="width: 100px"><input type='text' name='unker_pjb_ats' size='25' @if(!empty($berkas_skp1)) value="{{$berkas_skp1[0]->unker_pjb_ats}}" @endif /></td>
                                  </tr>
                                    <tr>
                                      <td style="width: 40px">Golongan</td>
                                      <td style="width: 100px"><input type='text' name='gol_pjb' size='25' @if(!empty($berkas_skp1)) value="{{$berkas_skp1[0]->gol_pjb}}" @endif /></td>
                                      <td style="width: 40px">Golongan</td>
                                      <td style="width: 100px"><input type='text' name='gol_pjb_ats' size='25' @if(!empty($berkas_skp1)) value="{{$berkas_skp1[0]->gol_pjb_ats}}" @endif /></td>
                                  </tr>
                                    <tr>
                                      <td style="width: 40px">TMT Golongan</td>
                                      <td style="width: 100px">
                                        <input class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" @if(!empty($berkas_skp1)) value="{{tgl_indo($berkas_skp1[0]->tmt_pjb)}}" @endif name="tmt_pjb" type="text" class="required">
                                      </td>
                                      <td style="width: 40px">TMT Golongan</td>
                                      <td style="width: 100px">
                                        <input class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" @if(!empty($berkas_skp1)) value="{{tgl_indo($berkas_skp1[0]->tmt_pjb_ats)}}" @endif name="tmt_pjb_ats" type="text" class="required">
                                        </td>
                                  </tr>

                                </tbody>
                              </table>
                              </div><!-- /.box-body -->

                            </div><!-- /.box -->

                          </div>

                            </form>
                @if(!empty($berkas_skp1))
                <div class="col-md-8">
                    <div class="box box-primary">
                      <div class="box-body">
                        <div id="pdf"></div>
                        <script>PDFObject.embed("{{asset($berkas_skp1[0]->lokasi)}}", "#pdf");</script>
                      </div><!-- /.box-body -->

                    </div><!-- /.box -->

                  </div>
                @endif

          </div>




@stop
