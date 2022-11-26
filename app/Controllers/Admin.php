<?php

namespace App\Controllers;

use App\Models\ModelAdmin;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->ModelAdmin = new ModelAdmin();
    }

    public function index()
    {
        $data = [
            'title' => 'Admin',
            'jml_kelas' => $this->ModelAdmin->jml_kelas(),
            'jml_rombel' => $this->ModelAdmin->jml_rombel(),
            'jml_guru' => $this->ModelAdmin->jml_guru(),
            'jml_siswa' => $this->ModelAdmin->jml_siswa(),
            'jml_mapel' => $this->ModelAdmin->jml_mapel(),
            'jml_user' => $this->ModelAdmin->jml_user(),
            'isi' => 'v_admin'
        ];
        return view('layout/v_wrapper', $data);
    }
}
