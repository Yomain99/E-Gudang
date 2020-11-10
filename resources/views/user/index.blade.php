@extends('user.layout.home')

@section('title','Beranda')
@section('content')

                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 padding-right">
                            <div class="features_items"><!--features_items-->
                                <br>
                                <h2 class="title text-center">Cari gudang</h2>
                                
                                @foreach($verif as $gudang)
                                <div class="col-sm-4">
                                    <article data-postid="{{ $gudang->id }}">
                                        <div class="product-image-wrapper" >
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img style="width:10cm; height:7cm" src="{{ asset('file/'. $gudang->files) }}" alt=""/>
                                                    <h2>Rp {{ number_format($gudang->cost) }} /hari</h2>
                                                    <p><h4>{{$gudang->name_building}}<h4></p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Sewa
                                                    </a>
                                                </div>
                                                <a href="/gudang/{{ $gudang->id }}">
                                                    <div class="product-overlay">
                                                        <div class="overlay-content">
                                                            <h2>Rp {{number_format($gudang->cost)}} /hari</h2>
                                                            <p><h4>{{$gudang->name_building}}</h4></p>
                                                            <a href="/gudang/{{ $gudang->id }}" class="btn btn-default add-to-cart"><i
                                                                class="fa fa-shopping-cart"></i>Sewa
                                                            </a>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                @endforeach
                                @foreach($edit as $gudang)
                                <div class="col-sm-4">
                                    <article data-postid="{{ $gudang->id }}">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img style="width:10cm; height:7cm" src="{{ asset('file/'. $gudang->files) }}" alt=""/>
                                                    <h2>Rp {{number_format($gudang->cost) }} /hari</h2>
                                                    <p><h2>{{$gudang->name_building}}</h2></p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Sewa</a>
                                                    </div>
                                                    <a href="/gudang/{{ $gudang->id }}">
                                                        <div class="product-overlay">
                                                            <div class="overlay-content">
                                                                <h2>Rp {{ number_format($gudang->cost)}}/hari</h2>
                                                                <p><h4>{{$gudang->name_building}}<h4></p>
                                                                <a href="#" class="btn btn-default add-to-cart"><i
                                                                    class="fa fa-shopping-cart"></i>Sewa</a>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                    
                                </div><!--features_items-->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            
            @endsection
            
            