<?php

namespace App\Controllers;

use App\Models\GuruModel;
use App\Models\KelasModel;
use App\Models\ModelAbsenCreate;
use App\Models\SiswaModel;

class Perpus extends BaseController
{
    protected $matkulModel;

    public function __construct()
    {
        helper(['url', 'form']);
    }

    public function index()
    {
        $id = session()->get('id');

        $data = [
            'title' => 'Perpustakaan',
        ];

        return view('perpus/index', $data);
    }
}
