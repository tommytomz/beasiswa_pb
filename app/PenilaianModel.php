<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class PenilaianModel extends Model
{
    public $npm;
    public $ipk;
    public $penghasilan;
    public $tanggungan;
    public $jarak;
    public $key;

    public function tampilmhs(){
    	$proses = DB::select(DB::raw('select NPM, Nama from mahasiswa'));
        $proses = collect($proses);

    	return $proses;
    }

    public function simpan(){
    	$proses = DB::insert('insert into penilaian (NPM, IPK, Penghasilan_Orangtua, Tanggungan_Orangtua, Jarak) values (?, ?, ?, ?, ?)', 
    		[$this->npm, $this->ipk, $this->penghasilan, $this->tanggungan, $this->jarak]);

    	
    	return $proses;
    }

    public function ubah(){
    	$proses = DB::update('update penilaian set NPM = ?, IPK = ?, Penghasilan_Orangtua = ?, Tanggungan_Orangtua = ?, Jarak = ? where ID_Penilaian = ?',
    		[$this->npm, $this->ipk, $this->penghasilan, $this->tanggungan, $this->jarak, $this->key]);

    	
    	return $proses;
    }

    public function hapus(){
    	$proses = DB::delete('delete from penilaian where ID_Penilaian = ?', [$this->key]);

    	
    	return $proses;
    }

    public function tampil(){
    	$proses = DB::select(DB::raw('select 
                                        pn.ID_Penilaian,
                                        mhs.NPM,
                                        mhs.Nama,
                                        pn.IPK,
                                        pn.Penghasilan_Orangtua,
                                        pn.Tanggungan_Orangtua,
                                        pn.Jarak
                                     from penilaian pn
                                     inner join mahasiswa mhs on pn.NPM = mhs.NPM'));
        $proses = collect($proses);

    	return $proses;
    }

    public function tampilubah(){
    	$proses = DB::select('select 
                                pn.ID_Penilaian,
                                mhs.NPM,
                                mhs.Nama,
                                pn.IPK,
                                pn.Penghasilan_Orangtua,
                                pn.Tanggungan_Orangtua,
                                pn.Jarak
                              from penilaian pn
                              inner join mahasiswa mhs on pn.NPM = mhs.NPM
                              where ID_Penilaian = ?', [$this->key]);

    	return $proses;
    }
}
