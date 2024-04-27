<?php

namespace App\Models;

use CodeIgniter\Model;

class Iku2Model extends Model
{
    protected $table            = 'iku2';
    protected $primaryKey       = 'iku2_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['NIM', 'aktivitas', 'sks', 'prestasi', 'tingkat_lomba', 'dosen_pembimbing'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getIku2WithMahasiswaAndDosen()
    {
        $this->select('iku2.*, mahasiswa.nama_mahasiswa, dosen.nama_dosen');
        $this->from('iku2');
        $this->join('mahasiswa', 'iku2.NIM = mahasiswa.NIM');
        $this->join('dosen', 'iku2.dosen_pembimbing = dosen.NIDN');
        $query = $this->get();

        return $query->getResult();
    }
}
