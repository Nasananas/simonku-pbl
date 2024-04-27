<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\MahasiswaModel;

class Mahasiswa extends ResourceController
{
    use ResponseTrait;

    public function index()
    {
        $model = new MahasiswaModel();
        $data = $model->findAll();
        return $this->respond($data);
    }

    public function get($NIM = null)
    {
        $model = new MahasiswaModel();
        $data = $model->find($NIM);
        if (!$data) {
            return $this->failNotFound('No Data Found');
        } else {
            return $this->respond($data);
        }
    }

    public function show($NIM = null)
    {
        $model = new MahasiswaModel();
        $data = $model->find($NIM);
        if (!$data) {
            return $this->failNotFound('No Data Found');
        } else {
            return $this->respond($data);
        }
    }

    public function create()
    {
        helper(['form']);
        $rules = [
            'NIM' => 'required|is_unique[mahasiswa.NIM]',
            'nama_mahasiswa' => 'required',
            'angkatan'      => 'required|in_list[2021,2022,2023]',
        ];
        
        $data = [
            'NIM' => $this->request->getVar('NIM'),
            'nama_mahasiswa' => $this->request->getVar('nama_mahasiswa'),
            'angkatan'      => $this->request->getVar('angkatan'),
        ];

        if (!$this->validate($rules)) return $this->fail($this->validator->getErrors(), 400);
        
        $model = new MahasiswaModel();
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

    public function update($NIM = null)
    {
        helper(['form']);
        $rules = [
            'nama_mahasiswa' => 'required',
            'angkatan'      => 'required|in_list[2021,2022,2023]',
        ];
        
        $data = [
            'nama_mahasiswa' => $this->request->getVar('nama_mahasiswa'),
            'angkatan'      => $this->request->getVar('angkatan'),
        ];

        if (!$this->validate($rules)) return $this->fail($this->validator->getErrors(), 400);
        
        $model = new MahasiswaModel();
        $dataToUpdate = $model->find($NIM);

        if (!$dataToUpdate) return $this->failNotFound('No Data Found');
        
        $model->update($NIM, $data);

        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Data Updated'
            ]
        ];

        return $this->respond($response);
    }

    public function delete($NIM = null)
    {
        $model = new MahasiswaModel();
        $dataToDelete = $model->find($NIM);

        if (!$dataToDelete) return $this->failNotFound('No Data Found');
        
        $model->delete($NIM);

        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Data Deleted'
            ]
        ];

        return $this->respond($response);
    }
}
