<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangModel;

class Barang extends BaseController
{
    public function __construct()
    {
        $this->barang = new BarangModel;
    }
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
        return view('barang/barang'); //$data);
    }

    public function databrg()
    {
        echo json_encode($this->barang->findAll());
    }
    public function ambildata()
    {
        if ($this->request->isAJAX()) {
            $barang  = new BarangModel;
            $data = [
                'tampildata' => $barang->findAll()
        ];

            $msg = [
                'data' => view('barang/databarang', $data)//$data untuk menampilkan data dari database
        ];
            echo json_encode($msg);
        } else {
            exit('maaf tidak dapat diproses');
        }
    }
    public function formtambah()
    {
        if ($this->request->isAJAX()) {
            $barang  = new BarangModel;
            $data = [
                'tampildata' => $barang->findAll(),
        ];

            $msg = [
                'data' => view('barang/modaltambah', $data)
        ];
            echo json_encode($msg);
        } else {
            exit('maaf tidak dapat diproses');
        }
    }
    public function simpandata()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'idbrg' => [
                    'label' => 'Kode Barang',
                    'rules' => 'required|is_unique[barang.idbrg]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} sudah ada',
                    ]
                    ],
                'namabrg' => [
                    'label' => 'Nama Barang',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                    ],
                'merkbrg' => [
                    'label' => 'Merk Barang',
                    'rules' => 'required|',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                    ],
                'ruangbrg' => [
                    'label' => 'Ruang Tempat Barang',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                    ],
            ]);

            if (!$valid) {
                $msg = [
                    'error'=> [
                        'idbrg'=> $validation->getError('idbrg'),
                        'namabrg'=> $validation->getError('namabrg'),
                        'namabrg'=> $validation->getError('namabrg'),
                        'merkbrg'=> $validation->getError('merkbrg'),
                        'ruangbrg'=> $validation->getError('ruangbrg'),
                ]
            ];
                echo json_encode($msg);
            } else {
                $simpanData = [
            'idbrg' => $this->request->getVar('idbrg'),
            'namabrg' => $this->request->getVar('namabrg'),
            'merkbrg' => $this->request->getVar('merkbrg'),
            'ruangbrg'=> $this->request->getVar('ruangbrg')

        ];
                $barang  = new BarangModel();
                $barang->insert($simpanData);
                $msg = [
                    'success' => 'Data berhasil disimpan'
                ];
                echo json_encode($msg);
            }
        } else {
            exit('maaf tidak dapat diproses');
        }
    }
    public function formedit()
    {
        if ($this->request->isAJAX()) {
            $idbrg = $this->request->getVar('idbrg');
            $barang  = new BarangModel();
            $row = $barang->find($idbrg);
            $data = [
                'idbrg' =>$row['idbrg'],
                'namabrg' =>$row['namabrg'],
                'merkbrg' =>$row['merkbrg'],
                'ruangbrg' =>$row['ruangbrg'],
            ];

            $msg = [
                'sukses' => view('barang/modaledit', $data)//$data untuk menampilkan data dari database
        ];
            echo json_encode($msg);
        } else {
            exit('maaf tidak dapat diproses');
        }
    }
    public function updatedata()
    {
        if ($this->request->isAJAX()) {
            $simpanData = [
            'namabrg' => $this->request->getVar('namabrg'),
            'merkbrg' => $this->request->getVar('merkbrg'),
            'ruangbrg'=> $this->request->getVar('ruangbrg')

        ];
            $barang  = new BarangModel;

            $idbrg = $this->request->getVar('idbrg');

        
            $barang->update($idbrg, $simpanData);
            $msg = [
                    'success' => 'Data berhasil diupdate'
                ];
            echo json_encode($msg);
        } else {
            exit('maaf tidak dapat diproses');
        }
    }

    public function hapus()
    {
        if ($this->request->isAJAX()) {
            $idbrg = $this->request->getVar('idbrg');
            //$barang  = new BarangModel;
            $this->barang->delete($idbrg);
            $msg = [
                'success' => "Data dengan kode $idbrg berhasil dihapus"
            ];
            echo json_encode($msg);
        } else {
            exit('maaf tidak dapat diproses');
        }
    }
}
