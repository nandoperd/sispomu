<?php

namespace App\Controllers;

use App\Models\ModelTp;
use App\Models\ModelKss;

class Kss extends BaseController
{
    public function __construct()
    {
        // $this->ModelAdmin = new ModelAdmin();
        $this->ModelTp = new ModelTp();
        $this->ModelKss = new ModelKss();
    }

    public function index()
    {
        $siswa = $this->ModelKss->DataSiswa();
        $tp = $this->ModelTp->tp_aktif();
        $data = [
            'title' => 'Kartu Studi Siswa (KSS)',
            'tp_aktif' => $this->ModelTp->tp_aktif(),
            'halsiswa' => $this->ModelKss->DataSiswa(),
            'matapelajaran' => $this->ModelKss->MataPelajaran($tp['id_tp']),
            'data_mapel' => $this->ModelKss->DataKss($siswa['id_siswa'], $tp['id_tp']),
            'isi' => 'halsiswa/kss/v_kss'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function tambah_mapel($id_jadwal)
    {
        $siswa = $this->ModelKss->DataSiswa();
        $tp = $this->ModelTp->tp_aktif();
        $data = [
            'id_jadwal' => $id_jadwal,
            'id_tp' => $tp['id_tp'],
            'id_siswa' => $siswa['id_siswa']
        ];
        $this->ModelKss->TambahMapel($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to(base_url('kss'));
    }

    public function delete($id_kss)
    {
        $data = [
            'id_kss' => $id_kss,
        ];

        $this->ModelKss->delete_data($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(base_url('kss'));
    }

    public function print()
    {
        $siswa = $this->ModelKss->DataSiswa();
        $tp = $this->ModelTp->tp_aktif();
        $data = [
            'title' => 'Print KSS',
            'title' => 'Kartu Studi Siswa (KSS)',
            'tp_aktif' => $this->ModelTp->tp_aktif(),
            'halsiswa' => $this->ModelKss->DataSiswa(),
            // 'matapelajaran' => $this->ModelKss->MataPelajaran($tp['id_tp']),
            'data_mapel' => $this->ModelKss->DataKss($siswa['id_siswa'], $tp['id_tp']),
        ];
        return view('halsiswa/kss/v_print_kss', $data);
    }
}
