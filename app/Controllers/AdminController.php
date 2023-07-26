<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LoanModel;

class AdminController extends BaseController
{
    protected $loanModel;

    // Berfungsi untuk memanggil model yang akan digunakan pada constructor (fungsi yang pertama kali dijalankan)
    public function __construct()
    {
        $this->loanModel = new LoanModel();
    }

    // Berfungsi untuk menampilkan halaman admin
    public function index()
    {
        $data_returns = $this->loanModel->getReturn();
        return view('admin/index', compact('data_returns'));
    }
}
