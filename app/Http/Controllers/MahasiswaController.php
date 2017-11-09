<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\SiswaRequest;
use App\MahasiswaModel;
use Yajra\Datatables\Facades\Datatables;

class MahasiswaController extends Controller
{
    public function formmhs(){
    	return view('mahasiswa.formmahasiswa');
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

    public function daftarmhs(){
        $model = new MahasiswaModel;
        return view('mahasiswa.daftarmahasiswa');
    }

    public function datamhs(){
        $model = new MahasiswaModel;
        $data = $model->tampil();

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return '<a href="/mahasiswa/formubahmhs?npm='.$data->NPM.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Ubah</a> | <a href="#" class="btn btn-xs btn-danger" id="hapusdata" data-id="'.$data->NPM.'"><i class="glyphicon glyphicon-remove"></i> Hapus</a>';
            })

            ->make(true);
    }

    public function formubahmhs(){
        $model = new MahasiswaModel;
        $model->npm = $_GET['npm'];
        $data = $model->tampilubah();
        //print_r($data);
        return view('mahasiswa.formubahmahasiswa', ['data' => $data]);
    }

    public function ubah(SiswaRequest $request){
        $model = new MahasiswaModel;
        $model->key             = $request->get('key');
        $model->npm             = $request->get('npm');
        $model->nama            = $request->get('nama');
        $model->jeniskelamin    = $request->get('jeniskelamin');
        $model->alamat          = $request->get('alamat');
        $model->nohp            = $request->get('nohp');
        $ok                     = $model->ubah();
        if($ok){
            return response()
                ->json([
                    'message' => 'Data berhasil diubah',
                    'status' => 200
                ], 200);
        }else{
            return response()
                ->json([
                    'message' => 'Data gagal diubah',
                    'status' => 400
                ], 400);
        }
    }

    public function hapus(){
        $model = new MahasiswaModel;
        $model->npm = $_GET['npm'];
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
