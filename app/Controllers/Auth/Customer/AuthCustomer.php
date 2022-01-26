<?php

namespace App\Controllers\Auth\Customer;

use App\Models\CustomerModel;

use App\Controllers\BaseController;

class AuthCustomer extends BaseController
{
    public function __construct()
    {
        // membuat user model untuk konek ke database 
        $this->customerModel = new CustomerModel();

        //meload validation
        $this->validation = \Config\Services::validation();

        //meload session
        $this->session = \Config\Services::session();
    }

    public function login()
    {
        return view('Auth/Customer/LoginCustomer');
    }
    public function valid_login()
    {
        //ambil data dari form
        $data = $this->request->getPost();

        //ambil data user di database yang usernamenya sama 
        $customer = $this->customerModel->where('email', $data['email'])->first();

        //cek apakah username ditemukan
        if ($customer) {
            //cek password
            //jika salah arahkan lagi ke halaman login
            if ($customer['password'] != md5($data['password'])) {
                session()->setFlashdata('password', 'Password salah');
                return redirect()->to('/auth/customer/AuthCustomer/login');
            } else {
                //jika benar, arahkan user masuk ke aplikasi 
                $sessLogin = [
                    'isLogin' => true,
                    'email' => $customer['email'],
                    // 'role' => $customer['role']
                ];
                $this->session->set($sessLogin);
                return redirect()->to('/Customer/ManajemenCustomer');
            }
        } else {
            //jika username tidak ditemukan, balikkan ke halaman login
            session()->setFlashdata('email', 'Email tidak ditemukan');
            return redirect()->to('/auth/customer/AuthCustomer/login');
        }
    }

    public function logout()
    {
        //hancurkan session 
        //balikan ke halaman login
        $this->session->destroy();
        return redirect()->to('/auth/customer/AuthCustomer/login');
    }
}
