<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PerhitunganRequest;
use App\PerhitunganModel;
use Yajra\Datatables\Facades\Datatables;

class PerhitunganController extends Controller
{
    public function formperhitungan(){
    	return view('perhitungan.formperhitungan');
    }

    public function datanilai(){
        $model = new PerhitunganModel;
        $data = $model->tampil();

        return Datatables::of($data)->make(true);
    }

    public function prosesperhitungan(PerhitunganRequest $request){
        $model = new PerhitunganModel;
        $data = $model->tampilnilai();
        $vdata          = array();
        $vkriteria      = array();
        $vipk           = array();
        $vpenghasilan   = array();
        $vtanggungan    = array();
        $vjarak         = array();

        $vkriteria =    [
                            [1, $request->get('kriteria1'), $request->get('kriteria2'), $request->get('kriteria3')],
                            [$request->get('hkriteria1'), 1, $request->get('kriteria4'), $request->get('kriteria5')],
                            [$request->get('hkriteria2'), $request->get('hkriteria3'), 1, $request->get('kriteria6')],
                            [$request->get('hkriteria4'),$request->get('hkriteria5'), $request->get('hkriteria6'), 1]
        ];

        $vipk =         [
                            [1, $request->get('ipk1'), $request->get('ipk2')],
                            [$request->get('hipk1'), 1, $request->get('ipk3')],
                            [$request->get('hipk2'), $request->get('hipk3'), 1]
        ];

        $vpenghasilan = [
                            [1, $request->get('penghasilan1'), $request->get('penghasilan2')],
                            [$request->get('hpenghasilan1'), 1, $request->get('penghasilan3')],
                            [$request->get('hpenghasilan2'), $request->get('hpenghasilan3'), 1]
        ];

        $vtanggungan  = [
                            [1, $request->get('tanggungan1'), $request->get('tanggungan2')],
                            [$request->get('htanggungan1'), 1, $request->get('tanggungan3')],
                            [$request->get('htanggungan2'), $request->get('htanggungan3'), 1]
        ];

        $vjarak       = [
                            [1, $request->get('jarak1'), $request->get('jarak2')],
                            [$request->get('hjarak1'), 1, $request->get('jarak3')],
                            [$request->get('hjarak2'), $request->get('hjarak3'), 1]
        ];

        foreach($data as $cdata){
            $vdata[] = array($cdata->IPK, $cdata->Penghasilan_Orangtua, $cdata->Tanggungan_Orangtua, $cdata->Jarak);
        }

        $hasil = $model->ahp($vkriteria, $vdata, array($vipk, $vpenghasilan, $vtanggungan, $vjarak));

        /*return response()
                ->json([
                    'message' => count($d),
                    'status'  => 200
                ], 200);*/
       
        //echo $request->get('kriteria1');
        print_r($hasil);
        
    }

    public function tesahp(){
    	$model = new PerhitunganModel;
    	$kriteria = [
    				 [1, 3, 4],
    				 [0.33, 1, 2],
    				 [0.25, 0.50, 1]
    				];
    	//$model->ahp($kriteria);
    }
}
