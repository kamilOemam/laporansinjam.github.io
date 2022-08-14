<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;
use App\Models\TransaksiModel;

class Transaksi extends BaseController
{
    public function __construct()
    {
        $this->mahasiswaModel = new MahasiswaModel();
        $this->transaksiModel = new TransaksiModel();
    }

    public function index()
    {
        if (!session()->get('nama')) {
            return redirect()->to(base_url() . "/login");
        }
        return view('transaksi');
    }

    public function data()
    {
        echo json_encode($this->mahasiswaModel->findAll());
    }

    public function getData()
    {
        echo json_encode($this->transaksiModel->where("npm", $this->request->getPost("npm"))->findAll());
    }

    public function tambah()
    {
        $sisaAwal = $this->mahasiswaModel->where("npm", $this->request->getPost("npm"))->first()["sisa"];

        $sisaAkhir = $sisaAwal + $this->request->getPost("nominal");

        $data = [
            "npm" => $this->request->getPost("npm"),
            "nominal" => $this->request->getPost("nominal"),
            "keterangan" => $this->request->getPost("keterangan"),
            "petugas" => "moham",
            "sisa" => $sisaAkhir
        ];

        $this->transaksiModel->insert($data);

        if ($this->transaksiModel->getInsertID()) {
            $this->mahasiswaModel->update($this->request->getPost("npm"), ["sisa" => $sisaAkhir]);
        }

        echo json_encode("");
    }
}