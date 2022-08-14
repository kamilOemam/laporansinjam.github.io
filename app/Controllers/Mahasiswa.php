<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class Mahasiswa extends BaseController
{
    public function __construct()
    {
        $this->mahasiswaModel = new MahasiswaModel();
    }

    public function index()
    {
        if (!session()->get('nama')) {
            return redirect()->to(base_url() . "/");
        }

        return view('mahasiswa');
    }

    public function data()
    {
        echo json_encode($this->mahasiswaModel->where("status", $this->request->getPost("aktifTidak"))->findAll());
    }

    public function dataAktif()
    {
        echo json_encode($this->mahasiswaModel->where("status", 1)->findAll());
    }

    public function getData()
    {
        echo json_encode($this->mahasiswaModel->where("npm", $this->request->getPost("npm"))->first());
    }

    public function tambah()
    {
        $data = [
            "npm" => $this->request->getPost("npm"),
            "nama" => $this->request->getPost("nama"),
            "prodi" => $this->request->getPost("prodi"),
            "status" => $this->request->getPost("status")
        ];

        if ($this->request->getPost("npmLama") == "false") {
            $this->mahasiswaModel->insert($data);
        } else {
            unset($data["npm"]);
            $this->mahasiswaModel->update($this->request->getPost("npmLama"), $data);
        }
        echo json_encode($this->request->getPost("npmLama"));
    }

    public function upload()
    {
        $data = array();

        $validation = \Config\Services::validation();

        $validation->setRules([
            'file' => 'uploaded[file]|max_size[file,2048]|ext_in[file,jpg,jpeg,gif,png,webp],'
        ]);

        if ($validation->withRequest($this->request)->run() == false) {
            $data['success'] = 0;

            $data['error'] = $validation->getError('file'); // Error response
        } else {
            if ($file = $this->request->getFile('file')) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $name = $file->getName();
                    $ext = $file->getClientExtension();

                    $npm = $this->request->getPost("npm");

                    $namaFoto = str_replace(" ", "", strtolower($npm) . "." . $ext);

                    $file->move('./public/upload', $namaFoto, true);

                    $this->mahasiswaModel->update($npm, ["foto" => $namaFoto]);

                    $data['success'] = 1;
                    $data['message'] = 'Foto Berhasil diupload :)';
                } else {
                    $data['success'] = 2;
                    $data['message'] = 'Foto gagal diupload.';
                }
            } else {
                $data['success'] = 2;
                $data['message'] = 'Foto gagal diupload.';
            }
        }
        return $this->response->setJSON($data);
    }

    public function hapus()
    {
        $npm = $this->request->getPost("npm");
        if ($npm) {
            $this->mahasiswaModel->delete($npm);
            echo json_encode("");
        } else {
            echo json_encode("npm kosong");
        }
    }
}