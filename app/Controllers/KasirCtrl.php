<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KeranjangModel;
use App\Models\ModelBarang;
use App\Models\PembayaranModel;
use CodeIgniter\HTTP\ResponseInterface;

class KasirCtrl extends BaseController
{
    protected $session;
    protected $barangModel;
    protected $keranjangModel;
    protected $pembayaranModel;
    public function __construct()
    {
        $this->session = session();
        $this->barangModel = new ModelBarang();
        $this->keranjangModel = new KeranjangModel();
        $this->pembayaranModel = new PembayaranModel();
    }

    public function index()
    {
        return view('kasir/kasirview');
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
        return view('kasir/kasirview', $data);
    }

    public function tambahkeranjang()
{
    $kd_barang = $this->request->getPost('kd_barang'); // Mengambil kode barang dari request
    $dapur = $this->barangModel->find($kd_barang);  // Mencari kd_barang yang diklik oleh user

    if ($dapur) {
        $item = [
            'kd_barang' => $dapur['kd_barang'],
            'nama_barang' => $dapur['nama_barang'],
            'harga_barang' => $dapur['harga_barang'],
            'deskripsi' => $dapur['deskripsi'],
            'foto' => $dapur['foto'],
            'quantity' => 1,
        ];

        $cart = $this->session->get('cart') ?? []; // Mengambil data keranjang belanja di session cart

        if (isset($cart[$kd_barang])) {
            $cart[$kd_barang]['quantity'] += 1; // Mengupdate qty jika barang sudah ada di keranjang
        } else {
            $cart[$kd_barang] = $item; // Menambahkan item baru ke keranjang
        }

        // Simpan data ke database
        $keranjangData = [
            'kd_barang' => $item['kd_barang'],
            'nama_barang' => $item['nama_barang'],
            'harga_barang' => $item['harga_barang'],
            'deskripsi' => $item['deskripsi'],
            'foto' => $item['foto'],
            'quantity' => $item['quantity'],
        ];

        // Simpan ke database
        $this->keranjangModel->insert($keranjangData);

        $this->session->set('cart', $cart); // Mengupdate session cart
        return redirect()->to('kasirctrl/databarang')->with('message', 'Barang sudah berhasil ditambahkan');
    }

    return redirect()->back()->with('error', 'Barang tidak ditemukan');
}

public function bayar()
    {
        $cart = $this->session->get('cart') ?? [];

        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['harga_barang'] * $item['quantity'];
        }
        return view('kasir/bayar', [
            'cart' => $cart,
            'subtotal' => $subtotal
        ]);
    }

    public function pembayaran()
    {
        $cart = $this->session->get('cart') ?? [];

        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['harga_barang'] * $item['quantity'];
        }
        
        $data['subtotal'] = $subtotal;
        return view('kasir/bayar', [
            'cart' => $cart,
            'subtotal' => $subtotal
        ]);
    }

    public function update_quantity() {
        $id_barang = $this->request->getPost('kd_barang');
        $quantity = $this->request->getPost('quantity');
        $action = $this->request->getPost('action');
    
        // Ambil data keranjang dari session atau database
        $cart = session()->get('cart');
    
        // Cek apakah item ada di keranjang
        foreach ($cart as &$item) {
            if ($item['kd_barang'] == $id_barang) {
                if ($action == 'increase') {
                    $item['quantity']++;
                } elseif ($action == 'decrease' && $item['quantity'] > 1) {
                    $item['quantity']--;
                }
                break;
            }
        }
    
        // Simpan kembali keranjang yang sudah diperbarui ke session
        session()->set('cart', $cart);
    
        // Redirect ke halaman keranjang
        return redirect()->to('kasirctrl/lihatkeranjang');
    }

    public function lihatkeranjang()
    {
        $cart = $this->session->get('cart') ?? [];

        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['harga_barang'] * $item['quantity'];
        }
        
        $data['subtotal'] = $subtotal;
        return view('kasir/keranjangkasir', [
            'cart' => $cart,
            'subtotal' => $subtotal
        ]);
    }

    public function prosespembayaran()
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_pel' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'kode_pos' => 'required',
            'no_hp' => 'required',
            'email' => 'required|valid_email',
            'foto' => 'required',
        ]);

        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil data dari form
        $data = [
            'kode_pembayaran' => uniqid('pay_'), // Menghasilkan kode pembayaran unik
            'nama_pel' => $this->request->getPost('nama_pel'),
            'alamat' => $this->request->getPost('alamat'),
            'kota' => $this->request->getPost('kota'),
            'kode_pos' => $this->request->getPost('kode_pos'),
            'no_hp' => $this->request->getPost('no_hp'),
            'email' => $this->request->getPost('email'),
            'subtotal' => $this->request->getPost('subtotal'), // Pastikan Anda mengirimkan total dari form
            'foto' => $this->request->getPost('foto'),
        ];

        

        // Simpan data ke database
        $this->pembayaranModel->insert($data);

        return redirect()->to('kasirctrl/sukses')->with('message', 'Pembayaran berhasil diproses');
    }

    public function sukses()
    {
        return view('kasir/sukses');
    }
}
