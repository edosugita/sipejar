<?php

namespace App\Controllers;

use App\Models\KelasModel;
use App\Models\Matkul_Model;
use App\Models\MatkulModel;
use App\Models\TugasModel;

class Users extends BaseController
{
    protected $getMatkul;

    public function __construct()
    {
        $this->getKelas = new KelasModel();
        $this->getMatkul = new MatkulModel();
        $this->getTugas = new TugasModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'kelas' => $this->getKelas->getInfoKelas(session()->get('id')),
        ];
        return view('users/dashboard', $data);
    }

    public function matkul($slug)
    {
        $matkul = $this->getMatkul->getMatkul($slug);
        $data = [
            'title' => 'Matkul',
            'tugas' => $this->getTugas->getMatkul($slug),
            'matkul' => $matkul,
        ];
        return view('users/matkul', $data);
    }

    public function presensi()
    {
        $data = [
            'title' => 'Presensi',
        ];
        return view('users/presensi', $data);
    }

    public function tugas()
    {
        $data = [
            'title' => 'Tugas',
        ];
        return view('users/tugas', $data);
    }

    public function pengumpulan()
    {
        $data = [
            'title' => 'Submission',
        ];
        return view('users/submission', $data);
    }
}
