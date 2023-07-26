<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LoginModel;
use App\Models\RegistrationModel;
use App\Models\StudentModel;

class MemberController extends BaseController
{
    protected $studentModel;
    protected $registrationModel;
    protected $loginModel;

    // Berfungsi untuk memanggil model yang akan digunakan pada constructor (fungsi yang pertama kali dijalankan)
    public function __construct()
    {
        $this->studentModel = new StudentModel();
        $this->registrationModel = new RegistrationModel();
        $this->loginModel = new LoginModel();
    }

    // Berfungsi untuk menampilkan halaman dashboard
    public function index()
    {
        $data  = $this->studentModel->getRegistration();

        return view('admin/member/index', compact('data'));
    }

    // Berfungsi untuk menambahkan data siswa baru ke database
    public function add()
    {
        try {
            $id_siswa = rand(1000000, 9999999);
            $id_registrasi = rand(1000000, 9999999);
            $year = substr(date('Y'), 2, 2);

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
                'nisn' => $this->request->getVar('nisn'),
                'nomor_anggota' => $year . $this->request->getVar('nomor_anggota'),
                'alamat' => $this->request->getVar('alamat'),
                'nomor_telepon' => $this->request->getVar('nomor_telepon'),
            ];

            $data_login = [
                'id_user' => $id_siswa,
                'username' => $this->request->getVar('username'),
                'password' => $this->request->getVar('password'),
                'role' => 1,
            ];

            $this->studentModel->insert($data_student);
            $this->registrationModel->insert($data_registration);
            $this->loginModel->insert($data_login);

            return redirect()->back()->with('status', 'success');
        } catch (\Exception $e) {
            return redirect()->back()->with('status', 'failed');
        }
    }

    // Berfungsi untuk menghapus data siswa dari database
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

    // Berfungsi untuk memperbarui data siswa di database
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
                'nisn' => $this->request->getVar('nisn'),
                'nomor_anggota' => $this->request->getVar('nomor_anggota'),
                'alamat' => $this->request->getVar('alamat'),
                'nomor_telepon' => $this->request->getVar('nomor_telepon'),
            ];

            $this->studentModel->update($id_siswa, $data_student);
            $this->registrationModel->update($id_registrasi, $data_registration);

            return redirect()->back()->with('status', 'success');
        } catch (\Exception $e) {
            return redirect()->back()->with('status', 'failed');
        }
    }
}
