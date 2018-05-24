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
use App\z_pangkat_b_jabfung;
use App\z_pangkat_b_jabstruk;
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

class pangkatController extends Controller
{
    public function periode(Request $request)
    {
      $per = $request->per_bln;
      $thn = $request->per_thn;
      session()->put('per',$per);
      session()->put('thn',$thn);
      return redirect('pangkat');

    }
    public function home()
    {
      if(Auth::user()->level <> 2 )
      {
        return redirect('pangkat/admin');
      }

      $data['sidebar'] = "home";
      $data['msidebar'] = "";
      $bl = date("m");
      $th = date("Y");
      $per_bl = session()->get('per');
      $per_th = session()->get('thn');
      if(session()->get('per')=="" || session()->get('thn')=="")
      {
        if($bl <= 4)
          {
            $per_bl = 4;
            $per_th = $th;
          }
          elseif($bl <=10)
            {
              $per_bl = 10 ;
              $per_th = $th;
            } else
            {
              $per_bl = 4;
              $per_th = $th+1;
            }
          }
          session()->put('per',$per_bl);
          session()->put('thn',$per_th);

      return view('pangkat.isi.home',$data);
    }

    //reguler
    public function reguler()
    {
      if(Auth::user()->level <> 2 )
      {
        return redirect('pangkat/admin');
      }

      $data['sidebar'] = "usul_pangkat";
      $data['msidebar'] = "reguler";
      $data['jen_kp'] = "1";
      $bl = date("m");
      $th = date("Y");
      $per_bl = session()->get('per');
      $per_th = session()->get('thn');
      if(session()->get('per')=="" || session()->get('thn')=="")
      {
        if($bl <= 4)
          {
            $per_bl = 4;
            $per_th = $th;
          }
          elseif($bl <=10)
            {
              $per_bl = 10 ;
              $per_th = $th;
            } else
            {
              $per_bl = 4;
              $per_th = $th+1;
            }
          }
      $verif = opd::find(Auth::user()->OPD);
//      return $verif;
      $data['ukp'] = z_pangkat::leftjoin('z_pangkat_jeniskps','jenis_kp','=','id_jenis_kp')->leftjoin('opds','opd','=','id_opd')->leftjoin('z_pangkat_statuss','verifikasi','=','kd_status')->whereRaw('(opd = '.Auth::user()->OPD.' or parent = '.Auth::user()->OPD.')')->where('per_bln','=',$per_bl)->where('per_thn','=',$per_th)->where('jenis_kp','=',$data['jen_kp'])->where('verifikasi','>=',$verif->tingkat)->get();
//return $data['ukp'];
      return view('pangkat.isi.reguler',$data);
    }

    public function jft()
    {
      if(Auth::user()->level <> 2 )
      {
        return redirect('pangkat/admin');
      }

      $data['sidebar'] = "usul_pangkat";
      $data['msidebar'] = "jft";
      $data['jen_kp'] = "2";
      $bl = date("m");
      $th = date("Y");
      $per_bl = session()->get('per');
      $per_th = session()->get('thn');
      if(session()->get('per')=="" || session()->get('thn')=="")
      {
        if($bl <= 4)
          {
            $per_bl = 4;
            $per_th = $th;
          }
          elseif($bl <=10)
            {
              $per_bl = 10 ;
              $per_th = $th;
            } else
            {
              $per_bl = 4;
              $per_th = $th+1;
            }
    }
    $verif = opd::find(Auth::user()->OPD);
    $data['ukp'] = z_pangkat::leftjoin('z_pangkat_jeniskps','jenis_kp','=','id_jenis_kp')->leftjoin('opds','opd','=','id_opd')->leftjoin('z_pangkat_statuss','verifikasi','=','kd_status')->whereRaw('(opd = '.Auth::user()->OPD.' or parent = '.Auth::user()->OPD.')')->where('per_bln','=',$per_bl)->where('per_thn','=',$per_th)->where('jenis_kp','=',$data['jen_kp'])->where('verifikasi','>=',$verif->tingkat)->get();
//return $data['ukp'];
      return view('pangkat.isi.jft',$data);
    }

    public function struk()
    {
      if(Auth::user()->level <> 2 )
      {
        return redirect('pangkat/admin');
      }

      $data['sidebar'] = "usul_pangkat";
      $data['msidebar'] = "struk";
      $data['jen_kp'] = "3";
      $bl = date("m");
      $th = date("Y");
      $per_bl = session()->get('per');
      $per_th = session()->get('thn');
      if(session()->get('per')=="" || session()->get('thn')=="")
      {
        if($bl <= 4)
          {
            $per_bl = 4;
            $per_th = $th;
          }
          elseif($bl <=10)
            {
              $per_bl = 10 ;
              $per_th = $th;
            } else
            {
              $per_bl = 4;
              $per_th = $th+1;
            }
    }
    $verif = opd::find(Auth::user()->OPD);
    $data['ukp'] = z_pangkat::leftjoin('z_pangkat_jeniskps','jenis_kp','=','id_jenis_kp')->leftjoin('opds','opd','=','id_opd')->leftjoin('z_pangkat_statuss','verifikasi','=','kd_status')->whereRaw('(opd = '.Auth::user()->OPD.' or parent = '.Auth::user()->OPD.')')->where('per_bln','=',$per_bl)->where('per_thn','=',$per_th)->where('jenis_kp','=',$data['jen_kp'])->where('verifikasi','>=',$verif->tingkat)->get();
//return $data['ukp'];
      return view('pangkat.isi.struk',$data);
    }

    public function pi_jfu()
    {
      if(Auth::user()->level <> 2 )
      {
        return redirect('pangkat/admin');
      }

      $data['sidebar'] = "usul_pangkat";
      $data['msidebar'] = "pi_jfu";
      $data['jen_kp'] = "4";
      $bl = date("m");
      $th = date("Y");
      $per_bl = session()->get('per');
      $per_th = session()->get('thn');
      if(session()->get('per')=="" || session()->get('thn')=="")
      {
        if($bl <= 4)
          {
            $per_bl = 4;
            $per_th = $th;
          }
          elseif($bl <=10)
            {
              $per_bl = 10 ;
              $per_th = $th;
            } else
            {
              $per_bl = 4;
              $per_th = $th+1;
            }
    }
    $verif = opd::find(Auth::user()->OPD);
    $data['ukp'] = z_pangkat::leftjoin('z_pangkat_jeniskps','jenis_kp','=','id_jenis_kp')->leftjoin('opds','opd','=','id_opd')->leftjoin('z_pangkat_statuss','verifikasi','=','kd_status')->whereRaw('(opd = '.Auth::user()->OPD.' or parent = '.Auth::user()->OPD.')')->where('per_bln','=',$per_bl)->where('per_thn','=',$per_th)->where('jenis_kp','=',$data['jen_kp'])->where('verifikasi','>=',$verif->tingkat)->get();
//return $data['ukp'];
      return view('pangkat.isi.pi_jfu',$data);
    }

    public function pi_jft()
    {
      if(Auth::user()->level <> 2 )
      {
        return redirect('pangkat/admin');
      }

      $data['sidebar'] = "usul_pangkat";
      $data['msidebar'] = "pi_jft";
      $data['jen_kp'] = "5";
      $bl = date("m");
      $th = date("Y");
      $per_bl = session()->get('per');
      $per_th = session()->get('thn');
      if(session()->get('per')=="" || session()->get('thn')=="")
      {
        if($bl <= 4)
          {
            $per_bl = 4;
            $per_th = $th;
          }
          elseif($bl <=10)
            {
              $per_bl = 10 ;
              $per_th = $th;
            } else
            {
              $per_bl = 4;
              $per_th = $th+1;
            }
    }
    $verif = opd::find(Auth::user()->OPD);
    $data['ukp'] = z_pangkat::leftjoin('z_pangkat_jeniskps','jenis_kp','=','id_jenis_kp')->leftjoin('opds','opd','=','id_opd')->leftjoin('z_pangkat_statuss','verifikasi','=','kd_status')->whereRaw('(opd = '.Auth::user()->OPD.' or parent = '.Auth::user()->OPD.')')->where('per_bln','=',$per_bl)->where('per_thn','=',$per_th)->where('jenis_kp','=',$data['jen_kp'])->where('verifikasi','>=',$verif->tingkat)->get();
//return $data['ukp'];
      return view('pangkat.isi.pi_jft',$data);
    }


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function uploadreg($id)
    {
      if(Auth::user()->level <> 2 )
      {
        return redirect('pangkat/admin');
      }

      $data['pns'] = z_pangkat::find($id);
      $data['jenis_kp'] = z_pangkat_jeniskp::find($data['pns']->jenis_kp);
      $data['sidebar'] = "usul_pangkat";
      $data['msidebar'] = red_jeniskp($data['pns']->jenis_kp);

//      session()->put('id',$id);
//      return $data['pns']; die;
//      $data['berkas'] = z_pangkat_upload::where("id_usul","=",$id)->get();
      $data['berkas_cpns'] = z_pangkat_b_cpns::where("id_usul","=",$id)->get();
      $data['berkas_pns'] = z_pangkat_b_pns::where("id_usul","=",$id)->get();
      $data['berkas_pangkat'] = z_pangkat_b_pangkat::where("id_usul","=",$id)->orderby("golongan","DESC")->get();
      $data['berkas_ijazah'] = z_pangkat_b_ijazah::leftjoin("ijazahs","kd_ijazah","=","id_ijazah")->where("id_usul","=",$id)->orderby("id_ijazah","DESC")->get();
      $data['berkas_transkrip'] = z_pangkat_b_transkrip::leftjoin("ijazahs","kd_ijazah","=","id_ijazah")->where("id_usul","=",$id)->orderby("id_ijazah","DESC")->get();
      $data['berkas_skp1'] = z_pangkat_b_skp::where("id_usul","=",$id)->where("tahun","=",session()->get('thn')-2)->get();
      $data['berkas_skp2'] = z_pangkat_b_skp::where("id_usul","=",$id)->where("tahun","=",session()->get('thn')-1)->get();
      $data['berkas_lain'] = z_pangkat_b_lain::leftjoin("dok_lains","kd_berkas","=","id_dok")->where("id_usul","=",$id)->where("ket","=",1)->get();
      $data['berkas_pak'] = z_pangkat_b_pak::where("id_usul","=",$id)->get();
      $data['berkas_jabfung'] = z_pangkat_b_lain::leftjoin("dok_lains","kd_berkas","=","id_dok")->where("id_usul","=",$id)->where("kd_berkas","=",12)->get();
      $data['berkas_jabstruk'] = z_pangkat_b_lain::leftjoin("dok_lains","kd_berkas","=","id_dok")->where("id_usul","=",$id)->where("kd_berkas","=",10)->get();
      $data['berkas_drj'] = z_pangkat_b_lain::leftjoin("dok_lains","kd_berkas","=","id_dok")->where("id_usul","=",$id)->where("kd_berkas","=",11)->get();
      $data['berkas_uraian'] = z_pangkat_b_lain::leftjoin("dok_lains","kd_berkas","=","id_dok")->where("id_usul","=",$id)->where("kd_berkas","=",17)->get();

  //    return $data['berkas_cpns'];
      return view('pangkat.isi.uploadreg',$data);
    }

