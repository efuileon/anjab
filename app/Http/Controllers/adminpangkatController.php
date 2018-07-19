<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\pns_sapk;
use App\gol;
use App\dok_lain;
use App\ijazah;
use App\opd;
use App\z_pangkat;
use App\z_pangkat_b_cpns;
use App\z_pangkat_b_pns;
use App\z_pangkat_b_pangkat;
use App\z_pangkat_b_ijazah;
use App\z_pangkat_b_transkrip;
use App\z_pangkat_b_skp;
use App\z_pangkat_b_lain;
use App\z_pangkat_b_pak;
//use App\z_pangkat_b_jabfung;
//use App\z_pangkat_b_jabstruk;
use App\z_pangkat_status;
use App\z_pangkat_history;
use App\z_pangkat_jeniskp;


use Auth;
use DB;
use Alert;
use PDF;

function history($id_usul,$nip,$nama,$per_bln,$per_thn,$jenis_kp,$opd,$status,$catatan)
{
  $date = gmdate("Y-m-d H:i:s", time()+60*60*7);
  $history = new z_pangkat_history();
  $history->tgl_status = $date;
  $history->id_usul = $id_usul;
  $history->nip = $nip;
  $history->nama = $nama;
  $history->per_bln = $per_bln;
  $history->per_thn = $per_thn;
  $history->jenis_kp = $jenis_kp;
  $history->status = $status;
  $history->opd = $opd;
  $history->catatan = $catatan;
  $history->save();
}

class adminpangkatController extends Controller
{



  public function admin()
  {
    if(Auth::user()->level == 2 )
    {
      return redirect('pangkat');
    }
    $data['sidebar'] = "home";
    $data['msidebar'] = "";

    return view('pangkat/admin/home',$data);
  }

  public function manajemen_user()
  {
    if(Auth::user()->level <> 0 )
    {
      return redirect('pangkat/admin');
    }
    $data['sidebar'] = "user";
    $data['msidebar'] = "";
    $data['opd'] = opd::all();
    $data['user'] = User::all();
    return view('pangkat/admin/manajemen_user',$data);
  }

  public function adduser(Request $request)
  {
    $x = "";
    for($i=0;$i<count($request->verif_opd);$i++){
    $x=$x.$request->verif_opd[$i].",";
    }

    $tmp=explode(',',$x);


    $data = new User();
    $data->username = $request->username;
    $data->name = $request->name;
    $data->email = $request->email;
    $data->password = bcrypt($request->password);
    $data->jenis_app = "pangkat";
    $data->level = $request->level;
    $data->OPD = $tmp[0];
    $data->verif_OPD = $x;
    $data->save();

    Alert::success('User telah ditambah!');
    return redirect('pangkat/admin/manajemen_user');
  }

  public function verifikasi()
  {
    if(Auth::user()->level == 2 )
    {
      return redirect('pangkat');
    }

    $tmp=explode(',',Auth::user()->verif_OPD);

    $or = "id_opd = ";
    for($i=0;$i<count($tmp)-1;$i++){
      if($i<count($tmp)-2){
      $text = " or id_opd = ";
    } else{
      $text = "";
    }
    $or=$or.$tmp[$i].$text;
    }
//    return $or;

    $data['sidebar'] = "verifikasi";
    $data['msidebar'] = "";

    $data['verif'] = opd::whereRaw(($or))->get();
    return view('pangkat/admin/verifikasi',$data);
  }

  public function verifikasi_opd($id)
  {
    if(Auth::user()->level == 2 )
    {
      return redirect('pangkat');
    }

    $data['sidebar'] = "verifikasi";
    $data['msidebar'] = "";

    $data['pns'] = z_pangkat::leftjoin('z_pangkat_jeniskps','jenis_kp','=','id_jenis_kp')->leftjoin('opds','opd','=','id_opd')->leftjoin('z_pangkat_statuss','verifikasi','=','kd_status')->where('OPD','=',$id)->where('per_bln','=',session()->get('per'))->where('per_thn','=',session()->get('thn'))->where('verifikasi','>=','2')->get();
    return view('pangkat/admin/verifikasi_opd',$data);
  }

