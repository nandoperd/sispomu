<?php

namespace App\Controllers;

use App\Models\ModelTp;
use App\Models\ModelKelas;
use App\Models\ModelJadwalPelajaran;
use App\Models\ModelGuru;

class JadwalPelajaran extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelTp = new ModelTp();
        $this->ModelKelas = new ModelKelas();
        $this->ModelJadwalPelajaran = new ModelJadwalPelajaran();
        $this->ModelGuru = new ModelGuru();
    }


    public function index()
    {
        $data = [
            'title' => 'Jadwal Pelajaran',
            'tp_aktif' => $this->ModelTp->tp_aktif(),
            'kelas' => $this->ModelKelas->allData(),
            'isi' => 'admin/jadwalpelajaran/v_index'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function detail_jadwal($id_kelas)
    {
        $data = [
            'title' => 'Jadwal Pelajaran',
            'tp_aktif' => $this->ModelTp->tp_aktif(),
            'kelas' => $this->ModelKelas->detail_Data($id_kelas),
            'jadwal' => $this->ModelJadwalPelajaran->allData($id_kelas),
            'mapel' => $this->ModelJadwalPelajaran->mapel($id_kelas),
            'guru' => $this->ModelGuru->allData(),
            // 'guru' => $this->ModelJadwalPelajaran->guru($id_kelas),
            'rombel' => $this->ModelJadwalPelajaran->rombel($id_kelas),
            'isi' => 'admin/jadwalpelajaran/v_detail'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function add($id_kelas)
    {
        if ($this->validate([
            'id_mapel' => [
                'label' => 'Mata Pelajaran',
                'rules' => 'required|is_unique[tbl-jadwal.id_mapel]',
                'errors' => [
                    'required' => '{field} Wajib dipilih!',
                    'is_unique' => 'Jadwal mata pelajaran sudah ada, Silahkan Input jadwal mata pelajaran lain!'
                ]
            ],
            'id_guru' => [
                'label' => 'Guru',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib dipilih!',
                ]
            ],
            'id_rombel' => [
                'label' => 'Rombongan Belajar',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib dipilih!',
                ]
            ],
            'hari' => [
                'label' => 'Hari',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib dipilih!',
                ]
            ],
            'waktu' => [
                'label' => 'Waktu',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib dipilih!',
                ]
            ],
        ])) {
            //jika valid
            $tp = $this->ModelTp->tp_aktif();
            $data = [
                // 'nama_rombel' => $this->request->getPost('nama_rombel'),
                'id_kelas' => $id_kelas,
                'id_tp' => $tp['id_tp'],
                'id_guru' => $this->request->getPost('id_guru'),
                'id_rombel' => $this->request->getPost('id_rombel'),
                'id_mapel' => $this->request->getPost('id_mapel'),
                'hari' => $this->request->getPost('hari'),
                'waktu' => $this->request->getPost('waktu'),
            ];
            $this->ModelJadwalPelajaran->add($data);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
            return redirect()->to(base_url('jadwalpelajaran/detail_jadwal/' . $id_kelas));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('jadwalpelajaran/detail_jadwal/' . $id_kelas));
        }
    }

    public function delete($id_jadwal, $id_kelas)
    {
        $data = [
            'id_jadwal' => $id_jadwal,
        ];
        $this->ModelJadwalPelajaran->delete_data($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(base_url('jadwalpelajaran/detail_jadwal/' . $id_kelas));
    }
}
