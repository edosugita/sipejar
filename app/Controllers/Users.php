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

    public function profile()
    {
        $data = [
            'title' => 'Profil',
        ];
        return view('temp_user/index', $data);
    }
}
