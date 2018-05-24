<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\unor_all;
use App\kategoriopd;
use App\draft_musjab;
use App\m_temp_unor;
use App\pns;
use App\m_ba;
use DB;
use Alert;




class musjabController extends Controller
{
	public function home()
    {
    	$data['sidebar'] = "home";
    	return view('musjab.isi.home',$data);
    }

    public function peta_jabatan()
    {
    	$data['sidebar'] = "peta_jabatan";
    	$data['kategori'] = kategoriopd::all();
    	$data['unker_title'] = unor_all::where('child','=','0')->get();
    	return view('musjab.isi.peta_jabatan',$data);
    }

	public function jabatan_kosong()
	{
			$data['sidebar'] = "jabatan_kosong";
    	    $data['unker_kosong'] = db_unker_kosong('unor_alls');
			$data['total'] = db_hitung_total('unor_alls');
			$data['jum_esl'] = db_jum_esl('unor_alls');
			return view('musjab.isi.jabatan_kosong',$data);
	}

    public function rancangan()
    {
    	$data['sidebar'] = "rancangan";
    	$data['usulan'] = draft_musjab::all();
    	return view('musjab.isi.rancangan',$data);
    }

    public function tambah_usulan()
    {
        $data['sidebar'] = "rancangan";
        return view ('musjab.isi.tambah_usulan',$data);
    }

    public function add_usulan(Request $request)
    {
        $usulan = new draft_musjab();
        $usulan->nomor = $request->nomor;
        $usulan->tanggal=tgl_simpan($request->tanggal);
        $usulan->save();
        Alert::success('Data berhasil disimpan!');
        return redirect('rancangan');
    }

    public function destroy($usul_id)
    {
        draft_musjab::find($usul_id)->delete();
        Alert::success('Data berhasil dihapus!');
            return redirect('rancangan');
    }

		public function draft()
		{
			$usul_id = session()->get('id');
    	$data['sidebar'] = "rancangan";
			$data['usulan'] = draft_musjab::find($usul_id);
			$data['unker_kosong'] = db_unker_kosong('m_temp_unors');
			$data['total'] = db_hitung_total('m_temp_unors');
			$data['jum_esl'] = db_jum_esl('m_temp_unors');

			$data['unker'] = m_temp_unor::where('child','=','0')->get();
			$data['ba'] = m_ba::selectRaw('id,unor_alls1.NM_JAB as NM_JAB_BR, PNS_GLRDPN,PNS_GLRBLK,PNS_PNSNAM,nip,NM_KABUPAT,PNS_TGLLHR,NM_GOL,PNS_TMTGOL,eselon_lm,NM_FPOS,NM_GENPOS,unor_alls.NM_UNOR,unor_alls.NM_JAB,PNS_TMTJAB,eselons.NM_ESELON,PNS_TMTECH,eselons1.NM_ESELON as NM_ESELON_BR,eselon_br')->leftjoin('data_pns','nip','PNS_NIPBARU')->leftjoin('unor_alls','unor_lm','KD_UNOR')->leftjoin('unor_alls as unor_alls1','unor_br','unor_alls1.KD_UNOR')->leftjoin('eselons','eselon_lm','KD_ESELON')->leftjoin('eselons as eselons1','eselon_br','eselons1.KD_ESELON')->where('id_usulan','=',$usul_id)->get();
//      return $data['jum_esl'];

			return view('musjab.isi.tambah_usulan_draft',$data);
		}

