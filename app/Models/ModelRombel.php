<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelRombel  extends Model
{
    public function allData()
    {
        return $this->db->table('tbl-rombel')
            ->join('tbl-kelas', 'tbl-kelas.id_kelas = tbl-rombel.id_kelas', 'left')
            ->join('tbl-guru', 'tbl-guru.id_guru = tbl-rombel.id_guru', 'left')
            ->orderBy('tbl-rombel.nama_rombel', 'ASC')
            ->get()->getResultArray();
    }

    public function detail($id_rombel)
    {
        return $this->db->table('tbl-rombel')
            ->join('tbl-kelas', 'tbl-kelas.id_kelas = tbl-rombel.id_kelas', 'left')
            ->join('tbl-guru', 'tbl-guru.id_guru = tbl-rombel.id_guru', 'left')
            ->where('id_rombel', $id_rombel)
            ->get()->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('tbl-rombel')->insert($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tbl-rombel')
            ->where('id_rombel', $data['id_rombel'])->delete($data);
    }

    //menampilkan siswa berdasarkan rombel
    public function siswa($id_rombel)
    {
        return $this->db->table('tbl-siswa')
            ->join('tbl-kelas', 'tbl-kelas.id_kelas = tbl-siswa.id_kelas', 'left')
            ->where('id_rombel', $id_rombel)
            ->orderBy('id_siswa', 'DESC')
            ->get()->getResultArray();
    }

    //menampilkan siswa belum punya kelas
    public function siswa_unkelas()
    {
        return $this->db->table('tbl-siswa')
            ->join('tbl-kelas', 'tbl-kelas.id_kelas = tbl-siswa.id_kelas', 'left')
            ->where('id_rombel', null)
            // ->where('id_rombel = 0')
            ->orderBy('id_siswa', 'DESC')
            ->get()->getResultArray();
    }

    public function jml_siswa($id_rombel)
    {
        return $this->db->table('tbl-siswa')
            ->where('id_rombel', $id_rombel)
            ->countAllResults();
    }

    public function update_siswa($data)
    {
        $this->db->table('tbl-siswa')
            ->where('id_siswa', $data['id_siswa'])
            ->update($data);
    }
}