    public function cekpnsreg(Request $request)
    {
      if(Auth::user()->level <> 2 )
      {
        return redirect('pangkat/admin');
      }

      $bl = date("m");
      $th = date("Y");
      $per_bl = session()->get('per');
      $per_th = session()->get('thn');
      if(session()->get('per')=="" || session()->get('thn')=="")
      {
        if($bl < 4)
          {
            $per_bl = 4;
            $per_th = $th;
          }
          elseif($bl <10)
            {
              $per_bl = 10 ;
              $per_th = $th;
            } else
            {
              $per_bl = 4;
              $per_th = $th+1;
            }
    }
      $data['ukp'] = z_pangkat::where('opd','=',Auth::user()->OPD)->where('per_bln','=',$per_bl)->where('per_thn','=',$per_th)->where('jenis_kp','=',$request->jenis_kp)->get();

      $nip = $request->nip;
      $data['sidebar'] = "usul_pangkat";
      $data['msidebar'] = red_jeniskp($request->jenis_kp);
      $data['pns'] = pns_sapk::where('nip_baru','=',$nip)->get();
      $data['jenis_kp'] =$request->jenis_kp;
      if(count($data['pns'])==0)
      {
        Alert::error('Data tidak ada, Mohon Konfirmasi BKPSDM', 'NIP tidak ada');
        return redirect('pangkat/'.red_jeniskp($request->jenis_kp));
      } else {
        return view('pangkat.isi.'.red_jeniskp($request->jenis_kp),$data);
      }
    }

    public function addpnsreg(Request $request)
    {
      $cek = z_pangkat::leftjoin('z_pangkat_jeniskps','jenis_kp','=','id_jenis_kp')->where('nip_baru','=',$request->nip_baru)->where('per_bln','=',session()->get('per'))->where('per_thn','=',session()->get('thn'))->get();
      if(count($cek) ==0){
      $reg = new z_pangkat();
      $reg->nip_baru = $request->nip_baru;
      $reg->glr_dpn = $request->glr_dpn;
      $reg->nama = $request->nama;
      $reg->glr_blk = $request->glr_blk;
      $reg->tempat_lahir = $request->tempat_lahir;
      $reg->tgl_lahir = $request->tgl_lahir;
      $reg->pendidikan = $request->pendidikan;
      $reg->lulus = $request->lulus;
      $reg->gol_awal = $request->gol_awal;
      $reg->gol_akhir = $request->gol_akhir;
      $reg->tmt_gol = $request->tmt_gol;
      $reg->nm_jabstruk = $request->nm_jabstruk;
      $reg->nm_jft  = $request->nm_jft;
      $reg->nm_jfu = $request->nm_jfu;
      $reg->unit_kerja = $request->unit_kerja;
      $reg->unit_kerja_induk = $request->unit_kerja_induk;
      $reg->maker_bl = $request->maker_bl;
      $reg->maker_th = $request->maker_th;

      $reg->jenis_kp = $request->jenis_kp;
      $reg->gol4 = $request->gol4;

      $reg->per_bln = $request->per_bln;
      $reg->per_thn = $request->per_thn;
      $reg->opd = $request->opd;
      $reg->verifikasi = $request->verifikasi;
      $reg->jenis_kp = $request->jenis_kp;
      $reg->save();

      $data_hist= z_pangkat::where('nip_baru','=',$request->nip_baru)->where('per_bln','=',session()->get('per'))->where('per_thn','=',session()->get('thn'))->get();
      history($data_hist[0]->id,$data_hist[0]->nip_baru,$data_hist[0]->nama,$data_hist[0]->per_bln,$data_hist[0]->per_thn,$data_hist[0]->jenis_kp,$data_hist[0]->opd,$request->verifikasi,"Usul Baru");

      Alert::success('PNS telah ditambah!');
      return redirect('pangkat/'.red_jeniskp($request->jenis_kp));
    } else {
      $pesan_opd = opd::find($cek[0]->opd);
      Alert::error('PNS sudah diusulkan oleh '.$pesan_opd->nm_opd.' pada Jenis '.$cek[0]->nm_jenis_kp)->persistent("Tutup");
      return redirect('pangkat/'.red_jeniskp($request->jenis_kp));
    }
    }


    public function naikreg(Request $request)
    {
        $date = gmdate("Y-m-d H:i:s", time()+60*60*7);
        $data = z_pangkat::find($request->id_pns);
        $data->verifikasi = $request->verifikasi+1;
        $data->save();
        history($data->id,$data->nip_baru,$data->nama,$data->per_bln,$data->per_thn,$data->jenis_kp,$data->opd,$request->verifikasi+1,"Naik 1 Tingkat diatasnya");
        return redirect('pangkat/'.red_jeniskp($data->jenis_kp));
    }

    public function daftar_usulan()
    {
      if(Auth::user()->level <> 2 )
      {
        return redirect('pangkat/admin');
      }

      $data['sidebar'] = "daftar_usulan";
      $data['msidebar'] = "";
      $cek_tingkat = \App\opd::find(Auth::user()->OPD);
      if($cek_tingkat->tingkat==0){
       $data['ukp'] = \App\z_pangkat::leftjoin('z_pangkat_jeniskps','jenis_kp','=','id_jenis_kp')->where('opd','=',Auth::user()->OPD)->where('per_bln','=',session()->get('per'))->where('per_thn','=',session()->get('thn'))->whereRaw('((verifikasi = 2) or (verifikasi = 1))')->get();
      } else {
       $data['ukp'] = \App\z_pangkat::where('opd','=',Auth::user()->OPD)->where('per_bln','=',session()->get('per'))->where('per_thn','=',session()->get('thn'))->where('verifikasi', '=', '2')->get();
      }
      return view('pangkat.isi.daftar_usulan',$data);
    }

    public function isi_catatan($id)
    {
        $data['pns'] = z_pangkat::find($id);
        return view ('pangkat.isi.form_catatan',$data);
    }
    public function catat(Request $request)
    {
        $data = z_pangkat::find($request->id);
        $data->catatan = $request->catatan;
        $data->save();
        return redirect ('pangkat/daftar_usulan');
    }

//////////////////////////////////////////////////////////////////CPNS//////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////CPNS//////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////CPNS//////////////////////////////////////////////////
    public function berkas_cpns_add($id)
    {
      if(Auth::user()->level <> 2 )
      {
        return redirect('pangkat/admin');
      }

      $data['sidebar'] = "usul_pangkat";
      $data['msidebar'] = "reguler";
      $data['berkas_cpns'] = "";
      $data['pns'] = z_pangkat::find($id);
      return view('pangkat.isi.berkas_cpns',$data);
    }

    public function berkas_cpns_edit($id)
    {
      if(Auth::user()->level <> 2 )
      {
        return redirect('pangkat/admin');
      }

      $data['sidebar'] = "usul_pangkat";
      $data['msidebar'] = "reguler";

      $data['berkas_cpns'] = z_pangkat_b_cpns::where("id","=",$id)->get();

      $data['pns'] = z_pangkat::find($data['berkas_cpns'][0]->id_usul);

      return view('pangkat.isi.berkas_cpns',$data);
    }

    public function upload_cpns(Request $request)
    {
      $this->validate($request,[
    			'no_sk' => 'required',
    			'tgl_sk' => 'required',
          'file' => 'required|mimes:pdf|max:2048'
    		],[
    			'no_sk.required' => ' Nomor SK CPNS Tidak Boleh Kosong ',
          'tgl_sk.required' => ' Nomor SK CPNS Tidak Boleh Kosong ',
          'file.required' => ' File Tidak Boleh Kosong ',
          'file.max' => ' Ukuran File Maksimal 2 MB ',
          'file.mimes' => ' File menggunakan PDF ',
    		]);


    //	dd('Berhasil Menambahkan SK CPNS.');

       $pangkat = z_pangkat::find($request->id);
       $data = new z_pangkat_b_cpns();
       $data->id_usul = $request->id;
       $data->tgl_sk = tgl_simpan($request->tgl_sk);
       $data->no_sk = $request->no_sk;
       $data->kd_berkas = $request->kd_berkas;
       $file = $request->file('file');
       $ext = $file->getClientOriginalExtension();
       $newName = "SK_CPNS_".$request->nip.".".$ext;
       if($pangkat->gol4 =="1") {
         $path = "storage/files"."/".$pangkat->per_thn."/".$pangkat->per_bln."/6/".$pangkat->nip_baru." - ".$pangkat->nama;
       }else{
         $path = "storage/files"."/".$pangkat->per_thn."/".$pangkat->per_bln."/".$pangkat->jenis_kp."/".$pangkat->nip_baru." - ".$pangkat->nama;
       }
       $file->move(public_path($path),$newName);
       $data->filename = $newName;
       $data->lokasi = $path."/".$newName;

       $data->save();
       return redirect('pangkat/uploadreg/'.$data->id_usul)->with('alert-success','Dokumen SK CPNS telah ditambahkan!');
    }

    public function upload_update_cpns(Request $request)
    {
      $this->validate($request,[
          'no_sk' => 'required',
          'tgl_sk' => 'required',
          'file' => 'mimes:pdf|max:2048'
        ],[
          'no_sk.required' => ' Nomor SK CPNS Tidak Boleh Kosong ',
          'tgl_sk.required' => ' Nomor SK CPNS Tidak Boleh Kosong ',
          'file.max' => ' Ukuran File Maksimal 2 MB ',
          'file.mimes' => ' File menggunakan PDF ',
        ]);
         $data = z_pangkat_b_cpns::find($request->id);
         $pangkat = z_pangkat::find($data->id_usul);
         $data->tgl_sk = tgl_simpan($request->tgl_sk);
         $data->no_sk = $request->no_sk;
         if (empty($request->file('file'))){
             $data->filename = $data->filename;
         }
         else{
           if($pangkat->gol4 =="1") {
             $path = "storage/files"."/".$pangkat->per_thn."/".$pangkat->per_bln."/6/".$pangkat->nip_baru." - ".$pangkat->nama;
           }else{
             $path = "storage/files"."/".$pangkat->per_thn."/".$pangkat->per_bln."/".$pangkat->jenis_kp."/".$pangkat->nip_baru." - ".$pangkat->nama;
           }
             unlink(public_path($data->lokasi)); //menghapus file lama
             $file = $request->file('file');
             $ext = $file->getClientOriginalExtension();
             $newName = "SK_CPNS_".$request->nip.".".$ext;
             $file->move(public_path($path),$newName);
             $data->filename = $newName;
             $data->lokasi = $path."/".$newName;
         }
         $data->save();
         return redirect('pangkat/uploadreg/'.$data->id_usul)->with('alert-success','data Dokumen SK CPNS telah diubah!');

    }


