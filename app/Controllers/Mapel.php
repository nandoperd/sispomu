<?php

namespace App\Controllers;

use App\Models\ModelMapel;
use App\Models\ModelKelas;
use App\Models\ModelGuru;
use App\Models\ModelTp;

class Mapel extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelMapel = new ModelMapel();
        $this->ModelKelas = new ModelKelas();
        $this->ModelGuru = new ModelGuru();
        $this->ModelTp = new ModelTp();
    }

    public function index()
    {
        $data = [
            'title' => 'Mata Pelajaran',
            'mapel' => $this->ModelKelas->allData(),
            'guru' => $this->ModelGuru->allData(),
            'tp' => $this->ModelTp->allData(),
            'isi' => 'admin/mapel/v_index'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function detail($id_kelas)
    {
        $data = [
            'title' => 'Mata Pelajaran',
            'kelas' => $this->ModelKelas->detail_Data($id_kelas),
            'mapel' => $this->ModelMapel->allDataMapel($id_kelas),
            'guru' => $this->ModelGuru->allData(),
            'tp' => $this->ModelTp->allData(),
            'isi' => 'admin/mapel/v_detail'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function add($id_kelas)
    {
        if ($this->validate([
            'kode_mapel' => [
                'label' => 'Kode Mata Pelajaran',
                'rules' => 'required|is_unique[tbl-mapel.kode_mapel]',
                'errors' => [
                    'required' => '{field} Wajib diisi!',
                    'is_unique' => 'Kode {field} sudah ada, Silahkan Input Kode lain!'
                ]
            ],
            'nama_mapel' => [
                'label' => 'Nama Mata Pelajaran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!',
                ]
            ],
            'kkm' => [
                'label' => 'Nilai KKM',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!',
                ]
            ],
            'smt' => [
                'label' => 'Semester',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!',
                ]
            ],
            'nama_mapel' => [
                'label' => 'Nama Mata Pelajaran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!',
                ]
            ],
            'nama_guru' => [
                'label' => 'Nama Mata Pelajaran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!',
                ]
            ],
        ])) {
            //jika valid
            $data = [
                'kode_mapel' => $this->request->getPost('kode_mapel'),
                'nama_mapel' => $this->request->getPost('nama_mapel'),
                'kkm' => $this->request->getPost('kkm'),
                'smt' => $this->request->getPost('smt'),
                'nama_guru' => $this->request->getPost('nama_guru'),
                'id_kelas' => $id_kelas,
            ];
            $this->ModelMapel->add($data);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
            return redirect()->to(base_url('mapel/detail/' . $id_kelas));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('mapel/detail/' . $id_kelas));
        }
    }

    public function edit($id_mapel)
    {
        $data = [
            'title' => 'Edit Mata Pelajaran',
            'kelas' => $this->ModelKelas->allData(),
            'mapel' => $this->ModelMapel->detail_data($id_mapel),
            'isi' => 'admin/mapel/v_edit'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function update($id_mapel)
    {
        if ($this->validate([
            'id_kelas' => [
                'label' => 'Kelas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ]
            ],

        ])) {
            //jika valid
            $data = [
                'id_mapel' => $id_mapel,
                'id_kelas' => $this->request->getPost('id_kelas'),
                'nama_mapel' => $this->request->getPost('nama_mapel'),
            ];
            $this->ModelMapel->edit($data);
            session()->setFlashdata('pesan', 'Data berhasil dirubah');
            return redirect()->to(base_url('mapel'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('mapel/edit/' . $id_mapel));
        }
    }

    public function delete($id_kelas, $id_mapel)
    {
        $data = [
            'id_mapel' => $id_mapel,
        ];
        $this->ModelMapel->delete_data($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(base_url('mapel/detail/' . $id_kelas));
    }
}
