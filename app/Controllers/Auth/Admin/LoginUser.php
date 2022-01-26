<?php

namespace App\Controllers\Auth\Admin;

use App\Controllers\BaseController;

class LoginUser extends BaseController
{
    public function __construct()
    {
        $this->session = session();
    }
    
    public function index()
    {
        //cek apakah ada session bernama isLogin
        if(!$this->session->has('isLogin')){
            return redirect()->to('/auth/admin/AuthUser/login');
        }
                
        return view('user/index');
    }
}
