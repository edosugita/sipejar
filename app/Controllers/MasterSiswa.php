<?php

namespace App\Controllers;

use App\Libraries\Hash;
use App\Models\SiswaModel;

class MasterSiswa extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
        $this->siswa = new SiswaModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Master Siswa',
            'dataAdmin' => $this->siswa->findAll(),
        ];

        return view('Admin/MasterSiswa/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Master Siswa',
        ];

        if ($this->request->getMethod() == 'post') {
            $validation = $this->validate([
                'name' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama siswa harus di isi',
                    ]
                ],
                'nis' => [
                    'rules' => 'required|is_unique[siswa.NIS]|min_length[10]|max_length[10]|integer',
                    'errors' => [
                        'required' => 'NIS siswa Harus Di isi',
                        'is_unique' => 'NIS siswa telah terdaftar',
                        'min_length' => 'NIS harus memiliki panjang karakter minimal 10',
                        'max_length' => 'NIS harus memiliki panjang karakter maximal 10',
                        'integer' => 'NIS hanya dapat berupa anka'
                    ]
                ],
                'email' => [
                    'rules' => 'required|is_unique[siswa.email]',
                    'errors' => [
                        'required' => 'Email siswa Harus Di isi',
                        'is_unique' => 'Email siswa telah terdaftar',
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
                    'nama_siswa' => $this->request->getVar('name'),
                    'password' => Hash::make($this->request->getVar('password')),
                    'picture' => 'user.png',
                    'background' => 'default.png',
                ];

                // dd($newData);

                $query = $this->siswa->insert($newData);

                if (!$query) {
                    return redirect()->back()->with('fail', 'Terdapat kesalahan, silahkan coba lagi!');
                } else {
                    return redirect()->to('/admin/siswa')->with('success', 'Data siswa ' . $this->request->getVar('name') . ' telah berhasil ditambahkan!');
                }
            }
        }

        return view('Admin/MasterSiswa/add', $data);
    }

    public function view($id)
    {
        $admin = $this->siswa->find($id);
        $data = [
            'title' => 'Data Siswa | ' . $admin['nama_siswa'],
            'dataAdmin' => $admin,
        ];

        return view('Admin/MasterSiswa/view', $data);
    }

    public function edit($id)
    {
        $admin = $this->siswa->find($id);
        $data = [
            'title' => 'Edit Siswa | ' . $admin['nama_siswa'],
            'dataAdmin' => $admin,
        ];

        if ($this->request->getMethod() == 'post') {
            $checkUsername = $this->siswa->where('id_siswa', $id)->first();
            $username = $checkUsername['email'];
            if ($username == $this->request->getVar('email')) {
                $validation = $this->validate([
                    'name' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Nama siswa harus di isi',
                        ]
                    ],
                    'nis' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'NIS siswa Harus Di isi',
                        ]
                    ],
                    'email' => [
                        'rules' => 'required',
                    ],
                ]);
            } else {
                $validation = $this->validate([
                    'name' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Nama siswa harus di isi',
                        ]
                    ],
                    'nis' => [
                        'rules' => 'required|is_unique[siswa.NIS]|min_length[10]|max_length[10]|integer',
                        'errors' => [
                            'required' => 'NIS siswa Harus Di isi',
                            'is_unique' => 'NIS siswa telah terdaftar',
                            'min_length' => 'NIS harus memiliki panjang karakter minimal 10',
                            'max_length' => 'NIS harus memiliki panjang karakter maximal 10',
                            'integer' => 'NIS hanya dapat berupa anka'
                        ]
                    ],
                    'email' => [
                        'rules' => 'required|is_unique[siswa.email]',
                        'errors' => [
                            'required' => 'Email siswa Harus Di isi',
                            'is_unique' => 'Email siswa telah terdaftar',
                        ]
                    ],
                ]);
            }

            if (!$validation) {
                $data['validation'] = $this->validator;
            } else {
                $password = $this->request->getVar('password');

                if ($password == null) {
                    $checkPassword = $this->siswa->where('id_siswa', $id)->first();
                    $password = $checkPassword['password'];
                } else {
                    $password = Hash::make($password);
                }

                $newData = [
                    'nama_siswa' => $this->request->getVar('name'),
                    'email' => $this->request->getVar('email'),
                    'NIS' => $this->request->getVar('nis'),
                    'password' => $password,
                ];

                // dd($newData);

                $query = $this->siswa->update($id, $newData);

                if (!$query) {
                    return redirect()->back()->with('fail', 'Terdapat kesalahan, silahkan coba lagi!');
                } else {
                    return redirect()->to('/admin/siswa')->with('success', 'Data siswa ' . $this->request->getVar('name') . ' telah berhasil di update!');
                }
            }
        }

        return view('Admin/MasterSiswa/edit', $data);
    }

    public function delete()
    {
        $id = $this->request->getVar('id');
        $this->siswa->delete($id);
        return redirect()->to('/admin/siswa')->with('success', 'Data Telah Berhasil di Hapus!');
    }
}
