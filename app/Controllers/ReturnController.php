<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LoanModel;

class ReturnController extends BaseController
{
    protected $loanModel;

    public function __construct()
    {
        $this->loanModel = new LoanModel();
    }
    public function index()
    {
        // check if role is admin
        if (session()->get('role') == 1) {
            $data_returns = $this->loanModel->getReturn(session()->get('id_user'));
        } elseif (session()->get('role') == 2) {
            $data_returns = $this->loanModel->getReturn();
        } elseif (session()->get('role') == 3) {
            $data_returns = $this->loanModel->getReturn();
        }
        return view('return/index', compact('data_returns'));
    }

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

    public function update()
    {
        try {
            $id_pinjam = $this->request->getVar('id_pinjam');
            $status = 2;
            $tanggal_kembali = $this->request->getVar('tanggal_kembali');
            $this->loanModel->update($id_pinjam, [
                'status' => $status,
                'tanggal_kembali' => $tanggal_kembali
            ]);
            return redirect()->back()->with('status', 'success');
        } catch (\Exception $th) {
            return redirect()->back()->with('status', 'failed');
        }
    }
}
