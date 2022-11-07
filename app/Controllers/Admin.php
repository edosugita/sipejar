<?php

namespace App\Controllers;

use App\Models\GuruModel;
use App\Models\SiswaModel;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->siswa = new SiswaModel();
        $this->guru = new GuruModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard Admin',
            'siswa' => $this->siswa->countAll(),
            'guru' => $this->guru->countAll()
        ];
        return view('Admin/Dashboard/index', $data);
    }
}
