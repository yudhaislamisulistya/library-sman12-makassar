<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RegistrationModel;
use App\Models\StudentModel;

class MemberController extends BaseController
{
    protected $studentModel;
    protected $registrationModel;
    // make constructor to load model
    public function __construct()
    {
        $this->studentModel = new StudentModel();
        $this->registrationModel = new RegistrationModel();
    }

    public function index()
    {
        $data  = $this->studentModel->getRegistration();

        return view('admin/member/index', compact('data'));
    }

    // make function to add method post
    public function add()
    {
        try {
            $id_siswa = rand(1000000, 9999999);
            $id_registrasi = rand(1000000, 9999999);

            $data_student = [
                'id_siswa' => $id_siswa,
                'nama_siswa' => $this->request->getVar('nama_siswa'),
                'username' => $this->request->getVar('username'),
                'password' => $this->request->getVar('password'),
            ];

            $data_registration = [
                'id_registrasi' => $id_registrasi,
                'id_siswa' => $id_siswa,
                'tanggal_daftar' => date('Y-m-d'),
                'kelas' => $this->request->getVar('kelas'),
                'nomor_anggota' => $this->request->getVar('nomor_anggota'),
                'alamat' => $this->request->getVar('alamat'),
                'nomor_telepon' => $this->request->getVar('nomor_telepon'),
            ];

            $this->studentModel->insert($data_student);
            $this->registrationModel->insert($data_registration);

            return redirect()->back()->with('status', 'success');
        } catch (\Exception $e) {
            return redirect()->back()->with('status', 'failed');
        }
    }

    // make function to delete method post
    public function delete()
    {
        try {
            $id_siswa = $this->request->getVar('id_siswa');
            $this->studentModel->delete($id_siswa);
            $this->registrationModel->delete($id_siswa);

            return redirect()->back()->with('status', 'success');
        } catch (\Exception $e) {
            return redirect()->back()->with('status', 'failed');
        }
    }

    // make function to update method post
    public function update()
    {
        try {
            $id_siswa = $this->request->getVar('id_siswa');
            $id_registrasi = $this->request->getVar('id_registrasi');

            $data_student = [
                'nama_siswa' => $this->request->getVar('nama_siswa'),
                'username' => $this->request->getVar('username'),
                'password' => $this->request->getVar('password'),
            ];

            $data_registration = [
                'kelas' => $this->request->getVar('kelas'),
                'nomor_anggota' => $this->request->getVar('nomor_anggota'),
                'alamat' => $this->request->getVar('alamat'),
                'nomor_telepon' => $this->request->getVar('nomor_telepon'),
            ];

            $this->studentModel->update($id_siswa, $data_student);
            $this->registrationModel->update($id_registrasi, $data_registration);

            return redirect()->back()->with('status', 'success');
        } catch (\Exception $e) {
            var_dump($e);
            die();
            return redirect()->back()->with('status', 'failed');
        }
    }
}
