<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AuthController extends BaseController
{
    public function index()
    {
        //
    }

    public function login(){
        return view('authentication/login');
    }
}
