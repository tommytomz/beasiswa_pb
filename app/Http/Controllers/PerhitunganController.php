<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\PerhitunganModel;

class PerhitunganController extends Controller
{
    public function formperhitungan(){
    	return view('perhitungan.formperhitungan');
    }

    public function tesahp(){
    	$model = new PerhitunganModel;
    	$kriteria = [
    				 [1, 3, 4],
    				 [0.33, 1, 2],
    				 [0.25, 0.50, 1]
    				];
    	$model->ahp($kriteria);
    }
}
