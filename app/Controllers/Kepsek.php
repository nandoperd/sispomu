<?php

namespace App\Controllers;

use App\Models\ModelKepsek;
use App\Models\ModelAdmin;

class Kepsek extends BaseController
{
    public function __construct()
    {
        $this->ModelKepsek = new ModelKepsek();
        $this->ModelAdmin = new ModelAdmin();
    }

    public function index()
    {
        $data = [
            'title' => 'Kepala Sekolah',
            'jml_kelas' => $this->ModelAdmin->jml_kelas(),
            'jml_rombel' => $this->ModelAdmin->jml_rombel(),
            'jml_guru' => $this->ModelAdmin->jml_guru(),
            'jml_siswa' => $this->ModelAdmin->jml_siswa(),
            'jml_mapel' => $this->ModelAdmin->jml_mapel(),
            'jml_user' => $this->ModelAdmin->jml_user(),
            'isi' => 'v_kepsek'
        ];
        return view('layout/v_wrapper', $data);
    }
}
