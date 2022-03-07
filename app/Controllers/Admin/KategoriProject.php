<?php

namespace App\Controllers\Admin;

use App\Models\ProjectCategoryModel;
use App\Controllers\BaseController;

class KategoriProject extends BaseController
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

        $category = new ProjectCategoryModel();


        $data['category'] = $category->findAll();

        echo view('Admin/ManageCategory/index', $data);
    }

    public function create()
    {
        // lakukan validasi
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'category_name' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        // jika data valid, simpan ke database
        if ($isDataValid) {
            $news = new ProjectCategoryModel();
            $news->insert([
                "category_name" => $this->request->getPost('category_name'),
            ]);
            session()->setFlashdata('message', 'Create Success');
            return redirect('manage-admin/kategori-project');
        } else {
            $data["validation"] = $validation->getErrors();
        }

        // tampilkan form create
        echo view('Admin/ManageCategory/create');
    }

    public function edit($id)
    {
        $category = new ProjectCategoryModel();
        $data['category'] = $category->where('id_project_category', $id)->first();

        $validation =  \Config\Services::validation();
        $validation->setRules([
            'category_name' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        // jika data vlid, maka simpan ke database
        if ($isDataValid) {
            $category->update($id, [
                "category_name" => $this->request->getPost('category_name'),
            ]);
            session()->setFlashdata('message', 'Update Success');
            return redirect()->to('manage-admin/kategori-project');
        } else {
            $data["validation"] = $validation->getErrors();
        }
        // tampilkan form edit
        echo view('Admin/ManageCategory/edit', $data);
    }

    public function delete($id)
    {
        $news = new ProjectCategoryModel();
        $news->delete($id);
        return redirect()->route('manage-admin/kategori-project');
    }
}
