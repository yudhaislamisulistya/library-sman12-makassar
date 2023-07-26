<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BookModel;
use App\Models\StudentModel;

class ApiController extends BaseController
{
    protected $studentModel;
    protected $bookModel;

    // Berfungsi untuk memanggil model yang akan digunakan pada constructor (fungsi yang pertama kali dijalankan)
    public function __construct()
    {
        $this->studentModel = new StudentModel();
        $this->bookModel = new BookModel();
    }

    // API untuk menampilkan data siswa berdasarkan id
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

    // API untuk menampilkan data buku berdasarkan id
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
