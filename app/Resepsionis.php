<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Resepsionis extends Model
{
    protected $table = 'resepsionis';
    protected $primaryKey = 'id_resepsionis';

    public function getPengunjung()
    {
        return DB::table('pengunjung')->get();
    }

    public function getResepsionis()
    {
        return DB::table('resepsionis')->get();
    }

    public function insertTransaksi($data = array())
    {
        return DB::table('transaksi')->insert($data);
    }

    public function delete_data($id)
    {
        return DB::table('transaksi')->where('id_transaksi',$id)->delete();
    }
}