    ///////////////////////////////////////////////////////////////////PNS//////////////////////////////////////////////////
        public function berkas_pns_add($id)
        {
          if(Auth::user()->level <> 2 )
          {
            return redirect('pangkat/admin');
          }

          $data['sidebar'] = "usul_pangkat";
          $data['msidebar'] = "reguler";
          $data['berkas_pns'] = "";
          $data['pns'] = z_pangkat::find($id);
          return view('pangkat.isi.berkas_pns',$data);
        }

        public function berkas_pns_edit($id)
        {
          if(Auth::user()->level <> 2 )
          {
            return redirect('pangkat/admin');
          }

          $data['sidebar'] = "usul_pangkat";
          $data['msidebar'] = "reguler";

          $data['berkas_pns'] = z_pangkat_b_pns::where("id","=",$id)->get();

          $data['pns'] = z_pangkat::find($data['berkas_pns'][0]->id_usul);

          return view('pangkat.isi.berkas_pns',$data);
        }

        public function upload_pns(Request $request)
        {
          $this->validate($request,[
        			'no_sk' => 'required',
        			'tgl_sk' => 'required',
              'no_suket_sehat' => 'required',
              'tgl_suket_sehat' => 'required',
              'no_sttpl_prajab' => 'required',
              'tgl_sttpl_prajab' => 'required',
              'file' => 'required|mimes:pdf|max:2048'
        		],[
        			'no_sk.required' => ' Nomor SK PNS Tidak Boleh Kosong ',
              'tgl_sk.required' => ' Tanggal SK PNS Tidak Boleh Kosong ',
              'no_suket_sehat.required' => ' Nomor Surat Keterangan Sehat Tidak Boleh Kosong ',
              'tgl_suket_sehat.required' => ' Tanggal Surat Keterangan Sehat Tidak Boleh Kosong ',
              'no_sttpl_prajab.required' => ' Nomor STTPL Prajabatan Tidak Boleh Kosong ',
              'tgl_sttpl_prajab.required' => ' Tanggal STTPL Prajabatan Tidak Boleh Kosong ',
              'file.required' => ' File Tidak Boleh Kosong ',
              'file.max' => ' Ukuran File Maksimal 2 MB ',
              'file.mimes' => ' File menggunakan PDF ',
        		]);


        //	dd('Berhasil Menambahkan SK CPNS.');

           $pangkat = z_pangkat::find($request->id);
           $data = new z_pangkat_b_pns();
           $data->id_usul = $request->id;
           $data->tgl_sk = tgl_simpan($request->tgl_sk);
           $data->no_sk = $request->no_sk;
           $data->no_suket_sehat = $request->no_suket_sehat;
           $data->tgl_suket_sehat = tgl_simpan($request->tgl_suket_sehat);
           $data->no_sttpl_prajab = $request->no_sttpl_prajab;
           $data->tgl_sttpl_prajab = tgl_simpan($request->tgl_sttpl_prajab);
           $data->kd_berkas = $request->kd_berkas;
           $file = $request->file('file');
           $ext = $file->getClientOriginalExtension();
           $newName = "SK_PNS_".$request->nip.".".$ext;
           if($pangkat->gol4 =="1") {
             $path = "storage/files"."/".$pangkat->per_thn."/".$pangkat->per_bln."/6/".$pangkat->nip_baru." - ".$pangkat->nama;
           }else{
             $path = "storage/files"."/".$pangkat->per_thn."/".$pangkat->per_bln."/".$pangkat->jenis_kp."/".$pangkat->nip_baru." - ".$pangkat->nama;
           }
           $file->move(public_path($path),$newName);
           $data->filename = $newName;
           $data->lokasi = $path."/".$newName;
           $data->save();
           return redirect('pangkat/uploadreg/'.$data->id_usul)->with('alert-success','Dokumen SK PNS telah ditambahkan!');
        }

        public function upload_update_pns(Request $request)
        {
          $this->validate($request,[
        			'no_sk' => 'required',
        			'tgl_sk' => 'required',
              'no_suket_sehat' => 'required',
              'tgl_suket_sehat' => 'required',
              'no_sttpl_prajab' => 'required',
              'tgl_sttpl_prajab' => 'required',
              'file' => 'mimes:pdf|max:2048'
        		],[
        			'no_sk.required' => ' Nomor SK PNS Tidak Boleh Kosong ',
              'tgl_sk.required' => ' Tanggal SK PNS Tidak Boleh Kosong ',
              'no_suket_sehat.required' => ' Nomor Surat Keterangan Sehat Tidak Boleh Kosong ',
              'tgl_suket_sehat.required' => ' Tanggal Surat Keterangan Sehat Tidak Boleh Kosong ',
              'no_sttpl_prajab.required' => ' Nomor STTPL Prajabatan Tidak Boleh Kosong ',
              'tgl_sttpl_prajab.required' => ' Tanggal STTPL Prajabatan Tidak Boleh Kosong ',
              'file.max' => ' Ukuran File Maksimal 2 MB ',
              'file.mimes' => ' File menggunakan PDF ',
        		]);

             $data = z_pangkat_b_pns::find($request->id);
             $pangkat = z_pangkat::find($data->id_usul);
             $data->tgl_sk = tgl_simpan($request->tgl_sk);
             $data->no_sk = $request->no_sk;
             $data->no_suket_sehat = $request->no_suket_sehat;
             $data->tgl_suket_sehat = tgl_simpan($request->tgl_suket_sehat);
             $data->no_sttpl_prajab = $request->no_sttpl_prajab;
             $data->tgl_sttpl_prajab = tgl_simpan($request->tgl_sttpl_prajab);
             if (empty($request->file('file'))){
                 $data->filename = $data->filename;
             }
             else{
               if($pangkat->gol4 =="1") {
                 $path = "storage/files"."/".$pangkat->per_thn."/".$pangkat->per_bln."/6/".$pangkat->nip_baru." - ".$pangkat->nama;
               }else{
                 $path = "storage/files"."/".$pangkat->per_thn."/".$pangkat->per_bln."/".$pangkat->jenis_kp."/".$pangkat->nip_baru." - ".$pangkat->nama;
               }
                 unlink(public_path($data->filename)); //menghapus file lama
                 $file = $request->file('file');
                 $ext = $file->getClientOriginalExtension();
                 $newName = "SK_PNS_".$request->nip.".".$ext;
                 $file->move(public_path($path),$newName);
                 $data->filename = $newName;
                 $data->lokasi = $path."/".$newName;
             }
             $data->save();
             return redirect('pangkat/uploadreg/'.$data->id_usul)->with('alert-success','data Dokumen SK PNS telah diubah!');

        }

        ///////////////////////////////////////////////////////////////////SKP1//////////////////////////////////////////////////
            public function berkas_skp1_add($id)
            {
              if(Auth::user()->level <> 2 )
              {
                return redirect('pangkat/admin');
              }

              $data['sidebar'] = "usul_pangkat";
              $data['msidebar'] = "reguler";
              $data['berkas_skp1'] = "";
              $data['pns'] = z_pangkat::find($id);
              return view('pangkat.isi.berkas_skp1',$data);
            }

            public function berkas_skp1_edit($id)
            {
              if(Auth::user()->level <> 2 )
              {
                return redirect('pangkat/admin');
              }
              $data['sidebar'] = "usul_pangkat";
              $data['msidebar'] = "reguler";

              $data['berkas_skp1'] = z_pangkat_b_skp::where("id","=",$id)->get();

              $data['pns'] = z_pangkat::find($data['berkas_skp1'][0]->id_usul);

              return view('pangkat.isi.berkas_skp1',$data);
            }

            public function upload_skp1(Request $request)
            {
              $this->validate($request,[
              'jab_pns' => 'required',
              'skp' => 'required|numeric|min:76',
              'o_pelayanan' => 'required|numeric|min:76',
              'integritas' => 'required|numeric|min:76',
              'komitmen' => 'required|numeric|min:76',
              'disiplin' => 'required|numeric|min:76',
              'kerjasama' => 'required|numeric|min:76',
              'nip_pjb' => 'required',
              'nip_pjb_ats' => 'required',
              'jab_pjb' => 'required',
              'jab_pjb_ats' => 'required',
              'unker_pjb' => 'required',
              'unker_pjb_ats' => 'required',
              'gol_pjb' => 'required',
              'gol_pjb_ats' => 'required',
              'tmt_pjb' => 'required',
              'tmt_pjb_ats' => 'required',
              'file' => 'required|mimes:pdf|max:2048'
            ],[
              'jab_pns.required' => ' Jabatan PNS Tidak Boleh Kosong ',
              'skp.required' => ' Nilai Capaian SKP Tidak Boleh Kosong ',
              'o_pelayanan.required' => ' Nilai Orientasi Pelayanan Tidak Boleh Kosong ',
              'integritas.required' => ' Nilai Integritas Tidak Boleh Kosong ',
              'komitmen.required' => ' Nilai Komitmen Tidak Boleh Kosong ',
              'disiplin.required' => ' Nilai Disiplin Tidak Boleh Kosong ',
              'kerjasama.required' => ' Nilai Kerjasama Tidak Boleh Kosong ',
              'nip_pjb.required' => ' NIP Pejabat Penilai Tidak Boleh Kosong ',
              'nip_pjb_ats.required' => ' NIP Atasan Pejabat Penilai Tidak Boleh Kosong ',
              'jab_pjb.required' => ' Jabatan Pejabat Penilai Tidak Boleh Kosong ',
              'jab_pjb_ats.required' => ' Jabatan Atasan Pejabat Penilai Tidak Boleh Kosong ',
              'unker_pjb.required' => ' Unit Kerja Pejabat Penilai Tidak Boleh Kosong ',
              'unker_pjb_ats.required' => ' Unit Kerja Atasan Pejabat Penilai Tidak Boleh Kosong ',
              'gol_pjb.required' => ' Golongan Pejabat Penilai Tidak Boleh Kosong ',
              'gol_pjb_ats.required' => ' Golongan Atasan Pejabat Penilai Tidak Boleh Kosong ',
              'tmt_pjb.required' => ' TMT Golongan Pejabat Penilai Tidak Boleh Kosong ',
              'tmt_pjb_ats.required' => ' TMT Golongan Atasan Pejabat Penilai Tidak Boleh Kosong ',

              'skp.numeric' => ' Nilai Capaian SKP Harus Angka ',
              'o_pelayanan.numeric' => ' Nilai Orientasi Pelayanan Harus Angka ',
              'integritas.numeric' => ' Nilai Integritas Harus Angka ',
              'komitmen.numeric' => ' Nilai Komitmen Harus Angka ',
              'disiplin.numeric' => ' Nilai Disiplin Harus Angka ',
              'kerjasama.numeric' => ' Nilai Kerjasama Harus Angka ',

              'skp.min' => ' Nilai Capaian SKP Minimal 76 ',
              'o_pelayanan.min' => ' Nilai Orientasi Pelayanan Minimal 76 ',
              'integritas.min' => ' Nilai Integritas Minimal 76 ',
              'komitmen.min' => ' Nilai Komitmen Minimal 76 ',
              'disiplin.min' => ' Nilai Disiplin Minimal 76 ',
              'kerjasama.min' => ' Nilai Kerjasama Minimal 76 ',
              'kepemimpinan.min' => ' Nilai Kepemimpinan Minimal 76 ',

              'file.required' => ' File Tidak Boleh Kosong ',
              'file.max' => ' Ukuran File Maksimal 2 MB ',
              'file.mimes' => ' File menggunakan PDF ',
            ]);

            //	dd('Berhasil Menambahkan SK CPNS.');

               $pangkat = z_pangkat::find($request->id);
               $data = new z_pangkat_b_skp();
               $data->id_usul = $request->id;
               $data->tahun = $request->tahun;
               $data->jab_pns = $request->jab_pns;
               $data->skp = $request->skp;
               $data->o_pelayanan = $request->o_pelayanan;
               $data->integritas = $request->integritas;
               $data->komitmen = $request->komitmen;
               $data->disiplin = $request->disiplin;
               $data->kerjasama = $request->kerjasama;
               $data->kepemimpinan = $request->kepemimpinan;
               $data->jumlah = $request->jumlah;
               $data->rata2 = $request->rata2;
               $data->rata240 = $request->rata240;
               $data->skp60 = $request->skp60;
               $data->total = $request->total;
               $data->nip_pjb = $request->nip_pjb;
               $data->jab_pjb = $request->jab_pjb;
               $data->unker_pjb = $request->unker_pjb;
               $data->gol_pjb = $request->gol_pjb;
               $data->tmt_pjb = tgl_simpan($request->tmt_pjb);
               $data->nip_pjb_ats = $request->nip_pjb_ats;
               $data->jab_pjb_ats = $request->jab_pjb_ats;
               $data->unker_pjb_ats = $request->unker_pjb_ats;
               $data->gol_pjb_ats = $request->gol_pjb_ats;
               $data->tmt_pjb_ats = tgl_simpan($request->tmt_pjb_ats);
               $data->kd_berkas = $request->kd_berkas;

               $file = $request->file('file');
               $ext = $file->getClientOriginalExtension();
               $newName = "SKP_".$request->tahun."_".$request->nip.".".$ext;
               if($pangkat->gol4 =="1") {
                 $path = "storage/files"."/".$pangkat->per_thn."/".$pangkat->per_bln."/6/".$pangkat->nip_baru." - ".$pangkat->nama;
               }else{
                 $path = "storage/files"."/".$pangkat->per_thn."/".$pangkat->per_bln."/".$pangkat->jenis_kp."/".$pangkat->nip_baru." - ".$pangkat->nama;
               }
               $file->move(public_path($path),$newName);
               $data->filename = $newName;
               $data->lokasi = $path."/".$newName;
               $data->save();
               return redirect('pangkat/uploadreg/'.$data->id_usul)->with('alert-success','Dokumen SKP Tahun '.$request->tahun.' telah ditambahkan!');
            }

