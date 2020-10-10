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
                          <th scope="col">ACTION</th>
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
                        <td>
                            <a href="#" onclick="delete_data({{$value->id_transaksi}})">
                                <i class="fa fa-trash"></i>
                            </a>
                            <a href="#" onclick="edit_data({{ $value->id_transaksi }})" data-toggle="modal" data-target="#ModalGlobal">
                                <i style="margin-left: 30px;" class="fa fa-edit"></i>
                            </a>
                        </td>
                        {{-- <td><i class="fa fa-edit"></i></td> --}}
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
@section('js')
<script>
    function delete_data(id) {
        if (confirm("Apakah Anda Yakin Ingin Menghapus Data ini?")) {
            $.ajax({
                url:'delete',
                method:'GET',
                data:{id:id},
            }).done(function (data) {
                if (data == 'success') {
                    location.reload();
                } else {
                    alert("gagal");
                }
            })
        } 
    }

    function edit_data(id){
        $.ajax({
            url: '{{ url("edit") }}',
            method: 'POST',
            dataType: 'json',
            data: {
                _token: '{{ csrf_token() }}',
                id: id
            },
            success: function(response){
                if(response.RESULT == 'OK'){
                    $('#ModalGlobal').html(response.CONTENT);
                }else{
                    alert(response.MESSAGE);
                }
            }
        }).fail(function(){
            alert('Error');
        });
    }
</script>
@endsection