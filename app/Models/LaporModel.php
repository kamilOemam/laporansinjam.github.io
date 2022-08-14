<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporModel extends Model
{
    protected $table = "laporan";
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'npm','keterangan', 'kebutuhan', 'barang',  'perwakilan', 'status', 'tanggal', 'petugas'];
}