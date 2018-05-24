<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pns;
use DB;

class peremajaanController extends Controller
{
  public function home()
  {
    $data['sidebar'] = "peremajaan";
    return view('musjab.isi.peremajaan.home',$data);
  }

  public function cari(Request $request)
  {
    $data['sidebar'] = "peremajaan";
    $data['pns'] = pns::where('PNS_NIPBARU','like','%'.$request->nip_baru.'%')->get();
//    return $data;
  return view('musjab.isi.peremajaan.listcari',$data);
  }
}
