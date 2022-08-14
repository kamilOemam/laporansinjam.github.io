<?php

namespace App\Models;

use CodeIgniter\Model;

class JawabModel extends Model
{
    protected $table = "respon";
    protected $primaryKey = 'id';
    protected $allowedFields = ['nik', 'nominal', 'petugas', 'keterangan', 'tanggal','jwb'];
}