<?php

namespace App\Controllers;

use App\Models\ModelKelas;
use App\Models\ModelGuru;

class Kelas extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelKelas = new ModelKelas();
        $this->ModelGuru = new ModelGuru();
    }
    public function index()
    {
        $data = [
            'title' => 'Kelas',
            'kelas' => $this->ModelKelas->allData(),
            'guru' => $this->ModelGuru->allData(),
            'isi' => 'admin/v_kelas'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        // $data = [
        //     'kelas' => $this->request->getPost('kelas'),
        // ];
        // $this->ModelKelas->add($data);
        // session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        // return redirect()->to(base_url('kelas'));
        if ($this->validate([
            'kelas' => [
                'label' => 'Kelas',
                'rules' => 'required|is_unique[tbl-kelas.kelas]',
                'errors' => [
                    'required' => '{field} Wajib diisi!',
                    'is_unique' => 'Nama Kelas sudah ada, Silahkan Input Nama Kelas lain!'
                ]
            ],
            'wali_kelas' => [
                'label' => 'Wali Kelas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!',
                ]
            ],
        ])) {
            //jika valid
            $data = [
                'kelas' => $this->request->getPost('kelas'),
                'wali_kelas' => $this->request->getPost('wali_kelas'),
            ];
            $this->ModelKelas->add($data);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
            return redirect()->to(base_url('kelas'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('kelas'));
        }
    }

    public function edit($id_kelas)
    {
        $data = [
            'id_kelas' => $id_kelas,
            'kelas' => $this->request->getPost('kelas'),
            'wali_kelas' => $this->request->getPost('wali_kelas'),
        ];
        $this->ModelKelas->edit($data);
        session()->setFlashdata('pesan', 'Data berhasil diupdate');
        return redirect()->to(base_url('kelas'));
    }

    public function delete($id_kelas)
    {
        $data = [
            'id_kelas' => $id_kelas,
        ];
        $this->ModelKelas->delete_data($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(base_url('kelas'));
    }
}
