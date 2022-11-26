<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSiswa extends Model
{
    public function allData()
    {
        return $this->db->table('tbl-siswa')
            ->join('tbl-kelas', 'tbl-kelas.id_kelas = tbl-siswa.id_kelas', 'left')
            ->orderBy('id_siswa', 'DESC')
            ->get()->getResultArray();
    }

    public function detail_Data($id_siswa)
    {
        return $this->db->table('tbl-siswa')
            ->join('tbl-kelas', 'tbl-kelas.id_kelas = tbl-siswa.id_kelas', 'left')
            ->where('id_siswa', $id_siswa)
            ->get()->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('tbl-siswa')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl-siswa')
            ->where('id_siswa', $data['id_siswa'])->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tbl-siswa')
            ->where('id_siswa', $data['id_siswa'])->delete($data);
    }
}
