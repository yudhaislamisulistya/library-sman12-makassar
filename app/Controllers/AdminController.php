<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LoanModel;

class AdminController extends BaseController
{
    protected $loanModel;


    public function __construct()
    {
        $this->loanModel = new LoanModel();
    }

    public function index()
    {
        $data_returns = $this->loanModel->getReturn();
        return view('admin/index', compact('data_returns'));
    }
}
