<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LoanModel;

class StudentController extends BaseController
{
    protected $loanModel;

    public function __construct()
    {
        $this->loanModel = new LoanModel();
    }

    public function index()
    {
        $data_returns = $this->loanModel->getReturn(session()->get('id_user'));
        return view('student/index', compact('data_returns'));
    }
}
