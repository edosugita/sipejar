<?php

namespace App\Controllers;

use App\Models\GuruModel;
use App\Models\UserHelpModel;

class Help extends BaseController
{
    public function __construct()
    {
        $this->help = new UserHelpModel();
        $this->guru = new GuruModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Help SAE',
            'help' => $this->help->find(1),
        ];
        return view('Help/User/index', $data);
    }

    public function teacher()
    {
        $id = session()->get('id');
        $data = [
            'title' => 'Help SAE',
            'help' => $this->help->find(2),
            'guru' => $this->guru->find($id),
        ];
        return view('Help/Teacher/index', $data);
    }
}
