<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\Iku2Model;

class Iku2 extends ResourceController
    {
        public function index()
        {
            $model = new Iku2Model();
            $data = $model->findAll();
            return $this->respond($data);
        }
    
        public function get($iku2_id = null)
        {
            $model = new Iku2Model();
            $data = $model->find($iku2_id);
            if (!$data) {
                return $this->failNotFound('No Data Found');
            } else {
                return $this->respond($data);
            }
        }
    
        public function show($iku2_id = null)
        {
            $model = new Iku2Model();
            $data = $model->find($iku2_id);
            if (!$data) {
                return $this->failNotFound('No Data Found');
            } else {
                return $this->respond($data);
            }
        }
    
        public function create()
        {
            $model = new Iku2Model();
            $data = [
                'NIM' => $this->request->getVar('NIM'),
                'aktivitas' => $this->request->getVar('aktivitas'),
                'sks' => $this->request->getVar('sks'),
                'prestasi' => $this->request->getVar('prestasi'),
                'tingkat_lomba' => $this->request->getVar('tingkat_lomba'),
                'dosen_pembimbing' => $this->request->getVar('dosen_pembimbing')
            ];
            $model->insert($data);
            return $this->respondCreated($data);
        }
    
        public function update($iku2_id = null)
        {
            $model = new Iku2Model();
            $data = [
                'NIM' => $this->request->getVar('NIM'),
                'aktivitas' => $this->request->getVar('aktivitas'),
                'sks' => $this->request->getVar('sks'),
                'prestasi' => $this->request->getVar('prestasi'),
                'tingkat_lomba' => $this->request->getVar('tingkat_lomba'),
                'dosen_pembimbing' => $this->request->getVar('dosen_pembimbing')
            ];
            $model->update($iku2_id, $data);
            return $this->respond($data);
        }
    
        public function delete($iku2_id = null)
        {
            $model = new Iku2Model();
            $model->delete($iku2_id);
            return $this->respondDeleted(['id' => $iku2_id]);
        }
    }
    