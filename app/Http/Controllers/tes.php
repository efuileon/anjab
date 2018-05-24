<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tes extends Controller
{
    public function tes()
    {
   // $data['sidebar'] = "tes";
   $data['sidebar'] = "peremajaan";
    return view('musjab.isi.tes3',$data);
	}
}
