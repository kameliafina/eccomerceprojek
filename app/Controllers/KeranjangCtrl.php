<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KeranjangItemModel;
use App\Models\KeranjangModel;
use App\Models\ModelBarang;
use CodeIgniter\HTTP\ResponseInterface;

class KeranjangCtrl extends BaseController
{
    protected $barangModel;
    protected $cartModel;

    public function __construct(){
        $this->barangModel = new ModelBarang();
        $this->cartModel = new KeranjangModel();
    }


    public function index()
    {
        //
    }

    public function tambahkeranjang($kd_barang) {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        $barang = $this->barangModel->find($kd_barang);
        if ($barang) {
            $id_user = session()->get('id_user');
            $cartItem = $this->cartModel->where('id_user', $id_user)
                                         ->where('kd_barang', $kd_barang)
                                         ->first();
            if ($cartItem) {
                $this->cartModel->update($cartItem['id_keranjang'], [
                    'quantity' => $cartItem['quantity'] + 1
                ]);
            } else {
                $this->cartModel->insert([
                    'id_user' => $id_user,
                    'kd_barang' => $kd_barang,
                    'quantity' => 1
                ]);
            }
            return redirect()->to('/pelanggan/keranjang')->with('message', 'Item ditambahkan ke keranjang');
        } else {
            return redirect()->back()->with('error', 'Produk tidak ditemukan');
        }
    }

    public function hapus($kd_barang) {
        $cartItemModel = new KeranjangItemModel();
        $userId = session()->get('id_user');
        $cart = (new KeranjangModel())->where('id_user', $userId)->first();
    
        // Pastikan keranjang ditemukan
        if (!$cart) {
            return redirect()->to('pelanggan/keranjang')->with('error', 'Keranjang tidak ditemukan.');
        }
    
        // Cari item di dalam keranjang berdasarkan kode barang dan id keranjang
        $cartItem = $cartItemModel->where('id_keranjang', $cart['id_keranjang'])
                                  ->where('kd_barang', $kd_barang)
                                  ->first();
    
        if ($cartItem) {
            if($cartItem['quantity'] > 1) {
                // Kurangi quantity item di keranjang
                $cartItemModel->update($cartItem['id'], ['quantity' => $cartItem['quantity'] - 1]);
            } else {
                // Hapus item jika quantity hanya satu
                $cartItemModel->delete($cartItem['id']);
            }
        }
    
        return redirect()->to('pelanggan/keranjang');
    }
    

    public function lihatkeranjang()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userId = session()->get('id_user');
        $cartItems = $this->cartModel->where('id_user', $userId)->findAll();
        return view('cart/view', ['cartItems' => $cartItems]);
    }
}
