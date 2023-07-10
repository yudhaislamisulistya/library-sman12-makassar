<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HeadmasterModel;
use App\Models\RegistrationModel;
use App\Models\StaffModel;
use App\Models\StudentModel;

class ProfileController extends BaseController
{
    protected $staffModel;
    protected $headmasterModel;
    protected $studentModel;
    protected $registrationModel;

    public function __construct()
    {
        $this->staffModel = new StaffModel();
        $this->headmasterModel = new HeadmasterModel();
        $this->studentModel = new StudentModel();
        $this->registrationModel = new RegistrationModel();
    }

    public function index()
    {
        if (session()->get('role') == 1) {
            $data = $this->studentModel->getStudentRegistrationById(session()->get('id_user'));
        } elseif (session()->get('role') == 2) {
            $data = $this->staffModel->where('id_staff', session()->get('id_user'))->first();
        } elseif (session()->get('role') == 3) {
            $data = $this->headmasterModel->where('id_kepala_sekolah', session()->get('id_user'))->first();
        }
        return view('profile/index', compact('data'));
    }

    public function update()
    {
        try {
            $id_user = session()->get('id_user');
            $id_registrasi = getRegistrationByIdUser($id_user)['id_registrasi'];
            if (session()->get('role') == 1) {
                $data_registration = [
                    'nisn' => $this->request->getVar('nisn'),
                    'kelas' => $this->request->getVar('kelas'),
                    'nomor_anggota' => $this->request->getVar('nomor_anggota'),
                    'alamat' => $this->request->getVar('alamat'),
                    'nomor_telepon' => $this->request->getVar('nomor_telepon'),
                ];

                $data_student = [
                    'nama_siswa' => $this->request->getVar('nama_siswa'),
                ];

                $this->registrationModel->update($id_registrasi, $data_registration);
                $this->studentModel->update($id_user, $data_student);
                
                return redirect()->back()->with('status', 'success');
            } elseif (session()->get('role') == 2) {

                $data = [
                    'nama_staff' => $this->request->getVar('nama_staff'),
                ];

                $this->staffModel->update($id_user, $data);
                return redirect()->back()->with('status', 'success');
            } elseif (session()->get('role') == 3) {
                $data = [
                    'nama_kepala_sekolah' => $this->request->getVar('nama_kepala_sekolah'),
                ];

                $this->headmasterModel->update($id_user, $data);
                return redirect()->back()->with('status', 'success');
            }
        } catch (\Exception $th) {
            return redirect()->back()->with('status', 'failed');
        }
    }

    public function changePassword()
    {
        try {
            $id_user = session()->get('id_user');
            $password = $this->request->getVar('password');
            $konfirmasi_password = $this->request->getVar('konfirmasi_password');

            if ($password != $konfirmasi_password) {
                return redirect()->back()->with('status', 'failed');
            }

            $data = [
                'password' => $password,
            ];

            $this->staffModel->update($id_user, $data);
            return redirect()->back()->with('status', 'success');
        } catch (\Exception $th) {
            return redirect()->back()->with('status', 'failed');
        }
    }
}
