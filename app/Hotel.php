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
        $stmt=$pdo->prepare("select * from transaksi");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
