<?php

namespace App\Controllers;

use App\Models\ModelSiswa;
use App\Models\ModelKelas;

class Siswa extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelSiswa = new ModelSiswa();
        $this->ModelKelas = new ModelKelas();
    }

    public function index()
    {
        $data = [
            'title' => 'Siswa',
            'siswa' => $this->ModelSiswa->allData(),
            'isi' => 'admin/siswa/v_index'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Tambah Siswa',
            'kelas' => $this->ModelKelas->allData(),
            'isi' => 'admin/siswa/v_add'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function insert()
    { {
            if ($this->validate([
                'nis' => [
                    'label' => 'NIS',
                    'rules' => 'required|is_unique[tbl-siswa.nis]',
                    'errors' => [
                        'required' => '{field} Wajib diisi!',
                        'is_unique' => 'NIS {field} sudah ada, Silahkan Kode lain!'
                    ]
                ],
                'nama_siswa' => [
                    'label' => 'Nama Siswa',
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
                'id_kelas' => [
                    'label' => 'Kelas',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib diisi!',
                    ]
                ],
                'foto_siswa' => [
                    'label' => 'Foto Siswa',
                    'rules' => 'uploaded[foto_siswa]|max_size[foto_siswa,1024]|mime_in[foto_siswa,image/png,image/jpg]',
                    'errors' => [
                        'uploaded' => '{field} Wajib diisi!',
                        'max_size' => '{field} Maximal 1 MB',
                        'mime_in' => '{field} hanya dalam bentuk format JPG/PNG!',
                    ]
                ],
            ])) {
                //jika valid
                $foto = $this->request->getFile('foto_siswa');
                $nama_file = $foto->getRandomName();
                $data = array(
                    'nis' => $this->request->getPost('nis'),
                    'nama_siswa' => $this->request->getPost('nama_siswa'),
                    'password' => $this->request->getPost('password'),
                    'id_kelas' => $this->request->getPost('id_kelas'),
                    'foto_siswa' => $nama_file,
                );
                $foto->move('foto_siswa', $nama_file);
                $this->ModelSiswa->add($data);
                session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
                return redirect()->to(base_url('siswa'));
            } else {
                //jika tidak valid
                session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
                return redirect()->to(base_url('siswa/add'));
            }
        }
    }

    public function edit($id_siswa)
    {
        $data = [
            'title' => 'Edit Data Siswa',
            'kelas' => $this->ModelKelas->allData(),
            'siswa' => $this->ModelSiswa->detail_Data($id_siswa),
            'isi' => 'admin/siswa/v_edit'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function update($id_siswa)
    { {
            if ($this->validate([
                'nis' => [
                    'label' => 'NIS',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib diisi!',
                    ]
                ],
                'nama_siswa' => [
                    'label' => 'Nama Siswa',
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
                'id_kelas' => [
                    'label' => 'Kelas',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib diisi!',
                    ]
                ],
                'foto_siswa' => [
                    'label' => 'Foto Siswa',
                    'rules' => 'max_size[foto_siswa,1024]|mime_in[foto_siswa,image/png,image/jpg]',
                    'errors' => [
                        'max_size' => '{field} Maximal 1 MB',
                        'mime_in' => '{field} hanya dalam bentuk format JPG/PNG!',
                    ]
                ],
            ])) {
                //jika valid
                $foto = $this->request->getFile('foto_siswa');
                if ($foto->getError() == 4) {
                    $data = array(
                        'id_siswa' => $id_siswa,
                        'nis' => $this->request->getPost('nis'),
                        'nama_siswa' => $this->request->getPost('nama_siswa'),
                        'password' => $this->request->getPost('password'),
                        'id_kelas' => $this->request->getPost('id_kelas'),
                    );
                    $this->ModelSiswa->edit($data);
                } else {
                    //hapus foto lama
                    $siswa = $this->ModelSiswa->detail_Data($id_siswa);
                    if ($siswa['foto_siswa'] !== "") {
                        unlink('foto_siswa/' . $siswa['foto_siswa']);
                    }
                    $nama_file = $foto->getRandomName();

                    $data = array(
                        'id_siswa' => $id_siswa,
                        'nis' => $this->request->getPost('nis'),
                        'nama_siswa' => $this->request->getPost('nama_siswa'),
                        'password' => $this->request->getPost('password'),
                        'id_kelas' => $this->request->getPost('id_kelas'),
                        'foto_siswa' => $nama_file,
                    );
                    $foto->move('foto_siswa', $nama_file);
                    $this->ModelSiswa->edit($data);
                }

                session()->setFlashdata('pesan', 'Data berhasil dirubah');
                return redirect()->to(base_url('siswa'));
            } else {
                //jika tidak valid
                session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
                return redirect()->to(base_url('siswa/edit/' . $id_siswa));
            }
        }
    }

    public function delete($id_siswa)
    {
        //hapus foto lama
        $siswa = $this->ModelSiswa->detail_Data($id_siswa);
        if ($siswa['foto_siswa'] !== "") {
            unlink('foto_siswa/' . $siswa['foto_siswa']);
        }
        $data = [
            'id_siswa' => $id_siswa,
        ];
        $this->ModelSiswa->delete_data($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(base_url('siswa'));
    }
}
