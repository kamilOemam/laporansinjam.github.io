<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table            = 'barang';
    protected $primaryKey       = 'idbrg';
    
    protected $allowedFields    = [
        'idbrg', 'namabrg','merkbrg', 'ruangbrg', 'foto'
    ];
}