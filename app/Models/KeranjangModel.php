<?php

namespace App\Models;

use CodeIgniter\Model;

class KeranjangModel extends Model
{

    protected $table            = 'keranjang';
    protected $primaryKey       = 'id_keranjang';
    protected $allowedFields    = ['kd_barang', 'nama_barang', 'harga_barang', 'deskripsi', 'foto', 'quantity'];

    
}
