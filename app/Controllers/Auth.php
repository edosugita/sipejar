<?php

namespace App\Controllers;

use App\Libraries\Hash;
use App\Models\SiswaModel;

class Auth extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
        $this->siswaModel = new SiswaModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Login',
        ];

        if ($this->request->getMethod() == 'post') {
            $validation = $this->validate([
                'email' => [
                    'rules' => 'required|is_not_unique[siswa.email]',
                    'errors' => [
                        'required' => 'Email harus di isi',
                        'is_not_unique' => 'Email tidak terdaftar',
                    ]
                ],

                'password' => [
                    'rules' => 'required|min_length[6]|max_length[16]',
                    'errors' => [
                        'required' => 'Kata sandi harus di isi',
                        'min_length' => 'Kata sandi harus memiliki panjang karakter minimal 6',
                        'max_length' => 'Kata sandi harus memiliki panjang karakter maximal 16',
                    ]
                ],
            ]);

            if (!$validation) {
                $data['validation'] = $this->validator;
            } else {
                $email = $this->request->getVar('email');
                $password = $this->request->getVar('password');

                $admin_info = $this->siswaModel->where('email', $email)->first();
                $check_password = Hash::check($password, $admin_info['password']);

                // dd($check_password);
                if (!$check_password) {
                    session()->setFlashdata('fail', 'Email atau Kata sandi salah!');
                    return redirect()->to('/login')->withInput();
                } else {
                    $check_password = Hash::check($password, $admin_info['password']);

                    if (!$check_password) {
                        session()->setFlashdata('fail', 'Email atau Kata sandi salah!');
                        return redirect()->to('/login')->withInput();
                    } else {
                        $admin_id = $admin_info['id_siswa'];
                        session()->set('loggedSiswa', $admin_id);
                        return $this->data($admin_info);
                    }
                }
            }
        }

        return view('auth/users/index', $data);
    }

    public function data($admin)
    {
        $data = [
            'id' => $admin['id_siswa'],
            'name' => $admin['nama_siswa'],
            'email' => $admin['email'],
            'picture' => $admin['picture'],
            'background' => $admin['background'],
            'role' => 'siswa'
        ];

        session()->set($data);
        return redirect()->to('/')->with('success', 'Berhasil login');
    }

    public function logout()
    {
        if (session()->has('loggedSiswa')) {
            session()->remove(['loggedSiswa', 'id', 'email', 'name', 'picture', 'role', 'bg_color', 'bg_image']);
            return redirect()->to('/login?access=out')->with('fail', 'Kamu berhasil keluar');
        }
    }
}
