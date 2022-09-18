<?php

namespace App\Controllers;

use App\Models\GuruModel;
use App\Models\MatkulModel;
use App\Models\PenumpulanModel;
use App\Models\TugasModel;

class TugasSiswa extends BaseController
{
    protected $matkulModel;

    public function __construct()
    {
        helper(['url', 'form']);
        $this->matkulModel = new MatkulModel();
        $this->guru = new GuruModel();
        $this->pengumpulan = new PenumpulanModel();
        $this->tugas = new TugasModel();
    }

    public function index($slug)
    {
        $matkul = $this->matkulModel->getMatkul($slug);
        $id = session()->get('id');

        $data = [
            'title' => 'Teacher | Pengumpulan Tugas',
            'guru' => $this->guru->find($id),
            'matkul' => $matkul,
            'pengumpulan' => $this->pengumpulan->getPengumpulan($id),
        ];

        return view('teachers/tugassiswa/index', $data);
    }

    public function edit($id)
    {
        $ids = session()->get('id');
        // dd($id);
        $data = [
            'title' => 'Teacher | Pengumpulan Tugas',
            'guru' => $this->guru->find($ids),
            'tugas' => $this->tugas->getMatkull($id),
        ];

        if ($this->request->getMethod() == 'post') {
            $validation = $this->validate([
                'name' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Judul harus di isi',
                    ],
                ],
                'desc' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Keterangan harus di isi',
                    ],
                ],
                'file' => [
                    'rules' => 'max_size[file,2048]',
                    'errors' => [
                        'max_size' => 'Ukuran file terlalu besar',
                    ],
                ],
            ]);

            if (!$validation) {
                $data['validation'] = $this->validator;
            } else {
                $fileSampul = $this->request->getFile('file');
                if ($fileSampul->getError() == 4) {
                    $namaSampul = null;
                } else {
                    $namaSampul = $fileSampul->getRandomName();
                    $fileSampul->move('assets/content/documents', $namaSampul);
                }

                if ($this->request->getVar('uas') == null) {
                    $link = null;
                } else {
                    $link = $this->request->getVar('link');
                }

                // dd($link);
                $newData = [
                    'nama_materi' => $this->request->getVar('name'),
                    'deskripsi' => $this->request->getVar('desc'),
                    'absen' => $this->request->getVar('absen'),
                    'diskusi' => $this->request->getVar('diskusi'),
                    'pengumpulan' => $this->request->getVar('tugas'),
                    'ujian' => $this->request->getVar('uas'),
                    'link' => $link,
                    'file' => $namaSampul
                ];

                // dd($newData);

                $query = $this->tugas->update($id, $newData);

                if (!$query) {
                    return redirect()->back()->with('fail', 'Terdapat kesalahan, silahkan coba lagi!');
                } else {
                    return redirect()->to('/teacher')->with('success', 'Tugas Telah Berhasil di Edit!');
                }
            }
        }

        return view('teachers/tugas/edit', $data);
    }
}
