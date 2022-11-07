<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kelas';
    protected $primaryKey       = 'id_kelas';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_matkul', 'id_siswa'];

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

    public function getKelas($id)
    {
        return $this->db->table('kelas')->join('siswa', 'kelas.id_siswa = siswa.id_siswa')->where(['id_matkul' => $id])->get()->getResultArray();
    }

    public function getCount($id)
    {
        return $this->db->table('kelas')->selectCount('id_kelas')->where(['id_matkul' => $id])->get()->getResultArray();
    }

    public function getInfoKelas($id)
    {
        return $this->db->table('kelas')->join('matkul', 'kelas.id_matkul = matkul.id_matkul')->where(['id_siswa' => $id])->get()->getResultArray();
    }

    public function getKeAll()
    {
        return $this->db->table('kelas')
            ->join('matkul', 'kelas.id_matkul = matkul.id_matkul')
            ->join('siswa', 'kelas.id_siswa = siswa.id_siswa')->get()->getResultArray();
    }
}
