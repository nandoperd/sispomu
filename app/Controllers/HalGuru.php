<?php

namespace App\Controllers;

use App\Models\ModelHalGuru;
use App\Models\ModelTp;

class HalGuru extends BaseController
{
    public function __construct()
    {
        $this->ModelHalGuru = new ModelHalGuru();
        $this->ModelTp = new ModelTp();
        helper('form');
    }

    public function index()
    {
        $tp = $this->ModelTp->tp_aktif();
        $guru = $this->ModelHalGuru->DataGuru();
        $data = [
            'title' => 'Guru',
            'guru' => $this->ModelHalGuru->DataGuru(),
            'jadwal' => $this->ModelHalGuru->JadwalGuru($guru['id_guru'], $tp['id_tp']),
            'isi' => 'v_dashboard_guru'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function jadwal()
    {
        $tp = $this->ModelTp->tp_aktif();
        $guru = $this->ModelHalGuru->DataGuru();
        $data = [
            'title' => 'Jadwal Mengajar',
            'tp' => $tp,
            'jadwal' => $this->ModelHalGuru->JadwalGuru($guru['id_guru'], $tp['id_tp']),
            'isi' => 'halguru/v_jadwal'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function absen_siswa()
    {
        $tp = $this->ModelTp->tp_aktif();
        $guru = $this->ModelHalGuru->DataGuru();
        $data = [
            'title' => 'Absen Kelas',
            'tp' => $tp,
            'absen' => $this->ModelHalGuru->JadwalGuru($guru['id_guru'], $tp['id_tp']),
            'isi' => 'halguru/absen_kelas/v_absen_kelas'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function absensi($id_jadwal)
    {
        $tp = $this->ModelTp->tp_aktif();
        $data = [
            'title' => 'Absensi',
            'tp' => $tp,
            'jadwal' => $this->ModelHalGuru->DetailJadwal($id_jadwal),
            'siswa' => $this->ModelHalGuru->Siswa($id_jadwal),
            'isi' => 'halguru/absen_kelas/v_absensi'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function SimpanAbsen($id_jadwal)
    {
        $siswa = $this->ModelHalGuru->Siswa($id_jadwal);
        foreach ($siswa as $key => $value) {
            $data = [
                'id_kss' => $this->request->getPost($value['id_kss'] . 'id_kss'),
                'h1' => $this->request->getPost($value['id_kss'] . 'h1'),
                'h2' => $this->request->getPost($value['id_kss'] . 'h2'),
                'h3' => $this->request->getPost($value['id_kss'] . 'h3'),
                'h4' => $this->request->getPost($value['id_kss'] . 'h4'),
                'h5' => $this->request->getPost($value['id_kss'] . 'h5'),
                'h6' => $this->request->getPost($value['id_kss'] . 'h6'),
                'h7' => $this->request->getPost($value['id_kss'] . 'h7'),
                'h8' => $this->request->getPost($value['id_kss'] . 'h8'),
                'h9' => $this->request->getPost($value['id_kss'] . 'h9'),
                'h10' => $this->request->getPost($value['id_kss'] . 'h10'),
                'h11' => $this->request->getPost($value['id_kss'] . 'h11'),
                'h12' => $this->request->getPost($value['id_kss'] . 'h12'),
                'h13' => $this->request->getPost($value['id_kss'] . 'h13'),
                'h14' => $this->request->getPost($value['id_kss'] . 'h14'),
                'h15' => $this->request->getPost($value['id_kss'] . 'h15'),
                'h16' => $this->request->getPost($value['id_kss'] . 'h16'),
                'h17' => $this->request->getPost($value['id_kss'] . 'h17'),
                'h18' => $this->request->getPost($value['id_kss'] . 'h18'),
                'h19' => $this->request->getPost($value['id_kss'] . 'h19'),
                'h20' => $this->request->getPost($value['id_kss'] . 'h20'),
                'h21' => $this->request->getPost($value['id_kss'] . 'h21'),
                'h22' => $this->request->getPost($value['id_kss'] . 'h22'),
                'h23' => $this->request->getPost($value['id_kss'] . 'h23'),
                'h24' => $this->request->getPost($value['id_kss'] . 'h24'),
                'h25' => $this->request->getPost($value['id_kss'] . 'h25'),
                'h26' => $this->request->getPost($value['id_kss'] . 'h26'),
                'h27' => $this->request->getPost($value['id_kss'] . 'h27'),
                'h28' => $this->request->getPost($value['id_kss'] . 'h28'),
                'h29' => $this->request->getPost($value['id_kss'] . 'h29'),
                'h30' => $this->request->getPost($value['id_kss'] . 'h30'),
                'h31' => $this->request->getPost($value['id_kss'] . 'h31'),
                // 'nilai_absen' => $this->request->getPost($value['id_kss'] . 'nilai_absen'),
            ];
            $this->ModelHalGuru->SimpanAbsen($data);
        }
        session()->setFlashdata('pesan', 'Data Absensi berhasil diupdate!');
        return redirect()->to(base_url('halguru/absensi/' . $id_jadwal));
    }

    public function print_absensi($id_jadwal)
    {
        $tp = $this->ModelTp->tp_aktif();
        $data = [
            'title' => 'Print Absensi',
            'tp' => $tp,
            'jadwal' => $this->ModelHalGuru->DetailJadwal($id_jadwal),
            'siswa' => $this->ModelHalGuru->Siswa($id_jadwal),
        ];
        return view('halguru/absen_kelas/v_print_absensi', $data);
    }

    public function materi_siswa()
    {
        $tp = $this->ModelTp->tp_aktif();
        $guru = $this->ModelHalGuru->DataGuru();
        $data = [
            'title' => 'Materi Pelajaran',
            'tp' => $tp,
            'absen' => $this->ModelHalGuru->JadwalGuru($guru['id_guru'], $tp['id_tp']),
            'isi' => 'halguru/materi_kelas/v_materi_kelas'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function nilai_siswa()
    {
        $tp = $this->ModelTp->tp_aktif();
        $guru = $this->ModelHalGuru->DataGuru();
        $data = [
            'title' => 'Nilai Kelas',
            'tp' => $tp,
            'absen' => $this->ModelHalGuru->JadwalGuru($guru['id_guru'], $tp['id_tp']),
            'isi' => 'halguru/nilai_kelas/v_nilai_siswa'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function data_nilai($id_jadwal)
    {
        $tp = $this->ModelTp->tp_aktif();
        $data = [
            'title' => 'Nilai',
            'tp' => $tp,
            'jadwal' => $this->ModelHalGuru->DetailJadwal($id_jadwal),
            'siswa' => $this->ModelHalGuru->Siswa($id_jadwal),
            'isi' => 'halguru/nilai_kelas/v_data_nilai'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function SimpanNilai($id_jadwal)
    {
        $siswa = $this->ModelHalGuru->Siswa($id_jadwal);
        foreach ($siswa as $key => $value) {
            $absen = $this->request->getPost($value['id_kss'] . 'absen');
            $tugas1 = $this->request->getPost($value['id_kss'] . 'nilai_tugas1');
            $tugas2 = $this->request->getPost($value['id_kss'] . 'nilai_tugas2');
            $tugas3 = $this->request->getPost($value['id_kss'] . 'nilai_tugas3');
            $pts = $this->request->getPost($value['id_kss'] . 'nilai_pts');
            $pas = $this->request->getPost($value['id_kss'] . 'nilai_pas');
            $na = ($absen * 15 / 100) + ($tugas1 * 5 / 100) + ($tugas2 * 5 / 100) + ($tugas3 * 5 / 100) + ($pts * 30 / 100) + ($pas * 40 / 100);
            if ($na >= 88) {
                $nh = 'A';
            } elseif ($na < 88 && $na >= 75) {
                $nh = 'B';
            } elseif ($na < 75 && $na >= 65) {
                $nh = 'C';
            } elseif ($na < 65 && $na >= 50) {
                $nh = 'D';
            } else {
                $nh = 'E';
            }
            $data = [
                'id_kss' => $this->request->getPost($value['id_kss'] . 'id_kss'),
                'nilai_tugas1' => $this->request->getPost($value['id_kss'] . 'nilai_tugas1'),
                'nilai_tugas2' => $this->request->getPost($value['id_kss'] . 'nilai_tugas2'),
                'nilai_tugas3' => $this->request->getPost($value['id_kss'] . 'nilai_tugas3'),
                'nilai_pts' => $this->request->getPost($value['id_kss'] . 'nilai_pts'),
                'nilai_pas' => $this->request->getPost($value['id_kss'] . 'nilai_pas'),
                'nilai_akhir' => number_format($na, 0),
                'nilai_huruf' => $nh,
                // 'nilai_absen' => $this->request->getPost($value['id_kss'] . 'nilai_absen'),
            ];
            $this->ModelHalGuru->SimpanNilai($data);
        }
        session()->setFlashdata('pesan', 'Data Nilai berhasil diupdate!');
        return redirect()->to(base_url('halguru/data_nilai/' . $id_jadwal));
    }

    public function print_nilai($id_jadwal)
    {
        $tp = $this->ModelTp->tp_aktif();
        $data = [
            'title' => 'Rekap Nilai Siswa',
            'tp' => $tp,
            'jadwal' => $this->ModelHalGuru->DetailJadwal($id_jadwal),
            'siswa' => $this->ModelHalGuru->Siswa($id_jadwal),
        ];
        return view('halguru/nilai_kelas/v_print_nilai', $data);
    }
}
