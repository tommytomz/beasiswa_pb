<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class MahasiswaModel extends Model
{
	public $npm;
	public $nama;
	public $jeniskelamin;
	public $alamat;
	public $nohp;
    public $key;

    public function simpan(){
    	$proses = DB::insert('insert into mahasiswa (NPM, Nama, Jenis_Kelamin, Alamat, No_HP) values (?, ?, ?, ?, ?)', 
    		[$this->npm, $this->nama, $this->jeniskelamin, $this->alamat, $this->nohp]);

    	/*if($proses){
    		$status = 1;
    	}else{
    		$status = 0;
    	}*/
    	return $proses;
    }

    public function ubah(){
    	$proses = DB::update('update mahasiswa set NPM = ?, Nama = ?, Jenis_Kelamin = ?, Alamat = ?, No_HP = ? where NPM = ?',
    		[$this->npm, $this->nama, $this->jeniskelamin, $this->alamat, $this->nohp, $this->key]);

    	/*if($proses){
    		$status = 1;
    	}else{
    		$status = 0;
    	}*/
    	return $proses;
    }

    public function hapus(){
    	$proses = DB::delete('delete from mahasiswa where NPM = ?', [$this->npm]);

    	/*if($proses){
    		$status = 1;
    	}else{
    		$status = 0;
    	}*/
    	return $proses;
    }

    public function tampil(){
    	$proses = DB::select(DB::raw('select * from mahasiswa'));
        $proses = collect($proses);

    	return $proses;
    }

    public function tampilubah(){
    	$proses = DB::select('select * from mahasiswa where NPM = ?', [$this->npm]);

    	return $proses;
    }
}
