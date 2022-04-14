<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
        ];
        return view('users/dashboard', $data);
    }

    public function matkul()
    {
        $data = [
            'title' => 'Matkul',
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
