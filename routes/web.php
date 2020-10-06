<?php

use Illuminate\Support\Facades\Route;
use App\Hotel;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome', ['title' => 'PROJECT LARAVEL 7 - KELOMPOK 3']);
});
Route::get('create', function () {
    return view('create', ['title' => 'PROJECT LARAVEL 7 - ZANUAR']);
});

Route::get('home', function () {
    $hotel=new Hotel();
    $data = array();
    $data['hotel'] = $hotel->pengunjung();
    $data['resepsionis'] = $hotel->resepsionis();
    $data['transaksi'] = $hotel->transaksi();
    return view('home',$data);
});