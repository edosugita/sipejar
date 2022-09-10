<?php

namespace App\Controllers;

use App\Models\GuruModel;

class Presensi extends BaseController
{
    protected $matkulModel;

    public function __construct()
    {
        helper(['url', 'form']);
        $this->guru = new GuruModel();
    }

    public function index()
    {
        $id = session()->get('id');

        $data = [
            'title' => 'Teacher | Setting',
            'guru' => $this->guru->find($id),
        ];

        return view('teachers/presensi/index', $data);
    }
}
