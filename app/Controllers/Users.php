<?php

namespace App\Controllers;

use App\Models\KelasModel;
use App\Models\MatkulModel;
use App\Models\ModelAbsenCreate;
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

    public function tugas()
    {
        $data = [
            'title' => 'Tugas',
        ];
        return view('users/tugas', $data);
    }

    public function pengumpulan()
    {
        $data = [
            'title' => 'Submission',
        ];
        return view('users/submission', $data);
    }
}
