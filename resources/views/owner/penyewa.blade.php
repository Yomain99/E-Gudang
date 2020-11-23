@extends('layouts.main')

@section('title','E-Gudang | Penyewagudang')

@section('container')
<div style="text-align: center; font-family: Bookman Old Style; font-size:30px">DATA PENYEWA gudang</div>
<br>
<br>
<div class="x_panel">
    <div class="x_content">
        <table id="datatable" class="table table-striped jambo_table bulk-action">
            <thead>
                <tr class="headings">
                    <th scope="row">No.</th>
                    <th>Nama gudang</th>
                    <th>Alamat gudang</th>
                    <th>Harga</th>
                    <th>Pelaksanaan</th>
                    <th>Durasi</th>
                    <th>Total</th>
                    <th>Bukti Transfer</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penyewa as $item)
                @php
                    $datetime1 = new DateTime($item->day_over);
                    $datetime2 = new DateTime($item->day_start);
                    $selisih = $datetime1->diff($datetime2);
                    $namagudang = \DB::table('buildings')->where('id', $item->id_building)->value('name_building');
                    $address_building = \DB::table('buildings')->where('id', $item->id_building)->value('address_building');
                    $cost = \DB::table('buildings')->where('id', $item->id_building)->value('cost');
                    // dd($cost);
                    // $hargagudang = $data->cost;
                    // dd($namagudang, $hargagudang);
                    // dd($selisih->days)
                @endphp
                <tr>
                <td scope="row">{{$loop->iteration}}</td>
                    <td>{{$namagudang}}</td>
                    <td>{{$address_building}}</td>
                    <td>Rp {{number_format($cost)}}</td>
                    <td>
                        <p>Mulai</p>
                        <span><b id="start_date">{{ date('d M Y', strtotime($item->day_start)) }}</b></span>
                        <br>
                        <br>
                        <p>Selesai</p>
                        <span><b id="start_date">{{ date('d M Y', strtotime($item->day_over)) }}</b></span>
                    </td>
                    <td>
                        <span><b>{{$selisih->days + 1}} hari</b></span>
                    </td>
                    <td>Rp {{number_format($item->salary)}}</td>
                    <td>
                        <img src="{{ asset('storage/'. $item->bukti_tf) }}" alt="" width="100px" height="80px">
                    </td>
                    <td>
                        @if($item->approvement=='proses')
                        <span class="btn btn-info">Menunggu verifikasi</span>
                        @endif
                        @if($item->approvement=='verifikasi')
                        <span class="btn btn-success">Terverifikasi</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection