<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailModel extends Model
{

    protected $table            = 'detail_item';
    protected $primaryKey       = 'id_detail';
    protected $allowedFields    = ['id_order', 'kd_barang', 'quantity', 'harga', 'create_at', 'update_at'];
}
