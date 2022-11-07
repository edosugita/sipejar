<?php

namespace App\Models;

use CodeIgniter\Model;

class TugasModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tugas';
    protected $primaryKey       = 'id_tugas';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_matkul', 'pertemuan', 'nama_materi', 'deskripsi', 'absen', 'diskusi', 'pengumpulan', 'ujian', 'link', 'file'];

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

    public function getMatkul($slug)
    {
        return $this->db->table('tugas')->join('matkul', 'tugas.id_matkul = matkul.id_matkul')->where(['slug' => $slug])->get()->getResultArray();
    }

    public function getMatkull($id)
    {
        return $this->db->table('tugas')->join('matkul', 'tugas.id_matkul = matkul.id_matkul')->where(['tugas.id_tugas' => $id])->get()->getResultArray();
    }
}
