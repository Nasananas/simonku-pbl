<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;

class User extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        $model = new UserModel();
        $data = $model->findAll();
        return $this->respond($data);
    }

    public function getUser($id_user = null)
{
    $model = new UserModel();
    $data = ($id_user) ? $model->find($id_user) : $model->findAll();
    
    if (!$data) {
        return $this->failNotFound('No Data Found');
    } else {
        return $this->respond($data);
    }
}

    public function show($id_user = null)
    {
        $model = new UserModel();
        $data = $model->find($id_user);
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
            'email' => 'required',
            'password' => 'required',
            'role'      => 'required',
        ];
        
        $data = [
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
            'role'      => $this->request->getVar('role'),
        ];

        if (!$this->validate($rules)) return $this->fail($this->validator->getErrors(), 400);
        
        $model = new UserModel();
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

    public function login()
    {
        $model = new UserModel();

        // Ambil data dari form login
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        // Cari user berdasarkan email
        $user = $model->where('email', $email)->first();

        // Jika user tidak ditemukan atau password tidak sesuai, kembalikan pesan error
        if (!$user || !password_verify($password, $user['password'])) {
            return $this->fail('Invalid email or password', 401);
        }

        // Jika email dan password cocok, berikan respons berhasil
        return $this->respond(['message' => 'Login successful'], 200);
    }

    public function update($id_user = null)
{
    helper(['form']);
    $rules = [
        'email' => 'required',
        'password' => 'required',
        'role'      => 'required',
    ];
    
    $data = [
        'email' => $this->request->getVar('email'),
        'password' => $this->request->getVar('password'),
        'role'      => $this->request->getVar('role'),
    ];

    if (!$this->validate($rules)) {
        return $this->fail($this->validator->getErrors(), 400);
    }
    
    $model = new UserModel();
    $dataToUpdate = $model->find($id_user);

    if (!$dataToUpdate) {
        return $this->failNotFound('No Data Found');
    }
    
    $model->update($id_user, $data);

    $response = [
        'status'   => 200,
        'error'    => null,
        'messages' => [
            'success' => 'Data Updated'
        ]
    ];

    return $this->respond($response);
}
    public function delete($id_user = null)
    {
        $model = new UserModel();
        $dataToDelete = $model->find($id_user);

        if (!$dataToDelete) return $this->failNotFound('No Data Found');
        
        $model->delete($id_user);

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
