<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAbsenCreate extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'absen';
    protected $primaryKey       = 'id_absen';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_tugas', 'id_siswa', 'status'];

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

    public function getAbsen($id)
    {
        return $this->db->table('absen')
            ->selectCount('id_absen')->where(['id_tugas' => $id])->get()->getResultArray();
    }

    public function getName($id)
    {
        return $this->db->table('absen')->select('absen.id_absen, absen.id_tugas, absen.status, absen.created_at as create, siswa.*')
            ->join('siswa', 'absen.id_siswa = siswa.id_siswa')->where(['id_tugas' => $id])->get()->getResultArray();
    }

    public function siswaAbsen($id, $ids)
    {
        return $this->db->table('absen')->where(['id_tugas' => $id, 'id_siswa' => $ids])->get()->getResultArray();
    }

    public function countAll($id, $ids)
    {
        return $this->db->table('absen')->where(['id_tugas' => $id, 'id_siswa' => $ids])->countAllResults();
    }
}
