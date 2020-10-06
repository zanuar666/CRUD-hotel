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
    <form action="">
        {{ csrf_field() }}
      <label for="country">Nama Resepsionis</label>
      <select id="country" name="country">
        <option value="australia">xxxx</option>
        <option value="canada">xxxx</option>
        <option value="usa">xxxx</option>
      </select>
    
      <label for="country">Nama Pengunjung</label>
      <select id="country" name="country">
        <option value="australia">xxxx</option>
        <option value="canada">xxxx</option>
        <option value="usa">xxxx</option>
      </select>

      <label for="lname">Jumlah Kamar</label>
      <input type="text" id="lname" name="lastname" placeholder="Jumlah Kamar...">

      <label for="lname">Total Harga</label>
      <input type="text" id="lname" name="lastname" placeholder="Total Harga...">
    
      <input type="submit" value="SUBMIT">
    </form>
  </div>
@endsection
