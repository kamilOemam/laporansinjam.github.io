<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MahasiswaModel;
use App\Models\PinjamanModel;
use App\Models\CicilanModel;
use App\Models\BarangModel;

class Landing extends BaseController
{
    public function __construct()
    {
        $this->mahasiswaModel = new MahasiswaModel();
        $this->pinjamanModel = new PinjamanModel();
        $this->cicilanModel = new CicilanModel();
        $this->barangModel = new BarangModel();
    }

    public function index()
    {
        return view('landing');
    }
}