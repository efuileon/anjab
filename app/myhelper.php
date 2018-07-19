<?php

function red_jeniskp($id)
{
  switch ($id) {
    case '1':
      return "reguler";
      break;
      case '2':
        return "jft";
        break;
        case '3':
          return "struk";
          break;
          case '4':
            return "pi_jfu";
            break;
            case '5':
              return "pi_jft";
              break;
  }
}

function level($x)
{
  switch ($x) {
    case '0':
      return "Admin";
      break;
      case '1':
        return "Verifikator";
        break;
        case '2':
          return "User OPD";
          break;
  }
}
function gol($x)
{
  switch ($x) {
    case 'I/a':
      return 11;
      break;
    case 'I/b':
      return 12;
      break;
    case 'I/c':
      return 13;
      break;
    case 'I/d':
      return 14;
      break;
    case 'II/a':
      return 21;
      break;
    case 'II/b':
      return 22;
      break;
    case 'II/c':
      return 23;
      break;
    case 'II/d':
      return 24;
      break;
    case 'III/a':
      return 31;
      break;
    case 'III/b':
      return 32;
      break;
    case 'III/c':
      return 33;
      break;
    case 'III/d':
      return 34;
      break;
    case 'IV/a':
      return 41;
      break;
    case 'IV/b':
      return 42;
      break;
    case 'IV/c':
      return 43;
      break;
    case 'IV/d':
      return 44;
      break;
  }
}

function sesi(){
if(session()->get('username')=="" || session()->get('password')=="")
{
  alert::error('Anda belum login silahkan login terlebih dahulu');
  return redirect('pangkat/login');
 }
}

function nama($dpn,$nama,$blk)
{
  if($dpn!="" && $blk !="")
  {
    return $dpn.". ".$nama.", ".$blk;
  } else if( $dpn!=""){
    return $nama.", ".$blk;
  } else if($blk!=""){
    return $nama.", ".$blk;
  } else{
    return $nama;
  }
}

function tgl_tmt($tgl)
{
  if($tgl==""){
            return "";
        } else {
            return tgl_indo($tgl);
        }
}

function tgl_indo($tgl){
    $ubah = date("Y-m-d",strtotime($tgl));
    $pisah = explode("-",$ubah);
    $tanggal = $pisah[2];
    $bulan = bulan($pisah[1]);
    $tahun = $pisah[0];
    return $tanggal.'-'.$pisah[1].'-'.$tahun;
  }
  function tgl_lengkap($tgl){
      $ubah = date("Y-m-d",strtotime($tgl));
      $pisah = explode("-",$ubah);
      $tanggal = $pisah[2];
      $bulan = bulan($pisah[1]);
      $tahun = $pisah[0];
      return $tanggal.' '.$bulan.' '.$tahun;
    }
  function tgl_simpan($tgl){
    $pisah = explode("/",$tgl);
    $tgl2 =$pisah[2].'-'.$pisah[1].'-'.$pisah[0];
    return date("Y-m-d",strtotime($tgl2));
  }

  function tgl_sambung($tgl)
  {
    return substr($tgl,0,2)."-".substr($tgl,2,2)."-".substr($tgl,4,4);
  }

function db_jum_esl($x)
{
  return DB::table($x)->selectRaw('eselon,NM_ESELON,count(*) as jum')->leftjoin('eselons','eselon','=','KD_ESELON')->where('NIP_PJB','=',null)->where('mulai_berlaku','=','2017-01-01')->where('eselon','<>','')->groupby('NM_ESELON')->get();
}

function db_unker_kosong($x)
{
  return DB::table($x)->where('NIP_PJB','=',null)->where('mulai_berlaku','=','2017-01-01')->where('eselon','<>','')->groupby('UNIT_KERJA')->get();
}
function db_hitung_total($x)
{
  return DB::table($x)->where('NIP_PJB','=',null)->where('mulai_berlaku','=','2017-01-01')->where('eselon','<>','')->get();
}

function warna_esl($x){
switch ($x){
  case '21':
    return "badge bg-red";
    break;
  case '22':
    return "badge bg-red";
    break;
  case '31':
    return "badge bg-blue";
    break;
  case '32':
    return "badge bg-blue";
    break;
  case '41':
    return "badge bg-green";
    break;
  case '42':
    return "badge bg-green";
    break;
    default:
    return "badge bg-orange";
    break;
  }
}

