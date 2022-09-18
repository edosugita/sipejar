<?php

namespace App\Controllers;

use App\Libraries\Hash;
use App\Models\GuruModel;

class MasterGuru extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
        $this->guru = new GuruModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Master Guru',
            'dataAdmin' => $this->guru->findAll(),
        ];

        return view('Admin/MasterGuru/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Master Guru',
        ];

        if ($this->request->getMethod() == 'post') {
            $validation = $this->validate([
                'name' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama guru harus di isi',
                    ]
                ],
                'email' => [
                    'rules' => 'required|is_unique[guru.email]',
                    'errors' => [
                        'required' => 'Email guru Harus Di isi',
                        'is_unique' => 'Email guru telah terdaftar',
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
                    'nis' => $this->request->getVar('nis'),
                    'email' => $this->request->getVar('email'),
                    'name' => $this->request->getVar('name'),
                    'password' => Hash::make($this->request->getVar('password')),
                    'bg_image' => 'bg_white.jpg',
                    'picture' => 'user.png'
                ];

                // dd($newData);

                $query = $this->guru->insert($newData);

                if (!$query) {
                    return redirect()->back()->with('fail', 'Terdapat kesalahan, silahkan coba lagi!');
                } else {
                    return redirect()->to('/admin/guru')->with('success', 'Data guru ' . $this->request->getVar('name') . ' telah berhasil ditambahkan!');
                }
            }
        }

        return view('Admin/MasterGuru/add', $data);
    }

    public function view($id)
    {
        $admin = $this->guru->find($id);
        $data = [
            'title' => 'Data Guru | ' . $admin['name'],
            'dataAdmin' => $admin,
        ];

        return view('Admin/MasterGuru/view', $data);
    }

    public function edit($id)
    {
        $admin = $this->guru->find($id);
        $data = [
            'title' => 'Edit Guru | ' . $admin['name'],
            'dataAdmin' => $admin,
        ];

        if ($this->request->getMethod() == 'post') {
            $checkUsername = $this->guru->where('id_guru', $id)->first();
            $username = $checkUsername['email'];
            if ($username == $this->request->getVar('email')) {
                $validation = $this->validate([
                    'name' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Nama guru harus di isi',
                        ]
                    ],
                    'email' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Email harus di isi',
                        ]
                    ],
                ]);
            } else {
                $validation = $this->validate([
                    'name' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Nama guru harus di isi',
                        ]
                    ],
                    'email' => [
                        'rules' => 'required|is_unique[guru.email]',
                        'errors' => [
                            'required' => 'Email guru Harus Di isi',
                            'is_unique' => 'Email guru telah terdaftar',
                        ]
                    ],
                ]);
            }

            if (!$validation) {
                $data['validation'] = $this->validator;
            } else {
                $password = $this->request->getVar('password');

                if ($password == null) {
                    $checkPassword = $this->guru->where('id_guru', $id)->first();
                    $password = $checkPassword['password'];
                } else {
                    $password = Hash::make($password);
                }

                $newData = [
                    'name' => $this->request->getVar('name'),
                    'email' => $this->request->getVar('email'),
                    'password' => $password,
                ];

                // dd($newData);

                $query = $this->guru->update($id, $newData);

                if (!$query) {
                    return redirect()->back()->with('fail', 'Terdapat kesalahan, silahkan coba lagi!');
                } else {
                    return redirect()->to('/admin/guru')->with('success', 'Data guru ' . $this->request->getVar('name') . ' telah berhasil di update!');
                }
            }
        }

        return view('Admin/MasterGuru/edit', $data);
    }

    public function delete()
    {
        $id = $this->request->getVar('id');
        $this->guru->delete($id);
        return redirect()->to('/admin/guru')->with('success', 'Data Telah Berhasil di Hapus!');
    }
}
