<?php

namespace App\Controllers;

use App\Models\GuruModel;
use App\Models\KelasModel;
use App\Models\ModelAbsenCreate;
use App\Models\SiswaModel;

class Presensi extends BaseController
{
    protected $matkulModel;

    public function __construct()
    {
        helper(['url', 'form']);
        $this->guru = new GuruModel();
        $this->siswa = new SiswaModel();
        $this->kelas = new KelasModel();
        $this->absen = new ModelAbsenCreate();
    }

    public function index($slug)
    {
        $id = session()->get('id');

        $data = [
            'title' => 'Teacher | Setting',
            'guru' => $this->guru->find($id),
            'siswa' => $this->kelas->getKelas($id),
            'siswaCount' => $this->kelas->getCount($id),
            'absen' => $this->absen->getAbsen($slug),
            'namaAbsen' => $this->absen->getName($slug),
        ];

        return view('teachers/presensi/index', $data);
    }
}
