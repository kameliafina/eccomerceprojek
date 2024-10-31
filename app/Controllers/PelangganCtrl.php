<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBarang;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class PelangganCtrl extends BaseController
{
    protected $session;
    protected $barangModel;
    public function __construct()
    {
        $this->session = session();
        $this->barangModel = new ModelBarang();
    }

    public function index()
    {
        return view('pelanggan/dashboard');
    }

    public function coba()
    {
        return view('main/layout2');
    }

    public function datadapur()
    {
        $dapur = new ModelBarang();
        $ambil = $dapur->findAll();

        // var_dump($ambil);
        // die();

        $data = [
            'datadapur' => $ambil
        ];
        return view('pelanggan/dapur', $data);
    }

    public function kebersihan()
    {
        return view('pelanggan/kebersihan');
    }

    public function anak()
    {
        return view('pelanggan/anak');
    }

    public function tambahkeranjang()
    {
        $kd_barang = $this->request->getPost('kd_barang'); //menagmbil kode barang dari request
        $dapur = $this->barangModel->find($kd_barang);  //mencari ikd_barang yang diklik oleh user

        if ($dapur) {
            $item = [
                'kd_barang' => $dapur['kd_barang'],
                'nama_barang' => $dapur['nama_barang'],
                'harga_barang' => $dapur['harga_barang'],
                'deskripsi' => $dapur['deskripsi'],
                'foto' => $dapur['foto'],
                'quantity' => 1,
            ];

            $cart = $this->session->get('cart') ?? []; //mengambil data keranjang belanja di session cart, jika session cart itu kosonh maka akan diset sebagai array kosong

            if (isset($cart[$kd_barang])) {
                $cart[$kd_barang]['quantity'] += 1; //mengupdate qty jika barang sudah ada di keranjang, akan bertambah 1 
            } else {
                $cart[$kd_barang] = $item; //jika tidak ada/belum ada barang yang dimasukkan/ditambahkan maka akan menggunakan array $item
            }

            $this->session->set('cart', $cart); //mengupdate $cart, jika jumlah nya bertqambah
            return redirect()->to('pelangganctrl/datadapur')->with('message', 'barang sudah berhasil ditambahkan');
        }

        return redirect()->back()->with('error', 'barang tidak ditemukan');
    }

    //menambah keranjang belanja
    public function lihatkeranjang()
    {
        $cart = $this->session->get('cart') ?? [];

        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['harga_barang'] * $item['quantity'];
        }
        return view('pelanggan/keranjang', [
            'cart' => $cart,
            'subtotal' => $subtotal
        ]);
    }

    public function bayar()
    {
        $cart = $this->session->get('cart') ?? [];

        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['harga_barang'] * $item['quantity'];
        }
        return view('pelanggan/bayar', [
            'cart' => $cart,
            'subtotal' => $subtotal
        ]);
    }

    public function sukses()
    {
        return view('pelanggan/sukses');
    }
}
