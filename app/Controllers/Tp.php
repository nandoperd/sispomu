<?php

namespace App\Controllers;

use App\Models\ModelTp;

class Tp extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelTp = new ModelTp();
    }

    public function index()
    {
        $data = [
            'title' => 'Tahun Pelajaran',
            'tp' => $this->ModelTp->allData(),
            'isi' => 'admin/v_tp'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = [
            'tp' => $this->request->getPost('tp'),
            'semester' => $this->request->getPost('semester'),
        ];
        $this->ModelTp->add($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to(base_url('tp'));
    }

    public function edit($id_tp)
    {
        $data = [
            'id_tp' => $id_tp,
            'tp' => $this->request->getPost('tp'),
            'semester' => $this->request->getPost('semester'),
        ];
        $this->ModelTp->edit($data);
        session()->setFlashdata('pesan', 'Data berhasil diupdate');
        return redirect()->to(base_url('tp'));
    }

    public function delete($id_tp)
    {
        $data = [
            'id_tp' => $id_tp,
        ];
        $this->ModelTp->delete_data($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(base_url('tp'));
    }

    //setting tahun pelajaran
    public function setting()
    {
        $data = [
            'title' => 'Tahun Pelajaran',
            'tp' => $this->ModelTp->allData(),
            'isi' => 'admin/v_set_tp'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function set_status_tp($id_tp)
    {
        //reset status tp
        $this->ModelTp->reset_status_tp();

        //setting status tp
        $data = [
            'id_tp' => $id_tp,
            'status' => 1
        ];
        $this->ModelTp->edit($data);
        session()->setFlashdata('pesan', 'Status Tahun Pelajaran berhasil diaktifkan!');
        return redirect()->to(base_url('tp/setting'));
    }
}
