<?php

use App\Models\AuthModel;
use App\Models\HeadmasterModel;
use App\Models\StaffModel;
use App\Models\StudentModel;

function cekUser(){
    if(session()->get('isLoggedIn')){
        return true;
    }else{
        return false;
    }
}

function getNameUserById($id){
    $studentModel = new StudentModel();
    $staffModel = new StaffModel();
    $headmasterModel = new HeadmasterModel();
    $student = $studentModel->select('nama_siswa as nama')->where('id_siswa', $id)->first();
    $staff = $staffModel->select('nama_staff as nama')->where('id_staff', $id)->first();
    $headmaster = $headmasterModel->select('nama_kepala_sekolah as nama')->where('id_kepala_sekolah', $id)->first();
    if($student != NULL){
        return $student['nama'];
    }else if($staff != NULL){
        return $staff['nama'];
    }else if($headmaster != NULL){
        return $headmaster['nama'];
    }else{
        return null;
    }
}
