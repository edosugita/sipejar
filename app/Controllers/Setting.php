<?php

namespace App\Controllers;

use App\Models\GuruModel;

class Setting extends BaseController
{
    protected $matkulModel;

    public function __construct()
    {
        helper(['url', 'form']);
        $this->guru = new GuruModel();
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
                    'rules' => 'uploaded[sampul]|max_size[sampul,2048]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang anda pilih bukan gambar',
                        'mime_in' => 'Yang anda pilih bukan gambar',
                    ],
                ],
                'gambar' => [
                    'rules' => 'uploaded[gambar]|max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang anda pilih bukan gambar',
                        'mime_in' => 'Yang anda pilih bukan gambar',
                    ],
                ],
            ]);

            if (!$validation) {
                $data['validation'] = $this->validator;
            } else {
                $fileSampul1 = $this->request->getFile('gambar');
                $namaSampul1 = $fileSampul1->getRandomName();
                $fileSampul1->move('assets/content/images', $namaSampul1);

                $fileSampul2 = $this->request->getFile('sampul');
                $namaSampul2 = $fileSampul2->getRandomName();
                $fileSampul2->move('assets/content/images', $namaSampul2);

                $newData = [
                    'name' => $this->request->getVar('name'),
                    'picture' => $namaSampul2,
                    'bg_image' => $namaSampul1,
                ];

                $query = $this->guru->update($id, $newData);

                if (!$query) {
                    return redirect()->back()->with('fail', 'Terdapat kesalahan, silahkan coba lagi!');
                } else {
                    return redirect()->to('/teacher/setting')->with('success', 'Jurnal Telah Berhasil di Tambahkan!');
                }
            }
        }

        return view('teachers/setting/index', $data);
    }
}
