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
                session()->setFlashdata('message', 'Password salah');
                return redirect()->to('/Auth/Customer/AuthCustomer/login');
            } else {
                //jika benar, arahkan user masuk ke aplikasi 
                $sessLogin = [
                    'isCustomerLogin'       => true,
                    'email'                 => $customer['email'],
                    'name'                  => $customer['name'],
                    'address'               => $customer['address'],
                    'phone_number'          => $customer['phone_number'],
                    'role'                  => null
                ];
                $this->session->set($sessLogin);
                session()->setFlashdata('message', 'Login Success');
                return redirect()->to('/Customer/ManajemenCustomer');
            }
        } else {
            //jika username tidak ditemukan, balikkan ke halaman login
            session()->setFlashdata('message', 'Email tidak ditemukan');
            return redirect()->to('/Auth/Customer/AuthCustomer/login');
        }
    }

    public function logout()
    {
        //hancurkan session 
        //balikan ke halaman login
        $this->session->destroy();
    return redirect()->to('/Auth/Customer/AuthCustomer/login');
    }
}
