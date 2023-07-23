<?php

use App\Models\AuthModel;
use App\Models\BookModel;
use App\Models\HeadmasterModel;
use App\Models\LoanModel;
use App\Models\RegistrationModel;
use App\Models\StaffModel;
use App\Models\StudentModel;

function cekUser()
{
    if (session()->get('isLoggedIn')) {
        return true;
    } else {
        return false;
    }
}

function getNameUserById($id)
{
    $studentModel = new StudentModel();
    $staffModel = new StaffModel();
    $headmasterModel = new HeadmasterModel();
    $student = $studentModel->select('nama_siswa as nama')->where('id_siswa', $id)->first();
    $staff = $staffModel->select('nama_staff as nama')->where('id_staff', $id)->first();
    $headmaster = $headmasterModel->select('nama_kepala_sekolah as nama')->where('id_kepala_sekolah', $id)->first();
    if ($student != NULL) {
        return $student['nama'];
    } else if ($staff != NULL) {
        return $staff['nama'];
    } else if ($headmaster != NULL) {
        return $headmaster['nama'];
    } else {
        return null;
    }
}

function getPhotoUserById($id)
{
    $registrationModel = new RegistrationModel();
    $staffModel = new StaffModel();
    $headmasterModel = new HeadmasterModel();
    $student = $registrationModel->select('photo')->where('id_siswa', $id)->first();
    $staff = $staffModel->select('photo')->where('id_staff', $id)->first();
    $headmaster = $headmasterModel->select('photo')->where('id_kepala_sekolah', $id)->first();
    if ($student != NULL) {
        return $student['photo'];
    } else if ($staff != NULL) {
        return $staff['photo'];
    } else if ($headmaster != NULL) {
        return $headmaster['photo'];
    } else {
        return null;
    }
}

function getBooks()
{
    $bookModel = new BookModel();

    $books = $bookModel->get()->getResult();

    return $books;
}

function getLoans($id_user = null)
{
    $loanModel = new LoanModel();
    if ($id_user != null) {
        $loans = $loanModel->where('id_siswa', $id_user)->get()->getResult();
    } else {
        $loans = $loanModel->get()->getResult();
    }
    return $loans;
}

function getReturns($id_user = null)
{
    $loanModel = new LoanModel();
    if ($id_user != null) {
        $returns = $loanModel->where('id_siswa', $id_user)->where('status', 2)->get()->getResult();
    } else {
        $returns = $loanModel->where('status', 2)->get()->getResult();
    }
    return $returns;
}

function getLastNumberMember()
{
    $registrationModel = new RegistrationModel();
    $lastNumber = $registrationModel->select('nomor_anggota')->orderBy('nomor_anggota', 'DESC')->first();
    if ($lastNumber != null) {
        return $lastNumber['nomor_anggota'];
    } else {
        return 0;
    }
}

function getUniqueTypeBook()
{
    $bookModel = new BookModel();
    $types = $bookModel->select('jenis_buku')->groupBy('jenis_buku')->get()->getResult();
    return $types;
}

function getBookById($id)
{
    $bookModel = new BookModel();
    $book = $bookModel->where('id_buku', $id)->first();
    return $book;
}

function getRegistrationByIdUser($id)
{
    $registrationModel = new RegistrationModel();
    $registration = $registrationModel->where('id_siswa', $id)->first();
    return $registration;
}

function getLoansTotalLoanGroupByYear()
{
    $loanModel = new LoanModel();
    $loans = $loanModel->select('YEAR(tanggal_pinjam) as tahun, COUNT(id_pinjam) as total')->groupBy('YEAR(tanggal_pinjam)')->get()->getResult();
    $loans = json_decode(json_encode($loans), true);
    $year = date('Y');
    for ($i = 0; $i < 5; $i++) {
        $year = $year - 1;
        $year = strval($year);
        $loans[] = [
            'tahun' => $year,
            'total' => 0
        ];
    }

    array_multisort(array_column($loans, 'tahun'), SORT_ASC, $loans);
    return $loans;
}

function getLoansTotalReturnGroupByYear()
{
    $loanModel = new LoanModel();
    $loans = $loanModel->select('YEAR(tanggal_kembali) as tahun, COUNT(id_pinjam) as total')->where('status', 2)->groupBy('YEAR(tanggal_kembali)')->get()->getResult();
    $loans = json_decode(json_encode($loans), true);
    $year = date('Y');
    for ($i = 0; $i < 5; $i++) {
        $year = $year - 1;
        $year = strval($year);
        $loans[] = [
            'tahun' => $year,
            'total' => 0
        ];
    }

    array_multisort(array_column($loans, 'tahun'), SORT_ASC, $loans);
    return $loans;
}

function getBookByDate($year_now){
    $bookModel = new BookModel();
    $result = $bookModel->getBookByDate($year_now);
    return $result;
}

function getLoanByDate($year_now){
    $loanModel = new LoanModel();
    $result = $loanModel->getLoanByDate($year_now);
    return $result;
}

function getReturnByDate($year_now){
    $returnModel = new LoanModel();
    $result = $returnModel->getReturnByDate($year_now);
    return $result;
}
