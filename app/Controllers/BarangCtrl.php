<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBarang;
use CodeIgniter\HTTP\ResponseInterface;

class BarangCtrl extends BaseController
{
    public function index()
    {
        return view('barang/barangview');
    }

    public function databarang()
    {
        $barang = new ModelBarang();
        $ambil = $barang->findAll();

        // var_dump($ambil);
        // die();

        $data = [
            'databarang' => $ambil
        ];
        return view('barang/barangview', $data);
    }

    public function tambah()
    {
        helper ('form');
        return view('barang/tambahbarang');
    }

    public function simpan()
    {

        $barang = new ModelBarang();

        //validasi
        $this->validate([
            'kd_barang' => 'required',
            'nama_barang' => 'required',
            'harga_barang' => 'required|numeric',
            'stok' => 'required|numeric',
            'deskripsi' => 'required',
            'foto' => 'uploaded[foto]|max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]'
        ]);

        //untuk upload foto
        $foto = $this->request->getFile('foto');
        $namafoto = $foto->getRandomName(); //memberikan nama random difile foto
        $foto->move('upload', $namafoto); //memindah file foto ke dalam folder uploads
        
        $barang ->insert([
            'kd_barang' => $this->request->getVar('kd_barang'),
            'nama_barang' => $this->request->getVar('nama_barang'),
            'id_kat' => $this->request->getVar('id_kat'),
            'harga_barang' => $this->request->getVar('harga_barang'),
            'stok' => $this->request->getVar('stok'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'foto' => $namafoto
        ]);

        session()->setFlashdata('pesan', 'Data berhasil disimpan');

        return redirect()->to('barangctrl/databarang');
    }

    public function editbarang($kd_barang)
    {
        helper('form');
        $barang = new ModelBarang();
        $data['row'] = $barang->find($kd_barang);

        return view('/barang/editbarang', $data);
    }

    public function updatebarang() {
        $barang = new ModelBarang();

        $kd_barang = $this->request->getPost('kd_barang');
        $nama_barang = $this->request->getPost('nama_barang');
        $id_kat = $this->request->getPost('id_kat');
        $harga_barang = $this->request->getPost('harga_barang');
        $stok = $this->request->getPost('stok');
        $deskripsi = $this->request->getPost('deskripsi');
        $namafoto = $this->request->getPost('foto');

        $data = [
            'kd_barang' => $kd_barang,
            'nama_barang' => $nama_barang,
            'id_kat' => $id_kat,
            'harga_barang' => $harga_barang,
            'stok' => $stok,
            'deskripsi' => $deskripsi,
            'foto' => $namafoto,
        ];

        //untuk upload foto
        $foto = $this->request->getFile('foto');
        $namafoto = $foto->getRandomName(); //memberikan nama random difile foto
        $foto->move('upload', $namafoto); //memindah file foto ke dalam folder uploads

        if ($barang->update($kd_barang, $data)) {
            return redirect()->to('/barangctrl/databarang');
        } else {
            return redirect()->back()->with('error', 'Gagal mengupdate data');
        }
    }
}
