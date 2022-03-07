<?php

namespace App\Controllers\Admin;

use App\Models\OrderModel;

use App\Models\OrderDetailsModel;

use App\Controllers\BaseController;

class Order extends BaseController
{
    public function __construct()
    {
        $this->session = session();
        helper(['url', 'form']);
    }

    public function index()
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/auth/admin/AuthUser/login');
        }

        $order = new OrderModel();


        $data['order'] = $order->getAll();

        echo view('Admin/ManageOrder/index', $data);
    }

    public function edit()
    {
        $orderdetails = new OrderDetailsModel();
        $id    = $this->request->getPost('id_order_details');
        $data['order_details'] = $orderdetails->where('id_order_details', $id)->first();

        $validation =  \Config\Services::validation();
        $validation->setRules([
            'status' => 'required',
        ]);

        $isDataValid = $validation->withRequest($this->request)->run();
        // jika data valid, maka simpan ke database
        if ($isDataValid) {
            $orderdetails->update($id, [
                "status" => $this->request->getPost('status'),
            ]);
            session()->setFlashdata('message', 'Update Success');
            return redirect()->to('manage-admin/order');
        } else {
            $data["validation"] = $validation->getErrors();
        }
        // // tampilkan form edit
        // echo view('Admin/Manage/edit', $data);
    }


}
