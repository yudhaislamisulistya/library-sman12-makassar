<?php

use App\Models\AuthModel;
use App\Models\BookModel;
use App\Models\HeadmasterModel;
use App\Models\LoanModel;
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
