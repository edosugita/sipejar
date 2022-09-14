<?php

namespace App\Controllers;

use App\Models\GuruModel;
use App\Models\KelasModel;
use App\Models\ModelAbsenCreate;
use App\Models\PerpusModel;
use App\Models\SiswaModel;

class Perpus extends BaseController
{
    protected $matkulModel;

    public function __construct()
    {
        helper(['url', 'form']);
        $this->guru = new GuruModel();
        $this->perpus = new PerpusModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Perpustakaan',
            'buku' => $this->perpus->findAll()
        ];

        return view('perpus/index', $data);
    }

    public function teacher()
    {
        $id = session()->get('id');

        $data = [
            'title' => 'Perpustakaan',
            'guru' => $this->guru->find($id),
            'buku' => $this->perpus->findAll()
        ];

        return view('perpus/teacher', $data);
    }

    public function add()
    {
        $id = session()->get('id');

        $data = [
            'title' => 'Perpustakaan',
            'guru' => $this->guru->find($id),
        ];

        if ($this->request->getMethod() == 'post') {
            $validation = $this->validate([
                'name' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Buku harus di isi',
                    ],
                ],
                'pembuat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Penulis harus di isi',
                    ],
                ],
                'tahun' => [
                    'rules' => 'required|integer',
                    'errors' => [
                        'required' => 'Ketegori harus di pilih',
                        'integer' => 'Tahun hanya boleh berupa angka'
                    ],
                ],
                'gambar' => [
                    'rules' => 'uploaded[gambar]|max_size[gambar,5120]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'uploaded' => 'Pilih gambar terlebih dahulu',
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang anda pilih bukan gambar',
                        'mime_in' => 'Yang anda pilih bukan gambar',
                    ],
                ],
                'file' => [
                    'rules' => 'uploaded[file]|max_size[file,30720]',
                    'errors' => [
                        'uploaded' => 'Pilih File terlebih dahulu',
                        'max_size' => 'Ukuran File terlalu besar',
                    ],
                ],
            ]);

            if (!$validation) {
                $data['validation'] = $this->validator;
            } else {
                $fileSampul = $this->request->getFile('gambar');
                $namaSampul = $fileSampul->getRandomName();
                $fileSampul->move('assets/content/images', $namaSampul);

                $fileSampul2 = $this->request->getFile('file');
                $namaSampul2 = $fileSampul2->getRandomName();
                $fileSampul2->move('assets/content/documents', $namaSampul2);

                $newData = [
                    'nama' => $this->request->getVar('pembuat'),
                    'nama_buku' => $this->request->getVar('name'),
                    'tahun' => $this->request->getVar('tahun'),
                    'gambar' => $namaSampul,
                    'file' => $namaSampul2,
                    'tanggal' => date('Y-m-d'),
                ];

                // dd($newData);

                $query = $this->perpus->insert($newData);

                if (!$query) {
                    return redirect()->back()->with('fail', 'Terdapat kesalahan, silahkan coba lagi!');
                } else {
                    return redirect()->to('/teacher/perpus')->with('success', 'Buku Telah Berhasil di Tambahkan!');
                }
            }
        }

        return view('perpus/add', $data);
    }
}
