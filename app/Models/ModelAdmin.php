<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAdmin extends Model
{

    public function jml_kelas()
    {
        return $this->db->table('tbl-kelas')
            ->countAll();
    }

    public function jml_rombel()
    {
        return $this->db->table('tbl-rombel')
            ->countAll();
    }

    public function jml_guru()
    {
        return $this->db->table('tbl-guru')
            ->countAll();
    }

    public function jml_siswa()
    {
        return $this->db->table('tbl-siswa')
            ->countAll();
    }

    public function jml_mapel()
    {
        return $this->db->table('tbl-mapel')
            ->countAll();
    }

    public function jml_user()
    {
        return $this->db->table('tbl-user')
            ->countAll();
    }
}
