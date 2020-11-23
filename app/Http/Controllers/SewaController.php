<?php

namespace App\Http\Controllers;

use App\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Payment;
use PDF;

class SewaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Sewa = Payment::all();
        return view('owner.penyewa', compact('Sewa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        if ($request->day_start <= $request->day_over) {
            
            $user = Auth::user()->id;
            DB::table('rentals')->insert([
                'id_building'=>$request->id,
                'day_start'=>$request->day_start,
                'day_over'=>$request->day_over,
                'id_loaner'=>$user,
            ]);
            return redirect('rentals')->with('success', 'Data berhasil dipesan');
        }elseif ($request->day_start > $request->day_over){
            return back()->with('fail' , 'Tanggal mulai tidak valid');
        }

        // $id = Auth::user()->id;
        // $sewa = \App\Rental::all()->where('id_loaner','=',$id);
        // $id = Auth::user()->id;
        // $sewa = DB::table('rentals')
        // ->join('buildings', 'buildings.id','=','rentals.id_building')
        // ->wherenotExists(function($query){
        //     $query->select(DB::raw(1))
        //           ->from('payments')
        //           ->whereRaw('payments.id_rental = rentals.id');
        // })
        // ->get();
       

        // return view('user.cart')->with('sewa', $sewa);
    }

    public function rentals()
    {
        $sewa = Rental::where('id_loaner', Auth::user()->id)->get()->all();
        // dd(Auth::user()->id);

        return view('user.cart', compact('sewa'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rental::where('id',$id)->delete();
        return redirect('/sewa')->with('status', 'Data gudang Berhasil di hapus');
    }

    public function bayar($id)
    {
        // $data = Rental::findOrFail($id);
        // dd($data);

        // return view('user.bayar', compact('data'));


        // $data = DB::table('rentals')
        // $data = Rental::findOrFail($id)

        $data = \DB::table('rentals')->where('id', $id)->get()->all();

        // dd($data);
        
        // $data = DB::table('rentals','id','=', $id)
        // ->join('buildings', 'buildings.id','=','rentals.id_building')
        // ->wherenotExists(function($query){
        //     $query->select(DB::raw(1))
        //     ->from('payments')
        //     ->whereRaw('payments.id_rental = rentals.id');
        // })
        // // ->where('id', $id)
        // ->get()->where('id', $id);
        // dd($data);
        return view('user.bayar', compact('data'));

    }

    public function post_bayar(Request $request)
    {
        $rental = Rental::findOrFail($request->id);
        // dd($rental);


        $data = new \App\Payment;
        // $data->day_payment = date('m-d-Y');
        $data->salary = $request->bayar;

        $image = $request->file('bukti_tf');
        if ($image) {
            $image_path = $image->store('bukti_tf', 'public');
            $data->bukti_tf = $image_path;
        }
        $data->approvement = 'proses';
        $data->id_building = $rental->id_building;
        $data->id_loaner = $rental->id_loaner;
        $data->day_start = $rental->day_start;
        $data->day_over = $rental->day_over;
        $data->save();

        Rental::where('id', $request->id)->delete();
        
        return redirect('/checkout');
    }

    public function indexcheckout()
    {
        //
        $checkout = DB::table('payments')->get()->all();

        // dd($checkout);

        return view('user/checkout', compact('checkout'));
    }

    public function verifbayar(Request $request, $id)
    {

        $penyewa = DB::table('payments')
                ->where('id', $id )
                ->update([
                    'approvement' => 'verifikasi'
                    ]);
        return redirect()->back();

    }

    public function cetak($id)
    {
        //
        $checkout = DB::table('payments')->get()->all();

        $pdf = PDF::loadview('masyarakat/pdf', compact('checkout'));
        return $pdf->stream();
    }
}
