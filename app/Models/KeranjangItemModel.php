<?php

namespace App\Models;

use CodeIgniter\Model;

class KeranjangItemModel extends Model
{

    protected $table            = 'detail_item';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['id_keranjang', 'kd_barang', 'quantity'];
}
