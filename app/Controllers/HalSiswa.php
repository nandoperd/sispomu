<?php

namespace App\Controllers;

// use App\Models\ModelAdmin;
use App\Models\ModelTp;
use App\Models\ModelKss;

class HalSiswa extends BaseController
{
    public function __construct()
    {
        // $this->ModelAdmin = new ModelAdmin();
        $this->ModelTp = new ModelTp();
        $this->ModelKss = new ModelKss();
    }

    public function index()
    {
        $data = [
            'title' => 'Siswa',
            'halsiswa' => $this->ModelKss->DataSiswa(),
            'isi' => 'v_dashboard_siswa'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function absensi()
    {
        $siswa = $this->ModelKss->DataSiswa();
        $tp = $this->ModelTp->tp_aktif();
        $data = [
            'title' => 'Absensi',
            'isi' => 'halsiswa/v_absensi',
            'tp_aktif' => $this->ModelTp->tp_aktif(),
            'halsiswa' => $this->ModelKss->DataSiswa(),
            // 'matapelajaran' => $this->ModelKss->MataPelajaran($tp['id_tp']),
            'data_mapel' => $this->ModelKss->DataKss($siswa['id_siswa'], $tp['id_tp']),
        ];
        return view('layout/v_wrapper', $data);
    }

    public function rapor_siswa()
    {
        $siswa = $this->ModelKss->DataSiswa();
        $tp = $this->ModelTp->tp_aktif();
        $data = [
            'title' => 'Nilai Siswa',
            'tp_aktif' => $this->ModelTp->tp_aktif(),
            'halsiswa' => $this->ModelKss->DataSiswa(),
            'matapelajaran' => $this->ModelKss->MataPelajaran($tp['id_tp']),
            'data_mapel' => $this->ModelKss->DataKss($siswa['id_siswa'], $tp['id_tp']),
            'isi' => 'halsiswa/v_rapor_siswa'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function print_rapor()
    {
        $siswa = $this->ModelKss->DataSiswa();
        $tp = $this->ModelTp->tp_aktif();
        $data = [
            'title' => 'Nilai Siswa',
            'tp_aktif' => $this->ModelTp->tp_aktif(),
            'halsiswa' => $this->ModelKss->DataSiswa(),
            'matapelajaran' => $this->ModelKss->MataPelajaran($tp['id_tp']),
            'data_mapel' => $this->ModelKss->DataKss($siswa['id_siswa'], $tp['id_tp']),
        ];
        return view('halsiswa/v_print_rapor', $data);
    }
}
