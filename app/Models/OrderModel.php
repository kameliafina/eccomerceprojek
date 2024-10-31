<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table            = 'orders';
    protected $primaryKey       = 'id_order';
    protected $allowedFields    = ['id_user', 'total_belanja', 'status', 'create_at', 'update_at'];
}
