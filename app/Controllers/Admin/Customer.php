<?php

namespace App\Controllers\Admin;

use App\Models\CustomerModel;

use App\Controllers\BaseController;

class Customer extends BaseController
{

    public function __construct()
    {
        $this->session = session();
    }

    public function index()
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/auth/admin/AuthUser/login');
        }

        $customer = new CustomerModel();


        $data['customer'] = $customer->findAll();

        echo view('Admin/ManageCustomer/index', $data);
    }

    public function create()
    {
        // lakukan validasi
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'address' => 'required',
            'phone_number' => 'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        // jika data valid, simpan ke database
        if ($isDataValid) {
            $news = new CustomerModel();
            $news->insert([
                "name" => $this->request->getPost('name'),
                "email" => $this->request->getPost('email'),
                "password" => md5($this->request->getPost('password')),
                "address" => $this->request->getPost('address'),
                "phone_number" => $this->request->getPost('phone_number'),
                "created_at" => date('Y-m-d H:i:s'),
            ]);
            session()->setFlashdata('message', 'Create Success');
            return redirect('manage-admin/customer');
        } else {
            $data["validation"] = $validation->getErrors();
        }

        // tampilkan form create
        echo view('Admin/ManageCustomer/create');
    }

    public function edit($id)
    {
        $customer = new CustomerModel();
        $data['customer'] = $customer->where('id_customer', $id)->first();

        $validation =  \Config\Services::validation();
        $validation->setRules([
            'name' => 'required',
            'email' => 'required',
            // 'password' => 'required',
            'address' => 'required',
            'phone_number' => 'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        // jika data vlid, maka simpan ke database
        if ($isDataValid) {
            $customer->update($id, [
                "name" => $this->request->getPost('name'),
                "email" => $this->request->getPost('email'),
                // "password" => md5($this->request->getPost('password')),
                "address" => $this->request->getPost('address'),
                "phone_number" => $this->request->getPost('phone_number'),
                "updated_at" => date('Y-m-d H:i:s'),
            ]);
            session()->setFlashdata('message', 'Update Success');
            return redirect()->to('manage-admin/customer');
        } else {
            $data["validation"] = $validation->getErrors();
        }
        // tampilkan form edit
        echo view('Admin/ManageCustomer/edit', $data);
    }

    public function delete($id)
    {
        $news = new CustomerModel();
        $news->delete($id);
        return redirect()->route('manage-admin/customer');
    }
}
