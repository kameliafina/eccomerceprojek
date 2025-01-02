<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KeranjangModel;
use App\Models\PembayaranModel;
use CodeIgniter\HTTP\ResponseInterface;

class HistoriCtrl extends BaseController
{
    public function index()
    {
        
        return view("histori/historiview");
    }

    public function datapelanggan()
    {
        $pelanggan = new PembayaranModel();
        $ambil = $pelanggan->findAll();

        // var_dump($ambil);
        // die();

        $data = [
            'datapelanggan' => $ambil
        ];

        return view("histori/historipelanggan", $data);
    }

    public function databarang()
    {
        $barang = new KeranjangModel();
        $ambil = $barang->findAll();

        // var_dump($ambil);
        // die();

        $data = [
            'databarang' => $ambil
        ];

        return view("histori/historibarang", $data);
    }
}
