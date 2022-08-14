<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Jawab extends BaseController
{
    public function index()
    {
        if (!session()->get('nama')) {
            return redirect()->to(base_url() . "/");
        }
        // $barang  = new BarangModel();
        // $data = [
        //     'tampildata' => $barang->findAll(),
        // ];
        
        // d($barang->findAll());
        return view('jawab/jawab'); //$data);
    }
}