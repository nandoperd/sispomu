<?php

namespace App\Controllers;

use App\Models\ModelAuth;

class Auth extends BaseController
{
    // mendeklarasikan form pada v_login agar bisa berjalan
    public function __construct()
    {
        helper('form');
        $this->ModelAuth = new ModelAuth();
    }

    public function index()
    {
        $data = [
            'title' => 'Login',
            'isi' => 'v_login'
        ];
        return view('layout/v_wrapper', $data);
    }

    // cek login 
    public function cek_login()
    {

        if ($this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi'
                ]
            ],
            'level' => [
                'label' => 'Level',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi'
                ]
            ],
        ])) {
            //jika valid
            $level = $this->request->getPost('level');
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            if ($level == 1) {
                $cek_user = $this->ModelAuth->login_user($username, $password);
                if ($cek_user) {
                    //jika data ada di database
                    // session()->set('log', true);
                    session()->set('username', $cek_user['username']);
                    session()->set('nama', $cek_user['nama_user']);
                    session()->set('foto', $cek_user['foto']);
                    session()->set('level', $level);
                    //login jika sukses 
                    return redirect()->to(base_url('admin'));
                } else {
                    //jika data ga cocok
                    session()->setFlashdata('pesan', 'Login gagal, Username atau Password tidak sesuai');
                    return redirect()->to(base_url('auth'));
                }
            } elseif ($level == 2) {
                $cek_guru = $this->ModelAuth->login_guru($username, $password);
                if ($cek_guru) {
                    //jika data ada di database
                    // session()->set('log', true);
                    session()->set('username', $cek_guru['kode_guru']);
                    session()->set('nama', $cek_guru['nama_guru']);
                    session()->set('foto', $cek_guru['foto_guru']);
                    session()->set('level', $level);
                    //login jika sukses 
                    return redirect()->to(base_url('halguru'));
                } else {
                    //jika data ga cocok
                    session()->setFlashdata('pesan', 'Login gagal, Username atau Password tidak sesuai');
                    return redirect()->to(base_url('auth'));
                }
            } elseif ($level == 3) {
                echo 'Wali Kelas';
            } elseif ($level == 4) {
                $cek_siswa = $this->ModelAuth->login_siswa($username, $password);
                if ($cek_siswa) {
                    //jika data ada di database
                    // session()->set('log', true);
                    session()->set('username', $cek_siswa['nis']);
                    session()->set('nama', $cek_siswa['nama_siswa']);
                    session()->set('foto', $cek_siswa['foto_siswa']);
                    session()->set('level', $level);
                    //login jika sukses 
                    return redirect()->to(base_url('halsiswa'));
                } else {
                    //jika data ga cocok
                    session()->setFlashdata('pesan', 'Login gagal, Username atau Password tidak sesuai');
                    return redirect()->to(base_url('auth'));
                }
            } elseif ($level == 5) {
                $cek_user = $this->ModelAuth->login_user($username, $password);
                if ($cek_user) {
                    //jika data ada di database
                    // session()->set('log', true);
                    session()->set('username', $cek_user['username']);
                    session()->set('nama', $cek_user['nama_user']);
                    session()->set('foto', $cek_user['foto']);
                    session()->set('level', $level);
                    //login jika sukses 
                    //login jika sukses 
                    return redirect()->to(base_url('kepsek'));
                } else {
                    //jika data ga cocok
                    session()->setFlashdata('pesan', 'Login gagal, Username atau Password tidak sesuai');
                    return redirect()->to(base_url('auth'));
                }
            }
        } else {
            //jika ga valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('auth/index'));
        }
    }

    public function logout()
    {
        session()->remove('log');
        session()->remove('username');
        session()->remove('nama');
        session()->remove('foto');
        session()->remove('level');
        session()->setFlashdata('sukses', 'Logout berhasil');
        return redirect()->to(base_url('auth'));
    }
}
