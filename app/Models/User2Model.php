<?php

namespace App\Models;

use CodeIgniter\Model;

class User2Model extends Model
{
    protected $table            = 'pelanggan';
    protected $primaryKey       = 'id_pel';
    protected $allowedFields    = ['nama_pel'];
}