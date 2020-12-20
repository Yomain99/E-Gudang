@extends('layouts.main')

@section('title','E-Gudang | Data gudang')

@section('container')
<div style="text-align: center; font-family: Bookman Old Style; font-size:30px">Data gudang</div>
<br>
<br>
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
<div class="x_panel">
    <div class="x_content">
        <table id="datatable" class="table table-striped jambo_table bulk-action">
            <thead>
                <tr class="headings">
                    <th scope="row">No.</th>
                    <th>Nama gudang</th>
                    <th>Alamat gudang</th>
                    <th>Harga gudang</th>
                    <th>Harga tertera</th>
                    <th>Pemilik</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $gudang as $gudang )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $gudang->name_building }}</td>
                    <td>{{ $gudang->address_building }}</td>
                    <td>Rp {{number_format($gudang->cost)  }}</td>
                    <td>Rp {{number_format($gudang->cost*1.1)  }}</td>
                <td><a href="{{ url('admin/pemilik',$gudang->user->id)}}" >{{$gudang->user->name}}</td>
                    <td>
                        @if ( $gudang->submission==1 && $gudang->verif==0 && $gudang->edit==0)
                        Belum terverifikasi
                        @elseif($gudang->verif == 1 && $gudang->submission == 0 && $gudang->edit == 0)
                        Terverifikasi
                        @elseif($gudang->verif == 0 && $gudang->submission == 0 && $gudang->edit == 1)
                        Pengeditan
                        @elseif($gudang->verif == 0 && $gudang->submission == 0 && $gudang->edit == 0)
                        Pengajuan Pengeditan
                        @endif
                    </td>

                    <td>
                        @if ( $gudang->submission==1 && $gudang->verif==0 && $gudang->edit==0)
                        <a href="" class="btn btn-info btn-xs" data-toggle="modal"
                            data-target="#verif-{{ $gudang->id }}">
                            <i class="fa fa-folder"></i> Verifikasi</a>

                        @elseif($gudang->verif == 1 && $gudang->submission == 0 && $gudang->edit == 0)
                        <button class="btn btn-success btn-xs">
                            <i class="fa fa-check"></i> Terverifikasi</button>

                        @elseif($gudang->verif == 0 && $gudang->submission == 0 && $gudang->edit == 1)
                        <button href="" class="btn btn-warning btn-xs">
                            <i class="fa fa-edit"></i> Pengeditan</button>
                            
                        @elseif($gudang->verif == 0 && $gudang->submission == 0 && $gudang->edit == 0)
                        <a href="" class="btn btn-warning btn-xs" data-toggle="modal"
                            data-target="#editverif-{{ $gudang->id }}">
                            <i class="fa fa-exclamation"></i> Verifikasi Pengeditan</a>
                        <!-- Button trigger modal -->
                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModalLong">
                            <i class="fa fa-folder">Verifikasi
                        </button> --}}
                        @endif
                    </td>
                    <div class="modal fade" id="verif-{{ $gudang->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Verifikasi gudang</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('admin.updateverif',$gudang) }}" method="post">
                                    <div class="modal-body">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-group">
                                            <label for="">Nama gudang</label>
                                            <h2>{{ $gudang->name_building }}</h2>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Alamat gudang</label>
                                            <h2>{{ $gudang->address_building }}</h2>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Harga gudang</label>
                                            <h2>{{ $gudang->cost }}</h2>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Harga Tertera</label>
                                            <h2>{{ $gudang->cost*1.1 }}</h2>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Fasilitas gudang</label>
                                            <div class="row">
                                                @if ($gudang->antarjemput==1)
                                                <div class="col-sm-3">
                                                    <p>Antar Jemput</p>
                                                </div>
                                                @endif
                                                @if ($gudang->pendingin==1)
                                                <div class="col-sm-3">
                                                    <p>Pendingin</p>
                                                </div>
                                                @endif
                                                @if ($gudang->sirkulasi_udara==1)
                                                <div class="col-sm-3">
                                                    <p>Sirkulasi Udara</p>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <img src="/file/{{ $gudang->files }}" style="width: 200px; height: 200px;"
                                                srcset="">
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

                    <div class="modal fade" id="editverif-{{ $gudang->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editverifTitle">Verifikasi gudang</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('admin.updateverifedit',$gudang) }}" method="post">
                                    <div class="modal-body">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-group">
                                            <label for="">Nama gudang</label>
                                            <h2>{{ $gudang->name_building }}</h2>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Alamat gudang</label>
                                            <h2>{{ $gudang->address_building }}</h2>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Harga gudang</label>
                                            <h2>{{ $gudang->cost }}</h2>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Harga Tertera</label>
                                            <h2>{{ $gudang->cost*1.1 }}</h2>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Fasilitas gudang</label>
                                            <div class="row">
                                                @if ($gudang->antarjemput==1)
                                                <div class="col-sm-3">
                                                    <p>Antar Jemput</p>
                                                </div>
                                                @endif
                                                @if ($gudang->pendingin==1)
                                                <div class="col-sm-3">
                                                    <p>Pendingin</p>
                                                </div>
                                                @endif
                                                @if ($gudang->sirkulasi_udara==1)
                                                <div class="col-sm-3">
                                                    <p>Sirkulasi Udara</p>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <img src="/file/{{ $gudang->files }}" style="width: 200px; height: 200px;"
                                                srcset="">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success">Verifikasi</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <td>
                    <a href="{{route('gudang/destroy', $gudang['id'])}}" class="btn btn-danger" style="text-decoration:none" >Hapus
                    </a>
                </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
