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
    // Berfungsi untuk memanggil model yang akan digunakan pada constructor (fungsi yang pertama kali dijalankan)
    public function __construct()
    {
        $this->studentModel = new StudentModel();
        $this->bookModel = new BookModel();
        $this->loanModel = new LoanModel();
    }

    // Berfungsi untuk menampilkan halaman loan/index kemudian mengirimkan data students, books, dan loans
    // Dan mengecek role user untuk menampilkan data loans sesuai dengan role user
    public function index()
    {
        $data_students = $this->studentModel->getRegistration();
        $data_books = $this->bookModel->get()->getResult();
        $data_loans = $this->loanModel->getLoan();

        // check role
        if (session()->get('role') == 1) {
            $data_loans = $this->loanModel->getLoan(session()->get('id_user'));
        }elseif (session()->get('role') == 2) {
            $data_loans = $this->loanModel->getLoan();
        }elseif (session()->get('role') == 3) {
            $data_loans = $this->loanModel->getLoan();
        }

        return view('loan/index', compact('data_students', 'data_books', 'data_loans'));
    }

    // Berfungsi untuk menambahkan data peminjaman baru ke database
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

    // Berfungsi untuk mengubah data peminjaman ke database
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
