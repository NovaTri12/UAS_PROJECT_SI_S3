<?php

namespace App\Controllers\Customer;

use App\Controllers\BaseController;
use App\Models\CustomerModel;

class ManajemenCustomer extends BaseController
{
    public function __construct()
    {
        $this->session = session();
    }

    public function index()
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/auth/customer/AuthCustomer/login');
        }
        
        return view('Customer/index');
    }
}
