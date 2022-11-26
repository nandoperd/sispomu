<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKss extends Model
{
    public function DataSiswa()
    {
        return $this->db->table('tbl-siswa')
            ->join('tbl-kelas', 'tbl-kelas.id_kelas = tbl-siswa.id_kelas', 'left')
            ->join('tbl-rombel', 'tbl-rombel.id_rombel = tbl-siswa.id_rombel', 'left')
            ->join('tbl-guru', 'tbl-guru.id_guru = tbl-rombel.id_guru', 'left')
            ->where('nis', session()->get('username'))
            ->get()->getRowArray();
    }

    public function MataPelajaran($id_tp)
    {
        return $this->db->table('tbl-jadwal')
            ->join('tbl-mapel', 'tbl-mapel.id_mapel = tbl-jadwal.id_mapel', 'left')
            ->join('tbl-rombel', 'tbl-rombel.id_rombel = tbl-jadwal.id_rombel', 'left')
            ->where('id_tp', $id_tp)
            ->get()->getResultArray();
    }

    public function TambahMapel($data)
    {
        $this->db->table('tbl-kss')->insert($data);
    }

    public function DataKss($id_siswa, $id_tp)
    {
        return $this->db->table('tbl-kss')
            ->join('tbl-jadwal', 'tbl-jadwal.id_jadwal = tbl-kss.id_jadwal', 'left')
            ->join('tbl-mapel', 'tbl-mapel.id_mapel = tbl-jadwal.id_mapel', 'left')
            ->join('tbl-rombel', 'tbl-rombel.id_rombel = tbl-jadwal.id_rombel', 'left')
            ->where('id_siswa', $id_siswa)
            ->where('tbl-kss.id_tp', $id_tp)
            ->get()->getResultArray();
    }

    // public function DetailSiswa()
    // {
    //     return $this->db->table('tbl-siswa')
    //         ->where('nis', session()->get('username'))
    //         ->get()->getRowArray();
    // }

    public function delete_data($data)
    {
        $this->db->table('tbl-kss')
            ->where('id_kss', $data['id_kss'])->delete($data);
    }
}
