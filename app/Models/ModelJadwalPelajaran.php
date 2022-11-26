<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJadwalPelajaran  extends Model
{
    public function allData($id_kelas)
    {
        return $this->db->table('tbl-jadwal')
            ->join('tbl-mapel', 'tbl-mapel.id_mapel = tbl-jadwal.id_mapel', 'left')
            ->join('tbl-kelas', 'tbl-kelas.id_kelas = tbl-jadwal.id_kelas', 'left')
            ->join('tbl-guru', 'tbl-guru.id_guru = tbl-jadwal.id_guru', 'left')
            ->join('tbl-rombel', 'tbl-rombel.id_rombel = tbl-jadwal.id_rombel', 'left')
            ->where('tbl-jadwal.id_kelas', $id_kelas)
            ->orderBy('tbl-mapel.smt', 'ASC')
            ->get()->getResultArray();
    }

    public function mapel($id_kelas)
    {
        return $this->db->table('tbl-mapel')
            ->where('id_kelas', $id_kelas)
            ->get()->getResultArray();
    }

    // public function guru($id_kelas)
    // {
    //     return $this->db->table('tbl-mapel')
    //         ->where('id_kelas', $id_kelas)
    //         ->orderBy('nama_guru', 'ASC')
    //         ->get()->getResultArray();
    // }

    public function rombel($id_kelas)
    {
        return $this->db->table('tbl-rombel')
            ->where('id_kelas', $id_kelas)
            ->orderBy('nama_rombel', 'ASC')
            ->get()->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('tbl-jadwal')->insert($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tbl-jadwal')
            ->where('id_jadwal', $data['id_jadwal'])->delete($data);
    }
}
