<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function login()
    {
        $data = [
            'title'  => 'Login',
            'config' => config('Auth'),
        ];

        return view('auth/login', $data);
    }

    public function register()
    {
        $data = [
            'title'  => 'Register',
        ];

        return view('auth/register', $data);
    }
}