            public function upload_update_skp1(Request $request)
            {
              $this->validate($request,[
              'jab_pns' => 'required',
              'skp' => 'required|numeric|min:76',
              'o_pelayanan' => 'required|numeric|min:76',
              'integritas' => 'required|numeric|min:76',
              'komitmen' => 'required|numeric|min:76',
              'disiplin' => 'required|numeric|min:76',
              'kerjasama' => 'required|numeric|min:76',
              'nip_pjb' => 'required',
              'nip_pjb_ats' => 'required',
              'jab_pjb' => 'required',
              'jab_pjb_ats' => 'required',
              'unker_pjb' => 'required',
              'unker_pjb_ats' => 'required',
              'gol_pjb' => 'required',
              'gol_pjb_ats' => 'required',
              'tmt_pjb' => 'required',
              'tmt_pjb_ats' => 'required',
              'file' => 'mimes:pdf|max:2048'
            ],[
              'jab_pns.required' => ' Jabatan PNS Tidak Boleh Kosong ',
              'skp.required' => ' Nilai Capaian SKP Tidak Boleh Kosong ',
              'o_pelayanan.required' => ' Nilai Orientasi Pelayanan Tidak Boleh Kosong ',
              'integritas.required' => ' Nilai Integritas Tidak Boleh Kosong ',
              'komitmen.required' => ' Nilai Komitmen Tidak Boleh Kosong ',
              'disiplin.required' => ' Nilai Disiplin Tidak Boleh Kosong ',
              'kerjasama.required' => ' Nilai Kerjasama Tidak Boleh Kosong ',
              'nip_pjb.required' => ' NIP Pejabat Penilai Tidak Boleh Kosong ',
              'nip_pjb_ats.required' => ' NIP Atasan Pejabat Penilai Tidak Boleh Kosong ',
              'jab_pjb.required' => ' Jabatan Pejabat Penilai Tidak Boleh Kosong ',
              'jab_pjb_ats.required' => ' Jabatan Atasan Pejabat Penilai Tidak Boleh Kosong ',
              'unker_pjb.required' => ' Unit Kerja Pejabat Penilai Tidak Boleh Kosong ',
              'unker_pjb_ats.required' => ' Unit Kerja Atasan Pejabat Penilai Tidak Boleh Kosong ',
              'gol_pjb.required' => ' Golongan Pejabat Penilai Tidak Boleh Kosong ',
              'gol_pjb_ats.required' => ' Golongan Atasan Pejabat Penilai Tidak Boleh Kosong ',
              'tmt_pjb.required' => ' TMT Golongan Pejabat Penilai Tidak Boleh Kosong ',
              'tmt_pjb_ats.required' => ' TMT Golongan Atasan Pejabat Penilai Tidak Boleh Kosong ',

              'skp.numeric' => ' Nilai Capaian SKP Harus Angka ',
              'o_pelayanan.numeric' => ' Nilai Orientasi Pelayanan Harus Angka ',
              'integritas.numeric' => ' Nilai Integritas Harus Angka ',
              'komitmen.numeric' => ' Nilai Komitmen Harus Angka ',
              'disiplin.numeric' => ' Nilai Disiplin Harus Angka ',
              'kerjasama.numeric' => ' Nilai Kerjasama Harus Angka ',

              'skp.min' => ' Nilai Capaian SKP Minimal 76 ',
              'o_pelayanan.min' => ' Nilai Orientasi Pelayanan Minimal 76 ',
              'integritas.min' => ' Nilai Integritas Minimal 76 ',
              'komitmen.min' => ' Nilai Komitmen Minimal 76 ',
              'disiplin.min' => ' Nilai Disiplin Minimal 76 ',
              'kerjasama.min' => ' Nilai Kerjasama Minimal 76 ',
              'kepemimpinan.min' => ' Nilai Kepemimpinan Minimal 76 ',

              'file.max' => ' Ukuran File Maksimal 2 MB ',
              'file.mimes' => ' File menggunakan PDF ',
            ]);

                 $data = z_pangkat_b_skp::find($request->id);
                 $pangkat = z_pangkat::find($data->id_usul);
                 $data->tahun = $request->tahun;
                 $data->jab_pns = $request->jab_pns;
                 $data->skp = $request->skp;
                 $data->o_pelayanan = $request->o_pelayanan;
                 $data->integritas = $request->integritas;
                 $data->komitmen = $request->komitmen;
                 $data->disiplin = $request->disiplin;
                 $data->kerjasama = $request->kerjasama;
                 $data->kepemimpinan = $request->kepemimpinan;
                 $data->jumlah = $request->jumlah;
                 $data->rata2 = $request->rata2;
                 $data->rata240 = $request->rata240;
                 $data->skp60 = $request->skp60;
                 $data->total = $request->total;
                 $data->nip_pjb = $request->nip_pjb;
                 $data->jab_pjb = $request->jab_pjb;
                 $data->unker_pjb = $request->unker_pjb;
                 $data->gol_pjb = $request->gol_pjb;
                 $data->tmt_pjb = tgl_simpan($request->tmt_pjb);
                 $data->nip_pjb_ats = $request->nip_pjb_ats;
                 $data->jab_pjb_ats = $request->jab_pjb_ats;
                 $data->unker_pjb_ats = $request->unker_pjb_ats;
                 $data->gol_pjb_ats = $request->gol_pjb_ats;
                 $data->tmt_pjb_ats = tgl_simpan($request->tmt_pjb_ats);

                 if (empty($request->file('file'))){
                     $data->filename = $data->filename;
                 }
                 else{
                   if($pangkat->gol4 =="1") {
                     $path = "storage/files"."/".$pangkat->per_thn."/".$pangkat->per_bln."/6/".$pangkat->nip_baru." - ".$pangkat->nama;
                   }else{
                     $path = "storage/files"."/".$pangkat->per_thn."/".$pangkat->per_bln."/".$pangkat->jenis_kp."/".$pangkat->nip_baru." - ".$pangkat->nama;
                   }

                     unlink(public_path($data->lokasi)); //menghapus file lama
                     $file = $request->file('file');
                     $ext = $file->getClientOriginalExtension();
                     $newName = "SKP_".$request->tahun."_".$request->nip.".".$ext;
                     $file->move(public_path($path),$newName);
                     $data->filename = $newName;
                     $data->lokasi = $path."/".$newName;
                 }
                 $data->save();
                 return redirect('pangkat/uploadreg/'.$data->id_usul)->with('alert-success','data Dokumen SKP Tahun '.$request->tahun.' telah diubah!');

            }

            ///////////////////////////////////////////////////////////////////skp2//////////////////////////////////////////////////
                public function berkas_skp2_add($id)
                {
                  if(Auth::user()->level <> 2 )
                  {
                    return redirect('pangkat/admin');
                  }

                  $data['sidebar'] = "usul_pangkat";
                  $data['msidebar'] = "reguler";
                  $data['berkas_skp2'] = "";
                  $data['pns'] = z_pangkat::find($id);
                  return view('pangkat.isi.berkas_skp2',$data);
                }

                public function berkas_skp2_edit($id)
                {
                  if(Auth::user()->level <> 2 )
                  {
                    return redirect('pangkat/admin');
                  }
                  $data['sidebar'] = "usul_pangkat";
                  $data['msidebar'] = "reguler";

                  $data['berkas_skp2'] = z_pangkat_b_skp::where("id","=",$id)->get();

                  $data['pns'] = z_pangkat::find($data['berkas_skp2'][0]->id_usul);

                  return view('pangkat.isi.berkas_skp2',$data);
                }

