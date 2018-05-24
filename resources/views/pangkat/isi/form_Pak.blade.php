@include('pangkat.layoutLTE.head')

<script>
function startCalc(){
interval = setInterval("calc()",1);}
function calc(){
kredit_utama = document.frmak.kredit_utama.value;
kredit_penunjang = document.frmak.kredit_penunjang.value;
document.frmak.total_kredit.value = (kredit_utama * 1) + (kredit_penunjang * 1);

}
function stopCalc(){
clearInterval(interval);}
</script>

@if(empty($edit_pak))
<form name="frmak" role="form" action="{{url('pangkat/list_pak/addPak')}}" method="post" enctype="multipart/form-data">
@else
<form name="frmak" role="form" action="{{url('pangkat/list_pak/editPak')}}" method="post" enctype="multipart/form-data">
@endif
  <div class="box-body">
    <table>
      <tr>
        <td>No SK</td>
        <td><input class="form-control" type="text" name ="no_sk" @if(!empty($edit_pak)) value="{{$edit_pak[0]->no_sk}} @endif" class="required"></td>
      </tr>
      <tr>
        <td>Tgl Penetapan</td>
        <td>
          <input class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" @if(!empty($edit_pak)) value="{{tgl_indo($edit_pak[0]->tgl_pak)}}" @endif name="tgl_pak" type="text">
        </td>
      </tr>
      <tr>
        <td>Tahun Mulai Penilaian</td>
        <td><input class="form-control" type="text" name ="tahun_mulai" @if(!empty($edit_pak)) value="{{$edit_pak[0]->tahun_mulai}} @endif" class="required"></td>
      </tr>
      <tr>
      <td>Tahun Akhir Penilaian</td>
      <td><input class="form-control" type="text" name ="tahun" @if(!empty($edit_pak)) value="{{$edit_pak[0]->tahun}} @endif" class="required"></td>
    </tr>
    <tr>
      <td>AK Utama</td>
      <td><input class="form-control" type="text" onFocus="startCalc();" onBlur="stopCalc();" name ="kredit_utama" @if(!empty($edit_pak)) value="{{$edit_pak[0]->kredit_utama}} @endif" class="required"></td>
    </tr>
    <tr>
    <td>AK Penjunjang</td>
    <td><input class="form-control" type="text" onFocus="startCalc();" onBlur="stopCalc();" name ="kredit_penunjang" @if(!empty($edit_pak)) value="{{$edit_pak[0]->kredit_penunjang}} @endif" class="required"></td>
  </tr>
<!--  <tr>
    <td>Total AK</td>
    <td><input readonly onchange='tryNumberFormat(this.form.thirdBox);'  style="text-align:right;background-color:#e5e5e5;"  size='5' class="form-control type="text" name ="total_kredit" @if(!empty($edit_pak)) value="{{$edit_pak[0]->total_kredit}} @endif" readonly/></td>
  </tr>
-->
    <tr colspan="2">
      <td><input type="file" name="file" accept="application/pdf"></td>
    </tr>
  </table>
  </div><!-- /.box-body -->

  <div class="box-footer">
    <input type="hidden" name="kd_berkas" value=13>
    <input type="hidden" name="id" value="{{$id}}" />
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <button type="submit" class="btn btn-primary">Pilih</button>
  </div>
</form>

@include('pangkat.layoutLTE.script')
