<?php

namespace App\Controllers;

class Home extends BaseController
{

    // Berfungsi untuk menampilkan halaman auth login
    public function index()
    {
        return redirect()->to(base_url('auth/login'));
    }
}
