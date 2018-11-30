<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\z_menu;
use App\z_unit_kerja;
use App\z_struktur;
use App\z_jabatan;
use App\z_m_fungsional;
use App\z_jabfung;

use Excel;
use DB;
use Alert;
use PDF;

class organisasiController extends Controller
{
    public function login()
    {
      return redirect('home');
    }
//// home ////////////////////////////////////////////////////////////////////////
    public function home()
    {
      return view('organisasi/isi/home');
    }

//// unit_kerja ////////////////////////////////////////////////////////////////////////
    public function unit_kerja()
    {
      $data['unit_kerja'] = z_unit_kerja::all();

      return view('organisasi/isi/unit_kerja',$data);
    }

    public function tambah_unit_kerja()
    {
      $data['unker'] = "";

      return view('organisasi/isi/form_unit_kerja',$data);
    }

    public function add_unit_kerja(Request $request)
    {
      $unker = new z_unit_kerja;
      $unker->unit_kerja = $request->unit_kerja;
      $unker->save();
      Alert::success('Unit kerja '.$request->unit_kerja.' telah ditambahkan');
      return redirect()->back();
    }

    public function edit_unit_kerja($id_unker)
    {
      $data['unker'] = z_unit_kerja::find($id_unker);
      return view('organisasi/isi/form_unit_kerja',$data);
    }

    public function ubah_unit_kerja(Request $request)
    {
      $unker = z_unit_kerja::find($request->id_unker);
      $unker->unit_kerja = $request->unit_kerja;
      $unker->save();
      Alert::success('Unit kerja telah diubah');
      return redirect()->back();
    }

//// struktur ////////////////////////////////////////////////////////////////////////
    public function struktur($id_unker)
    {
      $data['unker'] = z_unit_kerja::find($id_unker);
      $data['id_unker'] = $id_unker;
      $data['struktur'] = z_struktur::leftjoin('z_jabatans','jabatan','id_jabatan')->where('id_unker',$id_unker)->where('child',0)->get();
      return view('organisasi/isi/struktur',$data);
    }


    public function buat_struktur($id_unker,$id_struktur)
    {
      $data['unker'] = z_unit_kerja::find($id_unker);
      $data['id_struktur'] = $id_struktur;
      $data['jabatan'] = z_jabatan::all();
      return view('organisasi/isi/form_struktur',$data);
    }
    public function buat_struktur2($id_unker,$id_struktur)
    {
      $data['unker'] = z_unit_kerja::find($id_unker);
      $data['id_struktur'] = $id_struktur;
      $data['atasan'] = z_struktur::leftjoin('z_jabatans','jabatan','id_jabatan')->where('id_struktur',$id_struktur)->first();
      $data['jabatan'] = z_jabatan::all();
      return view('organisasi/isi/form_struktur2',$data);
    }

    public function buat_simpan_struktur(Request $request)
    {
      $struktur = new z_struktur;
      $struktur->id_unker = $request->id_unker;
      $struktur->child = $request->id_struktur;
      $struktur->jabatan = $request->id_jabatan;
      $struktur->head = 1;
      $struktur->save();
      Alert::success('Atasan Organisasi telah ditambahkan');
      return redirect('organisasi/struktur/'.$request->id_unker);
    }

    public function tambah_jabfung($id_unker,$id_struktur)
    {
      $data['unker'] = z_unit_kerja::find($id_unker);
      $data['id_struktur'] = $id_struktur;
      $data['atasan'] = z_struktur::leftjoin('z_jabatans','jabatan','id_jabatan')->where('id_struktur',$id_struktur)->first();
      $data['jabatan'] = z_m_fungsional::all();
      return view('organisasi/isi/form_jabfung',$data);
    }

    public function add_jabfung(Request $request)
    {
      $struktur = new z_jabfung;
      $struktur->kd_struktur = $request->id_struktur;
      $struktur->kd_fungsional = $request->id_fungsional;
      $struktur->save();
      Alert::success('Jabatan Fungsional telah ditambahkan');
      return redirect('organisasi/struktur/'.$request->id_unker);
    }

    public function jabfung($id_jabfung)
    {
      $data['jabfung'] = z_jabfung::find($id_jabfung)->leftjoin('z_strukturs','kd_struktur','id_struktur')->leftjoin('z_m_fungsionals','kd_fungsional','id_fungsional')->first();

      return view('organisasi/isi/jabfung',$data);

    }

}
