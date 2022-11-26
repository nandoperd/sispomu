<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMapel  extends Model
{
    public function allData()
    {
        return $this->db->table('tbl-mapel')
            // ->join('tbl-kelas', 'tbl-kelas.id_kelas = tbl-mapel.id_kelas', 'left')
            ->orderBy('id_mapel', 'DESC')
            ->get()->getResultArray();
    }

    public function allDataMapel($id_kelas)
    {
        return $this->db->table('tbl-mapel')
            ->where('id_kelas', $id_kelas)
            ->orderBy('smt', 'ASC')
            ->get()->getResultArray();
    }

    public function detail_Data($id_mapel)
    {
        return $this->db->table('tbl-mapel')
            ->join('tbl-kelas', 'tbl-kelas.id_kelas = tbl-mapel.id_kelas', 'left')
            ->where('id_mapel', $id_mapel)
            ->get()->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('tbl-mapel')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl-mapel')
            ->where('id_mapel', $data['id_mapel'])
            ->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tbl-mapel')
            ->where('id_mapel', $data['id_mapel'])->delete($data);
    }
}