                public function upload_skp2(Request $request)
                {
                  $this->validate($request,[
                  'jab_pns' => 'required',
                  'skp' => 'required|numeric|min:76',
                  'o_pelayanan' => 'required|numeric|min:76',
                  'integritas' => 'required|numeric|min:76',
                  'komitmen' => 'required|numeric|min:76',
                  'disiplin' => 'required|numeric|min:76',
                  'kerjasama' => 'required|numeric|min:76',
                  'nip_pjb' => 'required',
                  'nip_pjb_ats' => 'required',
                  'jab_pjb' => 'required',
                  'jab_pjb_ats' => 'required',
                  'unker_pjb' => 'required',
                  'unker_pjb_ats' => 'required',
                  'gol_pjb' => 'required',
                  'gol_pjb_ats' => 'required',
                  'tmt_pjb' => 'required',
                  'tmt_pjb_ats' => 'required',
                  'file' => 'required|mimes:pdf|max:2048'
                ],[
                  'jab_pns.required' => ' Jabatan PNS Tidak Boleh Kosong ',
                  'skp.required' => ' Nilai Capaian SKP Tidak Boleh Kosong ',
                  'o_pelayanan.required' => ' Nilai Orientasi Pelayanan Tidak Boleh Kosong ',
                  'integritas.required' => ' Nilai Integritas Tidak Boleh Kosong ',
                  'komitmen.required' => ' Nilai Komitmen Tidak Boleh Kosong ',
                  'disiplin.required' => ' Nilai Disiplin Tidak Boleh Kosong ',
                  'kerjasama.required' => ' Nilai Kerjasama Tidak Boleh Kosong ',
                  'nip_pjb.required' => ' NIP Pejabat Penilai Tidak Boleh Kosong ',
                  'nip_pjb_ats.required' => ' NIP Atasan Pejabat Penilai Tidak Boleh Kosong ',
                  'jab_pjb.required' => ' Jabatan Pejabat Penilai Tidak Boleh Kosong ',
                  'jab_pjb_ats.required' => ' Jabatan Atasan Pejabat Penilai Tidak Boleh Kosong ',
                  'unker_pjb.required' => ' Unit Kerja Pejabat Penilai Tidak Boleh Kosong ',
                  'unker_pjb_ats.required' => ' Unit Kerja Atasan Pejabat Penilai Tidak Boleh Kosong ',
                  'gol_pjb.required' => ' Golongan Pejabat Penilai Tidak Boleh Kosong ',
                  'gol_pjb_ats.required' => ' Golongan Atasan Pejabat Penilai Tidak Boleh Kosong ',
                  'tmt_pjb.required' => ' TMT Golongan Pejabat Penilai Tidak Boleh Kosong ',
                  'tmt_pjb_ats.required' => ' TMT Golongan Atasan Pejabat Penilai Tidak Boleh Kosong ',

                  'skp.numeric' => ' Nilai Capaian SKP Harus Angka ',
                  'o_pelayanan.numeric' => ' Nilai Orientasi Pelayanan Harus Angka ',
                  'integritas.numeric' => ' Nilai Integritas Harus Angka ',
                  'komitmen.numeric' => ' Nilai Komitmen Harus Angka ',
                  'disiplin.numeric' => ' Nilai Disiplin Harus Angka ',
                  'kerjasama.numeric' => ' Nilai Kerjasama Harus Angka ',

                  'skp.min' => ' Nilai Capaian SKP Minimal 76 ',
                  'o_pelayanan.min' => ' Nilai Orientasi Pelayanan Minimal 76 ',
                  'integritas.min' => ' Nilai Integritas Minimal 76 ',
                  'komitmen.min' => ' Nilai Komitmen Minimal 76 ',
                  'disiplin.min' => ' Nilai Disiplin Minimal 76 ',
                  'kerjasama.min' => ' Nilai Kerjasama Minimal 76 ',
                  'kepemimpinan.min' => ' Nilai Kepemimpinan Minimal 76 ',

                  'file.required' => ' File Tidak Boleh Kosong ',
                  'file.max' => ' Ukuran File Maksimal 2 MB ',
                  'file.mimes' => ' File menggunakan PDF ',
                ]);

                //	dd('Berhasil Menambahkan SK CPNS.');

                   $pangkat = z_pangkat::find($request->id);
                   $data = new z_pangkat_b_skp();
                   $data->id_usul = $request->id;
                   $data->tahun = $request->tahun;
                   $data->jab_pns = $request->jab_pns;
                   $data->skp = $request->skp;
                   $data->o_pelayanan = $request->o_pelayanan;
                   $data->integritas = $request->integritas;
                   $data->komitmen = $request->komitmen;
                   $data->disiplin = $request->disiplin;
                   $data->kerjasama = $request->kerjasama;
                   $data->kepemimpinan = $request->kepemimpinan;
                   $data->jumlah = $request->jumlah;
                   $data->rata2 = $request->rata2;
                   $data->rata240 = $request->rata240;
                   $data->skp60 = $request->skp60;
                   $data->total = $request->total;
                   $data->nip_pjb = $request->nip_pjb;
                   $data->jab_pjb = $request->jab_pjb;
                   $data->unker_pjb = $request->unker_pjb;
                   $data->gol_pjb = $request->gol_pjb;
                   $data->tmt_pjb = tgl_simpan($request->tmt_pjb);
                   $data->nip_pjb_ats = $request->nip_pjb_ats;
                   $data->jab_pjb_ats = $request->jab_pjb_ats;
                   $data->unker_pjb_ats = $request->unker_pjb_ats;
                   $data->gol_pjb_ats = $request->gol_pjb_ats;
                   $data->tmt_pjb_ats = tgl_simpan($request->tmt_pjb_ats);
                   $data->kd_berkas = $request->kd_berkas;

                   $file = $request->file('file');
                   $ext = $file->getClientOriginalExtension();
                   $newName = "SKP_".$request->tahun."_".$request->nip.".".$ext;
                   if($pangkat->gol4 =="1") {
                     $path = "storage/files"."/".$pangkat->per_thn."/".$pangkat->per_bln."/6/".$pangkat->nip_baru." - ".$pangkat->nama;
                   }else{
                     $path = "storage/files"."/".$pangkat->per_thn."/".$pangkat->per_bln."/".$pangkat->jenis_kp."/".$pangkat->nip_baru." - ".$pangkat->nama;
                   }
                   $file->move(public_path($path),$newName);
                   $data->filename = $newName;
                   $data->lokasi = $path."/".$newName;
                   $data->save();
                   return redirect('pangkat/uploadreg/'.$data->id_usul)->with('alert-success','Dokumen SKP Tahun '.$request->tahun.' telah ditambahkan!');
                }

                public function upload_update_skp2(Request $request)
                {
                  $this->validate($request,[
                  'jab_pns' => 'required',
                  'skp' => 'required|numeric|min:76',
                  'o_pelayanan' => 'required|numeric|min:76',
                  'integritas' => 'required|numeric|min:76',
                  'komitmen' => 'required|numeric|min:76',
                  'disiplin' => 'required|numeric|min:76',
                  'kerjasama' => 'required|numeric|min:76',
                  'nip_pjb' => 'required',
                  'nip_pjb_ats' => 'required',
                  'jab_pjb' => 'required',
                  'jab_pjb_ats' => 'required',
                  'unker_pjb' => 'required',
                  'unker_pjb_ats' => 'required',
                  'gol_pjb' => 'required',
                  'gol_pjb_ats' => 'required',
                  'tmt_pjb' => 'required',
                  'tmt_pjb_ats' => 'required',
                  'file' => 'mimes:pdf|max:2048'
                ],[
                  'jab_pns.required' => ' Jabatan PNS Tidak Boleh Kosong ',
                  'skp.required' => ' Nilai Capaian SKP Tidak Boleh Kosong ',
                  'o_pelayanan.required' => ' Nilai Orientasi Pelayanan Tidak Boleh Kosong ',
                  'integritas.required' => ' Nilai Integritas Tidak Boleh Kosong ',
                  'komitmen.required' => ' Nilai Komitmen Tidak Boleh Kosong ',
                  'disiplin.required' => ' Nilai Disiplin Tidak Boleh Kosong ',
                  'kerjasama.required' => ' Nilai Kerjasama Tidak Boleh Kosong ',
                  'nip_pjb.required' => ' NIP Pejabat Penilai Tidak Boleh Kosong ',
                  'nip_pjb_ats.required' => ' NIP Atasan Pejabat Penilai Tidak Boleh Kosong ',
                  'jab_pjb.required' => ' Jabatan Pejabat Penilai Tidak Boleh Kosong ',
                  'jab_pjb_ats.required' => ' Jabatan Atasan Pejabat Penilai Tidak Boleh Kosong ',
                  'unker_pjb.required' => ' Unit Kerja Pejabat Penilai Tidak Boleh Kosong ',
                  'unker_pjb_ats.required' => ' Unit Kerja Atasan Pejabat Penilai Tidak Boleh Kosong ',
                  'gol_pjb.required' => ' Golongan Pejabat Penilai Tidak Boleh Kosong ',
                  'gol_pjb_ats.required' => ' Golongan Atasan Pejabat Penilai Tidak Boleh Kosong ',
                  'tmt_pjb.required' => ' TMT Golongan Pejabat Penilai Tidak Boleh Kosong ',
                  'tmt_pjb_ats.required' => ' TMT Golongan Atasan Pejabat Penilai Tidak Boleh Kosong ',

                  'skp.numeric' => ' Nilai Capaian SKP Harus Angka ',
                  'o_pelayanan.numeric' => ' Nilai Orientasi Pelayanan Harus Angka ',
                  'integritas.numeric' => ' Nilai Integritas Harus Angka ',
                  'komitmen.numeric' => ' Nilai Komitmen Harus Angka ',
                  'disiplin.numeric' => ' Nilai Disiplin Harus Angka ',
                  'kerjasama.numeric' => ' Nilai Kerjasama Harus Angka ',

                  'skp.min' => ' Nilai Capaian SKP Minimal 76 ',
                  'o_pelayanan.min' => ' Nilai Orientasi Pelayanan Minimal 76 ',
                  'integritas.min' => ' Nilai Integritas Minimal 76 ',
                  'komitmen.min' => ' Nilai Komitmen Minimal 76 ',
                  'disiplin.min' => ' Nilai Disiplin Minimal 76 ',
                  'kerjasama.min' => ' Nilai Kerjasama Minimal 76 ',
                  'kepemimpinan.min' => ' Nilai Kepemimpinan Minimal 76 ',

                  'file.max' => ' Ukuran File Maksimal 2 MB ',
                  'file.mimes' => ' File menggunakan PDF ',
                ]);

                     $data = z_pangkat_b_skp::find($request->id);
                     $pangkat = z_pangkat::find($data->id_usul);

                     $data->tahun = $request->tahun;
                     $data->jab_pns = $request->jab_pns;
                     $data->skp = $request->skp;
                     $data->o_pelayanan = $request->o_pelayanan;
                     $data->integritas = $request->integritas;
                     $data->komitmen = $request->komitmen;
                     $data->disiplin = $request->disiplin;
                     $data->kerjasama = $request->kerjasama;
                     $data->kepemimpinan = $request->kepemimpinan;
                     $data->jumlah = $request->jumlah;
                     $data->rata2 = $request->rata2;
                     $data->rata240 = $request->rata240;
                     $data->skp60 = $request->skp60;
                     $data->total = $request->total;
                     $data->nip_pjb = $request->nip_pjb;
                     $data->jab_pjb = $request->jab_pjb;
                     $data->unker_pjb = $request->unker_pjb;
                     $data->gol_pjb = $request->gol_pjb;
                     $data->tmt_pjb = tgl_simpan($request->tmt_pjb);
                     $data->nip_pjb_ats = $request->nip_pjb_ats;
                     $data->jab_pjb_ats = $request->jab_pjb_ats;
                     $data->unker_pjb_ats = $request->unker_pjb_ats;
                     $data->gol_pjb_ats = $request->gol_pjb_ats;
                     $data->tmt_pjb_ats = tgl_simpan($request->tmt_pjb_ats);

                     if (empty($request->file('file'))){
                         $data->filename = $data->filename;
                     }
                     else{
                       if($pangkat->gol4 =="1") {
                         $path = "storage/files"."/".$pangkat->per_thn."/".$pangkat->per_bln."/6/".$pangkat->nip_baru." - ".$pangkat->nama;
                       }else{
                         $path = "storage/files"."/".$pangkat->per_thn."/".$pangkat->per_bln."/".$pangkat->jenis_kp."/".$pangkat->nip_baru." - ".$pangkat->nama;
                       }

                         unlink(public_path($data->lokasi)); //menghapus file lama
                         $file = $request->file('file');
                         $ext = $file->getClientOriginalExtension();
                         $newName = "SKP_".$request->tahun."_".$request->nip.".".$ext;
                         $file->move(public_path($path),$newName);
                         $data->filename = $newName;
                         $data->lokasi = $path."/".$newName;

                     }
                     $data->save();
                     return redirect('pangkat/uploadreg/'.$data->id_usul)->with('alert-success','data Dokumen SKP Tahun'.$request->tahun.' telah diubah!');

                }

///////////////////////////////////////////////////////////// Berkas Kenaikan Pangkat //////////////////////////////////////////////////////

