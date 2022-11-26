<?php

namespace App\Controllers;

use App\Models\ModelRombel;
use App\Models\ModelGuru;
use App\Models\ModelKelas;

class Rombel extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelRombel = new ModelRombel();
        $this->ModelGuru = new ModelGuru();
        $this->ModelKelas = new ModelKelas();
    }

    public function index()
    {
        $data = [
            'title' => 'Rombongan Belajar',
            'rombel' => $this->ModelRombel->allData(),
            'guru' => $this->ModelGuru->allData(),
            'kelas' => $this->ModelKelas->allData(),
            'isi' => 'admin/rombel/v_rombel'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        if ($this->validate([
            'nama_rombel' => [
                'label' => 'Rombongan Kelas',
                'rules' => 'required|is_unique[tbl-rombel.nama_rombel]',
                'errors' => [
                    'required' => '{field} Wajib diisi!',
                ]
            ],
            'id_kelas' => [
                'label' => 'Kelas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!',
                    'is_unique' => 'Nama Rombongan Belajar sudah ada, Silahkan Input Nama Rombongan Belajar lain!'
                ]
            ],
            'id_guru' => [
                'label' => 'Wali Kelas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!',
                ]
            ],
            'tahun_angkatan' => [
                'label' => 'Kelas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!',
                ]
            ],
        ])) {
            //jika valid
            $data = [
                'nama_rombel' => $this->request->getPost('nama_rombel'),
                'id_kelas' => $this->request->getPost('id_kelas'),
                'id_guru' => $this->request->getPost('id_guru'),
                'tahun_angkatan' => $this->request->getPost('tahun_angkatan'),
            ];
            $this->ModelRombel->add($data);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
            return redirect()->to(base_url('rombel'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('rombel'));
        }
    }

    public function delete($id_rombel)
    {
        $data = [
            'id_rombel' => $id_rombel,
        ];
        $this->ModelRombel->delete_data($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(base_url('rombel'));
    }

    public function detail_rombel($id_rombel)
    {
        $rombel = $this->ModelRombel->detail($id_rombel);
        $data = [
            'title' => 'Rombongan Belajar : ' . '<label>' . $rombel['nama_rombel'] . '</label>',
            'rombel' => $rombel,
            'siswa' => $this->ModelRombel->siswa($id_rombel),
            'jml' => $this->ModelRombel->jml_siswa($id_rombel),
            'siswa_unkelas' => $this->ModelRombel->siswa_unkelas(),
            'isi' => 'admin/rombel/v_detail_rombel'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function rekrut_siswa($id_siswa, $id_rombel)
    {
        $data = [
            'id_siswa' => $id_siswa,
            'id_rombel' => $id_rombel,
        ];
        $this->ModelRombel->update_siswa($data);
        session()->setFlashdata('pesan', 'Siswa berhasil ditambahkan ke kelas');
        return redirect()->to(base_url('rombel/detail_rombel/' . $id_rombel));
    }

    public function buang_siswa($id_siswa, $id_rombel)
    {
        $data = [
            'id_siswa' => $id_siswa,
            'id_rombel' => null
        ];
        $this->ModelRombel->update_siswa($data);
        session()->setFlashdata('pesan', 'Siswa berhasil dihapus dari kelas');
        return redirect()->to(base_url('rombel/detail_rombel/' . $id_rombel));
    }
}
