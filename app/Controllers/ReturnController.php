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
        $data_returns = $this->loanModel->getReturn();
        return view('admin/return/index', compact('data_returns'));
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
