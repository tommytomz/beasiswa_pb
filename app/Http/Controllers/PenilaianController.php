<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\PenilaianModel;

class PenilaianController extends Controller
{
    public function formpenilaian(){
    	$model = new PenilaianModel;
    	$datamhs = $model->tampilmhs()->lists('Nama', 'NPM');
		return view('penilaian.formpenilaian', compact('datamhs'));
		//print_r(compact('datamhs'));
    }

    public function simpan(SiswaRequest $request){
    	$model = new MahasiswaModel;
    	$model->npm 			= $request->get('npm');
    	$model->nama 			= $request->get('nama');
    	$model->jeniskelamin 	= $request->get('jeniskelamin');
    	$model->alamat 			= $request->get('alamat');
    	$model->nohp 			= $request->get('nohp');
    	$ok 					= $model->simpan();
    	if($ok){
    		return response()
                ->json([
                    'message' => 'Data berhasil disimpan',
                    'status' => 200
                ], 200);
    	}else{
    		return response()
                ->json([
                    'message' => 'Data gagal disimpan',
                    'status' => 400
                ], 400);
    	}
    }
}
