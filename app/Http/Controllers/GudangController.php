<?php

namespace App\Http\Controllers;

use App\Building;
use App\Role;
use App\User;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Auth;

class gudangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $gudang = Building::all();
        if (Auth::user()->id_role == 2) {
            return view('owner.indexgudang', compact('gudang'));
        } else if (Auth::user()->id_role == 1) {
            return view('admin.indexgudang', compact('gudang'));
        } else if (Auth::user()->id_role == 3) {
            return view('masyarakat.indexsewa', compact('gudang'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('owner.creategudang');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);


        $request->validate([
            'building_file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        // dd($request); 
        //cari inputan file dari form
        $file = $request->file('building_file');
        // dd($file);
        // nama folder di public
        $folder = 'file';

        // nama file yang disimpan ke folder public
        $file_foto = time() . "_" . $file->getClientOriginalName();

        // pindah file dari form ke folder laravel
        $file->move($folder, $file_foto);



        Building::create([
            'id_owner' => Auth::user()->id,
            'name_building' => $request->building_name,
            'address_building' => $request->building_address,
            'cost' => $request->building_cost,
            'capacity' => $request->building_capacity,
            'antarjemput' => $request->has('antarjemput') ? '1' : '0',
            'pendingin' => $request->has('pendingin') ? '1' : '0',
            'sirkulasi_udara' => $request->has('sirkulasi_udara') ? '1' : '0',
            'description' => $request->building_description,
            'files' => $file_foto
        ]);

        // gudang::create([
        // 'id_owner' => Auth::id(),
        // 'Namagudang' => $request->Namagudang,
        // 'Alamatgudang' => $request->Alamatgudang,
        // 'Biaya' => $request->Biaya,
        // 'Kapasitas' => $request->Kapasitas,
        // 'Keterangan' => $request->Keterangan,
        // 'File' => $file_foto,
        // 'Kriteria' => !empty($request->Kriteria) ? $request->Kriteria : "Sedang" ,
        // 'Verifikasi' => !empty($request->Verifikasi) ? $request->Verifikasi : false
        // ]);


        return redirect()->back()->with('status', 'Data gudang Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show(gudang $gudang)
    // {
    //     //
    //     if (Auth::user()->hasAnyRole('owner')) {
    //         return view('owner.showgudang', ['gudang' => $gudang]);
    //     } else if (Auth::user()->hasAnyRole('admin')) {
    //         return view('admin.showgudang', ['gudang' => $gudang]);
    //     } else if (Auth::user()->hasAnyRole('masyarakat')) {
    //         return view('masyarakat.showgudang', ['gudang' => $gudang]);
    //     }
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function adminverif(Building $gudang)
    {
        $gudang->update([
            'verif' => 1,
            'submission' => 0
        ]);

        return redirect()->back();
    }

    public function adminverifedit(Building $gudang)
    {

        $gudang->update([
            'submission' => 0,
            'verif' => 0,
            'edit' => 1
        ]);

        return redirect()->back();
    }

    public function edit(Building $gudang)
    {
        $gudang->update([
            'verif' => 0,
            'submission' => 0,
            'edit' => 0
        ]);
        // dd($gudang);
        return redirect()->back();
    }

    public function verification()
    {
        
        return view('admin.showgudang', compact('gudang'));
    }

    public function verificationedit()
    {
        
        return view('admin.showgudang', compact('gudang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Building $gudang)
    {
        //

        // return view('admin.showgudang', ['gudang'=> $request]);
        // if (Auth::user()->hasAnyRole('owner')){
        //     return view('owner.indexgudang', ['gudang'=> $gudang]);
        // }
        // else if (Auth::user()->hasAnyRole('admin')){
        //     return view('admin.indexgudang', ['gudang'=> $gudang]);

        // dd($request);

        if (
            $request->building_name == $gudang->name_building &&
            $request->building_address == $gudang->address_building &&
            $request->building_cost == $gudang->cost &&
            $request->building_capacity == $gudang->capacity &&
            $request->building_description == $gudang->description &&
            $request->building_file == null &&
            $request->antarjemput == null &&
            $request->pendingin == null &&
            $request->sirkulasi_udara == null
        ) {
            return redirect()->back()->with('stay', 'Data gudang Tidak ada yang di ubah');
        } else {
            if ($request->building_file) {
                $request->validate([
                    'building_file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
                ]);

                //cari inputan file dari form
                $file = $request->file('building_file');

                // nama folder di public
                $folder = 'file';

                // nama file yang disimpan ke folder public
                $file_foto = time() . "_" . $file->getClientOriginalName();

                // pindah file dari form ke folder laravel
                $file->move($folder, $file_foto);
                $gudang->update([
                    'name_building' => $request->building_name,
                    'address_building' => $request->building_address,
                    'cost' => $request->building_cost,
                    'capacity' => $request->building_capacity,
                    'description' => $request->building_description,
                    'files' => $request->building_file,
                    'antarjemput' => $request->has('antarjemput') ? '1' : '0',
                    'pendingin' => $request->has('pendingin') ? '1' : '0',
                    'sirkulasi_udara' => $request->has('sirkulasi_udara') ? '1' : '0',
                    'verif' => 1,
                    'edit' => 0

                ]);
            } else {
                $gudang->update([
                    'name_building' => $request->building_name,
                    'address_building' => $request->building_address,
                    'cost' => $request->building_cost,
                    'capacity' => $request->building_capacity,
                    'description' => $request->building_description,
                    'antarjemput' => $request->has('antarjemput') ? '1' : '0',
                    'pendingin' => $request->has('pendingin') ? '1' : '0',
                    'sirkulasi_udara' => $request->has('sirkulasi_udara') ? '1' : '0',
                    'verif' => 1,
                    'edit' => 0
                ]);
            }

            return redirect()->back()->with('status', 'Data gudang Berhasil di ubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy(gudang $gudang)
    // {
    //     //
    //     gudang::destroy($gudang->id);
    //     return redirect('owner.indexgudang')->with('status', 'Data gudang Berhasil di hapus');
    // }

    public function pemilik($id)
    {
        //
        $pemilik = User::all()->where('id',$id);
        return view('admin.pemilik', compact('pemilik'));
        // ->join('buildings', 'buildings.id_owner','=','users.id')
        // ->get();
        // dd($pemilik);
    }

    public function penyewa()
    {
        //
        // $rental = \App\Rental::all();
        // $penyewa = \App\Payment::all();
        // $data = DB::table('rentals')
        // dd($penyewa);
        $penyewa = DB::table('payments')->get()->all();
        // dd($penyewa);
        if (Auth::user()->id_role == 1) {
        return view('admin/penyewa', compact('penyewa'));
        } else if (Auth::user()->id_role == 2) {
            return view('owner/penyewa', compact('penyewa'));
        }
    }
}
