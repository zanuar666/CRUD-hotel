@extends('main')

@section('title','HOTEL')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>HOTEL</h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">PENGUNJUNG</strong>
                </div>
                <div class="card-body">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Alamat</th>
                          <th scope="col">Kontak</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($hotel as $key => $value)
                    <tr>
                        <td>{{ $value->id_pengunjung }}</td>
                        <td>{{ $value->nma_pengunjung }}</td>
                        <td>{{ $value->alamat }}</td>
                        <td>{{ $value->kontak }}</td>
                    </tr>
                    @endforeach
              </tbody>
          </table>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">RESEPSIONIS</strong>
                </div>
                <div class="card-body">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Kontak</th>
                          <th scope="col">Status</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($resepsionis as $key => $value)
                    <tr>
                        <td>{{ $value->id_resepsionis }}</td>
                        <td>{{ $value->nma_resepsionis }}</td>
                        <td>{{ $value->kontak }}</td>
                        <td>{{ $value->status }}</td>
                    </tr>
                    @endforeach
              </tbody>
          </table>
                </div>
            </div>
        </div>  
        
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">TRANSAKSI</strong>
                </div>
                <div class="card-body">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Nama Resepsionis</th>
                          <th scope="col">Nama Pengunjung</th>
                          <th scope="col">Jumlah Kamar</th>
                          <th scope="col">Total Harga</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($transaksi as $key => $value)
                    <tr>
                        <td>{{ $value->id_transaksi }}</td>
                        <td>{{ $value->nma_resepsionis }}</td>
                        <td>{{ $value->nma_pengunjung }}</td>
                        <td>{{ $value->jumlah_kamar }}</td>
                        <td>{{ $value->total_harga }}</td>
                    </tr>
                    @endforeach
              </tbody>
          </table>
                </div>
            </div>
        </div> 

        </div>
    </div>
</div>
@endsection

@section('produk')

@endsection