  public function verifpns($id)
  {
    if(Auth::user()->level == 2 )
    {
      return redirect('pangkat');
    }

    $data['sidebar'] = "verifikasi";
    $data['msidebar'] = "";

    $data['pns'] = z_pangkat::find($id);
    $data['berkas_cpns'] = z_pangkat_b_cpns::where("id_usul","=",$id)->get();
    $data['berkas_pns'] = z_pangkat_b_pns::where("id_usul","=",$id)->get();
    $data['berkas_pangkat'] = z_pangkat_b_pangkat::where("id_usul","=",$id)->orderby("golongan","DESC")->get();
    $data['berkas_ijazah'] = z_pangkat_b_ijazah::leftjoin("ijazahs","kd_ijazah","=","id_ijazah")->where("id_usul","=",$id)->orderby("id_ijazah","DESC")->get();
    $data['berkas_transkrip'] = z_pangkat_b_transkrip::leftjoin("ijazahs","kd_ijazah","=","id_ijazah")->where("id_usul","=",$id)->orderby("id_ijazah","DESC")->get();
    $data['berkas_skp1'] = z_pangkat_b_skp::where("id_usul","=",$id)->where("tahun","=",session()->get('thn')-2)->get();
    $data['berkas_skp2'] = z_pangkat_b_skp::where("id_usul","=",$id)->where("tahun","=",session()->get('thn')-1)->get();
    switch ($data['pns']->jenis_kp) {
          case '1':
          $data['berkas_lain'] = z_pangkat_b_lain::leftjoin("dok_lains","kd_berkas","=","id_dok")->where("id_usul","=",$id)->get();
          break;
          case '2':
          $data['berkas_lain'] = z_pangkat_b_lain::leftjoin("dok_lains","kd_berkas","=","id_dok")->where("id_usul","=",$id)->where("kd_berkas","<>","12")->where("kd_berkas","<>","13")->get();
          break;
          case '3':
          $data['berkas_lain'] = z_pangkat_b_lain::leftjoin("dok_lains","kd_berkas","=","id_dok")->where("id_usul","=",$id)->where("kd_berkas","<>","10")->where("kd_berkas","<>","11")->get();
          break;
          case '4':
          $data['berkas_lain'] = z_pangkat_b_lain::leftjoin("dok_lains","kd_berkas","=","id_dok")->where("id_usul","=",$id)->where("kd_berkas","<>","17")->get();
          break;
          case '5':
          $data['berkas_lain'] = z_pangkat_b_lain::leftjoin("dok_lains","kd_berkas","=","id_dok")->where("id_usul","=",$id)->where("kd_berkas","<>","12")->where("kd_berkas","<>","13")->where("kd_berkas","<>","17")->get();
          break;
    }


    $data['berkas_pak'] = z_pangkat_b_pak::where("id_usul","=",$id)->get();
    $data['berkas_jabfung'] = z_pangkat_b_lain::leftjoin("dok_lains","kd_berkas","=","id_dok")->where("id_usul","=",$id)->where("kd_berkas","=",12)->get();
    $data['berkas_jabstruk'] = z_pangkat_b_lain::leftjoin("dok_lains","kd_berkas","=","id_dok")->where("id_usul","=",$id)->where("kd_berkas","=",10)->get();
    $data['berkas_drj'] = z_pangkat_b_lain::leftjoin("dok_lains","kd_berkas","=","id_dok")->where("id_usul","=",$id)->where("kd_berkas","=",11)->get();
    $data['berkas_uraian'] = z_pangkat_b_lain::leftjoin("dok_lains","kd_berkas","=","id_dok")->where("id_usul","=",$id)->where("kd_berkas","=",17)->get();

    return view('pangkat/admin/verifpns',$data);
  }

  public function verif_berkas($id)
  {
    if(Auth::user()->level == 2 )
    {
      return redirect('pangkat');
    }

    $data['sidebar'] = "verifikasi";
    $data['msidebar'] = "";

    $data['pns'] = z_pangkat::find($id);
    $data['jenis_kp'] = z_pangkat_jeniskp::find($data['pns']->jenis_kp);
    $data['sidebar'] = "usul_pangkat";
    $data['msidebar'] = red_jeniskp($data['pns']->jenis_kp);

    $data['berkas_cpns'] = z_pangkat_b_cpns::where("id_usul","=",$id)->get();
    $data['berkas_pns'] = z_pangkat_b_pns::where("id_usul","=",$id)->get();
    $data['berkas_pangkat'] = z_pangkat_b_pangkat::where("id_usul","=",$id)->orderby("golongan","DESC")->get();
    $data['berkas_ijazah'] = z_pangkat_b_ijazah::leftjoin("ijazahs","kd_ijazah","=","id_ijazah")->where("id_usul","=",$id)->orderby("id_ijazah","DESC")->get();
    $data['berkas_transkrip'] = z_pangkat_b_transkrip::leftjoin("ijazahs","kd_ijazah","=","id_ijazah")->where("id_usul","=",$id)->orderby("id_ijazah","DESC")->get();
    $data['berkas_skp1'] = z_pangkat_b_skp::where("id_usul","=",$id)->where("tahun","=",session()->get('thn')-2)->get();
    $data['berkas_skp2'] = z_pangkat_b_skp::where("id_usul","=",$id)->where("tahun","=",session()->get('thn')-1)->get();
    $data['berkas_lain'] = z_pangkat_b_lain::leftjoin("dok_lains","kd_berkas","=","id_dok")->where("id_usul","=",$id)->get();
    return view('pangkat.admin.verif_berkas',$data);
  }

  public function berkas_ok($jenis,$id)
  {
    $text = "App\\".$jenis;
    $data = $text::find($id);
    $data->stat_ver = "OK";
    $data->save();

    return redirect('pangkat/admin/verifpns/'.$data->id_usul);

  }
  public function berkas_no($jenis,$id)
  {
    $text = "App\\".$jenis;
    $data['berkas'] = $text::find($id);
    $data['jenis'] = $jenis;

    return view ('pangkat.admin.form_catatan',$data);

  }
  public function berkas_no_catat(Request $request)
  {
      $text = "App\\".$request->jenis;
      $data = $text::find($request->id);
      $data->stat_ver = "NO";
      $data->catat_ver = $request->catatan;
      $data->save();
      return redirect('pangkat/admin/verifpns/'.$data->id_usul);
  }

 public function verif_ok($id)
 {
   $date = gmdate("Y-m-d H:i:s", time()+60*60*7);
   $data = z_pangkat::find($id);
   $data->verifikasi = "6";
   $data->save();
   history($data->id,$data->nip_baru,$data->nama,$data->per_bln,$data->per_thn,$data->jenis_kp,$data->opd,"6","ACC");
   Alert::success('Usulan Disetujui');
   return redirect('pangkat/admin/verifikasi');
 }

 public function verif_catat(Request $request)
 {
     $data = z_pangkat::find($request->id);
     $data->verifikasi = "3";
     $data->ver_catatan = $request->catat_ver;
     $data->save();
     Alert::warning('Usulan Dikembalikan Ke OPD');
     history($data->id,$data->nip_baru,$data->nama,$data->per_bln,$data->per_thn,$data->jenis_kp,$data->opd,"3","Data Dikembalikan ke OPD");
     return redirect('pangkat/admin/verifikasi');
 }
}
