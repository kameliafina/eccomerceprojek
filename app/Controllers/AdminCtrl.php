<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBarang;
use CodeIgniter\HTTP\ResponseInterface;

class AdminCtrl extends BaseController
{
    public function index()
    {
        $barang = new ModelBarang;
        $ambil = $barang->findAll();
        $jumlahbarang = count($ambil);

        // var_dump($ambil);
        // die();

        $data = [
            'databarang' => $ambil,
            'jumlahbarang' => $jumlahbarang
        ];
        return view('main/chart', $data);
    }
}