  public function list_kp($id)
  {
    if(Auth::user()->level <> 2 )
    {
      return redirect('pangkat/admin');
    }
    $data['sidebar'] = "usul_pangkat";
    $data['pns'] = z_pangkat::find($id);
    $data['msidebar'] = red_jeniskp($data['pns']->jenis_kp);
    $data['list_kp'] = z_pangkat_b_pangkat::leftjoin("gols","golongan","=","KD_GOL")->where("id_usul","=",$id)->orderby("golongan","DESC")->get();
    return view('pangkat.isi.list_kp',$data);

  }
  public function addKP($id)
  {
    $data['gol'] = gol::all();
    $data['id'] = $id;
    $data['edit_kp'] = "";
    return view ('pangkat.isi.form_KP',$data);
  }

  public function editKP($id)
  {
    $data['gol'] = gol::all();
    $data['id'] = $id;
    $data['edit_kp'] = z_pangkat_b_pangkat::where("id","=",$id)->leftjoin("gols","golongan","=","KD_GOL")->get();
  //  return $data['edit_kp'];
    return view ('pangkat.isi.form_KP',$data);
  }

  public function delKP($id)
  {
    $data = z_pangkat_b_pangkat::find($id);
    $back = $data->id_usul;
    unlink(public_path($data->lokasi));
    z_pangkat_b_pangkat::find($id)->delete();
    return redirect('pangkat/list_kp/'.$back);
  }

  public function addKP_upload(Request $request)
  {
    $this->validate($request,[
        'file' => 'required|mimes:pdf|max:2048'
      ],[
        'file.required' => ' File Tidak Boleh Kosong ',
        'file.max' => ' Ukuran File Maksimal 2 MB ',
        'file.mimes' => ' File menggunakan PDF ',
      ]);

     $cek = z_pangkat_b_pangkat::where("id_usul","=",$request->id)->where("golongan","=",$request->golongan)->get();
     $gol = gol::find($request->golongan);
     $pangkat = z_pangkat::find($request->id);
  if(count($cek)==0){
     $data = new z_pangkat_b_pangkat();
     $data->id_usul = $request->id;
     $data->golongan = $request->golongan;
     $data->kd_berkas = $request->kd_berkas;
     $file = $request->file('file');
     $ext = $file->getClientOriginalExtension();
     $newName = "SK_KP_".$request->golongan."_".$pangkat->nip_baru.".".$ext;
     if($pangkat->gol4 =="1") {
       $path = "storage/files"."/".$pangkat->per_thn."/".$pangkat->per_bln."/6/".$pangkat->nip_baru." - ".$pangkat->nama;
     }else{
       $path = "storage/files"."/".$pangkat->per_thn."/".$pangkat->per_bln."/".$pangkat->jenis_kp."/".$pangkat->nip_baru." - ".$pangkat->nama;
     }
     $file->move(public_path($path),$newName);
     $data->filename = $newName;
     $data->lokasi = $path."/".$newName;
     $data->save();
     return redirect('pangkat/list_kp/'.$pangkat->id)->with('alert-success','Dokumen SK Golongan '.$gol->NM_GOL.' telah ditambahkan!');
   } else {
     return redirect('pangkat/list_kp/'.$pangkat->id)->with('alert-failed','Dokumen SK Golongan '.$gol->NM_GOL.' Sudah ada!');
   }
  }

  public function editKP_upload(Request $request)
  {
    $this->validate($request,[
        'file' => 'mimes:pdf|max:2048'
      ],[
        'file.max' => ' Ukuran File Maksimal 2 MB ',
        'file.mimes' => ' File menggunakan PDF ',
      ]);
      $gol = gol::find($request->golongan);
     $data = z_pangkat_b_pangkat::find($request->id);
     $pangkat = z_pangkat::find($data->id_usul);

     if (empty($request->file('file'))){
         $data->filename = $data->filename;
     }
     else{
       if($pangkat->gol4 =="1") {
         $path = "storage/files"."/".$pangkat->per_thn."/".$pangkat->per_bln."/6/".$pangkat->nip_baru." - ".$pangkat->nama;
       }else{
         $path = "storage/files"."/".$pangkat->per_thn."/".$pangkat->per_bln."/".$pangkat->jenis_kp."/".$pangkat->nip_baru." - ".$pangkat->nama;
       }
         unlink(public_path($data->lokasi)); //menghapus file lama
         $file = $request->file('file');
         $ext = $file->getClientOriginalExtension();
         $newName = "SK_KP_".$request->golongan."_".$pangkat->nip_baru.".".$ext;
         $file->move(public_path($path),$newName);
         $data->filename = $newName;
         $data->lokasi = $path."/".$newName;
     }
     $data->save();
     return redirect('pangkat/list_kp/'.$pangkat->id)->with('alert-success','Dokumen SK Golongan '.$gol->NM_GOL.' Telah diubah!');

  }
  ///////////////////////////////////////////////////////////// Berkas Ijazah //////////////////////////////////////////////////////

    public function list_ijazah($id)
    {
      if(Auth::user()->level <> 2 )
      {
        return redirect('pangkat/admin');
      }
      $data['sidebar'] = "usul_pangkat";
      $data['pns'] = z_pangkat::find($id);
      $data['msidebar'] = red_jeniskp($data['pns']->jenis_kp);
      $data['list_ijazah'] = z_pangkat_b_ijazah::leftjoin("ijazahs","kd_ijazah","=","id_ijazah")->where("id_usul","=",$id)->orderby("id_ijazah","DESC")->get();
      return view('pangkat.isi.list_ijazah',$data);

    }
    public function addIjazah($id)
    {
      $data['ijazah'] = ijazah::all();
      $data['id'] = $id;
      $data['edit_ijazah'] = "";
      return view ('pangkat.isi.form_Ijazah',$data);
    }

    public function editIjazah($id)
    {
      $data['ijazah'] = ijazah::all();
      $data['id'] = $id;
      $data['edit_ijazah'] = z_pangkat_b_ijazah::where("id","=",$id)->leftjoin("ijazahs","kd_ijazah","=","id_ijazah")->get();
    //  return $data['edit_kp'];
      return view ('pangkat.isi.form_Ijazah',$data);
    }

    public function delIjazah($id)
    {
      $data = z_pangkat_b_ijazah::find($id);
      $back = $data->id_usul;
      unlink(public_path($data->lokasi));
      z_pangkat_b_ijazah::find($id)->delete();
      return redirect('pangkat/list_ijazah/'.$back);
    }

    public function addIjazah_upload(Request $request)
    {
      $this->validate($request,[
          'file' => 'required|mimes:pdf|max:2048'
        ],[
          'file.required' => ' File Tidak Boleh Kosong ',
          'file.max' => ' Ukuran File Maksimal 2 MB ',
          'file.mimes' => ' File menggunakan PDF ',
        ]);

       $cek = z_pangkat_b_ijazah::where("id_usul","=",$request->id)->where("kd_ijazah","=",$request->ijazah)->get();
       $ijazah = ijazah::find($request->ijazah);
       $pangkat = z_pangkat::find($request->id);
    if(count($cek)==0){
       $data = new z_pangkat_b_ijazah();
       $data->id_usul = $request->id;
       $data->kd_ijazah = $request->ijazah;
       $data->kd_berkas = $request->kd_berkas;
       $file = $request->file('file');
       $ext = $file->getClientOriginalExtension();
       $newName = "IJAZAH_".$ijazah->nm_ijazah."_".$pangkat->nip_baru.".".$ext;
       if($pangkat->gol4 =="1") {
         $path = "storage/files"."/".$pangkat->per_thn."/".$pangkat->per_bln."/6/".$pangkat->nip_baru." - ".$pangkat->nama;
       }else{
         $path = "storage/files"."/".$pangkat->per_thn."/".$pangkat->per_bln."/".$pangkat->jenis_kp."/".$pangkat->nip_baru." - ".$pangkat->nama;
       }
       $file->move(public_path($path),$newName);
       $data->filename = $newName;
       $data->lokasi = $path."/".$newName;
       $data->save();
       return redirect('pangkat/list_ijazah/'.$pangkat->id)->with('alert-success','Dokumen Ijazah '.$ijazah->nm_ijazah.' telah ditambahkan!');
     } else {
       return redirect('pangkat/list_ijazah/'.$pangkat->id)->with('alert-failed','Dokumen Ijazah '.$ijazah->nm_ijazah.' Sudah ada!');
     }
    }

    public function editIjazah_upload(Request $request)
    {
      $this->validate($request,[
          'file' => 'mimes:pdf|max:2048'
        ],[
          'file.max' => ' Ukuran File Maksimal 2 MB ',
          'file.mimes' => ' File menggunakan PDF ',
        ]);
        $ijazah = ijazah::find($request->ijazah);
       $data = z_pangkat_b_ijazah::find($request->id);
       $pangkat = z_pangkat::find($data->id_usul);
       if (empty($request->file('file'))){
           $data->filename = $data->filename;
       }
       else{
         if($pangkat->gol4 =="1") {
           $path = "storage/files"."/".$pangkat->per_thn."/".$pangkat->per_bln."/6/".$pangkat->nip_baru." - ".$pangkat->nama;
         }else{
           $path = "storage/files"."/".$pangkat->per_thn."/".$pangkat->per_bln."/".$pangkat->jenis_kp."/".$pangkat->nip_baru." - ".$pangkat->nama;
         }

           unlink(public_path($data->lokasi)); //menghapus file lama
           $file = $request->file('file');
           $ext = $file->getClientOriginalExtension();
           $newName = "IJAZAH_".$ijazah->nm_ijazah."_".$pangkat->nip_baru.".".$ext;
           $file->move(public_path($path),$newName);
           $data->filename = $newName;
           $data->lokasi = $path."/".$newName;
       }
       $data->save();
       return redirect('pangkat/list_ijazah/'.$pangkat->id)->with('alert-success','Dokumen Ijazah '.$ijazah->nm_ijazah.' Telah diubah!');

    }

