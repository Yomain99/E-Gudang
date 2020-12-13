@extends('layouts.main')

@section('title','E-Gudang | Penyewagudang')

@section('container')
<div style="text-align: center; font-family: Bookman Old Style; font-size:30px">DATA PENYEWA GUDANG</div>
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
                    <th>Edit</th>
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
                        Menunggu Verifikasi
                        @endif
                        @if($item->approvement=='verifikasi')
                        Terverifikasi
                        @endif
                    </td>
                    <td>
                        @if ( $item->approvement=='proses')
                        <a href="" class="btn btn-info btn-xs" data-toggle="modal"
                            data-target="#verif-{{$item->id}}">
                            <i class="fa fa-folder"></i> Verifikasi</a>
                        @endif
                        @if ( $item->approvement=='verifikasi')
                        <a href="" class="btn btn-success btn-xs">
                            <i class="fa fa-folder"></i> Terverifikasi</a>
                        @endif
                    </td>
                    <div class="modal fade" id="verif-{{$item->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Verifikasi Pembayaran</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <form action="{{ url('admin/verifbayar',$item->id) }}" method="post">
                                        <div class="modal-body">
                                            @csrf
                                            @method('PATCH')
                                            <div class="form-group">
                                                <label for="">Nama gudang</label>
                                                <p>{{ $namagudang }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Alamat gudang</label>
                                                <p>{{ $address_building }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Harga gudang</label>
                                                <p>Rp {{number_format($cost)}}</h3>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Pelaksanaan</label>
                                                <p><b>Mulai</b></p>
                                                <p>{{ date('d M Y', strtotime($item->day_start)) }}</p>
                                                <p><b>Selesai</b></p>
                                                <p>{{ date('d M Y', strtotime($item->day_over)) }}</p>
                                            </div>
                                            <div class="form-group">
                                                    <label for="">Durasi</label>
                                                    <p>{{$selisih->days + 1}} hari</p>
                                            </div>
                                            <div class="form-group">
                                                    <label for="">Total</label>
                                                    <p>Rp {{number_format($item->salary)}}</p>
                                            </div>
                                            <div class="form-group">
                                                <img src="{{ asset('storage/'. $item->bukti_tf) }}" style="width: 200px; height: 200px;"srcset="">
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" name="id" value="{{$item->id}}">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Verifikasi</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection