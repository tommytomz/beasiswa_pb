<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PenilaianRequest;
use App\PenilaianModel;
use Yajra\Datatables\Facades\Datatables;

class PenilaianController extends Controller
{
    public function formpenilaian(){
    	$model = new PenilaianModel;
    	$datamhs = $model->tampilmhs()->lists('Nama', 'NPM');
		return view('penilaian.formpenilaian', compact('datamhs'));
		//print_r(compact('datamhs'));
    }

    public function simpan(PenilaianRequest $request){
    	$model = new PenilaianModel;
    	$model->npm 			= $request->get('mahasiswa');
    	$model->ipk 			= $request->get('ipk');
    	$model->penghasilan 	= $request->get('penghasilan');
    	$model->tanggungan 		= $request->get('tanggungan');
    	$model->jarak 			= $request->get('jarak');
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
        //echo $request->get('mahasiswa');
    }

    public function daftarpenilaian(){
        $model = new PenilaianModel;
        return view('penilaian.daftarpenilaian');
    }

    public function datapenilaian(){
        $model = new PenilaianModel;
        $data = $model->tampil();

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return '<a href="/penilaian/formubahpenilaian?id='.$data->ID_Penilaian.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Ubah</a> | <a href="#" class="btn btn-xs btn-danger" id="hapusdata" data-id="'.$data->ID_Penilaian.'"><i class="glyphicon glyphicon-remove"></i> Hapus</a>';
            })

            ->make(true);
    }

    public function formubahpenilaian(){
        $model = new PenilaianModel;
        $model->key = $_GET['id'];
        $data = $model->tampilubah();
        $datamhs = $model->tampilmhs()->lists('Nama', 'NPM');
        //print_r($data);
        return view('penilaian.formubahpenilaian', ['data' => $data], compact('datamhs'));
    }

    public function ubah(PenilaianRequest $request){
        $model = new PenilaianModel;
        $model->key             = $request->get('key');
        $model->npm             = $request->get('mahasiswa');
        $model->ipk             = $request->get('ipk');
        $model->penghasilan     = $request->get('penghasilan');
        $model->tanggungan      = $request->get('tanggungan');
        $model->jarak           = $request->get('jarak');
        $ok                     = $model->ubah();
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
        //echo $request->get('mahasiswa');
    }

    public function hapus(){
        $model = new PenilaianModel;
        $model->key = $_GET['key'];
        $ok = $model->hapus();

        if($ok){
            return response()
                ->json([
                    'message' => 'Data berhasil dihapus',
                    'status' => 200
                ], 200);
        }else{
            return response()
                ->json([
                    'message' => 'Data gagal dihapus',
                    'status' => 400
                ], 400);
        }

    }

}
