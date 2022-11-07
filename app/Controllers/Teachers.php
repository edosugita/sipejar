<?php

namespace App\Controllers;

use App\Models\GuruModel;
use App\Models\MatkulModel;
use App\Models\ModelAbsenCreate;
use App\Models\SiswaModel;
use App\Models\TugasModel;

class Teachers extends BaseController
{
    protected $matkulModel;

    public function __construct()
    {
        helper(['url', 'form']);
        $this->matkulModel = new MatkulModel();
        $this->guru = new GuruModel();
        $this->tugasModel = new TugasModel();
        $this->absenModel = new ModelAbsenCreate();
        $this->siswaModel = new SiswaModel();
    }

    public function index()
    {
        $id = session()->get('id');

        $data = [
            'title' => 'Teacher | Dashboard',
            'guru' => $this->guru->find($id),
            'class' => $this->matkulModel->showAll($id),
        ];

        return view('teachers/dashboard/index', $data);
    }

    public function add()
    {
        $id = session()->get('id');

        $data = [
            'title' => 'Tambah Matkul | Dashboard',
            'guru' => $this->guru->find($id),
        ];

        if ($this->request->getMethod() == 'post') {
            $validation = $this->validate([
                'name' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama matkul harus di isi',
                    ]
                ],
                'departement' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Departement matkul harus di isi',
                    ]
                ],
            ]);

            if (!$validation) {
                $data['validation'] = $this->validator;
            } else {

                $slug = url_title($this->request->getVar('name'), '-', true);

                $newData = [
                    'id_guru' => session()->get('id'),
                    'nama_matkul' => $this->request->getVar('name'),
                    'slug' => $slug,
                    'kelas' => $this->request->getVar('class'),
                    'jurusan' => $this->request->getVar('departement'),
                    'offering' => $this->request->getVar('offering'),
                ];

                // dd($newData);

                $query = $this->matkulModel->save($newData);
                if (!$query) {
                    return redirect()->back()->with('fail', 'Something went wrong');
                } else {
                    return redirect()->to('/teacher')->with('success', 'Success add new class');
                }
            }
        }

        return view('teachers/dashboard/add', $data);
    }

    public function AddTugas($slug)
    {
        $matkul = $this->matkulModel->getMatkul($slug);
        $id = session()->get('id');

        $data = [
            'title' => 'Tambah Tugas',
            'guru' => $this->guru->find($id),
            'matkul' => $matkul
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

                $newData = [
                    'id_matkul' => $matkul['id_matkul'],
                    'nama_materi' => $this->request->getVar('name'),
                    'deskripsi' => $this->request->getVar('desc'),
                    'absen' => $this->request->getVar('absen'),
                    'diskusi' => $this->request->getVar('diskusi'),
                    'pengumpulan' => $this->request->getVar('tugas'),
                    'ujian' => $this->request->getVar('uas'),
                    'link' => $this->request->getVar('link'),
                    'file' => $namaSampul
                ];

                // dd($newData);

                $query = $this->tugasModel->insert($newData);

                if (!$query) {
                    return redirect()->back()->with('fail', 'Terdapat kesalahan, silahkan coba lagi!');
                } else {
                    return redirect()->to('/teacher/matakuliah/' . $matkul['slug'])->with('success', 'Tugas ' . $matkul['nama_matkul'] . ' Telah Berhasil di Tambahkan!');
                }
            }
        }

        return view('teachers/tugas/add', $data);
    }

    public function MatkulInfo($slug)
    {
        $matkul = $this->matkulModel->getMatkul($slug);
        $id = session()->get('id');

        $data = [
            'title' => 'Kelas ' . $matkul['kelas'] . ' | ' . ucwords($matkul['nama_matkul']),
            'guru' => $this->guru->find($id),
            'matkul' => $matkul,
            'tugas' => $this->tugasModel->getMatkul($slug),
        ];

        return view('teachers/matkul/index', $data);
    }

    public function TugasInfo($slug)
    {
        $matkul = $this->matkulModel->getMatkul($slug);
        $id = session()->get('id');

        $data = [
            'title' => 'Kelas ' . $matkul['kelas'] . ' | ' . ucwords($matkul['nama_matkul']),
            'guru' => $this->guru->find($id),
            'matkul' => $matkul,
        ];

        return view('teachers/tugassiswa/index', $data);
    }
}
