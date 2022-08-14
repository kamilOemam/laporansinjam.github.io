<?php

namespace App\Models;

use CodeIgniter\Model;

class PinjamanModel extends Model
{
    protected $table = "pinjaman";
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','npm', 'nominal', 'barang', 'keterangan', 'status', 'cicilan', ];

    public function getPinjaman()
    {
        return $this->findAll();
    }
}