    public function fill(Request $request)
    {
				$usul_id = $request->id;
        $data['sidebar'] = "rancangan";
        $jabatan = m_temp_unor::where('id_usulan','=',$usul_id)->get();
        $data['jabatan'] = $jabatan;

        if (count($jabatan)==0) {

            $new = unor_all::leftjoin('eselons','eselon','=','KD_ESELON')->leftjoin('data_pns','NIP_PJB','PNS_NIPBARU')->where('mulai_berlaku','=','2017-01-01')->get();

            foreach ($new as $new) {
            $musjab = new m_temp_unor();
            $musjab->id_usulan = $usul_id;
            $musjab->mulai_berlaku = $new->mulai_berlaku;
            $musjab->KD_UNOR = $new->KD_UNOR;
            $musjab->parent = $new->parent;
            $musjab->child = $new->child;
            $musjab->NM_UNOR = $new->NM_UNOR;
            $musjab->UNIT_KERJA = $new->UNIT_KERJA;
            $musjab->eselon = $new->eselon;
            $musjab->NM_ESL = $new->NM_ESELON;
            $musjab->NIP_PJB = $new->NIP_PJB;
            $musjab->NM_JAB = $new->NM_JAB;
            $musjab->PNS_PNSNAM = $new->PNS_PNSNAM;
            $musjab->PNS_GLRDPN = $new->PNS_GLRDPN;
            $musjab->PNS_GLRBLK = $new->PNS_GLRBLK;
            $musjab->PNS_KODECH = $new->PNS_KODECH;
            $musjab->NM_GOL = $new->NM_GOL;
            $musjab->PNS_GOLRU = $new->PNS_GOLRU;
            $musjab->PNS_TMTECH = $new->PNS_TMTECH;
            $musjab->PNS_TMTGOL = $new->PNS_TMTGOL;
            $musjab->PNS_TMTJAB = $new->PNS_TMTJAB;
            $musjab->PNS_TGLLHR = $new->PNS_TGLLHR;
            $musjab->NM_KABUPAT = $new->NM_KABUPAT;
            $musjab->NM_GENPOS = $new->NM_GENPOS;
            $musjab->NM_FPOS = $new->NM_FPOS;
            $musjab->DIK_DIKNAM = $new->DIK_DIKNAM;
            $musjab->PNS_TMTLAT = $new->PNS_TMTLAT;
            $musjab->status = 0;
            $musjab->save();
            }
            Alert::success('Database temporer telah ditambahkan!');
        }

       $data['usulan'] = draft_musjab::find($usul_id);
       $data['unker_kosong'] = db_unker_kosong('m_temp_unors');
       $data['total'] = db_hitung_total('m_temp_unors');
       $data['jum_esl'] = db_jum_esl('m_temp_unors');

       $data['unker'] = m_temp_unor::where('child','=','0')->get();
			 $data['ba'] = m_ba::selectRaw('id,unor_alls1.NM_JAB as NM_JAB_BR, PNS_GLRDPN,PNS_GLRBLK,PNS_PNSNAM,nip,NM_KABUPAT,PNS_TGLLHR,NM_GOL,PNS_TMTGOL,eselon_lm,NM_FPOS,NM_GENPOS,unor_alls.NM_UNOR,unor_alls.NM_JAB,PNS_TMTJAB,eselons.NM_ESELON,PNS_TMTECH,eselons1.NM_ESELON as NM_ESELON_BR,eselon_br')->leftjoin('data_pns','nip','PNS_NIPBARU')->leftjoin('unor_alls','unor_lm','KD_UNOR')->leftjoin('unor_alls as unor_alls1','unor_br','unor_alls1.KD_UNOR')->leftjoin('eselons','eselon_lm','KD_ESELON')->leftjoin('eselons as eselons1','eselon_br','eselons1.KD_ESELON')->where('id_usulan','=',$usul_id)->get();
 //      return $data['jum_esl'];
 			 session()->put('id',$usul_id);
			 session()->put('tab',1);
//			 return $data['ba'];
       return view('musjab.isi.tambah_usulan_draft',$data);
    }

    public function isipns($id)
    {
        $data['unor'] = m_temp_unor::find($id);
        return view ('musjab.isi.form_isi_jabatan_kosong',$data);
    }

