<?php

namespace App\Models;

use CodeIgniter\Model;

class KeranjangModel extends Model
{

    protected $table            = 'keranjang';
    protected $primaryKey       = 'id_keranjang';
    protected $allowedFields    = ['id_user', 'kd_barang', 'quantity', 'create_at', 'update_at', 'foto'];
}
