<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelGuru extends Model
{
    public function allData()
    {
        return $this->db->table('tbl-guru')
            ->orderBy('kode_guru', 'ASC')
            ->get()->getResultArray();
    }

    public function detail_Data($id_guru)
    {
        return $this->db->table('tbl-guru')
            ->where('id_guru', $id_guru)
            ->get()->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('tbl-guru')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl-guru')
            ->where('id_guru', $data['id_guru'])->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tbl-guru')
            ->where('id_guru', $data['id_guru'])->delete($data);
    }
}
