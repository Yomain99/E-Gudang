@extends('layouts.main')

@section('title','E-Gudang | Detail Pemilik gudang')

@section('container')
<div style="text-align: center; font-family: Bookman Old Style; font-size:30px">DETAIL DATA PEMILIK gudang</div>
<div class="x_panel">
    <div class="">
        <br>
        <br>
        <br>

        @foreach ($pemilik as $item)
        {{-- <h1>gudang {{$item->name}} </h1> --}}
        <div class="x_content">
          <table class="table table-hover">
            <tbody>
                <tr>
                  <th>Nama</th>
                <td>: {{$item->name}}</td>
                  <td> </td>
                  <td> </td>
                <tr>
              <tr>
                <th>Company Name</th>
                <td>: {{$item->company_name}} </td>
                <td> </td>
                <td> </td>
              <tr>
                <th>Alamat</th>
              <td>: {{$item->user_address}}</td>
                <td> </td>
                <td> </td>
              </tr>
              <tr>
                <th>Email</th>
              <td>: {{$item->email}}</td>
                <td> </td>
                <td> </td>
              </tr>
              <tr>
                <th>Telpon </th>
              <td>: {{$item->phone}}</td>
                <td> </td>
                <td> </td>
              </tr>
            </tbody>
          </table>
          <br>
          <br>
                <a href="{{ route('admin.indexbuilding')}}" class="btn btn-primary">Kembali</a></button>
                
        </div>
        @endforeach
        </div>
        </div>
    </div>
@endsection