    ///////////////////////////////////////////////////////////// Berkas Transkrip //////////////////////////////////////////////////////

      public function list_transkrip($id)
      {
        if(Auth::user()->level <> 2 )
        {
          return redirect('pangkat/admin');
        }
        $data['sidebar'] = "usul_pangkat";
        $data['pns'] = z_pangkat::find($id);
        $data['msidebar'] = red_jeniskp($data['pns']->jenis_kp);
        $data['list_transkrip'] = z_pangkat_b_transkrip::leftjoin("ijazahs","kd_ijazah","=","id_ijazah")->where("id_usul","=",$id)->orderby("id_ijazah","DESC")->get();
        return view('pangkat.isi.list_transkrip',$data);

      }
      public function addTranskrip($id)
      {
        $data['transkrip'] = ijazah::all();
        $data['id'] = $id;
        $data['edit_transkrip'] = "";
        return view ('pangkat.isi.form_Transkrip',$data);
      }

      public function editTranskrip($id)
      {
        $data['transkrip'] = ijazah::all();
        $data['id'] = $id;
        $data['edit_transkrip'] = z_pangkat_b_transkrip::where("id","=",$id)->leftjoin("ijazahs","kd_ijazah","=","id_ijazah")->get();
      //  return $data['edit_kp'];
        return view ('pangkat.isi.form_Transkrip',$data);
      }

      public function delTranskrip($id)
      {
        $data = z_pangkat_b_transkrip::find($id);
        $back = $data->id_usul;
        unlink(public_path($data->lokasi));
        z_pangkat_b_transkrip::find($id)->delete();
        return redirect('pangkat/list_transkrip/'.$back);
      }

      public function addTranskrip_upload(Request $request)
      {
        $this->validate($request,[
            'file' => 'required|mimes:pdf|max:2048'
          ],[
            'file.required' => ' File Tidak Boleh Kosong ',
            'file.max' => ' Ukuran File Maksimal 2 MB ',
            'file.mimes' => ' File menggunakan PDF ',
          ]);

         $cek = z_pangkat_b_transkrip::where("id_usul","=",$request->id)->where("kd_ijazah","=",$request->transkrip)->get();
         $transkrip = ijazah::find($request->transkrip);
         $pangkat = z_pangkat::find($request->id);
       if(count($cek)==0){
         $data = new z_pangkat_b_transkrip();
         $data->id_usul = $request->id;
         $data->kd_ijazah = $request->transkrip;
         $data->kd_berkas = $request->kd_berkas;
         $file = $request->file('file');
         $ext = $file->getClientOriginalExtension();
         $newName = "TRANSKRIP_".$transkrip->nm_ijazah."_".$pangkat->nip_baru.".".$ext;
         if($pangkat->gol4 =="1") {
           $path = "storage/files"."/".$pangkat->per_thn."/".$pangkat->per_bln."/6/".$pangkat->nip_baru." - ".$pangkat->nama;
         }else{
           $path = "storage/files"."/".$pangkat->per_thn."/".$pangkat->per_bln."/".$pangkat->jenis_kp."/".$pangkat->nip_baru." - ".$pangkat->nama;
         }
         $file->move(public_path($path),$newName);
         $data->filename = $newName;
         $data->lokasi = $path."/".$newName;
         $data->save();
         return redirect('pangkat/list_transkrip/'.$pangkat->id)->with('alert-success','Dokumen Transkrip '.$transkrip->nm_ijazah.' telah ditambahkan!');
       } else {
         return redirect('pangkat/list_transkrip/'.$pangkat->id)->with('alert-failed','Dokumen Transkrip '.$transkrip->nm_ijazah.' Sudah ada!');
       }
      }

      public function editTranskrip_upload(Request $request)
      {
        $this->validate($request,[
            'file' => 'mimes:pdf|max:2048'
          ],[
            'file.max' => ' Ukuran File Maksimal 2 MB ',
            'file.mimes' => ' File menggunakan PDF ',
          ]);
          $transkrip = ijazah::find($request->transkrip);
         $data = z_pangkat_b_transkrip::find($request->id);
         $pangkat = z_pangkat::find($data->id_usul);
         if (empty($request->file('file'))){
             $data->filename = $data->filename;
         }
         else{
           if($pangkat->gol4 =="1") {
             $path = "storage/files"."/".$pangkat->per_thn."/".$pangkat->per_bln."/6/".$pangkat->nip_baru." - ".$pangkat->nama;
           }else{
             $path = "storage/files"."/".$pangkat->per_thn."/".$pangkat->per_bln."/".$pangkat->jenis_kp."/".$pangkat->nip_baru." - ".$pangkat->nama;
           }

             unlink(public_path($data->lokasi)); //menghapus file lama
             $file = $request->file('file');
             $ext = $file->getClientOriginalExtension();
             $newName = "TRANSKRIP_".$transkrip->nm_ijazah."_".$pangkat->nip_baru.".".$ext;
             $file->move(public_path($path),$newName);
             $data->filename = $newName;
             $data->lokasi = $path."/".$newName;
         }
         $data->save();
         return redirect('pangkat/list_transkrip/'.$pangkat->id)->with('alert-success','Dokumen Transkrip '.$transkrip->nm_ijazah.' Telah diubah!');

      }


      ///////////////////////////////////////////////////////////// Berkas Pak //////////////////////////////////////////////////////

        public function list_pak($id)
        {
          if(Auth::user()->level <> 2 )
          {
            return redirect('pangkat/admin');
          }
          $data['sidebar'] = "usul_pangkat";
          $data['pns'] = z_pangkat::find($id);
          $data['msidebar'] = red_jeniskp($data['pns']->jenis_kp);
          $data['list_pak'] = z_pangkat_b_pak::where("id_usul","=",$id)->orderby("tahun","DESC")->get();
          return view('pangkat.isi.list_pak',$data);

        }
        public function addPak($id)
        {
          $data['id'] = $id;
          $data['edit_pak'] = "";
          return view ('pangkat.isi.form_Pak',$data);
        }

        public function editPak($id)
        {
          $data['id'] = $id;
          $data['edit_pak'] = z_pangkat_b_pak::where("id","=",$id)->get();
        //  return $data['edit_kp'];
          return view ('pangkat.isi.form_Pak',$data);
        }

        public function delPak($id)
        {
          $data = z_pangkat_b_pak::find($id);
          $back = $data->id_usul;
          unlink(public_path($data->lokasi));
          z_pangkat_b_pak::find($id)->delete();
          return redirect('pangkat/list_pak/'.$back);
        }

        public function addPak_upload(Request $request)
        {
          $this->validate($request,[
              'file' => 'required|mimes:pdf|max:2048',
              'kredit_utama' => 'required|numeric',
              'kredit_penunjang' => 'required|numeric',
              'no_sk' => 'required',
              'tgl_pak' => 'required',
              'tahun' => 'required',
              'tahun_mulai' => 'required'
            ],[
              'kredit_utama.required' => ' AK Utama Tidak Boleh Kosong ',
              'kredit_penunjang.required' => ' AK Penunjang Tidak Boleh Kosong ',
              'kredit_utama.numeric' => ' AK Utama Harus Angka ',
              'kredit_penunjang.numeric' => ' AK Penunjang Harus Angka ',
              'no_sk.required' => ' No SK Tidak Boleh Kosong ',
              'tgl_pak.required' => ' Tgl Penetapan PAK Tidak Boleh Kosong ',
              'tahun.required' => ' Akhir Tahun Penilaian Tidak Boleh Kosong ',
              'tahun_mulai.required' => ' Awal TahunPenilaian Tidak Boleh Kosong ',
              'file.required' => ' File Tidak Boleh Kosong ',
              'file.max' => ' Ukuran File Maksimal 2 MB ',
              'file.mimes' => ' File menggunakan PDF ',
            ]);

           $cek = z_pangkat_b_pak::where("id_usul","=",$request->id)->where("tahun","=",$request->tahun)->get();
           $pangkat = z_pangkat::find($request->id);
         if(count($cek)==0){
           $data = new z_pangkat_b_pak();
           $data->id_usul = $request->id;
           $data->kd_berkas = $request->kd_berkas;
           $data->no_sk = $request->no_sk;
           $data->tgl_pak = tgl_simpan($request->tgl_pak);
           $data->kredit_utama = $request->kredit_utama;
           $data->kredit_penunjang = $request->kredit_penunjang;
           $data->total_kredit = $request->kredit_utama + $request->kredit_penunjang;
           $data->tahun_mulai = $request->tahun_mulai;
           $data->tahun = $request->tahun;
           $file = $request->file('file');
           $ext = $file->getClientOriginalExtension();
           $newName = "PAK_".$request->tahun."_".$pangkat->nip_baru.".".$ext;
           if($pangkat->gol4 =="1") {
             $path = "storage/files"."/".$pangkat->per_thn."/".$pangkat->per_bln."/6/".$pangkat->nip_baru." - ".$pangkat->nama;
           }else{
             $path = "storage/files"."/".$pangkat->per_thn."/".$pangkat->per_bln."/".$pangkat->jenis_kp."/".$pangkat->nip_baru." - ".$pangkat->nama;
           }
           $file->move(public_path($path),$newName);
           $data->filename = $newName;
           $data->lokasi = $path."/".$newName;
           $data->save();
           return redirect('pangkat/list_pak/'.$pangkat->id)->with('alert-success','Dokumen Pak '.$request->tahun.' telah ditambahkan!');
         } else {
           return redirect('pangkat/list_pak/'.$pangkat->id)->with('alert-failed','Dokumen Pak '.$request->tahun.' Sudah ada!');
         }
        }

