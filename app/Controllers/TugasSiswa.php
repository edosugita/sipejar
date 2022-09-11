<?php

namespace App\Controllers;

use App\Models\GuruModel;
use App\Models\MatkulModel;
use App\Models\PenumpulanModel;

class TugasSiswa extends BaseController
{
    protected $matkulModel;

    public function __construct()
    {
        helper(['url', 'form']);
        $this->matkulModel = new MatkulModel();
        $this->guru = new GuruModel();
        $this->pengumpulan = new PenumpulanModel();
    }

    public function index($slug)
    {
        $matkul = $this->matkulModel->getMatkul($slug);
        $id = session()->get('id');

        $data = [
            'title' => 'Teacher | Pengumpulan Tugas',
            'guru' => $this->guru->find($id),
            'matkul' => $matkul,
            'pengumpulan' => $this->pengumpulan->getPengumpulan($id),
        ];

        return view('teachers/tugassiswa/index', $data);
    }
}
