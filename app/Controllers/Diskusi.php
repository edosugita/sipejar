<?php

namespace App\Controllers;

use App\Models\DiskusiModel;
use App\Models\GuruModel;
use App\Models\TugasModel;

class Diskusi extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url']);
        $this->tugas = new TugasModel();
        $this->diskusi = new DiskusiModel();
        $this->guru = new GuruModel();
    }

    public function index($id)
    {
        $idG = session()->get('id');
        $data = [
            'title' => 'Diskusi',
            'tugas' => $this->tugas->find($id),
            'diskusi' => $this->diskusi->where(['id_tugas' => $id])->get()->getResultArray(),
            'guru' => $this->guru->find($idG),
        ];
        return view('teachers/diskusi/index', $data);
    }

    public function users($id)
    {
        $idG = session()->get('id');
        $data = [
            'title' => 'Diskusi',
            'tugas' => $this->tugas->find($id),
            'diskusi' => $this->diskusi->where(['id_tugas' => $id])->get()->getResultArray(),
            'guru' => $this->guru->find($idG),
        ];
        return view('users/diskusi/index', $data);
    }

    public function add($id)
    {
        $idG = session()->get('id');
        $data = [
            'title' => 'Tambah Diskusi',
            'idTugas' => $id,
            'guru' => $this->guru->find($idG),
        ];

        if ($this->request->getMethod() == 'post') {
            $a = preg_replace('#<div class="ql-editor" data-gramm="false" contenteditable="true">#', '', $this->request->getVar('diskusi'));
            $b = preg_replace('#</div>#', '', $a);
            $c = preg_replace('#<div class="ql-clipboard" contenteditable="true" tabindex="-1">#', '', $b);
            $d = preg_replace('#<div class="ql-tooltip ql-hidden">#', '', $c);
            $e = preg_replace('#<a class="ql-preview" target="_blank" href="about:blank">(.*?)</a>#', '', $d);
            $f = preg_replace('#<a class="ql-action">(.*?)</a><a class="ql-remove">(.*?)</a>#', '', $e);
            $articel = preg_replace('#<input (.*?)>#', '', $f);

            $newData = [
                'id_tugas' => $id,
                'nama' => session()->get('name'),
                'topik' => $articel,
            ];

            // dd($newData);

            $query = $this->diskusi->insert($newData);

            if (!$query) {
                return redirect()->back()->with('fail', 'Terdapat kesalahan, silahkan coba lagi!');
            } else {
                return redirect()->to('/teacher/matakuliah/diskusi/' . $id)->with('success', 'Data telah berhasil ditambahkan!');
            }
        }

        return view('teachers/diskusi/add', $data);
    }
}
