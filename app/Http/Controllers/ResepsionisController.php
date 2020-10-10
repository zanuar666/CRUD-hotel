<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resepsionis;
use App\Transaksi;
use App\Pengunjung;

class ResepsionisController extends Controller
{

    public function index()
    {
        $rsp=new Resepsionis();

        $pengunjung = $rsp->getPengunjung();
        $resepsionis = $rsp->getResepsionis();


        return view('create', [
            'title' => 'PROJECT LARAVEL 7 - ZANUAR',
            'pengunjung' => $pengunjung,
            'resepsionis' => $resepsionis
            ]);
    }

    public function create_resepsionis(Request $request)
    {
        $rsp=new Resepsionis();
        $data=array();

        $data['id_resepsionis']=$request->input('id_resepsionis');
        $data['id_pengunjung']=$request->input('id_pengunjung');
        $data['jumlah_kamar']=$request->input('jumlah_kamar');
        $data['total_harga']=$request->input('total_harga');

        $proses = $rsp->insertTransaksi($data);

        if ($proses) {
            return redirect('home');
        } else {
            return "alert('Error')";
        }
        
    }

    public function delete(Request $request)
    {
        $rsp=new Resepsionis();

        $pros = $rsp->delete_data($request->get('id'));

        if ($pros < 0) {
            return 'error';
        } else {
            return 'success';
        }
        
    }

    public function modal_edit(Request $request){
        $id_transaksi = $request->post('id');

        $transaksi = Transaksi::find($id_transaksi);
        $resepsionis = Resepsionis::all();
        $pengunjung = Pengunjung::all();

        if($transaksi == null){
            echo json_encode(array(
                'RESULT' => 'FAILED',
                'MESSAGE' => 'Data tidak ditemukan'
            ));
            exit;
        }

        $data = array();
        $data['transaksi'] = $transaksi;
        $data['resepsionis'] = $resepsionis;
        $data['pengunjung'] = $pengunjung;

        echo json_encode(array(
            'RESULT' => 'OK',
            'CONTENT' => view('edit', $data)->render()
        ));
        exit;
    }

    public function process_edit(Request $request){
        $id_transaksi = $request->post('id_transaksi');
        $nama_rsp = $request->post('id_resepsionis');
        $nama_pnj = $request->post('id_pengunjung');
        $jml_kmr = $request->post('jml_kmr');
        $jml_hrg = $request->post('jml_hrg');

        $transaksi = Transaksi::find($id_transaksi);

        if($transaksi == null){
            echo json_encode(array(
                'RESULT' => 'FAILED',
                'MESSAGE' => 'Data tidak ditemukan'
            ));
            exit;
        }

        $transaksi->id_resepsionis = $nama_rsp;
        $transaksi->id_pengunjung = $nama_pnj;
        $transaksi->jumlah_kamar = $jml_kmr;
        $transaksi->total_harga = $jml_hrg;

        $update = $transaksi->save();

        if($update){
            echo json_encode(array(
                'RESULT' => 'OK',
                'MESSAGE' => 'Sukses update'
            ));
            exit;
        }else{
            echo json_encode(array(
                'RESULT' => 'FAILED',
                'MESSAGE' => 'Gagal update'
            ));
            exit;
        }
    }

}

