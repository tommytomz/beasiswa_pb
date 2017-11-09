<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class PenilaianModel extends Model
{
    public function tampilmhs(){
    	$proses = DB::select(DB::raw('select NPM, Nama from mahasiswa'));
        $proses = collect($proses);

    	return $proses;
    }

    public function simpan(){
    	$proses = DB::insert('insert into siswa (NPM, Nama, Jenis_Kelamin, Alamat, No_HP) values (?, ?, ?, ?, ?)', 
    		[$this->npm, $this->nama, $this->jeniskelamin, $this->alamat, $this->nohp]);

    	
    	return $proses;
    }

    public function ubah(){
    	$proses = DB::update('update siswa set NPM = ?, Nama = ?, Jenis_Kelamin = ?, Alamat = ?, No_HP = ? where NPM = ?',
    		[$this->npm, $this->nama, $this->jeniskelamin, $this->alamat, $this->nohp, $this->key]);

    	
    	return $proses;
    }

    public function hapus(){
    	$proses = DB::delete('delete from siswa where NPM = ?', [$this->npm]);

    	
    	return $proses;
    }

    public function tampil(){
    	$proses = DB::select(DB::raw('select * from siswa'));
        $proses = collect($proses);

    	return $proses;
    }

    public function tampilubah(){
    	$proses = DB::select('select * from siswa where NPM = ?', [$this->npm]);

    	return $proses;
    }
}
