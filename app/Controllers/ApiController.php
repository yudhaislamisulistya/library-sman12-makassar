<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BookModel;
use App\Models\StudentModel;

class ApiController extends BaseController
{
    protected $studentModel;
    protected $bookModel;
    public function __construct()
    {
        $this->studentModel = new StudentModel();
        $this->bookModel = new BookModel();
    }
    public function getStudentById($id)
    {
        $data_student = $this->studentModel->find($id);
        if ($data_student) {
            $data = [
                'code' => 200,
                'status' => true,
                'data' => $data_student
            ];
        } else {
            $data = [
                'code' => 404,
                'status' => false,
                'data' => null
            ];
        }
        return $this->response->setJSON($data);
    }

    public function getBookById($id)
    {
        $data_book = $this->bookModel->find($id);
        if ($data_book) {
            $data = [
                'code' => 200,
                'status' => true,
                'data' => $data_book
            ];
        } else {
            $data = [
                'code' => 404,
                'status' => false,
                'data' => null
            ];
        }
        return $this->response->setJSON($data);
    }
}
