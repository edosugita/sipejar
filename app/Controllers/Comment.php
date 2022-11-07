<?php

namespace App\Controllers;

use App\Models\CommentModel;
use App\Models\DiskusiModel;
use App\Models\GuruModel;
use App\Models\TugasModel;

class Comment extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url']);
        $this->tugas = new TugasModel();
        $this->diskusi = new DiskusiModel();
        $this->comment = new CommentModel();
        $this->guru = new GuruModel();
    }

    public function index($id)
    {
        $idG = session()->get('id');
        $data = [
            'title' => 'Diskusi',
            'tugas' => $this->diskusi->find($id),
            'comment' => $this->comment->where(['id_diskusi' => $id])->get()->getResultArray(),
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
                'id_diskusi' => $id,
                'nama' => session()->get('name'),
                'topik' => $articel,
            ];

            // dd($newData);

            $query = $this->comment->insert($newData);

            if (!$query) {
                return redirect()->back()->with('fail', 'Terdapat kesalahan, silahkan coba lagi!');
            } else {
                return redirect()->back()->with('success', 'Data telah berhasil ditambahkan!');
            }
        }

        return view('teachers/comment/index', $data);
    }

    public function users($id)
    {
        $idG = session()->get('id');
        $data = [
            'title' => 'Diskusi',
            'tugas' => $this->diskusi->find($id),
            'comment' => $this->comment->where(['id_diskusi' => $id])->get()->getResultArray(),
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
                'id_diskusi' => $id,
                'nama' => session()->get('name'),
                'topik' => $articel,
            ];

            // dd($newData);

            $query = $this->comment->insert($newData);

            if (!$query) {
                return redirect()->back()->with('fail', 'Terdapat kesalahan, silahkan coba lagi!');
            } else {
                return redirect()->back()->with('success', 'Data telah berhasil ditambahkan!');
            }
        }

        return view('users/comment/index', $data);
    }
}
