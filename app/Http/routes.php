<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('tes', function () {
    return view('welcome');
});*/

Route::get('/', 'HomeController@index');

Route::get('/form', 'FormController@form');

Route::get('/mahasiswa/formmhs', 'MahasiswaController@formmhs');
Route::post('/mahasiswa/simpan', 'MahasiswaController@simpan');
Route::get('/mahasiswa/daftarmhs', 'MahasiswaController@daftarmhs');
Route::get('/mahasiswa/datamhs', 'MahasiswaController@datamhs')
			->name('datamhs.data');
Route::get('/mahasiswa/formubahmhs', 'MahasiswaController@formubahmhs');
Route::post('/mahasiswa/ubah', 'MahasiswaController@ubah');
Route::get('/mahasiswa/hapus', 'MahasiswaController@hapus');

Route::get('/penilaian/formpenilaian', 'PenilaianController@formpenilaian');
Route::post('/penilaian/simpan', 'PenilaianController@simpan');
Route::get('/penilaian/daftarpenilaian', 'PenilaianController@daftarpenilaian');
Route::get('/penilaian/datapenilaian', 'PenilaianController@datapenilaian')
			->name('datapenilaian.data');
Route::get('/penilaian/formubahpenilaian', 'PenilaianController@formubahpenilaian');
Route::post('/penilaian/ubah', 'PenilaianController@ubah');
Route::get('/penilaian/hapus', 'PenilaianController@hapus');

Route::get('/perhitungan/formperhitungan', 'PerhitunganController@formperhitungan');
Route::get('/perhitungan/tesahp', 'PerhitunganController@tesahp');
