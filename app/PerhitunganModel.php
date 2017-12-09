<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class PerhitunganModel extends Model
{
    public function tampil(){
        $proses = DB::select(DB::raw('select 
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

    public function tampilnilai(){
        $proses = DB::select(DB::raw("select 
                                        mhs.NPM,
                                        mhs.Nama,
                                        case
                                            when pn.IPK > 0 and pn.IPK <= 2.70 then
                                                '3'
                                            when pn.IPK > 2.70 and pn.IPK <= 3.20 then
                                                '2'
                                            when pn.IPK > 3.20 and pn.IPK <= 4 then
                                                '1'
                                        end as IPK ,
                                        case 
                                            when pn.Penghasilan_Orangtua > 3500000 then
                                                '3'
                                            when pn.Penghasilan_Orangtua > 2000000 and pn.Penghasilan_Orangtua <= 3500000 then
                                                '2'
                                            when pn.Penghasilan_Orangtua > 0 and pn.Penghasilan_Orangtua <= 2000000 then
                                                '1'
                                        end as Penghasilan_Orangtua,
                                        case
                                            when pn.Tanggungan_Orangtua > 0 and pn.Tanggungan_Orangtua <= 3 then 
                                                '3'
                                            when pn.Tanggungan_Orangtua > 3 and pn.Tanggungan_Orangtua <= 5 then
                                                '2'
                                            when pn.Tanggungan_Orangtua > 5 then
                                                '1'
                                        end as Tanggungan_Orangtua,
                                        case
                                            when pn.Jarak > 0 and pn.Jarak <=5 then
                                                '3'
                                            when pn.Jarak > 5 and pn.Jarak <=10 then
                                                '2'
                                            when pn.Jarak > 10 then
                                                '1'
                                        end as Jarak
                                     from penilaian pn
                                     inner join mahasiswa mhs on pn.NPM = mhs.NPM"));
        $proses = collect($proses);

        return $proses;
    }

    public function ahp($kriteria, $isikriteria, $subkriteria){
    	$vkriteria = $kriteria;

    	$hkriteria   = array();
        $jumlahbaris = array();
        $jumlahkolom = array();
        $evnkriteria = array();
        $amaks       = 0;
        $ci          = 0;
        $cr          = 0;
        $ri          = [0.00, 0.00, 0.58, 0.90, 1.12, 1.24, 1.32, 1.41, 1.45, 1.49, 1.51];

        for($b=0; $b<count($vkriteria); $b++){
            for($k=0; $k<count($vkriteria[0]); $k++){
                //System.out.print(vkriteria[b][k]+" ");
            }
            //System.out.println();
        }
        //System.out.println("-------------------------");
        
        for($b=0; $b<count($vkriteria); $b++){
            $jumlahbaris[$b] = 0;
            for($k=0; $k<count($vkriteria[0]); $k++){
                $jumlahbaris[$b] += $vkriteria[$k][$b];
                //echo($vkriteria[$b][$k]." ");
            }
            //echo "\n";
            //echo($jumlahbaris[$b]." ");
        }
        //echo("<br>-------------------------");
        
        for($b=0; $b<count($vkriteria); $b++){
            for($k=0; $k<count($vkriteria[0]); $k++){
                $hkriteria[$b][$k] = $vkriteria[$b][$k] / $jumlahbaris[$k];
                //System.out.print(hkriteria[b][k]+" ");
            }
            
            //System.out.println();
        }
        //System.out.println("-------------------------");
        
        for($b=0; $b<count($vkriteria); $b++){
            $jumlahkolom[$b] = 0;
            for($k=0; $k<count($vkriteria[0]); $k++){
                $jumlahkolom[$b] += $hkriteria[$b][$k];
            }
            
            //System.out.println(jumlahkolom[b]);
        }
        //System.out.println("-------------------------");
        
        for($b=0; $b<count($vkriteria); $b++){
            $evnkriteria[$b] = $jumlahkolom[$b] / count($vkriteria);
            //System.out.println(evnkriteria[b]);
        }
        //System.out.println("-------------------------");
        
        for($b=0; $b<count($vkriteria); $b++){
            $amaks += ($jumlahbaris[$b] * $evnkriteria[$b]);
            
        }
//        System.out.println(amaks);
//        System.out.println("-------------------------");
        
        $ci = ($amaks - count($vkriteria)) / (count($vkriteria) - 1);
//        System.out.println(ci);
//        System.out.println("-------------------------");
        
        $cr = $ci / $ri[count($vkriteria)-1];
        /*echo($cr);
        echo("<br>-------------------------");*/


        //Sub Kriteria
        $hsubkriteria 	= array();
        $subjumlahbaris = array();
        $subjumlahkolom = array();
        $evnsubkriteria = array();
        $subamaks 		= array();
        $subci    		= array();
        $subcr    		= array();
        $subri  		= [0.00, 0.00, 0.58, 0.90, 1.12, 1.24, 1.32, 1.41, 1.45, 1.49, 1.51];
        
        for($i=0; $i<count($subkriteria); $i++){
            $subamaks[$i]=0;

            for($b=0; $b<count($subkriteria[0]); $b++){
                for($k=0; $k<count($subkriteria[0][0]); $k++){
                    //System.out.print(subkriteria[i][b][k]+" ");
                }
                //System.out.println();
            }
            //System.out.println("-------------------------");
            
            for($b=0; $b<count($subkriteria[0]); $b++){
                $subjumlahbaris[$i][$b] = 0;
                for($k=0; $k<count($subkriteria[0][0]); $k++){
                    $subjumlahbaris[$i][$b] += $subkriteria[$i][$k][$b];
                    //System.out.print(vkriteria[b][k]+" ");
                }

                //System.out.println(subjumlahbaris[i][b]);
            }
            //System.out.println("-------------------------");
            
            for($b=0; $b<count($subkriteria[0]); $b++){
                for($k=0; $k<count($subkriteria[0][0]); $k++){
                    $hsubkriteria[$i][$b][$k] = $subkriteria[$i][$b][$k] / $subjumlahbaris[$i][$k];
                    //System.out.print(hsubkriteria[i][b][k]+" ");
                }

                //System.out.println();
            }
            //System.out.println("-------------------------");
            
            for($b=0; $b<count($subkriteria[0]); $b++){
                $subjumlahkolom[$i][$b] = 0;
                for($k=0; $k<count($subkriteria[0][0]); $k++){
                    $subjumlahkolom[$i][$b] += $hsubkriteria[$i][$b][$k];
                }

                //System.out.println(subjumlahkolom[i][b]);
            }
            //System.out.println("-------------------------");
            
            for($b=0; $b<count($subkriteria[0]); $b++){
                $evnsubkriteria[$i][$b] = $subjumlahkolom[$i][$b] / count($subkriteria[0]);
                
                //echo($evnsubkriteria[$i][$b]);
            }
            //echo "\n";
            
            for($b=0; $b<count($subkriteria[0]); $b++){
                $subamaks[$i] += ($subjumlahbaris[$i][$b] * $evnsubkriteria[$i][$b]);

            }
            /*echo ($subamaks[0]);
            echo("-------------------------");*/

            $subci[$i] = ($subamaks[$i] - count($subkriteria)) / (count($subkriteria) - 1);
            //System.out.println(subci[i]);
            //System.out.println("-------------------------");
//
            $subcr[$i] = $subci[$i] / $subri[count($subkriteria)-1];
            //echo($subcr[$i]."|");
            //System.out.println("-------------------------");
        }
            //1 = Baik
	        //2 = Cukup
	        //3 = Kurang
	        $statuscr = array();
	        
	        if($cr > 0.1){
	            $statuscr[0] = 1;
	        }
	        else{
	            for($a=0; $a<count($subcr); $a++){
	                if($subcr[$a] > 0.1){
	                    $statuscr[0] = ($a+2);
	                    break;
	                }else{
	                    $statuscr[0] = 0;
	                }
	            }
	        }
            //echo $statuscr[0];
	        if($statuscr[0]==0){
	            $hasilakhir 	= array();
	            $jumlahakhir  	= array();

	            for($b=0; $b<count($isikriteria); $b++){
                    
	                for($k=0; $k<count($isikriteria[0]); $k++){
                            //$hasilakhir[$bb][$kk] = 0;
	                       $hasilakhir[$b][$k] = $evnkriteria[$k] * $evnsubkriteria[$k][$isikriteria[$b][$k]-1];

	                    //echo($evnsubkriteria[1][0]." ");
	                }
	                //echo "\n";
	            }

                //print_r($evnsubkriteria);
	            for($b=0; $b<count($isikriteria); $b++){
	                $jumlahakhir[$b] = 0;
	                for($k=0; $k<count($isikriteria[0]); $k++){
	                    $jumlahakhir[$b] += $hasilakhir[$b][$k];
	                }
	                //System.out.println(jumlahakhir[b]);
	            }
	            
	            return $jumlahakhir;
	        }
	        else{
	//            if(statuscr[0]==1){
	//                System.out.println("Preferensi Pembobotan Kriteria Tidak Konsisten");
	//            }else{
	//                System.out.println("Preferensi Pembobotan Sub Kriteria Tidak Konsisten (Sub Kriteria : "+(statuscr+1)+")");
	//            }
	            
	            return $statuscr;
	        }

        }
}
