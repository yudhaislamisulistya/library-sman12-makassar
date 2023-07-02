<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BookModel;
use App\Models\LoanModel;

class ReportController extends BaseController
{

    protected $loanModel;
    protected $bookModel;

    public function __construct()
    {
        $this->loanModel = new LoanModel();
        $this->bookModel = new BookModel();
    }
    
    public function index()
    {
        $year_now = date('Y');
        $data_date_books = $this->bookModel->getBookByDate($year_now);
        $data_date_loans = $this->loanModel->getLoanByDate($year_now);
        $data_date_returns = $this->loanModel->getReturnByDate($year_now);

        if($this->request->getMethod() == 'post'){
            $tahun = $this->request->getPost('tahun');
            $data_date_books = $this->bookModel->getBookByDate($tahun);
            $data_date_loans = $this->loanModel->getLoanByDate($tahun);
            $data_date_returns = $this->loanModel->getReturnByDate($tahun);
        }

        return view('admin/report/index', compact('data_date_books', 'data_date_loans', 'data_date_returns'));
    }
}
