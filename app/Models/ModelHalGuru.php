<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelHalGuru  extends Model
{
    public function JadwalGuru($id_guru, $id_tp)
    {
        return $this->db->table('tbl-jadwal')
            ->join('tbl-mapel', 'tbl-mapel.id_mapel = tbl-jadwal.id_mapel', 'left')
            ->join('tbl-kelas', 'tbl-kelas.id_kelas = tbl-jadwal.id_kelas', 'left')
            ->join('tbl-guru', 'tbl-guru.id_guru = tbl-jadwal.id_guru', 'left')
            ->join('tbl-rombel', 'tbl-rombel.id_rombel = tbl-jadwal.id_rombel', 'left')
            ->where('tbl-jadwal.id_guru', $id_guru)
            ->where('tbl-jadwal.id_tp', $id_tp)
            ->get()->getResultArray();
    }

    public function DataGuru()
    {
        return $this->db->table('tbl-guru')
            ->where('kode_guru', session()->get('username'))
            ->get()->getRowArray();
    }

    public function DetailJadwal($id_jadwal)
    {
        return $this->db->table('tbl-jadwal')
            ->join('tbl-kelas', 'tbl-kelas.id_kelas = tbl-jadwal.id_kelas', 'left')
            ->join('tbl-mapel', 'tbl-mapel.id_mapel = tbl-jadwal.id_mapel', 'left')
            ->join('tbl-guru', 'tbl-guru.id_guru = tbl-jadwal.id_guru', 'left')
            ->join('tbl-rombel', 'tbl-rombel.id_rombel = tbl-jadwal.id_rombel', 'left')
            ->where('tbl-jadwal.id_jadwal', $id_jadwal)
            ->get()->getRowArray();
    }

    public function Siswa($id_jadwal)
    {
        return $this->db->table('tbl-kss')
            ->join('tbl-siswa', 'tbl-siswa.id_siswa = tbl-kss.id_siswa', 'left')
            ->where('id_jadwal', $id_jadwal)
            ->get()->getResultArray();
    }

    public function SimpanAbsen($data)
    {
        $this->db->table('tbl-kss')
            ->where('id_kss', $data['id_kss'])
            ->update($data);
    }

    public function SimpanNilai($data)
    {
        $this->db->table('tbl-kss')
            ->where('id_kss', $data['id_kss'])
            ->update($data);
    }
}
