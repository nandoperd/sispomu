<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth  extends Model
{
        public function login_user($username, $password)
        {
                return $this->db->table('tbl-user')->where([
                        'username' => $username,
                        'password' => $password
                ])->get()->getRowArray();
        }

        public function login_siswa($username, $password)
        {
                return $this->db->table('tbl-siswa')->where([
                        'nis' => $username,
                        'password' => $password
                ])->get()->getRowArray();
        }

        public function login_guru($username, $password)
        {
                return $this->db->table('tbl-guru')->where([
                        'kode_guru' => $username,
                        'password' => $password
                ])->get()->getRowArray();
        }

        public function login_kepsek($username, $password)
        {
                return $this->db->table('tbl-user')->where([
                        'username' => $username,
                        'password' => $password
                ])->get()->getRowArray();
        }
}
