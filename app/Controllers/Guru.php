<?php

namespace App\Controllers;

use App\Models\ModelGuru;

class Guru extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelGuru = new ModelGuru();
    }

    public function index()
    {
        $data = [
            'title' => 'Guru',
            'guru' => $this->ModelGuru->allData(),
            'isi' => 'admin/guru/v_index'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Tambah Guru',
            // 'guru' => $this->ModelGuru->allData(),
            'isi' => 'admin/guru/v_add'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function insert()
    { {
            if ($this->validate([
                'kode_guru' => [
                    'label' => 'Kode Guru',
                    'rules' => 'required|is_unique[tbl-guru.kode_guru]',
                    'errors' => [
                        'required' => '{field} Wajib diisi!',
                        'is_unique' => 'Kode {field} sudah ada, Silahkan Kode lain!'
                    ]
                ],
                'nama_guru' => [
                    'label' => 'Nama Guru',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib diisi!',
                    ]
                ],
                'password' => [
                    'label' => 'Password',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib diisi!',
                    ]
                ],
                'foto_guru' => [
                    'label' => 'Foto Guru',
                    'rules' => 'uploaded[foto_guru]|max_size[foto_guru,1024]|mime_in[foto_guru,image/png,image/jpg]',
                    'errors' => [
                        'uploaded' => '{field} Wajib diisi!',
                        'max_size' => '{field} Maximal 1 MB',
                        'mime_in' => '{field} hanya dalam bentuk format JPG/PNG!',
                    ]
                ],
            ])) {
                //jika valid
                $foto = $this->request->getFile('foto_guru');
                $nama_file = $foto->getRandomName();
                $data = array(
                    'kode_guru' => $this->request->getPost('kode_guru'),
                    'nama_guru' => $this->request->getPost('nama_guru'),
                    'password' => $this->request->getPost('password'),
                    'foto_guru' => $nama_file,
                );
                $foto->move('foto_guru', $nama_file);
                $this->ModelGuru->add($data);
                session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
                return redirect()->to(base_url('guru'));
            } else {
                //jika tidak valid
                session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
                return redirect()->to(base_url('guru/add'));
            }
        }
    }

    public function edit($id_guru)
    {
        $data = [
            'title' => 'Edit Data Guru',
            'guru' => $this->ModelGuru->detail_Data($id_guru),
            'isi' => 'admin/guru/v_edit'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function update($id_guru)
    {
        if ($this->validate([
            'kode_guru' => [
                'label' => 'Kode Guru',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!',
                ]
            ],
            'nama_guru' => [
                'label' => 'Nama Guru',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!',
                ]
            ],
            'foto_guru' => [
                'label' => 'Foto Guru',
                'rules' => 'max_size[foto_guru,1024]|mime_in[foto_guru,image/png,image/jpg]',
                'errors' => [
                    'max_size' => '{field} Maximal 1 MB',
                    'mime_in' => '{field} hanya dalam bentuk format JPG/PNG!',
                ]
            ],
        ])) {
            //jika valid
            $foto = $this->request->getFile('foto_guru');

            if ($foto->getError() == 4) {
                $nama_file = $foto->getRandomName();
                $data = array(
                    'id_guru' => $id_guru,
                    'kode_guru' => $this->request->getPost('kode_guru'),
                    'nama_guru' => $this->request->getPost('nama_guru'),
                    'password' => $this->request->getPost('password'),
                );
                $this->ModelGuru->edit($data);
            } else {
                //hapus foto lama
                $guru = $this->ModelGuru->detail_Data($id_guru);
                if ($guru['foto_guru'] !== "") {
                    unlink('foto_guru/' . $guru['foto_guru']);
                }
                $nama_file = $foto->getRandomName();
                $data = array(
                    'id_guru' => $id_guru,
                    'kode_guru' => $this->request->getPost('kode_guru'),
                    'nama_guru' => $this->request->getPost('nama_guru'),
                    'password' => $this->request->getPost('password'),
                    'foto_guru' => $nama_file,
                );
                $foto->move('foto_guru', $nama_file);

                $this->ModelGuru->edit($data);
            }
            session()->setFlashdata('pesan', 'Data berhasil dirubah');
            return redirect()->to(base_url('guru'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('guru/edit' . $id_guru));
        }
    }

    public function delete($id_guru)
    {
        //hapus foto lama
        $guru = $this->ModelGuru->detail_Data($id_guru);
        if ($guru['foto_guru'] !== "") {
            unlink('foto_guru/' . $guru['foto_guru']);
        }
        $data = [
            'id_guru' => $id_guru,
        ];
        $this->ModelGuru->delete_data($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(base_url('guru'));
    }
}