function nip ($x) {
  $nip = explode(" ",$x);
  $x = $nip[0].$nip[1].$nip[2].$nip[3];
  return $x;
}

function rupiah ($angka) {
  $rupiah = number_format($angka ,2, ',' , '.' );
  return $rupiah;
}

function terbilang($x)
{
  $abil = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
  if ($x < 12)
    return " " . $abil[$x];
  elseif ($x < 20)
    return Terbilang($x - 10) . " Belas";
  elseif ($x < 100)
    return Terbilang($x / 10) . " Puluh" . Terbilang($x % 10);
  elseif ($x < 200)
    return " Beratus" . Terbilang($x - 100);
  elseif ($x < 1000)
    return Terbilang($x / 100) . " Ratus" . Terbilang($x % 100);
  elseif ($x < 2000)
    return " Seribu" . Terbilang($x - 1000);
  elseif ($x < 1000000)
    return Terbilang($x / 1000) . " Ribu" . Terbilang($x % 1000);
  elseif ($x < 1000000000)
    return Terbilang($x / 1000000) . " Juta" . Terbilang($x % 1000000);
}



	function bulan($bln){
		switch ($bln){
			case 1:
				return "Januari";
				break;
			case 2:
				return "Februari";
				break;
			case 3:
				return "Maret";
				break;
			case 4:
				return "April";
				break;
			case 5:
				return "Mei";
				break;
			case 6:
				return "Juni";
				break;
			case 7:
				return "Juli";
				break;
			case 8:
				return "Agustus";
				break;
			case 9:
				return "September";
				break;
			case 10:
				return "Oktober";
				break;
			case 11:
				return "November";
				break;
			case 12:
				return "Desember";
				break;
		}
	}

  ?>

  <?php
  global $char128asc,$char128charWidth;
  $char128asc=' !"#$%&\'()*+,-./0123456789:;<=>?@ABCDEFGHIJKLMNOPQRSTUVWXYZ[\]^_`abcdefghijklmnopqrstuvwxyz{|}~';
  $char128wid = array(
    '212222','222122','222221','121223','121322','131222','122213','122312','132212','221213', // 0-9
    '221312','231212','112232','122132','122231','113222','123122','123221','223211','221132', // 10-19
    '221231','213212','223112','312131','311222','321122','321221','312212','322112','322211', // 20-29
    '212123','212321','232121','111323','131123','131321','112313','132113','132311','211313', // 30-39
    '231113','231311','112133','112331','132131','113123','113321','133121','313121','211331', // 40-49
    '231131','213113','213311','213131','311123','311321','331121','312113','312311','332111', // 50-59
    '314111','221411','431111','111224','111422','121124','121421','141122','141221','112214', // 60-69
    '112412','122114','122411','142112','142211','241211','221114','413111','241112','134111', // 70-79
    '111242','121142','121241','114212','124112','124211','411212','421112','421211','212141', // 80-89
    '214121','412121','111143','111341','131141','114113','114311','411113','411311','113141', // 90-99
    '114131','311141','411131','211412','211214','211232','23311120'   );					   // 100-106

  ////Define Function
  function bar128($text) {						// Part 1, make list of widths
    global $char128asc,$char128wid;
    $w = $char128wid[$sum = 104];							// START symbol
    $onChar=1;
    for($x=0;$x<strlen($text);$x++)								// GO THRU TEXT GET LETTERS
      if (!( ($pos = strpos($char128asc,$text[$x])) === false )){	// SKIP NOT FOUND CHARS
      $w.= $char128wid[$pos];
      $sum += $onChar++ * $pos;
    }
    $w.= $char128wid[ $sum % 103 ].$char128wid[106];  		//Check Code, then END
                          //Part 2, Write rows
    $html="<table cellpadding=0 cellspacing=0><tr>";
    for($x=0;$x<strlen($w);$x+=2)   						// code 128 widths: black border, then white space
    $html .= "<td><div class=\"b128\" style=\"border-left-width:{$w[$x]};width:{$w[$x+1]}\"></div>";
    return "$html<tr><td  colspan=".strlen($w)." align=center><font family=arial size=2><b>$text</table>";
  }


  ?>
