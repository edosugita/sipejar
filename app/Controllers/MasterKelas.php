<?php

namespace App\Controllers;

use App\Libraries\Hash;
use App\Models\GuruModel;
use App\Models\KelasModel;
use App\Models\MatkulModel;
use App\Models\SiswaModel;

class MasterKelas extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
        $this->kelas = new KelasModel();
        $this->siswa = new SiswaModel();
        $this->matkul = new MatkulModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Master Siswa',
            'dataAdmin' => $this->kelas->getKeAll(),
        ];

        return view('Admin/MasterKelas/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Master Siswa',
            'dataKategori' => $this->siswa->findAll(),
            'dataPel' => $this->matkul->findAll(),
        ];

        if ($this->request->getMethod() == 'post') {
            $newData = [
                'id_matkul' => $this->request->getVar('napel'),
                'id_siswa' => $this->request->getVar('name'),
            ];

            // dd($newData);

            $query = $this->kelas->insert($newData);

            if (!$query) {
                return redirect()->back()->with('fail', 'Terdapat kesalahan, silahkan coba lagi!');
            } else {
                return redirect()->to('/admin/kelas')->with('success', 'Data telah berhasil ditambahkan!');
            }
        }

        return view('Admin/MasterKelas/add', $data);
    }

    public function delete()
    {
        $id = $this->request->getVar('id');
        $this->kelas->delete($id);
        return redirect()->to('/admin/kelas')->with('success', 'Data Telah Berhasil di Hapus!');
    }
}
