@extends('user.layout.home')

@section('title','Detail gudang')
@section('content')

<section id="cart_items">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sewa</li>
            </ol>
        </nav>
        
        <div class="review-payment">
            <h2>Review Penyewaan</h2>
        </div>
        
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">gudang</td>
                        <td class="price">Harga</td>
                        <td class="start">Pelaksanaan</td>
                        <td class="start">Tanggal Bayar</td>
                        <td class="selesai">Total dan Bukti</td>
                        <td class="total"></td>
                        <td>Verifikasi</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($checkout as $item)

                    @php
                        $gambar = \DB::table('buildings')->where('id', $item->id_building)->value('files');
                        $name_building = \DB::table('buildings')->where('id', $item->id_building)->value('name_building');
                        $cost = \DB::table('buildings')->where('id', $item->id_building)->value('cost');
                        // dd($bukti_tf);
                    @endphp

                    <article data-postid="{{ $item->id }}">
                        <tr>
                            <td class="cart_product">
                                <a href=""><img src="{{ asset('file/'. $gambar) }}" alt="" width="100px"></a>
                                <br>
                                <h4><span>{{ $name_building }}</span></h4>
                            </td>
                            <td class="cart_price">
                                <p>Rp {{ number_format(floatval($cost*1.1)) }}</p>
                            </td>
                            <td>
                                <p>Mulai</p>
                                <span><b id="start_date">{{ date('d M Y', strtotime($item->day_start)) }}</b></span>
                                <br>
                                <br>
                                <p>Selesai</p>
                                <span><b id="start_date">{{ date('d M Y', strtotime($item->day_over)) }}</b></span>

                            </td>
                            <td>
                                <p>{{ date('d M Y', strtotime($item->created_at)) }}</p>
                            </td>
                            <td>
                                <img src="{{ asset('storage/'. $item->bukti_tf) }}" alt="" width="100px" height="80px">
                            </td>
                            <td></td>
                            <td>
                                @if($item->approvement=='proses')
                                <button type="button" class="btn btn-default get">Proses</button>
                                @endif
                                @if($item->approvement=='verifikasi')
                                <p class="btn btn-default">Terverifikasi</p><br>
                                <a href="/cetakpdf/{{$item->id}}" class="btn btn-default get"> Cetak  Bukti </a>
                                @endif
                            </td>
                        </tr>
                    </article>
                        <tr>
                            <td colspan="4">&nbsp;</td>
                            <td colspan="2">
                                    @php
                                    $datetime1 = new DateTime($item->day_over);
                                    $datetime2 = new DateTime($item->day_start);
                                    $selisih = $datetime1->diff($datetime2);
                                    // dd($selisih->days)
                                    @endphp
                                <table class="table table-condensed total-result">
                                    <tr>
                                        <td>Total</td>
                                        <td><span>Rp {{ number_format(floatval($item->salary+($item->salary*0.1)))}}</span></td>
                                    </tr>
                                    <tr>
                                        
                                        <td>Lama penyewaan</td>
                                        <td>{{$selisih->days + 1}} hari</td>
                                    </tr>
                                    <tr>
                                    </tr>
                                    
                                </table>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    </section> <!--/#cart_items-->
    @endsection
    