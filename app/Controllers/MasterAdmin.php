<?php

namespace App\Controllers;

use App\Libraries\Hash;
use App\Models\AdminModel;
use App\Models\RoleAdminModel;

class MasterAdmin extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
        $this->admin = new AdminModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Master Admin',
            'dataAdmin' => $this->admin->findAll(),
        ];

        return view('Admin/MasterAdmin/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Master Admin',
        ];

        if ($this->request->getMethod() == 'post') {
            $validation = $this->validate([
                'name' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Username harus di isi',
                    ]
                ],
                'username' => [
                    'rules' => 'required|is_unique[admin.username]',
                    'errors' => [
                        'required' => 'Username Harus Di isi',
                        'is_unique' => 'Username telah terdaftar'
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
                'cpassword' => [
                    'rules' => 'required|min_length[3]|max_length[12]|matches[password]',
                    'errors' => [
                        'required' => 'Kata sandi harus di isi',
                        'min_length' => 'Kata sandi harus memiliki panjang karakter minimal 3',
                        'max_length' => 'Kata sandi harus memiliki panjang karakter maximal 12',
                        'matches' => 'Kata sandi tidak sama'
                    ]
                ],
            ]);

            if (!$validation) {
                $data['validation'] = $this->validator;
            } else {
                $newData = [
                    'nama' => $this->request->getVar('name'),
                    'username' => $this->request->getVar('username'),
                    'password' => Hash::make($this->request->getVar('password')),

                ];

                $query = $this->admin->insert($newData);

                if (!$query) {
                    return redirect()->back()->with('fail', 'Terdapat kesalahan, silahkan coba lagi!');
                } else {
                    return redirect()->to('/admin/master')->with('success', 'Admin telah berhasil ditambahkan!');
                }
            }
        }

        return view('Admin/MasterAdmin/add', $data);
    }

    public function view($id)
    {
        $admin = $this->admin->find($id);
        $data = [
            'title' => 'Data Admin | ' . $admin['nama'],
            'dataAdmin' => $admin,
        ];

        return view('Admin/MasterAdmin/view', $data);
    }

    public function edit($id)
    {
        $admin = $this->admin->find($id);
        $data = [
            'title' => 'Edit Admin | ' . $admin['nama'],
            'dataAdmin' => $admin,
        ];

        if ($this->request->getMethod() == 'post') {
            $checkUsername = $this->admin->where('id', $id)->first();
            $username = $checkUsername['username'];
            if ($username == $this->request->getVar('username')) {
                $validation = $this->validate([
                    'name' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Username harus di isi',
                        ]
                    ],
                    'username' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Username Harus Di isi',
                        ]
                    ],
                ]);
            } else {
                $validation = $this->validate([
                    'name' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Username harus di isi',
                        ]
                    ],
                    'username' => [
                        'rules' => 'required|is_unique[admin.username]',
                        'errors' => [
                            'required' => 'Username Harus Di isi',
                            'is_unique' => 'Username telah terdaftar'
                        ]
                    ],
                ]);
            }

            if (!$validation) {
                $data['validation'] = $this->validator;
            } else {
                $password = $this->request->getVar('password');

                if ($password == null) {
                    $checkPassword = $this->admin->where('id', $id)->first();
                    $password = $checkPassword['password'];
                } else {
                    $password = Hash::make($password);
                }

                $newData = [
                    'nama' => $this->request->getVar('name'),
                    'username' => $this->request->getVar('username'),
                    'role' => $this->request->getVar('role'),
                    'password' => $password,
                ];

                $query = $this->admin->update($id, $newData);

                if (!$query) {
                    return redirect()->back()->with('fail', 'Terdapat kesalahan, silahkan coba lagi!');
                } else {
                    return redirect()->to('/admin/master')->with('modalSuccess', 'Admin telah berhasil diperbarui!');
                }
            }
        }

        return view('Admin/MasterAdmin/edit', $data);
    }

    public function delete()
    {
        $id = $this->request->getVar('id');
        $this->admin->delete($id);
        return redirect()->to('/admin/master')->with('modalSuccess', 'Data Telah Berhasil di Hapus!');
    }
}
