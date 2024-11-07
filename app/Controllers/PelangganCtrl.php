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
        $dapur = new ModelBarang();
        $ambil = $dapur->findAll();

        // var_dump($ambil);
        // die();

        $data = [
            'datadapur' => $ambil
        ];
        return view('pelanggan/kebersihan', $data);
    }

    public function furniture()
    {
        $dapur = new ModelBarang();
        $ambil = $dapur->findAll();

        // var_dump($ambil);
        // die();

        $data = [
            'datadapur' => $ambil
        ];
        return view('pelanggan/furniture', $data);
    }

    public function anak()
    {
        $dapur = new ModelBarang();
        $ambil = $dapur->findAll();

        // var_dump($ambil);
        // die();

        $data = [
            'datadapur' => $ambil
        ];
        return view('pelanggan/anak', $data);
    }

    public function mandi()
    {
        $dapur = new ModelBarang();
        $ambil = $dapur->findAll();

        // var_dump($ambil);
        // die();

        $data = [
            'datadapur' => $ambil
        ];
        return view('pelanggan/mandi', $data);
    }

    public function kebun()
    {
        $dapur = new ModelBarang();
        $ambil = $dapur->findAll();

        // var_dump($ambil);
        // die();

        $data = [
            'datadapur' => $ambil
        ];
        return view('pelanggan/kebun', $data);
    }

    public function tempatmakan()
    {
        $dapur = new ModelBarang();
        $ambil = $dapur->findAll();

        // var_dump($ambil);
        // die();

        $data = [
            'datadapur' => $ambil
        ];
        return view('pelanggan/tempatmakan', $data);
    }

    public function box()
    {
        $dapur = new ModelBarang();
        $ambil = $dapur->findAll();

        // var_dump($ambil);
        // die();

        $data = [
            'datadapur' => $ambil
        ];
        return view('pelanggan/box', $data);
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

    public function detail($kd_barang)
    {
        helper('form');
        $dapur = new ModelBarang();
        $data['datadapur'] = $dapur->find($kd_barang);
        
        return view('/pelanggan/detail', $data);
    }

    public function tampildetail()
    {
        $dapur = new ModelBarang();

        $kd_barang = $this->request->getPost('kd_barang');
        $nama_barang = $this->request->getPost('nama_barang');
        $id_kat = $this->request->getPost('id_kat');
        $harga_barang = $this->request->getPost('harga_barang');
        $stok = $this->request->getPost('stok');
        $deskripsi = $this->request->getPost('deskripsi');
        $foto = $this->request->getPost('foto');

        $data = [
            'kd_barang' => $kd_barang,
            'nama_barang' => $nama_barang,
            'id_kat' => $id_kat,
            'harga_barang' => $harga_barang,
            'stok' => $stok,
            'deskripsi' => $deskripsi,
            'foto' => $foto
        ];

        if ($dapur->update($kd_barang, $data)) {
            return redirect()->to('/pelangganctrl/datadapur');
        } else {
            return redirect()->back()->with('error', 'Gagal mengupdate data');
        }

    }
}
