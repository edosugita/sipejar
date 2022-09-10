<?php

namespace App\Controllers;

use App\Models\Matkul_Model;

class Users extends BaseController
{
    protected $getMatkul;

    public function __construct()
    {
        $this->getMatkul = new Matkul_Model();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
        ];
        return view('users/dashboard', $data);
    }

    public function matkul($slug)
    {
        $data = [
            'title' => 'Matkul',
            'matkul' => $this->getMatkul->getMatkul($slug),
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
