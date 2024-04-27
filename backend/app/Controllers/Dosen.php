<?php

namespace App\Controllers;

use App\Models\DosenModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\DosenModelModel;

class Dosen extends ResourceController
{
    use ResponseTrait;

    public function index()
    {
        $model = new DosenModel();
        $data = $model->findAll();
        return $this->respond($data);
    }

    public function get($NIDN = null)
    {
        $model = new DosenModel();
        $data = $model->find($NIDN);
        if (!$data) {
            return $this->failNotFound('No Data Found');
        } else {
            return $this->respond($data);
        }
    }

    public function show($NIDN = null)
    {
        $model = new DosenModel();
        $data = $model->find($NIDN);
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
            'NIDN' => 'required|is_unique[dosen.NIDN]',
            'nama_dosen' => 'required',
        ];
        
        $data = [
            'NIDN' => $this->request->getVar('NIDN'),
            'nama_dosen' => $this->request->getVar('nama_dosen'),
        ];

        if (!$this->validate($rules)) return $this->fail($this->validator->getErrors(), 400);
        
        $model = new DosenModel();
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

    public function update($NIDN = null)
    {
        helper(['form']);
        $rules = [
            'nama_dosen' => 'required',
        ];
        
        $data = [
            'nama_dosen' => $this->request->getVar('nama_dosen'),
        ];

        if (!$this->validate($rules)) return $this->fail($this->validator->getErrors(), 400);
        
        $model = new DosenModel();
        $dataToUpdate = $model->find($NIDN);

        if (!$dataToUpdate) return $this->failNotFound('No Data Found');
        
        $model->update($NIDN, $data);

        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Data Updated'
            ]
        ];

        return $this->respond($response);
    }

    public function delete($NIDN = null)
    {
        $model = new DosenModel();
        $dataToDelete = $model->find($NIDN);

        if (!$dataToDelete) return $this->failNotFound('No Data Found');
        
        $model->delete($NIDN);

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
