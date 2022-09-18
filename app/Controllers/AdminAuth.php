<?php

namespace App\Controllers;

use App\Libraries\Hash;
use App\Models\AdminModel;

class AdminAuth extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
        $this->admin = new AdminModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Login',
        ];

        if ($this->request->getMethod() == 'post') {
            $validation = $this->validate([
                'name' => [
                    'rules' => 'required|is_not_unique[admin.username]',
                    'errors' => [
                        'required' => 'Username harus di isi',
                        'is_not_unique' => 'Username tidak terdaftar',
                    ]
                ],

                'password' => [
                    'rules' => 'required|min_length[3]|max_length[12]',
                    'errors' => [
                        'required' => 'Kata sandi harus di isi',
                        'min_length' => 'Kata sandi harus memiliki panjang karakter minimal 3',
                        'max_length' => 'Kata sandi harus memiliki panjang karakter maximal 12',
                    ]
                ],
            ]);

            if (!$validation) {
                $data['validation'] = $this->validator;
            } else {
                $nama = $this->request->getVar('name');
                $password = $this->request->getVar('password');

                if (!ctype_lower($nama)) {
                    session()->setFlashdata('fail', 'Username atau Kata sandi salah!');
                    return redirect()->back()->withInput();
                } else {
                    $admin_info = $this->admin->where('username', $nama)->first();
                    $check_password = Hash::check($password, $admin_info['password']);

                    if (!$check_password) {
                        session()->setFlashdata('fail', 'Kata sandi salah');
                        return redirect()->to('/admin/login')->withInput();
                    } else {
                        $check_password = Hash::check($password, $admin_info['password']);

                        if (!$check_password) {
                            session()->setFlashdata('fail', 'Username atau Kata sandi salah!');
                            return redirect()->to('/admin/login')->withInput();
                        } else {
                            $admin_id = $admin_info['id'];
                            session()->set('loggedAdmin', $admin_id);
                            return $this->data($admin_info);
                        }
                    }
                }
            }
        }

        return view('auth/Admin/index', $data);
    }

    public function data($admin)
    {
        $data = [
            'id' => $admin['id'],
            'nama' => $admin['nama'],
            'username' => $admin['username'],
        ];

        session()->set($data);
        return redirect()->to('/admin/dashboard')->with('success', 'Berhasil login');
    }

    public function logout()
    {
        if (session()->has('loggedAdmin')) {
            session()->remove(['loggedAdmin', 'id', 'nama', 'username', 'role']);
            return redirect()->to('/admin/login?access=out')->with('fail', 'Kamu berhasil keluar');
        }
    }
}
