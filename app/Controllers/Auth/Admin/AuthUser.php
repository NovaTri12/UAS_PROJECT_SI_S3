<?php

namespace App\Controllers\Auth\Admin;

use App\Models\UserModel;

use App\Controllers\BaseController;

class AuthUser extends BaseController
{
    public function __construct()
    {
        //membuat user model untuk konek ke database 
        $this->userModel = new UserModel();

        //meload validation
        $this->validation = \Config\Services::validation();

        //meload session
        $this->session = \Config\Services::session();
    }

    public function login()
    {
        //menampilkan halaman login
        return view('Auth/Admin/LoginUser');
    }

    public function valid_login()
    {
        //ambil data dari form
        $data = $this->request->getPost();

        //ambil data user di database yang usernamenya sama 
        $user = $this->userModel->where('username', $data['username'])->first();
        //cek apakah username ditemukan
        if ($user) {
            //cek password
            //jika salah arahkan lagi ke halaman login
            if ($user['password'] != md5($data['password'])) {
                session()->setFlashdata('message', 'Password salah');
                return redirect()->to('/Auth/Admin/AuthUser/login');
            } else {
                //jika benar, arahkan user masuk ke aplikasi 
                $sessLogin = [
                    'isLogin' => true,
                    'username' => $user['username'],
                    'name'     => $user['name'],
                    'email'    => $user['email'],
                    'role' => $user['role']
                ];
                $this->session->set($sessLogin);
                session()->setFlashdata('message', 'Login Success');
                return redirect()->to('/Admin/ManajemenAdmin');
            }
        } else {
            //jika username tidak ditemukan, balikkan ke halaman login
            session()->setFlashdata('message', 'Username Tidak Ditemukan');
            return redirect()->to('/Auth/Admin/AuthUser/login');
        }
    }

    public function logout()
    {
        //hancurkan session 
        //balikan ke halaman login
        $this->session->destroy();
        session()->setFlashdata('message', 'Berhasil Logout');
        return redirect()->to('/Auth/Admin/AuthUser/login');
    }
}
