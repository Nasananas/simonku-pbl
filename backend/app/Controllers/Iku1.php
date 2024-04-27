<?php

namespace App\Controllers;
use PhpOffice\PhpSpreadsheet\IOFactory;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Iku1Model;

class Iku1 extends ResourceController
{
    use ResponseTrait;
    
    

    public function index()
    {
        $model = new Iku1Model();
        $data = $model->findAll();
        return $this->respond($data);
    }

    public function get($iku1_id = null)
    {
        $model = new Iku1Model();
        $data = $model->find($iku1_id);
        if (!$data) {
            return $this->failNotFound('No Data Found');
        } else {
            return $this->respond($data);
        }
    }

    public function show($iku1_id = null)
    {
        $model = new Iku1Model();
        $data = $model->find($iku1_id);
        if (!$data) {
            return $this->failNotFound('No Data Found');
        } else {
            return $this->respond($data);
        }
    }

    public function create()
    {
        helper(['form']);
    
        $data = [
            'no_ijazah' => $this->request->getVar('no_ijazah'),
            'nama_alumni' => $this->request->getVar('nama_alumni'),
            'status'      => $this->request->getVar('status'),
            'gaji'        => $this->request->getVar('gaji'),
            'masa_tunggu' => $this->request->getVar('masa_tunggu')
        ];
    
        // Periksa apakah bidang-bidang yang diperlukan ada yang kosong
        foreach ($data as $key => $value) {
            if (empty($value)) {
                unset($data[$key]);
            }
        }
    
        $model = new Iku1Model();
        $model->save($data);
    
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Data Inserted'
            ]
        ];
    
        return $this->respondCreated($response);
    }
    
    public function update($iku1_id = null)
    {
        helper(['form']);
    
        $data = [
            'no_ijazah' => $this->request->getVar('no_ijazah'),
            'nama_alumni' => $this->request->getVar('nama_alumni'),
            'status'      => $this->request->getVar('status'),
            'gaji'        => $this->request->getVar('gaji'),
            'masa_tunggu' => $this->request->getVar('masa_tunggu')
        ];
    
        // Periksa apakah bidang-bidang yang diperlukan ada yang kosong
        foreach ($data as $key => $value) {
            if (empty($value)) {
                unset($data[$key]);
            }
        }
    
        $model = new Iku1Model();
        $dataToUpdate = $model->find($iku1_id);
    
        if (!$dataToUpdate) return $this->failNotFound('No Data Found');
    
        $model->update($iku1_id, $data);
    
        // Kode untuk menampilkan view setelah update
        return view('edit_iku1', $data);
    }
    

    public function delete($iku1_id = null)
    {
        $model = new Iku1Model();
        $dataToDelete = $model->find($iku1_id);

        if (!$dataToDelete) return $this->failNotFound('No Data Found');
        
        $model->delete($iku1_id);

        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Data Deleted'
            ]
        ];

        return $this->respond($response);
    }

    public function import()
{
    try {
        $request = \Config\Services::request();
        
        // Periksa apakah file telah diunggah
        $file = $this->request->getFile('file');
        if (!$file) {
            return $this->failValidationError('No file uploaded');
        }
        
       // Check if the file is an Excel file
if (!$file->isValid() || !in_array($file->getClientExtension(), ['xlsx', 'xls'])) {
    return $this->failValidationError('Invalid file type. Only Excel files (.xlsx, .xls) are allowed');
}

        
        // Load the spreadsheet
        $spreadsheet = IOFactory::load($file);
    
        // Get the active sheet
        $sheet = $spreadsheet->getActiveSheet();
    
        // Get highest row
        $highestRow = $sheet->getHighestRow();
    
        $iku1Model = new Iku1Model();
    
        for ($row = 2; $row <= $highestRow; $row++) {
            $rowData = $sheet->rangeToArray('A' . $row . ':E' . $row, NULL, TRUE, FALSE)[0];
            
            // Memeriksa apakah setidaknya satu nilai dalam baris tidak kosong
            $nonEmptyValues = array_filter($rowData);
            if (!empty($nonEmptyValues)) {
                $data = [
                    'no_ijazah' => $rowData[0] ?? null,
                    'nama_alumni' => $rowData[1] ?? null,
                    'status' => $rowData[2] ?? null,
                    'gaji' => $rowData[3] ?? null,
                    'masa_tunggu' => $rowData[4] ?? null
                ];
            
                $iku1Model->insert($data);
            }
        }
        
        return $this->respond(['message' => 'Data from Excel file imported successfully'], ResponseInterface::HTTP_CREATED);
    } catch (\Exception $e) {
        return $this->failServerError('An error occurred while importing data: ' . $e->getMessage());
    }
}
public function calculateWeight($status, $gaji, $masa_tunggu)
{
    if ($status === "mendapat pekerjaan") {
        if ($gaji > 1.2 * $masa_tunggu) {
            if ($masa_tunggu < 6) {
                return 1.0;
            } else if ($masa_tunggu >= 6 && $masa_tunggu <= 12) {
                return 0.8;
            }
        } else {
            if ($masa_tunggu < 6) {
                return 0.7;
            } else if ($masa_tunggu >= 6 && $masa_tunggu <= 12) {
                return 0.5;
            }
        }
    } else if ($status === "wiraswasta") {
        if ($gaji > 1.2 * $masa_tunggu) {
            if ($masa_tunggu < 6) {
                return 1.2;
            } else if ($masa_tunggu >= 6 && $masa_tunggu <= 12) {
                return 1.0;
            }
        } else {
            if ($masa_tunggu < 6) {
                return 1.0;
            } else if ($masa_tunggu >= 6 && $masa_tunggu <= 12) {
                return 0.8;
            }
        }
    } else if ($status === "mahasiswa") {
        return 1;
    }

    return 0; // Default value
}
public function rekap()
{
    $model = new Iku1Model();
    $iku1Data = $model->findAll();
    
    $rekapData = [];
    
    foreach ($iku1Data as $iku1) {
        $bobot = $this->calculateWeight($iku1['status'], $iku1['gaji'], $iku1['masa_tunggu']);
        $rekapData[] = [
            'no_ijazah' => $iku1['no_ijazah'],
            'nama_alumni' => $iku1['nama_alumni'],
            'status' => $iku1['status'],
            'gaji' => $iku1['gaji'],
            'masa_tunggu' => $iku1['masa_tunggu'],
            'bobot' => $bobot
        ];
    }
    
    return $this->respond($rekapData);
}
}