<?php

namespace App\Controllers;

use App\Libraries\Hash;
use App\Models\GuruModel;
use App\Models\SiswaModel;

class Setting extends BaseController
{
    protected $matkulModel;

    public function __construct()
    {
        helper(['url', 'form']);
        $this->guru = new GuruModel();
        $this->siswa = new SiswaModel();
    }

    public function index()
    {
        $id = session()->get('id');

        $data = [
            'title' => 'Teacher | Setting',
            'guru' => $this->guru->find($id),
        ];

        if ($this->request->getMethod() == 'post') {
            $validation = $this->validate([
                'name' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Judul harus di isi',
                    ],
                ],
                'sampul' => [
                    'rules' => 'max_size[sampul,2048]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'max_size' => 'Ukuran gambar background terlalu besar',
                        'is_image' => 'Yang anda pilih bukan gambar',
                        'mime_in' => 'Yang anda pilih bukan gambar',
                    ],
                ],
            ]);

            if (!$validation) {
                $data['validation'] = $this->validator;
            } else {
                $fileSampul1 = $this->request->getFile('sampul');
                // $fileSampul2 = $this->request->getFile('gambar');

                if ($fileSampul1->getError() == 4) {
                    $namaSampul1 = $this->request->getVar('gambarLama');
                } else {
                    $namaSampul1 = $fileSampul1->getRandomName();
                    $fileSampul1->move('assets/content/images', $namaSampul1);
                    if ($this->request->getVar('gambarLama') !== 'user.png') {
                        unlink('assets/content/images/' . $this->request->getVar('gambarLama'));
                    }
                }

                // if ($fileSampul2->getError() == 4) {
                //     $namaSampul2 = $this->request->getVar('gambarLama2');
                // } else {
                //     $namaSampul2 = $fileSampul2->getRandomName();
                //     $fileSampul2->move('assets/content/images', $namaSampul2);
                //     if ($this->request->getVar('gambarLama2') !== 'bg_white.jpg') {
                //         unlink('assets/content/images/' . $this->request->getVar('gambarLama2'));
                //     }
                // }

                $password = $this->request->getVar('password');

                if ($password == null) {
                    $checkPassword = $this->guru->where('id_guru', session()->get('id'))->first();
                    $password = $checkPassword['password'];
                } else {
                    $password = Hash::make($password);
                }

                $newData = [
                    'name' => $this->request->getVar('name'),
                    'picture' => $namaSampul1,
                    'bg_image' => $this->request->getVar('bg'),
                    'password' => $password
                ];

                // dd($newData);

                $query = $this->guru->update($id, $newData);

                if (!$query) {
                    return redirect()->back()->with('fail', 'Terdapat kesalahan, silahkan coba lagi!');
                } else {
                    return redirect()->to('/logout')->with('success', 'Profile telah berhasil di update');
                }
            }
        }

        return view('teachers/setting/index', $data);
    }

    public function user()
    {
        $id = session()->get('id');

        $data = [
            'title' => 'Student | Setting',
            'guru' => $this->siswa->find($id),
        ];

        if ($this->request->getMethod() == 'post') {
            $validation = $this->validate([
                'name' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Judul harus di isi',
                    ],
                ],
                'sampul' => [
                    'rules' => 'max_size[sampul,2048]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'max_size' => 'Ukuran gambar background terlalu besar',
                        'is_image' => 'Yang anda pilih bukan gambar',
                        'mime_in' => 'Yang anda pilih bukan gambar',
                    ],
                ],
            ]);

            if (!$validation) {
                $data['validation'] = $this->validator;
            } else {
                $fileSampul1 = $this->request->getFile('sampul');

                if ($fileSampul1->getError() == 4) {
                    $namaSampul1 = $this->request->getVar('gambarLama');
                } else {
                    $namaSampul1 = $fileSampul1->getRandomName();
                    $fileSampul1->move('assets/content/images', $namaSampul1);
                    if ($this->request->getVar('gambarLama') !== 'user.png') {
                        unlink('assets/content/images/' . $this->request->getVar('gambarLama'));
                    }
                }


                $password = $this->request->getVar('password');

                if ($password == null) {
                    $checkPassword = $this->siswa->where('id_siswa', session()->get('id'))->first();
                    $password = $checkPassword['password'];
                } else {
                    $password = Hash::make($password);
                }

                $newData = [
                    'nama_siswa' => $this->request->getVar('name'),
                    'picture' => $namaSampul1,
                    'password' => $password,
                    'background' => $this->request->getVar('bg'),
                ];

                // dd($newData);

                $query = $this->siswa->update($id, $newData);

                if (!$query) {
                    return redirect()->back()->with('fail', 'Terdapat kesalahan, silahkan coba lagi!');
                } else {
                    return redirect()->to('/user/logout')->with('success', 'Profile telah berhasil di update, please re-login');
                }
            }
        }

        return view('teachers/setting/user', $data);
    }
}
