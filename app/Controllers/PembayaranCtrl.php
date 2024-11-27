<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PembayaranModel;
use CodeIgniter\HTTP\ResponseInterface;

class PembayaranCtrl extends BaseController
{
    public function index()
    {
        return view('pelanggan/pembayarann');
    }

    public function datapembayaran()
    {
        $bayar = new PembayaranModel();
        $ambil = $bayar->findAll();

        $data = [
            'datapembayaran' => $ambil
        ];
        return view('pelanggan/databayar', $data);
    }

    public function tambahdata()
    {
        helper ('form');
        return view('pelanggan/pembayaran');

        
    }

    public function simpandata()
    {
    $bayar = new PembayaranModel();

    // Validasi form
    if (!$this->validate([
        'id_pembayaran' => 'required',
        'nama_pel' => 'required',
        'alamat' => 'required',
        'kota' => 'required',
        'kode_pos' => 'required',
        'no_hp' => 'required|numeric',
        'email' => 'required',
        'foto' => 'uploaded[foto]|max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]',
        'subtotal' => 'required'
    ])) {
        return redirect()->back()->withInput()->with('validation', $this->validator);
    }

    // Upload file
    $foto = $this->request->getFile('foto');
    $namafoto = $foto->getRandomName();
    $foto->move('upload', $namafoto);

    // Insert data
    $bayar->insert([
        'id_pembayaran' => $this->request->getVar('id_pembayaran'),
        'nama_pel' => $this->request->getVar('nama_pel'),
        'alamat' => $this->request->getVar('alamat'),
        'kota' => $this->request->getVar('kota'),
        'kode_pos' => $this->request->getVar('kode_pos'),
        'no_hp' => $this->request->getVar('no_hp'),
        'email' => $this->request->getVar('email'),
        'foto' => $namafoto,
        'subtotal' => $this->request->getVar('subtotal'),
    ]);

    session()->setFlashdata('pesan', 'Data berhasil disimpan');
    return redirect()->to('pembayaranctrl/datapembayaran');
    }

    }