        public function editPak_upload(Request $request)
        {
          $this->validate($request,[
              'file' => 'mimes:pdf|max:2048',
              'kredit_utama' => 'required|numeric',
              'kredit_penunjang' => 'required|numeric',
              'no_sk' => 'required',
              'tgl_pak' => 'required',
              'tahun' => 'required',
              'tahun_mulai' => 'required'
            ],[
              'kredit_utama.required' => ' AK Utama Tidak Boleh Kosong ',
              'kredit_penunjang.required' => ' AK Penunjang Tidak Boleh Kosong ',
              'kredit_utama.numeric' => ' AK Utama Harus Angka ',
              'kredit_penunjang.numeric' => ' AK Penunjang Harus Angka ',
              'no_sk.required' => ' No SK Tidak Boleh Kosong ',
              'tgl_pak.required' => ' Tgl Penetapan PAK Tidak Boleh Kosong ',
              'tahun.required' => ' Akhir Tahun Penilaian Tidak Boleh Kosong ',
              'tahun_mulai.required' => ' Awal TahunPenilaian Tidak Boleh Kosong ',
              'file.max' => ' Ukuran File Maksimal 2 MB ',
              'file.mimes' => ' File menggunakan PDF ',
            ]);
           $data = z_pangkat_b_pak::find($request->id);
           $pangkat = z_pangkat::find($data->id_usul);
           if (empty($request->file('file'))){
               $data->filename = $data->filename;
           }
           else{
             if($pangkat->gol4 =="1") {
               $path = "storage/files"."/".$pangkat->per_thn."/".$pangkat->per_bln."/6/".$pangkat->nip_baru." - ".$pangkat->nama;
             }else{
               $path = "storage/files"."/".$pangkat->per_thn."/".$pangkat->per_bln."/".$pangkat->jenis_kp."/".$pangkat->nip_baru." - ".$pangkat->nama;
             }

               unlink(public_path($data->lokasi)); //menghapus file lama
               $file = $request->file('file');
               $ext = $file->getClientOriginalExtension();
               $newName = "PAK_".$request->tahun."_".$pangkat->nip_baru.".".$ext;
               $file->move(public_path($path),$newName);
               $data->filename = $newName;
               $data->lokasi = $path."/".$newName;
           }
           $data->save();
           return redirect('pangkat/list_pak/'.$pangkat->id)->with('alert-success','Dokumen Pak '.$request->tahun.' Telah diubah!');

        }

///////////////////////////////////////////////////////////// Jab Fung //////////////////////////////////////////////////////

                public function add_jabfung($id)
                {
                  if(Auth::user()->level <> 2 )
                  {
                    return redirect('pangkat/admin');
                  }
                  $data['dok'] = dok_lain::where("id_dok","=",12)->get();
                  $data['id'] = $id;
                  $data['edit_dok'] = "";
                  return view ('pangkat.isi.form_dok_lain',$data);
                }

                public function edit_jabfung($id)
                {
                  $data['dok'] = dok_lain::where("id_dok","=",12)->get();
                  $data['id'] = $id;
                  $data['edit_dok'] = z_pangkat_b_lain::where("id","=",$id)->leftjoin("dok_lains","kd_berkas","=","id_dok")->get();
                  //return $data['edit_dok'];
                  return view ('pangkat.isi.form_dok_lain',$data);
                }


///////////////////////////////////////////////////////////// Jab Struk //////////////////////////////////////////////////////

                public function add_jabstruk($id)
                {
                  if(Auth::user()->level <> 2 )
                  {
                    return redirect('pangkat/admin');
                  }
                  $data['dok'] = dok_lain::where("id_dok","=",10)->get();
                  $data['id'] = $id;
                  $data['edit_dok'] = "";
                  return view ('pangkat.isi.form_dok_lain',$data);
                }

                public function edit_jabstruk($id)
                {
                  $data['dok'] = dok_lain::where("id_dok","=",10)->get();
                  $data['id'] = $id;
                  $data['edit_dok'] = z_pangkat_b_lain::where("id","=",$id)->leftjoin("dok_lains","kd_berkas","=","id_dok")->get();
                  //return $data['edit_dok'];
                  return view ('pangkat.isi.form_dok_lain',$data);
                }

///////////////////////////////////////////////////////////// Jab Fung //////////////////////////////////////////////////////

                public function add_drj($id)
                {
                  if(Auth::user()->level <> 2 )
                  {
                    return redirect('pangkat/admin');
                  }
                  $data['dok'] = dok_lain::where("id_dok","=",11)->get();
                  $data['id'] = $id;
                  $data['edit_dok'] = "";
                  return view ('pangkat.isi.form_dok_lain',$data);
                }

                public function edit_drj($id)
                {
                  $data['dok'] = dok_lain::where("id_dok","=",11)->get();
                  $data['id'] = $id;
                  $data['edit_dok'] = z_pangkat_b_lain::where("id","=",$id)->leftjoin("dok_lains","kd_berkas","=","id_dok")->get();
                  //return $data['edit_dok'];
                  return view ('pangkat.isi.form_dok_lain',$data);
                }

///////////////////////////////////////////////////////////// Uraian Tugas //////////////////////////////////////////////////////

                public function add_uraian($id)
                {
                  if(Auth::user()->level <> 2 )
                  {
                    return redirect('pangkat/admin');
                  }
                  $data['dok'] = dok_lain::where("id_dok","=",17)->get();
                  $data['id'] = $id;
                  $data['edit_dok'] = "";
                  return view ('pangkat.isi.form_dok_lain',$data);
                }

                public function edit_uraian($id)
                {
                  $data['dok'] = dok_lain::where("id_dok","=",17)->get();
                  $data['id'] = $id;
                  $data['edit_dok'] = z_pangkat_b_lain::where("id","=",$id)->leftjoin("dok_lains","kd_berkas","=","id_dok")->get();
                  //return $data['edit_dok'];
                  return view ('pangkat.isi.form_dok_lain',$data);
                }

///////////////////////////////////////////////////////////// Berkas Lainnya //////////////////////////////////////////////////////

        public function add_dok_lain($id)
        {
          if(Auth::user()->level <> 2 )
          {
            return redirect('pangkat/admin');
          }
          $data['dok'] = dok_lain::where("ket","=",1)->get();
          $data['id'] = $id;
          $data['edit_dok'] = "";
          return view ('pangkat.isi.form_dok_lain',$data);
        }

        public function edit_dok_lain($id)
        {
          $data['dok'] = where("ket","=",1)->get();
          $data['id'] = $id;
          $data['edit_dok'] = z_pangkat_b_lain::where("id","=",$id)->leftjoin("dok_lains","kd_berkas","=","id_dok")->get();
        //  return $data['edit_kp'];
          return view ('pangkat.isi.form_dok_lain',$data);
        }

        public function del_dok_lain($id)
        {
          $data = z_pangkat_b_lain::find($id);
          $back = $data->id_usul;
          unlink(public_path($data->lokasi));
          z_pangkat_b_lain::find($id)->delete();
          return redirect('pangkat/uploadreg/'.$back);
        }

        public function add_dok_upload(Request $request)
        {
          $this->validate($request,[
            'file' => 'required|mimes:pdf|max:2048',
            'tahun' => 'required'
            ],[
              'tahun' => ' Tahun Tidak Boleh Kosong ',
              'file.required' => ' File Tidak Boleh Kosong ',
              'file.max' => ' Ukuran File Maksimal 2 MB ',
              'file.mimes' => ' File menggunakan PDF ',
            ]);

           $cek = z_pangkat_b_lain::where("id_usul","=",$request->id)->where("kd_berkas","=",$request->id_dok)->get();
           $dok = dok_lain::find($request->id_dok);
           $pangkat = z_pangkat::find($request->id);
        if(count($cek)==0){
           $data = new z_pangkat_b_lain();
           $data->id_usul = $request->id;
           $data->kd_berkas = $request->id_dok;
           $data->tahun = $request->tahun;
           $file = $request->file('file');
           $ext = $file->getClientOriginalExtension();
           if($request->id_dok==10 || $request->id_dok==12 || $request->id_dok==14 || $request->id_dok==15)
           {
           $newName = $dok->kd_dok."_".$request->tahun."_".$pangkat->nip_baru.".".$ext;
         } else {
           $newName = $dok->kd_dok."_".$pangkat->nip_baru.".".$ext;
         }
         if($pangkat->gol4 =="1") {
             $path = "storage/files"."/".$pangkat->per_thn."/".$pangkat->per_bln."/6/".$pangkat->nip_baru." - ".$pangkat->nama;
           }else{
             $path = "storage/files"."/".$pangkat->per_thn."/".$pangkat->per_bln."/".$pangkat->jenis_kp."/".$pangkat->nip_baru." - ".$pangkat->nama;
           }
           $file->move(public_path($path),$newName);
           $data->filename = $newName;
           $data->lokasi = $path."/".$newName;
           $data->save();
           return redirect('pangkat/uploadreg/'.$pangkat->id)->with('alert-success','Dokumen '.$dok->nm_dok.' telah ditambahkan!');
         } else {
           return redirect('pangkat/uploadreg/'.$pangkat->id)->with('alert-failed','Dokumen '.$dok->nm_dok.' Sudah ada!');
         }
        }

        public function edit_dok_upload(Request $request)
        {
          $this->validate($request,[
              'file' => 'mimes:pdf|max:2048'
            ],[
              'file.max' => ' Ukuran File Maksimal 2 MB ',
              'file.mimes' => ' File menggunakan PDF ',
            ]);
            $dok = dok_lain::find($request->id_dok);
           $data = z_pangkat_b_lain::find($request->id);
           $pangkat = z_pangkat::find($data->id_usul);
           if (empty($request->file('file'))){
               $data->filename = $data->filename;
           }
           else{
               unlink(public_path($data->lokasi)); //menghapus file lama
               $file = $request->file('file');
               $ext = $file->getClientOriginalExtension();
               if($request->id_dok==10 || $request->id_dok==12 || $request->id_dok==14 || $request->id_dok==15)
               {
               $newName = $dok->kd_dok."_".$request->tahun."_".$pangkat->nip_baru.".".$ext;
               } else {
                 $newName = $dok->kd_dok."_".$pangkat->nip_baru.".".$ext;
               }
               if($pangkat->gol4 =="1") {
                 $path = "storage/files"."/".$pangkat->per_thn."/".$pangkat->per_bln."/6/".$pangkat->nip_baru." - ".$pangkat->nama;
               }else{
                 $path = "storage/files"."/".$pangkat->per_thn."/".$pangkat->per_bln."/".$pangkat->jenis_kp."/".$pangkat->nip_baru." - ".$pangkat->nama;
               }
               $file->move(public_path($path),$newName);
               $data->tahun = $request->tahun;
               $data->filename = $newName;
               $data->lokasi = $path."/".$newName;
           }
           $data->save();
           return redirect('pangkat/uploadreg/'.$pangkat->id)->with('alert-success','Dokumen '.$dok->nm_dok.' Telah diubah!');

        }

        public function cek_berkasreg($id)
        {
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
          return view('pangkat.isi.cek_berkasreg',$data);

        }

        public function cetak_lampiran()
        {
          $cek_tingkat = \App\opd::find(Auth::user()->OPD);
          if($cek_tingkat->tingkat==0){
           $data['ukp'] = \App\z_pangkat::leftjoin('z_pangkat_jeniskps','jenis_kp','=','id_jenis_kp')->where('opd','=',Auth::user()->OPD)->where('per_bln','=',session()->get('per'))->where('per_thn','=',session()->get('thn'))->whereRaw('((verifikasi = 2) or (verifikasi = 1))')->get();
          } else {
           $data['ukp'] = \App\z_pangkat::where('opd','=',Auth::user()->OPD)->where('per_bln','=',session()->get('per'))->where('per_thn','=',session()->get('thn'))->where('verifikasi', '=', '2')->get();
          }

          $pdf = PDF::loadView('pangkat.isi.cetak_lampiran', $data);
          $pdf->setPaper([0, 0, 612, 936], 'portrait');
          return $pdf->stream();

        }

}
