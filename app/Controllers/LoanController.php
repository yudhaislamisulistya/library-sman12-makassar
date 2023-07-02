<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BookModel;
use App\Models\LoanModel;
use App\Models\StudentModel;

class LoanController extends BaseController
{
    protected $studentModel;
    protected $bookModel;
    protected $loanModel;
    // make constructor to load model
    public function __construct()
    {
        $this->studentModel = new StudentModel();
        $this->bookModel = new BookModel();
        $this->loanModel = new LoanModel();
    }

    public function index()
    {
        $data_students = $this->studentModel->getRegistration();
        $data_books = $this->bookModel->get()->getResult();
        $data_loans = $this->loanModel->getLoan();

        return view('admin/loan/index', compact('data_students', 'data_books', 'data_loans'));
    }

    public function add()
    {
        try {
            $id_pinjam = rand(1000000, 9999999);
            $id_buku = $this->request->getVar('id_buku');
            $id_staff = $this->request->getVar('id_staff');
            $id_siswa = $this->request->getVar('id_siswa');
            $tanggal_pinjam = $this->request->getVar('tanggal_pinjam');
            $tanggal_harus_kembali = $this->request->getVar('tanggal_harus_kembali');

            if ($tanggal_harus_kembali < $tanggal_pinjam) {
                return redirect()->back()->with('status', 'failed');
            }

            $data = [
                'id_pinjam' => $id_pinjam,
                'id_buku' => $id_buku,
                'id_staff' => $id_staff,
                'id_siswa' => $id_siswa,
                'tanggal_pinjam' => $tanggal_pinjam,
                'tanggal_harus_kembali' => $tanggal_harus_kembali,
                'status' => 1,
            ];

            $this->loanModel->insert($data);
            return redirect()->back()->with('status', 'success');
        } catch (\Exception $th) {
            return redirect()->back()->with('status', 'failed');
        }
    }

    // make function delete loan method post
    public function delete()
    {
        try {
            $id_pinjam = $this->request->getVar('id_pinjam');
            $this->loanModel->delete($id_pinjam);
            return redirect()->back()->with('status', 'success');
        } catch (\Exception $th) {
            return redirect()->back()->with('status', 'failed');
        }
    }
}
