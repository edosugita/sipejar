<?php

namespace App\Controllers;

use App\Models\KelasModel;
use App\Models\MatkulModel;
use App\Models\ModelAbsenCreate;
use App\Models\PenumpulanModel;
use App\Models\TugasModel;

class Users extends BaseController
{
    protected $getMatkul;

    public function __construct()
    {
        $this->getKelas = new KelasModel();
        $this->getMatkul = new MatkulModel();
        $this->getTugas = new TugasModel();
        $this->getAbsen = new ModelAbsenCreate();
        $this->getPengumpulan = new PenumpulanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'kelas' => $this->getKelas->getInfoKelas(session()->get('id')),
        ];
        return view('users/dashboard', $data);
    }

    public function matkul($slug)
    {
        $matkul = $this->getMatkul->getMatkul($slug);
        $data = [
            'title' => 'Matkul',
            'tugas' => $this->getTugas->getMatkul($slug),
            'matkul' => $matkul,
        ];
        return view('users/matkul', $data);
    }

    public function presensi($id)
    {
        $data = [
            'title' => 'Presensi',
            'absen' => $this->getAbsen->siswaAbsen($id, session()->get('id')),
            'absenaa' => $this->getAbsen->countAll($id, session()->get('id')),
        ];

        if ($this->request->getMethod() == 'post') {
            $newData = [
                'id_tugas' => $id,
                'id_siswa' => session()->get('id'),
                'status' => $this->request->getVar('absensi'),
            ];

            // dd($newData);

            $query = $this->getAbsen->insert($newData);

            if (!$query) {
                return redirect()->back()->with('fail', 'Terdapat kesalahan, silahkan coba lagi!');
            } else {
                return redirect()->back()->with('success', 'Berhasil melakukan absensi!');
            }
        }

        return view('users/presensi', $data);
    }

    public function tugas($id)
    {
        $tugas = $this->getTugas->getMatkull($id);
        $data = [
            'title' => 'Tugas',
            'tugas' => $tugas,
            'countAll' => $this->getPengumpulan->countAll($id, session()->get('id')),
            'submission' => $this->getPengumpulan->getFile($id, session()->get('id'))
        ];

        return view('users/tugas', $data);
    }

    public function pengumpulan($id)
    {
        $tugas = $this->getTugas->getMatkull($id);
        $data = [
            'title' => 'Tugas',
            'tugas' => $tugas,
            'countAll' => $this->getPengumpulan->countAll($id, session()->get('id')),
        ];

        if ($this->request->getMethod() == 'post') {
            $validation = $this->validate([
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

                $newData = [
                    'id_tugas' => $id,
                    'id_siswa' => session()->get('id'),
                    'tugas' => $namaSampul,
                ];

                // dd($newData);

                $query = $this->getPengumpulan->insert($newData);

                if (!$query) {
                    return redirect()->back()->with('fail', 'Terdapat kesalahan, silahkan coba lagi!');
                } else {
                    return redirect()->to('/pelajaran/tugas/' . $id . '/' . $tugas[0]['nama_matkul'])->with('success', 'Tugas Telah Berhasil di tambahkn!');
                }
            }
        }

        return view('users/submission', $data);
    }

    public function edit($id)
    {
        $tugas = $this->getTugas->getMatkull($id);
        $getid = $this->getPengumpulan->getFile($id, session()->get('id'));
        $data = [
            'title' => 'Tugas',
            'tugas' => $tugas,
            'countAll' => $this->getPengumpulan->countAll($id, session()->get('id')),
            'submission' => $this->getPengumpulan->getFile($id, session()->get('id'))
        ];

        if ($this->request->getMethod() == 'post') {
            $validation = $this->validate([
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

                $newData = [
                    'id_tugas' => $id,
                    'id_siswa' => session()->get('id'),
                    'tugas' => $namaSampul,
                ];

                // dd($getid[0]['id_pengum']);

                $query = $this->getPengumpulan->update($getid[0]['id_pengum'], $newData);

                if (!$query) {
                    return redirect()->back()->with('fail', 'Terdapat kesalahan, silahkan coba lagi!');
                } else {
                    return redirect()->to('/pelajaran/tugas/' . $id . '/' . $tugas[0]['nama_matkul'])->with('success', 'Tugas Telah Berhasil di ubah!');
                }
            }
        }

        return view('users/edit', $data);
    }

    public function remove($id)
    {
        $gambar = $this->getPengumpulan->getFile($id, session()->get('id'));
        unlink('assets/content/documents/' . $gambar[0]['tugas']);
        $this->getPengumpulan->delete($id);
        return redirect()->back()->with('success', 'Tugas Telah Berhasil di Hapus!');
    }
}
