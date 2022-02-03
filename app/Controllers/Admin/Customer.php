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

        echo view('Admin/ManageCustomer/index.php', $data);
    }

    public function create()
    {
        // lakukan validasi
        $validation =  \Config\Services::validation();
        $validation->setRules(['title' => 'required']);
        $isDataValid = $validation->withRequest($this->request)->run();

        // jika data valid, simpan ke database
        if($isDataValid){
            $news = new NewsModel();
            $news->insert([
                "title" => $this->request->getPost('title'),
                "content" => $this->request->getPost('content'),
                "status" => $this->request->getPost('status'),
                "slug" => url_title($this->request->getPost('title'), '-', TRUE)
            ]);
            return redirect('admin/news');
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
            'id' => 'required',
            'title' => 'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        // jika data vlid, maka simpan ke database
        if ($isDataValid) {
            $customer->update($id, [
                "title" => $this->request->getPost('title'),
                "content" => $this->request->getPost('content'),
                "status" => $this->request->getPost('status')
            ]);
            return redirect('Admin/ManageCustomer/edit');
        }

        // tampilkan form edit
        echo view('Admin/ManageCustomer/edit', $data);
    }
}
