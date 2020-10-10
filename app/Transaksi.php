<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    public $timestamps = false;

    public function resepsionis() {
        return $this->belongsTo('App\Resepsionis', 'id_resepsionis');
    }

    public function pengunjung() {
        return $this->belongsTo('App\Pengunjung', 'id_pengunjung');
    }
}
