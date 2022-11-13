<?php

namespace App\Controllers;

use App\Models\GuruModel;
use App\Models\UserHelpModel;

class AdminHelp extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
        $this->help = new UserHelpModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Help SAE',
            'help' => $this->help->find(1)
        ];

        if ($this->request->getMethod() == 'post') {
            $a = preg_replace('#<div class="ql-editor" data-gramm="false" contenteditable="true">#', '', $this->request->getVar('diskusi'));
            $b = preg_replace('#</div>#', '', $a);
            $c = preg_replace('#<div class="ql-clipboard" contenteditable="true" tabindex="-1">#', '', $b);
            $d = preg_replace('#<div class="ql-tooltip ql-hidden">#', '', $c);
            $e = preg_replace('#<a class="ql-preview" target="_blank" href="about:blank">(.*?)</a>#', '', $d);
            $f = preg_replace('#<a class="ql-action">(.*?)</a><a class="ql-remove">(.*?)</a>#', '', $e);
            $articel = preg_replace('#<input (.*?)>#', '', $f);

            $video = $this->request->getVar('video');
            if ($video == null) {
                $vid = $this->help->find(2)['video'];
            } else {
                $vid = $video;
            }

            $newData = [
                'content' => $articel,
                'video' => $vid,
            ];

            // dd($newData);

            $query = $this->help->update(1, $newData);

            if (!$query) {
                return redirect()->back()->with('fail', 'Terdapat kesalahan, silahkan coba lagi!');
            } else {
                return redirect()->back()->with('success', 'Data telah berhasil ditambahkan!');
            }
        }

        return view('Help/Admin/user', $data);
    }

    public function teacher()
    {
        $data = [
            'title' => 'Help SAE',
            'help' => $this->help->find(2),
        ];

        if ($this->request->getMethod() == 'post') {
            $a = preg_replace('#<div class="ql-editor" data-gramm="false" contenteditable="true">#', '', $this->request->getVar('diskusi'));
            $b = preg_replace('#</div>#', '', $a);
            $c = preg_replace('#<div class="ql-clipboard" contenteditable="true" tabindex="-1">#', '', $b);
            $d = preg_replace('#<div class="ql-tooltip ql-hidden">#', '', $c);
            $e = preg_replace('#<a class="ql-preview" target="_blank" href="about:blank">(.*?)</a>#', '', $d);
            $f = preg_replace('#<a class="ql-action">(.*?)</a><a class="ql-remove">(.*?)</a>#', '', $e);
            $articel = preg_replace('#<input (.*?)>#', '', $f);

            $video = $this->request->getVar('video');
            if ($video == null) {
                $vid = $this->help->find(2)['video'];
            } else {
                $vid = $video;
            }

            $newData = [
                'content' => $articel,
                'video' => $vid,
            ];

            // dd($newData);

            $query = $this->help->update(2, $newData);

            if (!$query) {
                return redirect()->back()->with('fail', 'Terdapat kesalahan, silahkan coba lagi!');
            } else {
                return redirect()->back()->with('success', 'Data telah berhasil ditambahkan!');
            }
        }

        return view('Help/Admin/teacher', $data);
    }
}
