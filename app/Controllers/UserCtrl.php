<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User2Model;
use CodeIgniter\HTTP\ResponseInterface;

class UserCtrl extends BaseController
{
    public function index()
    {
        return view('user/userview');
    }

    public function datauser()
    {
        $user2 = new User2Model();
        $ambil = $user2->findAll();

        // var_dump($ambil);
        // die();

        $data = [
            'datauser' => $ambil
        ];
        return view('user/userview', $data);
    }

    public function tambah()
    {
        helper ('form');
        return view('user/tambahuser');
    }

    public function simpan()
    {

        $barang = new User2Model();

        //validasi
        $this->validate([
            'id_pel' => 'required',
            'nama_pel' => 'required'
        ]);

        
        $barang ->insert([
            'id_pel' => $this->request->getVar('id_pel'),
            'nama_pel' => $this->request->getVar('nama_pel')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil disimpan');

        return redirect()->to('userctrl/datauser');
    }
}
