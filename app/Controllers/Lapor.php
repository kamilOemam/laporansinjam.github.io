<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LaporModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Lapor extends BaseController
{
    public function __construct()
    {
        $this->laporModel = new LaporModel();
    }

    public function index()
    {
        if (!session()->get('nama')) {
            return redirect()->to(base_url() . "/");
        }
        // $lapor  = new LaporModel();
        // $data = [
        //     'tampildata' => $lapor->findAll(),
        // ];
        
        // d($lapor->findAll());
        return view('lapor/lapor'); //$data);
    }

    public function datalpr()
    {
        echo json_encode($this->lapor->findAll());
    }
    public function ambildata()
    {
        if ($this->request->isAJAX()) {
            $lapor  = new LaporModel;
            $data = [
                'tampildata' => $lapor->findAll()
        ];

            $msg = [
                'data' => view('lapor/datalapor', $data)//$data untuk menampilkan data dari database
        ];
            echo json_encode($msg);
        } else {
            exit('maaf tidak dapat diproses');
        }
    }
 
  
    public function formedit()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $lapor  = new LaporModel();
            $row = $lapor->find($id);
            $data = [
                'id' =>$row['id'],
                'npm' =>$row['npm'],
                'perwakilan' =>$row['perwakilan'],
                'keterangan' =>$row['keterangan'],
                'petugas' =>$row['petugas'],
                'status' =>$row['status'],
            ];

            $msg = [
                'sukses' => view('lapor/modaledit', $data)//$data untuk menampilkan data dari database
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
            'petugas' => $this->request->getVar('petugas'),
            'status'=> $this->request->getVar('status')

        ];
            $lapor  = new LaporModel;

            $id = $this->request->getVar('id');

        
            $lapor->update($id, $simpanData);
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

    public function cetak()
    {
        $tombolCetak = $this->request->getPost('btnCetak');
        $tombolExport = $this->request->getPost('btnExport');

        $dataLaporan = $this->laporModel->findAll();
        if (isset($tombolCetak)) {
            $data = [
                'tampildata' => $this->lapor->findAll()
                
            ];

            return view('lapor/cetak', $data);
        }

        if (isset($tombolExport)) {
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            $sheet->setCellValue('A1', 'Data Laporan Mahasiswa');
            $sheet->mergeCells('A1:F1');
            $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(20);

            $sheet->setCellValue('A2', 'SAINTEK UNIB');
            $sheet->mergeCells('A2:F2');
            $sheet->getStyle('A2')->getFont()->setBold(true)->setSize(20);
            
            $styleColumn = [
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ],
            ];
            
            $borderArray = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => '000000'],
                    ],
                ],
            ];

            $sheet->getStyle('A1:F1')->applyFromArray($styleColumn);
            $sheet->getStyle('A2:F2')->applyFromArray($styleColumn);

            $sheet->setCellValue('A4', 'No');
            $sheet->setCellValue('B4', 'Tanggal');
            $sheet->setCellValue('C4', 'Perwakilan');
            $sheet->setCellValue('D4', 'Keterangan');
            $sheet->setCellValue('E4', 'Petugas');
            $sheet->setCellValue('F4', 'Status');
            
            $sheet->getStyle('A4:F4')->applyFromArray($styleColumn);
            $sheet->getStyle('A4:F4')->applyFromArray($borderArray);
            
            $no = 1;
            $numRow = 5;

            foreach ($dataLaporan as $row):
                $sheet->setCellValue('A' . $numRow, $no);
                $sheet->setCellValue('B' . $numRow, $row['tanggal']);
                $sheet->setCellValue('C' . $numRow, $row['perwakilan']);
                $sheet->setCellValue('D' . $numRow, $row['keterangan']);
                $sheet->setCellValue('E' . $numRow, $row['petugas']);
                $sheet->setCellValue('F' . $numRow, $row['status']);
                
                $sheet->getStyle('A' . $numRow)->applyFromArray($styleColumn);//nomor urut ketengah
                
                $sheet->getStyle('A' . $numRow)->applyFromArray($borderArray);
                $sheet->getStyle('B' . $numRow)->applyFromArray($borderArray);
                $sheet->getStyle('C' . $numRow)->applyFromArray($borderArray);
                $sheet->getStyle('D' . $numRow)->applyFromArray($borderArray);
                $sheet->getStyle('E' . $numRow)->applyFromArray($borderArray);
                $sheet->getStyle('F' . $numRow)->applyFromArray($borderArray);

                $no++;
                $numRow++;
            endforeach;

            $sheet->getDefaultRowDimension()->setRowHeight(-1);
            $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
            $sheet->setTitle("Data Laporan Mahasiswa");

            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="Data Laporan Mahasiswa.xlsx"');
            header('Cache-Control: max-age=0');

            $writer = new Xlsx($spreadsheet);
            $writer->save('php://output');
        }
    }
}