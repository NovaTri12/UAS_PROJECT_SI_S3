<?php

namespace App\Controllers\Auth\Customer;

use App\Controllers\BaseController;

class LoginCustomer extends BaseController
{
    public function __construct()
    {
        $this->session = session();
    }

    public function index()
    {
        //cek apakah ada session bernama isLogin
        if (!$this->session->has('isCustomerLogin')) {
            return redirect()->to('/auth/customer/AuthCustomer/login');
        }else{
            return redirect()->to('Customer/ManajemenCustomer');
        }
    }
}
