<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthModel;

class AuthController extends BaseController
{
    protected $authModel;
    public function __construct()
    {
        $this->authModel = new AuthModel();
    }
    public function login()
    {
        if (cekUser()) {
            // if check session role user
            if (session()->get('role') == 1) {
                return redirect()->to(base_url('student/dashboard'));
            } else if (session()->get('role') == 2) {
                return redirect()->to(base_url('admin/dashboard'));
            } else {
                return redirect()->to(base_url('headmaster/dashboard'));
            }
        }

        return view('authentication/login');
    }

    public function register()
    {
        return view('authentication/register');
    }

    public function postLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $cek = $this->authModel->where('username', $username)->where('password', $password)->first();

        if ($cek != NULL) {
            if ($cek['role'] == 1) {
                $this->setSession($cek);
                session()->setFlashdata('success', 'Berhasil Login');
                return redirect()->to(base_url('student/dashboard'));
            } else if ($cek['role'] == 2) {
                $this->setSession($cek);
                session()->setFlashdata('success', 'Berhasil Login');
                return redirect()->to(base_url('admin/dashboard'));
            } else {
                $this->setSession($cek);
                session()->setFlashdata('success', 'Berhasil Login');
                return redirect()->to(base_url('headmaster/dashboard'));
            }
        } else {
            return redirect()->back()->with('status', 'failed');
        }
    }

    public function logout()
    {
        $this->resetSession();
        return redirect()->to(base_url('auth/login'));
    }

    public function setSession($data)
    {
        $session = [
            'id_user' => $data['id_user'],
            'username' => $data['username'],
            'role' => $data['role'],
            'isLoggedIn' => TRUE
        ];
        session()->set($session);
    }

    public function resetSession()
    {
        session()->destroy();
        return redirect()->to(base_url('auth/login'));
    }
}
