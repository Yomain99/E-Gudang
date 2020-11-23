<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SortController extends Controller
{
    public function sort()
    {
        $gudang = \App\Building::all();

        foreach ($gudang as $gudang) {

            //Harga
            if ($gudang->cost <= 500000) {  //sangat murah
                $c1 = 0.2;
            } elseif ($gudang->cost <= 1500000) {  //murah
                $c1 = 0.4;
            } elseif ($gudang->cost <= 3000000) {  //cukup murah
                $c1 = 0.6;
            } elseif ($gudang->cost <= 4500000) {  //mahal
                $c1 = 0.8;
            } else {   //sangat mahal
                $c1 = 1;
            }

            //kapasitas
            if ($gudang->capacity <= 1500) {  //sangat kecil
                $c2 = 0.2;
            } elseif ($gudang->capacity <= 3000) { //kecil
                $c2 = 0.4;
            } elseif ($gudang->capacity <= 4500) { //sedang
                $c2 = 0.6;
            } elseif ($gudang->capacity <= 6000) { //besar
                $c2 = 0.8;
            } else {  //sangat besar
                $c2 = 1;
            }

            //fasilitas
            $fx = 0;
            $fasilitas = array("$gudang->antarjemput", "$gudang->", "$gudang->pendingin", "$gudang->sirkulasi_udara");
            for ($i = 0; $i < 3; $i++) {
                if ($fasilitas[$i] == 0) {
                    $fx = 1 + $fx;
                } else {
                    $fx = 0 + $fx;
                }
            }
            if ($fx <= 1) {
                $c3 = 0.2;
            } elseif ($fx <= 2) {
                $c3 = 0.4;
            } elseif ($fx <= 3) {
                $c3 = 0.6;
            } else {
                $c3 = 1;
            }

            //lokasi
            if ($gudang->capacity == "sangat tidak strategis") {  //sangat kecil
                $c4 = 0.2;
            } elseif ($gudang->capacity == "tidak strategis") { //kecil
                $c4 = 0.4;
            } elseif ($gudang->capacity == "cukup strategis") { //sedang
                $c4 = 0.6;
            } elseif ($gudang->capacity == "strategis") { //besar
                $c4 = 0.8;
            } else {  //sangat besar
                $c4 = 1;
            }
        }
    }

    public function cost()
    {
        $Xij =array_sum();
        $minxij = array_sum();
        $Rij = $minxij/$Xij;
    }

    public function benefit(){
        $Xij =array_sum() ;
        $maxxij = array_sum();
        $Rij = $maxxij/$Xij;
    }

    public function total(){

    }
}
