@extends('main')

@section('title','HOTEL')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>TAMBAH</h1>
            </div>
        </div>
    </div>
</div>

<div class="tambah">
    <form action="{{route('create_resepsionis')}}" method="POST">
        {{ csrf_field() }}
      <label for="country">Nama Resepsionis</label>
      <select id="country" name="id_resepsionis">
        @foreach ($resepsionis as $rsp)
          <option value="{{$rsp->id_resepsionis}}">{{$rsp->nma_resepsionis}}</option>  
        @endforeach
      </select>
    
      <label for="country">Nama Pengunjung</label>
      <select id="country" name="id_pengunjung">
        @foreach ($pengunjung as $peng)
          <option value="{{$peng->id_pengunjung}}">{{$peng->nma_pengunjung}}</option>  
        @endforeach
      </select>

      <label for="lname">Jumlah Kamar</label>
      <input type="number" id="lname" name="jumlah_kamar" placeholder="Jumlah Kamar...">

      <label for="lname">Total Harga</label>
      <input type="number" id="lname" name="total_harga" placeholder="Total Harga...">
    
      <input type="submit" value="SUBMIT">
    </form>
  </div>
@endsection
