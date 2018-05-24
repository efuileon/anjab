<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\z_dklt_diklat;
use App\z_dklt_peserta;
use App\z_dklt_jenis;
use DB;
use Alert;

class diklatController extends Controller
{
    public function home()
    {
      $data['sidebar'] = "home";
      return view('diklat.isi.home',$data);
    }

    public function jenis()
    {
      $data['sidebar'] = "jenis";
      $data['jenis'] = z_dklt_jenis::all();
      return view('diklat.isi.jenis',$data);
    }

    public function manajerial()
    {
      $data['sidebar'] = "input";
      $data['jenis'] ="MANAJERIAL";
      $data['diklat'] = z_dklt_diklat::leftjoin('z_dklt_jeniss','z_dklt_diklats.kd_diklat','=','z_dklt_jeniss.kd_diklat')->where('jenis_diklat','=','MANAJERIAL')->get();
      return view('diklat.isi.diklat_layout',$data);
    }

    public function teknis()
    {
      $data['sidebar'] = "input";
      $data['jenis'] ="TEKNIS";
      $data['diklat'] = z_dklt_diklat::leftjoin('z_dklt_jeniss','z_dklt_diklats.kd_diklat','=','z_dklt_jeniss.kd_diklat')->where('jenis_diklat','=','TEKNIS')->get();
      return view('diklat.isi.diklat_layout',$data);
    }

    public function fungsional()
    {
      $data['sidebar'] = "input";
      $data['jenis'] ="FUNGSIONAL";
      $data['diklat'] = z_dklt_diklat::leftjoin('z_dklt_jeniss','z_dklt_diklats.kd_diklat','=','z_dklt_jeniss.kd_diklat')->where('jenis_diklat','=','FUNGSIONAL')->get();
      return view('diklat.isi.diklat_layout',$data);
    }

    public function prajabatan()
    {
      $data['sidebar'] = "input";
      $data['jenis'] ="PRAJABATAN";
      $data['diklat'] = z_dklt_diklat::leftjoin('z_dklt_jeniss','z_dklt_diklats.kd_diklat','=','z_dklt_jeniss.kd_diklat')->where('jenis_diklat','=','PRAJABATAN')->get();
      return view('diklat.isi.diklat_layout',$data);
    }

    public function addDiklat($nama)
    {
      $data['jenis'] = $nama;
      $data['diklat'] = z_dklt_jenis::where('jenis_diklat','=',$nama)->get();
      return view ('diklat.isi.form_add',$data);
    }


    public function isiDiklat(Request $request)
    {
      $jenis = strtolower($request->jenis);
      $diklat = new z_dklt_diklat();
      $diklat->kd_diklat = $request->kd_diklat;
      $diklat->instansi = $request->instansi;
      $diklat->instansi_pembina = $request->instansi_pembina;
      $diklat->angkatan = $request->angkatan;
      $diklat->awal_pelaksanaan=tgl_simpan($request->awal_pelaksanaan);
      $diklat->akhir_pelaksanaan=tgl_simpan($request->akhir_pelaksanaan);
      $diklat->save();
      Alert::success('Data berhasil disimpan!');
      return redirect('diklat/'.$jenis);
    }

    public function addJenis(Request $request)
    {
      $jenis = new z_dklt_jenis();
      $jenis->jenis_diklat = $request->jenis_diklat;
      $jenis->nama_diklat = $request->nama_diklat;
      $jenis->save();
      Alert::success('Data berhasil ditambah!');
      return redirect('diklat/jenis');
    }

    public function postpeserta(Request $request)
    {
      session()->put('kd_prog',$request->kd_prog);
      return redirect('diklat/peserta');
    }
    public function peserta()
    {
			$kd_prog = session()->get('kd_prog');
      $data['sidebar'] = "input";
      $data['diklat'] = z_dklt_diklat::leftjoin('z_dklt_jeniss','z_dklt_diklats.kd_diklat','=','z_dklt_jeniss.kd_diklat')->where('z_dklt_diklats.kd_prog','=',$kd_prog)->get();
      $data['peserta'] = z_dklt_peserta::where('kd_prog','=',$kd_prog)->get();
      return view('diklat.isi.peserta',$data);

    }

}
