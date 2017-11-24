<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerhitunganModel extends Model
{
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
                //System.out.print(evnsubkriteria[i][b]+" ");
            }
            //System.out.println("-------------------------");
            
            for($b=0; $b<count($subkriteria[0]); $b++){
                $subamaks[$i] += ($subjumlahbaris[$i][$b] * $evnsubkriteria[$i][$b]);

            }
            //System.out.println(subamaks[i]);
            //System.out.println("-------------------------");

            $subci[$i] = ($subamaks[$i] - count($subkriteria)) / (count($subkriteria) - 1);
            //System.out.println(subci[i]);
            //System.out.println("-------------------------");
//
            $subcr[$i] = $subci[$i] / $subri[count($subkriteria)-1];
            //System.out.println(subcr[i]);
            //System.out.println("-------------------------");

            //1 = Baik
	        //2 = Cukup
	        //3 = Kurang
	        $statuscr = arrary();
	        
	        if($cr > 0.1){
	            $statuscr[0] = 1;
	        }
	        else{
	            for($i=0; $i<count($subcr); $i++){
	                if($subcr[i] > 0.1){
	                    $statuscr[0] = (i+2);
	                    break;
	                }else{
	                    $statuscr[0] = 0;
	                }
	            }
	        }

	        if($statuscr[0]==0){
	            $hasilakhir 	= array();
	            $jumlahakhir  	= array();

	            for($b=0; $b<count($isikriteria); $b++){
	                for($k=0; $k<count($isikriteria[0]); $k++){
	                        $hasilakhir[$b][$k] = $evnkriteria[$k] * $evnsubkriteria[$k][$isikriteria[$b][$k]-1];

	                    //System.out.print(hasilakhir[b][k]+" ");
	                }
	                //System.out.println();
	            }

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
}
