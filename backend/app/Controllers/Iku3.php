<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Iku3Model;

class Iku3 extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    use ResponseTrait;
    public function index()
    {
        $model = new Iku3Model();
        $data = $model->findAll();
        return $this->respond($data);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id_dosen
     *
     * @return ResponseInterface
     */

     public function get($id = null)
{
    $model = new Iku3Model();
    $data = $model->find($id);
    if (!$data) {
        return $this->failNotFound('No Data Found');
    } else {
        return $this->respond($data);
    }
}
    public function show($id_dosen = null)
    {
        $model = new Iku3Model();
        $data = $model->find(['id_dosen' => $id_dosen]);
        if(!$data) return $this->FailNotFound('No Data Found');
        return $this->respond($data[0]);
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        helper(['form']);
        $rules = [
            'nama_dosen'   => 'required',
            'aktivitas_dosen'  => 'required',
            
        ];
        
    $data =[
        'nama_dosen' => $this->request->getVar('nama_dosen'),
        'aktivitas_dosen'      => $this->request->getVar('aktivitas_dosen'),
        
    ];
    if (!$this->validate($rules)) return $this->fail($this->validator->getErrors());
        $model =new Iku3Model();
        $model->save($data);
        $response = [
            'status'=> 201,
            'error'=> null,
            'messages'=> [
                'success'=>'Data Inserted'
            ]
        ];
        return $this->respondCreated($response);
    }


    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id_dosen
     *
     * @return ResponseInterface
     */
    public function update($id_dosen = null)
    {
        helper(['form']);
        
        $rules = [
            
            'nama_dosen'   => 'required',
            'aktivitas_dosen'  => 'required',
            
        ];
        
    $data =[
        
        'nama_dosen' => $this->request->getVar('nama_dosen'),
        'aktivitas_dosen'      => $this->request->getVar('aktivitas_dosen'),
        
    ];
    if (!$this->validate($rules)) return $this->fail($this->validator->getErrors());
        $model =new Iku3Model();
        $findById = $model->find(['id_dosen' => $id_dosen]);
        if(!$findById) return $this->failNotFound('No Data Found');
        $model->update($id_dosen, $data);
        $response = [
            'status'=> 200,
            'error'=> null,
            'messages'=> [
                'success'=>'Data Updated'
            ]
        ];
        return $this->respond($response);
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id_dosen
     *
     * @return ResponseInterface
     */
    public function delete($id_dosen = null)
    {
        $model =new Iku3Model();
        $findById = $model->find(['id_dosen' => $id_dosen]);
        if(!$findById) return $this->failNotFound('No Data Found');
        $model->delete($id_dosen);
        $response = [
            'status'=> 200,
            'error'=> null,
            'messages'=> [
                'success'=>'Data Deleted'
            ]
        ];
        return $this->respond($response);
    }
}

