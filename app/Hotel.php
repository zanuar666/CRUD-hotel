<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PDO;

class Hotel extends Model
{
    public function pengunjung(){
        $pdo=DB::getPdo();
        $stmt=$pdo->prepare("select * from pengunjung");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ); //$key[''] $key->
    }

    public function resepsionis(){
        $pdo=DB::getPdo();
        $stmt=$pdo->prepare("select * from resepsionis");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function transaksi(){
        $pdo=DB::getPdo();
        $stmt=$pdo->prepare("select a.*, b.nma_resepsionis, c.nma_pengunjung from transaksi a JOIN resepsionis b ON b.id_resepsionis = a.id_resepsionis JOIN pengunjung c ON c.id_pengunjung = a.id_pengunjung");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
