<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table = "mahasiswa";
    protected $primaryKey = 'npm';
    protected $allowedFields = ['npm', 'nama', 'prodi', 'foto', 'status', 'tanggal'];
}
