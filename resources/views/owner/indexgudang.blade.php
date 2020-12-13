@extends('layouts.main')

@section('title','E-Gudang | Data gudang')

@section('container')
<div style="text-align: center; font-family: Bookman Old Style; font-size:30px">Data gudang</div>
<br>
<br>



<!-- Button trigger modal -->
<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal">
  TAMBAH DATA +
</button>
@if (session('stay'))
<div class="alert alert-warning">
  {{ session('stay') }}
</div>
@endif
@if (session('status'))
<div class="alert alert-success">
  {{ session('status') }}
</div>
@endif
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Tambah gudang </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('owner.creategudang') }}" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          @csrf
          <div class="form-group">
            <label for="building-name">Nama gudang </label>
            <input type="text" name="building_name" class="form-control">
          </div>
          <div class="form-group">
            <label for="building-address">Alamat gudang </label>
            <input type="text" name="building_address" class="form-control">
          </div>
          <div class="form-group">
            <label for="building-cost">Harga gudang </label>
            <input type="text" name="building_cost" class="form-control">
          </div>
          <div class="form-group">
            <label for="building-name">Kapasitas gudang </label>
            <input type="text" name="building_capacity" class="form-control">
          </div>
          <div class="form-group">
            <label for="building-name">Fasilitas </label>
            <div class="row">
              <div class="col-sm-3">
                <input type="checkbox" name="antarjemput">
                <label for="antarjemput">Antar Jemput</label>
              </div>
              <div class="col-sm-3">
                <input type="checkbox" name="pendingin">
                <label for="pendingin">Pendingin</label>
              </div>
              <div class="col-sm-3">
                <input type="checkbox" name="sirkulasi_udara">
                <label for="sirkulasi_udara">Sirkulasi Udara</label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="building-description">Deskripsi gudang </label>
            <input type="text" name="building_description" class="form-control">
          </div>
          <div class="form-group">
            <label for="building-file">Foto gudang </label>
            <input type="file" name="building_file" class="form-control">
          </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</div>

<div class="x_panel">
  <div class="x_content">
    <table id="datatable" class="table table-striped jambo_table bulk-action">
      <thead>
        <tr class="headings">
          <th scope="row">No.</th>
          <th>Nama gudang</th>
          <th>Alamat gudang</th>
          <th>Harga</th>
          <th>Kapasitas/Ton</th>
          <th>Deskripsi</th>
          <th>Kriteria</th>
          <th>Gambar</th>
          <th>Edit</th>
        </tr>
      </thead>
      <tbody>
        @foreach( $gudang as $gudang )
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $gudang->name_building }}</td>
          <td>{{ $gudang->address_building }}</td>
          <td>{{ $gudang->cost }}</td>
          <td>{{ $gudang->capacity }}</td>
          <td>{{ $gudang->description }}</td>
          <td>
            @if ($gudang->antarjemput + $gudang->pendingin + $gudang->sirkulasi_udara
            <= 1) Standart @elseif($gudang->  antarjemput + $gudang->pendingin
              + $gudang->sirkulasi_udara <= 3) VIP @else VVIP @endif </td> <td><img
                  src="/file/{{ $gudang->files }}" style="width: 200px; height: 200px " alt=""></td>
          <td>
            @if ($gudang->submission==0 && $gudang->verif==1 && $gudang->edit==0)
            <a href="{{ route('owner.proposeedit',$gudang) }}" class="btn btn-primary">
              Propose For Edit
            </a>
            @endif

            @if ($gudang->submission==1)
            <div class="btn btn-success">
              Waiting Verification
            </div>
            @endif

            @if ($gudang->edit==0 && $gudang->verif==0 && $gudang->submission==0)
            <div class="btn btn-danger">
              Waiting Verification For Edit
            </div>
            @endif

            @if ($gudang->verif==0 && $gudang->edit==1)
            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
              data-target="#exampleModal{{$gudang->id}}">
              Edit
            </button>
            <!-- Modal -->

            @endif
          </td>
          <div class="modal fade" id="exampleModal{{$gudang->id}}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"> Edit gudang </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="{{ route('owner.editgudang',$gudang->id)}}" method="post" enctype="multipart/form-data">
                  <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label for="building-name">Nama gudang </label>
                      <input type="text" name="building_name" class="form-control" required
                        value="{{ $gudang->name_building }}">
                    </div>
                    <div class="form-group">
                      <label for="building-address">Alamat gudang </label>
                      <input type="text" name="building_address" class="form-control" required
                        value="{{ $gudang->address_building }}">
                    </div>
                    <div class="form-group">
                      <label for="building-cost">Harga gudang </label>
                      <input type="text" name="building_cost" class="form-control" required value="{{ $gudang->cost }}">
                    </div>
                    <div class="form-group">
                      <label for="building-name">Kapasitas gudang/Ton </label>
                      <input type="text" name="building_capacity" required class="form-control"
                        value="{{ $gudang->capacity }}">
                    </div>
                    <div class="form-group">
                      <label for="building-name">Fasilitas </label>
                      <div class="row">
                        <div class="col-sm-3">
                          <input type="checkbox" name="antarjemput" @if ($gudang->antarjemput==1)
                          checked
                          @endif>
                          <label for="antarjemput">Antar Jemput</label>
                        </div>
                        <div class="col-sm-3">
                          <input type="checkbox" name="pendingin" @if ($gudang->pendingin==1)
                          checked
                          @endif >
                          <label for="pendingin">Pendingin</label>
                        </div>
                        <div class="col-sm-3">
                          <input type="checkbox" name="sirkulasi_udara" @if ($gudang->sirkulasi_udara==1)
                          checked
                          @endif >
                          <label for="pendingin">Sirkulasi Udara</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="building-description">Deskripsi gudang </label>
                      <textarea name="building_description" required class="form-control" cols="30"
                        rows="10">{{ $gudang->description }}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="building-file">Foto gudang </label>
                      <input type="file" name="building_file" class="form-control">
                    </div>
                    <img src="/file/{{ $gudang->files }}" style="width: 100px; height: 100px;" alt="">
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
              </div>
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