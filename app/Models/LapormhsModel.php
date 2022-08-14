<?php

namespace App\Models;

use CodeIgniter\Model;

class LapormhsModel extends Model
{
    protected $table = "laporan";
    protected $primaryKey = 'id';
    protected $allowedFields = ['npm', 'nominal', 'barang', 'keterangan', 'perwakilan','petugas', 'status', 'tanggal'];
}