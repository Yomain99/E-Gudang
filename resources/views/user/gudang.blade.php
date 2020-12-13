@extends('user.layout.home')

@section('title','Detail gudang')
@section('content')

    <section>
        <article data-postid="{{ $detailgudang->id }}">
            <div class="container">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $detailgudang->name_building }}</li>
                    </ol>
                </nav>

                <div class="col-9 padding-right">
                    <div class="product-details"><!--product-details-->
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="{{ asset('file/'. $detailgudang->files) }}" alt=""/>
                                {{-- <img src="{{ asset('user/images/product-details/1.jpg') }}" alt=""/> --}}
                            </div>

                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                                {{-- <img src="images/product-details/new.jpg" class="newarrival" alt=""/> --}}
                                <h2>{{ $detailgudang->name_building }}</h2>
                                {{-- <img src="images/product-details/rating.png" alt=""/> --}}
                                <span>
									<span>Rp {{ number_format(floatval($detailgudang->cost))}}</span>
									{{-- <i>(Cek ketersediaan dulu sebelum menyewa)</i> --}}

								</span>
                                <p><b>Alamat    :</b> {{ $detailgudang->address_building }}</p>
                                <p><b>Kapasitas/Ton :</b> {{ $detailgudang->capacity }} orang</p>
                                <p><b>Pemilik   : </b>{{ $detailgudang->user->name}} </p>
                                <a href=""><img src="images/product-details/share.png" class="share img-responsive"
                                                alt=""/></a>
                                <table>
                                    <tr>
                                        <td>
                                            <b>Mulai sewa</b>
                                        </td>
                                        <td>
                                            <b>Akhir sewa</b>
                                        </td>
                                    </tr>
                                    <form action="{{url('/sewa')}}" method="POST">
                                        @csrf
                                        <input type="text" name="id" value="{{$detailgudang->id}}" style="display: none">
                                        <tr>
                                            <td>
                                                <input type="date" id="start" name="day_start" required>
                                            </td>
                                            <td>
                                                <input type="date" id="end" name="day_over" required>
                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-fefault cart">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    Sewa
                                                </button>
                                            </td>
                                        </tr>
                                    </form>
                                </table>

                            </div><!--/product-information-->
                        </div>
                    </div><!--/product-details-->

                    <div class="category-tab shop-details-tab"><!--category-tab-->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                {{-- <li><a href="#tag" data-toggle="tab">Cek ketersediaan</a></li> --}}
                                <li class="active"><a href="#reviews" data-toggle="tab">Deskripsi</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade" id="details">
                            </div>

                            {{-- <div class="tab-pane fade" id="tag">
                                <div class="col-sm-6">
                                    <h2>Cek Ketersediaan gudang: </h2>
                                    <form action="">
                                        <input type="date" id="start" class="date">
                                        <input type="submit" class="btn btn-primary">
                                    </form>
                                </div>
                            </div> --}}

                            <div class="tab-pane fade active in" id="reviews">
                                <div class="col-sm-12">
                                    <h2>FASILITAS</h2>
                                    <ul>
                                        @if($detailgudang->antarjemput==1)
                                            <li><a href=""><i class="fa fa-star"></i>ANTAR JEMPUT</a></li>
                                        @endif
                                        @if($detailgudang->pendingin==1)
                                            <li><a href=""><i class="fa fa-star"></i>PENDINGIN</a></li>
                                        @endif
                                        @if($detailgudang->sirkulasi_udara==1)
                                            <li><a href=""><i class="fa fa-star"></i>SIRKULASI UDARA</a></li>
                                        @endif
                                    </ul>
                                    <h2>Kriteria</h2>
                                    @if ($detailgudang->antarjemput + $detailgudang->pendingin + $detailgudang->sirkulasi_udara <= 1) Standart @elseif($detailgudang->antarjemput + $detailgudang->pendingin + $detailgudang->sirkulasi_udara <= 3) VIP @else VVIP @endif
                                    {{-- <p>{{ $detailgudang->description }}</p> --}}
                                    <h2>Ulasan gudang</h2>
                                    <p>{{ $detailgudang->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div><!--/category-tab-->
                </div>
            </div>
        </article>
    </section>
@endsection
