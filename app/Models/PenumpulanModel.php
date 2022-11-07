<?php

namespace App\Models;

use CodeIgniter\Model;

class PenumpulanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pengumpulan';
    protected $primaryKey       = 'id_pengum';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_tugas', 'id_siswa', 'tugas'];

    // Dates
    protected $useTimestamps = true;
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

    public function getPengumpulan($id)
    {
        return $this->db->table('pengumpulan')
            ->join('siswa', 'pengumpulan.id_siswa = siswa.id_siswa')->where(['id_tugas' => $id])->get()->getResultArray();
    }

    public function countAll($id, $ids)
    {
        return $this->db->table('pengumpulan')->where(['id_tugas' => $id, 'id_siswa' => $ids])->countAllResults();
    }

    public function getFIle($id, $ids)
    {
        return $this->db->table('pengumpulan')
            ->join('siswa', 'pengumpulan.id_siswa = siswa.id_siswa')->where(['id_tugas' => $id, 'siswa.id_siswa' => $ids])->get()->getResultArray();
    }
}
