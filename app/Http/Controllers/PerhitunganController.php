<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PerhitunganController extends Controller
{
    public function formperhitungan(){
    	return view('perhitungan.formperhitungan');
    }
}
