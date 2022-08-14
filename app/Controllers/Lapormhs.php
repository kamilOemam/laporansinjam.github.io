<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;
use App\Models\LapormhsModel;

class Lapormhs extends BaseController
{
    public function __construct()
    {
        $this->mahasiswaModel = new MahasiswaModel();
        $this->lapormhsModel = new LapormhsModel();
    }

    public function index()
    {
        if (!session()->get('nama')) {
            return redirect()->to(base_url() . "/login");
        }
        return view('lapormhs');
    }

    public function data()
    {
        echo json_encode($this->mahasiswaModel->findAll());
    }

    public function getData()
    {
        echo json_encode($this->lapormhsModel->where("npm", $this->request->getPost("npm"))->findAll());
    }

    public function tambah()
    {
        $this->mahasiswaModel->where("npm", $this->request->getPost("npm"))->first();


        $data = [
            "npm" => $this->request->getPost("npm"),
            "keterangan" => $this->request->getPost("keterangan"),
            "perwakilan" => $this->request->getPost("perwakilan"),
        ];

        $this->lapormhsModel->insert($data);

        echo json_encode("");
    }

    public function hapus()
    {
        $id = $this->request->getPost("id");
        if ($id) {
            $this->lapormhsModel->delete($id);
            echo json_encode("");
        } else {
            echo json_encode("id kosong");
        }
    }
}