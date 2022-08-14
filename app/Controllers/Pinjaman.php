<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;
use App\Models\PinjamanModel;
use App\Models\CicilanModel;
use App\Models\BarangModel;

class Pinjaman extends BaseController
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
        if (!session()->get('nama')) {
            return redirect()->to(base_url() . "/");
        }
        return view('pinjaman');
    }

    public function data()
    {
        $pinjaman = $this->pinjamanModel->where("status", $this->request->getPost("lunas"))->findAll();
        for ($i = 0; $i < count($pinjaman); $i++) {
            $pinjaman[$i]["nama"] = $this->mahasiswaModel->where("npm", $pinjaman[$i]["npm"])->first()["nama"];
        }
        echo json_encode($pinjaman);
    }

    // public function getData()
    // {
    //     echo json_encode($this->transaksiModel->where("npm", $this->request->getPost("npm"))->findAll());
    //     echo json_encode($this->barangModel->where("idbrg", $this->request->getPost("idbrg"))->findAll());
    // }

    public function tambah()
    {
        $data = [
            "npm" => $this->request->getPost("npm"),
            "nominal" => $this->request->getPost("nominal"),
            "keterangan" => $this->request->getPost("keterangan"),
            "barang" => $this->request->getPost("barang"),
        ];

        $this->pinjamanModel->insert($data);


        echo json_encode("");
    }


    public function dataCicilan()
    {
        echo json_encode($this->cicilanModel->where("idPinjaman", $this->request->getPost('idPinjaman'))->findAll());
    }


    public function tambahCicilan()
    {
        $update = false;
        $pinjaman = $this->pinjamanModel->where("id", $this->request->getPost("idPinjaman"))->first();
        $status = $pinjaman["status"];
        $sisa = $pinjaman["nominal"] - ($pinjaman["cicilan"] + $this->request->getPost("nominal"));
        $cicilan = $pinjaman["cicilan"] + $this->request->getPost("nominal");
        $barang = $pinjaman["barang"];
        $data = [
            "idPinjaman" => $this->request->getPost("idPinjaman"),
            "nominal" => $this->request->getPost("nominal"),
            "barang" =>$barang,
            "sisa" => $sisa
        ];
        $this->cicilanModel->save($data);

        $this->pinjamanModel->update($this->request->getPost("idPinjaman"), ["cicilan" => $cicilan]);

        if ($sisa <= 0) {
            if ($status == 0) {
                $this->pinjamanModel->update($this->request->getPost("idPinjaman"), ["status" => 1]);
                $update = true;
            }
        }
        echo json_encode("");
    }

    public function hapus()
    {
        $id = $this->request->getPost("id");
        if ($id) {
            $this->pinjamanModel->delete($id);
            echo json_encode("");
        } else {
            echo json_encode("id kosong");
        }
    }
}