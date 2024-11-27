<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranModel extends Model
{
    protected $table            = 'pembayaran';
    protected $primaryKey       = 'id_pembayaran';
    protected $allowedFields    = ['nama_pel', 'alamat', 'kota', 'kode_pos', 'no_hp', 'email', 'foto', 'subtotal'];

}
