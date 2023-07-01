<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BookModel;
use App\Models\StudentModel;

class LoanController extends BaseController
{
    protected $studentModel;
    protected $bookModel;
    // make constructor to load model
    public function __construct()
    {
        $this->studentModel = new StudentModel();
        $this->bookModel = new BookModel();
    }

    public function index()
    {
        $data_students = $this->studentModel->getRegistration();
        $data_books = $this->bookModel->get()->getResult();
        return view('admin/loan/index', compact('data_students', 'data_books'));
    }
}
