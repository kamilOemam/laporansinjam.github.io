<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function index()
    {
        if (!session()->get('nama') or session()->get('rule') != 1) {
            return redirect()->to(base_url() . "/");
        }
        echo view('user');
    }
    public function muatData()
    {
        echo json_encode($this->userModel->findAll());
    }

    public function tambah()
    {
        $data = [
            "nama" => $this->request->getPost("nama"),
            "password" =>  password_hash($this->request->getPost("password"), PASSWORD_DEFAULT),
            "rule" => $this->request->getPost("jabatan")
        ];

        $this->userModel->save($data);

        echo json_encode("");
    }

    public function hapus()
    {
        $id = $this->request->getPost("id");
        if ($id) {
            $this->userModel->delete($id);
            echo json_encode("");
        } else {
            echo json_encode("id kosong");
        }
    }
}