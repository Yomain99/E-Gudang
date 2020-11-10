<?php

namespace App\Http\Controllers;

use App\Building;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Rental;
use DateTime;

class PenyewaController extends Controller
{
    public function index(){
        $gudang = Building::all();
        $verif = $gudang->where('verif','=','1');
        $edit = $gudang->where('edit','=',1);

        return view('user.index')
            ->with('verif', $verif)
            ->with('edit', $edit);
    }


    public function Detailgudang($id){
        $detailgudang = Building::find($id);

        return view('user.gudang',['detailgudang'=>$detailgudang]);
    }


    public function sewa(){
        
        $id = Auth::user()->id;
        $sewa = \App\Rental::where('id_loaner',$id)->get()->all();
        // dd($sewa);
        return view('user.cart', compact(['sewa']));
    }
}