    public function isiajax($nip)
    {
        $pns = pns::leftjoin('eselons','PNS_KODECH','KD_ESELON')->leftjoin('gols','PNS_GOLRU','KD_GOL')->leftjoin('unor_alls','PNS_UNOR','KD_UNOR')->leftjoin('genposs','PNS_JABSTR','KD_GENPOS')->leftjoin('fposs','PNS_JABFS','KD_FPOS')->leftjoin('diklats','PNS_DIKLST','DIK_DIKCOD')->where('PNS_NIPBARU','=',$nip)->get();
        foreach ($pns as $pns) {
        $nama = nama($pns->PNS_GLRDPN,$pns->PNS_PNSNAM,$pns->PNS_GLRBLK);
        $tmt_eselon = tgl_tmt($pns->PNS_TMTECH);
        if($pns->PNS_KODECH!='61'){
            $jab_lama = $pns->NM_JAB;
        } else {
            $jab_lama = $pns->NM_FPOS.$pns->NM_GENPOS." pada ".$pns->UNIT_KERJA;
        }
        $tmt_jabatan = tgl_tmt($pns->PNS_TMTJAB);
        $tmt_gol = tgl_tmt($pns->PNS_TMTGOL);
        $tmt_diklat = tgl_sambung($pns->PNS_TMTLAT);

        $data = array(
            'nama'          =>  $nama,
            'gol'           =>  $pns->NM_PKT." (".$pns->NM_GOL.") ",
            'tmt_gol'       =>  $tmt_gol,
            'eselon'        =>  $pns->NM_ESELON,
            'tmt_eselon'    =>  $tmt_eselon,
            'jabatan'       =>  $jab_lama,
            'tmt_jabatan'   =>  $tmt_jabatan,
            'diklat'        =>  $pns->DIK_DIKNAM,
            'tmt_diklat'    =>  $tmt_diklat,
            );
        }
       // return $data;

      return response()->json($data);
    }

		public function isi(Request $request)
			{
//				$new = DB::table('data_pns')->where('PNS_NIPBARU','=',$request->nip_baru)->get();
				$new = pns::leftjoin('eselons','PNS_KODECH','KD_ESELON')->leftjoin('gols','PNS_GOLRU','KD_GOL')->leftjoin('unor_alls','PNS_UNOR','KD_UNOR')->leftjoin('genposs','PNS_JABSTR','KD_GENPOS')->leftjoin('fposs','PNS_JABFS','KD_FPOS')->leftjoin('diklats','PNS_DIKLST','DIK_DIKCOD')->leftjoin('kabpatens','PNS_TEMLHR','KD_KABUPAT')->where('PNS_NIPBARU','=',$request->nip_baru)->get();
//return $new;

				$update = m_temp_unor::find($request->id);
		//		return $update;
		//die;

				$update->NIP_PJB = $new[0]->PNS_NIPBARU;
				$update->PNS_PNSNAM = $new[0]->PNS_PNSNAM;
				$update->PNS_GLRDPN = $new[0]->PNS_GLRDPN;
				$update->PNS_GLRBLK = $new[0]->PNS_GLRBLK;
				$update->PNS_KODECH = $new[0]->PNS_KODECH;
				$update->NM_GOL = $new[0]->NM_GOL;
				$update->PNS_GOLRU = $new[0]->PNS_GOLRU;
				$update->PNS_TMTECH = $new[0]->PNS_TMTECH;
				$update->PNS_TMTGOL = $new[0]->PNS_TMTGOL;
				$update->PNS_TMTJAB = $new[0]->PNS_TMTJAB;
				$update->PNS_TGLLHR = $new[0]->PNS_TGLLHR;
				$update->NM_KABUPAT = $new[0]->NM_KABUPAT;
				$update->NM_GENPOS = $new[0]->NM_GENPOS;
				$update->NM_FPOS = $new[0]->NM_FPOS;
				$update->DIK_DIKNAM = $new[0]->DIK_DIKNAM;
				$update->PNS_TMTLAT = $new[0]->PNS_TMTLAT;
				$update->status = 1;
				
				$update->save();

				$id = session()->get('id');
				$baru = draft_musjab::find($id);

				$ba = new m_ba();
				$ba->nip = $request->nip_baru;
				$ba->id_usulan = $id;
				$ba->unor_lm = $new[0]->PNS_UNOR;
				$ba->eselon_lm = $new[0]->PNS_KODECH;
				$ba->tmt_eselon_lm = $new[0]->PNS_TMTECH;
				$ba->unor_br = $request->unor_br;
				$ba->eselon_br = $request->eselon_br;
				$ba->tmt_eselon_br = $baru->tmt_eselon ;
				$ba->save();

				Alert::success('Jabatan '.$request->jab_br.' telah diisi');

				session()->put('tab',1);
				return redirect()->action('musjabController@fill');
			}

			public function batal($id)
			{
				session()->put('tab',3);
				$find = m_ba::find($id);
				$update = m_temp_unor::where('KD_UNOR','=',$find->unor_br);
				//return $update;
        //return redirect()->action('musjabController@fill');
				$update->NIP_PJB = null;
				$update->save();
			}

}
