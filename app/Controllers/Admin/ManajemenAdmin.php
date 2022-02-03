<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class ManajemenAdmin extends BaseController
{
    public function __construct()
    {
        $this->session = session();
    }

    public function index()
    {
        if(!$this->session->has('isLogin')){
            return redirect()->to('/auth/admin/AuthUser/login');
        }else{
            return view('Admin/index');
        }
    }

}
