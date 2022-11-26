<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTp extends Model
{
    public function allData()
    {
        return $this->db->table('tbl-tp')
            // ->join('tbl-kelas', 'tbl-kelas.id_kelas = tbl-tp.id_kelas', 'left')
            ->orderBy('id_tp', 'DESC')
            ->get()->getResultArray();
    }

    public function detail_Data($id_tp)
    {
        return $this->db->table('tbl-tp')
            ->where('id_tp', $id_tp)
            ->get()->getRowArray();
    }

    // public function detail_Data($id_tp)
    // {
    //     return $this->db->table('tbl-tp')
    //         // ->join('tbl-kelas', 'tbl-kelas.id_kelas = tbl-tp.id_kelas', 'left')
    //         ->where('id_tp', $id_tp)
    //         ->get()->getRowArray();
    // }

    public function add($data)
    {
        $this->db->table('tbl-tp')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl-tp')
            ->where('id_tp', $data['id_tp'])
            ->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tbl-tp')
            ->where('id_tp', $data['id_tp'])->delete($data);
    }

    public function reset_status_tp()
    {
        $this->db->table('tbl-tp')->update(['status' => 0]);
    }

    public function tp_aktif()
    {
        return $this->db->table('tbl-tp')
            ->where('status', 1)
            ->get()
            ->getRowArray();
    }
}
