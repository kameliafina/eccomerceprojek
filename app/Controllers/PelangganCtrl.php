<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBarang;
use App\Models\KeranjangModel;
use App\Models\PembayaranModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class PelangganCtrl extends BaseController
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
        return redirect()->to('pelangganctrl/datadapur')->with('message', 'Barang sudah berhasil ditambahkan');
    }

    return redirect()->back()->with('error', 'Barang tidak ditemukan');
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
        return redirect()->to('pelangganctrl/lihatkeranjang');
    }

    public function hapus($kd_barang) {
        $cart = session()->get('cart');
    
        foreach ($cart as $key => $item) {
            if ($item['kd_barang'] == $kd_barang) {
                unset($cart[$key]);
                break;
            }
        }
    
        session()->set('cart', array_values($cart));
    
        return redirect()->to('pelangganctrl/lihatkeranjang');
    }
    
    

    //menambah keranjang belanja
    public function lihatkeranjang()
    {
        $cart = $this->session->get('cart') ?? [];

        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['harga_barang'] * $item['quantity'];
        }
        
        $data['subtotal'] = $subtotal;
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

    public function pembayaran()
    {
        $cart = $this->session->get('cart') ?? [];

        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['harga_barang'] * $item['quantity'];
        }
        
        $data['subtotal'] = $subtotal;
        return view('pelanggan/pembayaran', [
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
            'bukti_pembayaran' => 'uploaded[bukti_pembayaran]|max_size[bukti_pembayaran,2048]|is_image[bukti_pembayaran]|mime_in[bukti_pembayaran,image/jpg,image/jpeg,image/gif,image/png]',
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
        ];

        // Proses upload bukti pembayaran
        if ($this->request->getFile('bukti_pembayaran')->isValid()) {
            $file = $this->request->getFile('bukti_pembayaran');
            $file->move('uploads/bukti_pembayaran'); // Pastikan folder ini ada
            $data['bukti_pembayaran'] = $file->getName(); // Simpan nama file
        }

        // Simpan data ke database
        $this->pembayaranModel->insert($data);

        return redirect()->to('/pelangganctrl/sukses')->with('message', 'Pembayaran berhasil diproses');
    }
    

    // Controller
    public function detail($kd_barang)
    {
        $barang = $this->barangModel->find($kd_barang);
        
        if (!$barang) {
            // Redirect atau tampilkan pesan error jika barang tidak ditemukan
            return redirect()->to('/')->with('error', 'Barang tidak ditemukan');
        }

        $data = [
            'barang' => $barang
        ];

        return view('pelanggan/detail', $data);
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

public function proses()
{
    // Ambil data dari form
    $nama = $this->request->getPost('nama');
    $alamat = $this->request->getPost('alamat');
    $kota = $this->request->getPost('kota');
    $kode_pos = $this->request->getPost('kode_pos');
    $nomor_hp = $this->request->getPost('nomor_hp');
    $email = $this->request->getPost('email');
    
    // Ambil file yang diupload
    $bukti_pembayaran = $this->request->getFile('bukti_pembayaran');
    
    // Cek apakah file diupload
    if ($bukti_pembayaran && $bukti_pembayaran->isValid()) {
        // Pindahkan file ke folder tertentu
        $bukti_pembayaran->move(WRITEPATH . 'uploads');
        $filePath = $bukti_pembayaran->getName();
    } else {
        $filePath = null;
    }

    // Simpan data atau tampilkan hasil
    $data = [
        'nama' => $nama,
        'alamat' => $alamat,
        'kota' => $kota,
        'kode_pos' => $kode_pos,
        'nomor_hp' => $nomor_hp,
        'email' => $email,
        'bukti_pembayaran' => $filePath,
    ];

    // Misalnya, tampilkan data di halaman sukses
    return view('/pelanggan/detail_bayar', ['data' => $data]);
}



}
