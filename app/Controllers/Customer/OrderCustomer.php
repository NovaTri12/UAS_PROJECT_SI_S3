<?php

namespace App\Controllers\Customer;

use App\Models\OrderModel;

use App\Controllers\BaseController;

class OrderCustomer extends BaseController
{
    public function __construct()
    {
        $this->session = session();
    }

    public function index()
    {
        if (!$this->session->has('isCustomerLogin')) {
            return redirect()->to('/auth/customer/AuthCustomer/login');
        }

        $order = new OrderModel();


        $data['order'] = $order->getAll();

        echo view('Customer/ManageOrder/index', $data);
    }
}
