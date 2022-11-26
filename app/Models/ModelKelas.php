<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKelas  extends Model
{
    public function allData()
    {
        return $this->db->table('tbl-kelas')
            ->orderBy('kelas', 'ASC')
            ->get()->getResultArray();
    }

    public function detail_Data($id_kelas)
    {
        return $this->db->table('tbl-kelas')
            ->where('id_kelas', $id_kelas)
            ->get()->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('tbl-kelas')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl-kelas')
            ->where('id_kelas', $data['id_kelas'])->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tbl-kelas')
            ->where('id_kelas', $data['id_kelas'])->delete($data);
    }
}
