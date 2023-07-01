<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BookModel;

class BookController extends BaseController
{
    protected $bookModel;
    // make constructor to load model
    public function __construct()
    {
        $this->bookModel = new BookModel();
    }

    public function index()
    {
        $data = $this->bookModel->get()->getResult();
        return view('admin/book/index', compact('data'));
    }

    // make function to add method post
    public function add()
    {
        try {
            $id_buku = rand(1000000, 9999999);
            $kode_buku = $this->request->getVar('kode_buku');
            $judul_buku = $this->request->getVar('judul_buku');
            $pengarang = $this->request->getVar('pengarang');
            $penerbit = $this->request->getVar('penerbit');
            $tahun_terbit = $this->request->getVar('tahun_terbit');
            $jumlah_buku = $this->request->getVar('jumlah_buku');
            $jenis_buku = $this->request->getVar('jenis_buku');
            $kode_klasifikasi = $this->request->getVar('kode_klasifikasi');
            $status_buku = $this->request->getVar('status_buku');
            $gambar = $this->request->getFile('gambar');
            $name = $gambar->getRandomName();


            $data = [
                'id_buku' => $id_buku,
                'kode_buku' => $kode_buku,
                'judul_buku' => $judul_buku,
                'pengarang' => $pengarang,
                'penerbit' => $penerbit,
                'tahun_terbit' => $tahun_terbit,
                'jumlah_buku' => $jumlah_buku,
                'jenis_buku' => $jenis_buku,
                'kode_klasifikasi' => $kode_klasifikasi,
                'status_buku' => $status_buku,
                'gambar' => $name,
            ];

            $this->bookModel->insert($data);
            $gambar->move('images/books', $name);
            return redirect()->back()->with('status', 'success');
        } catch (\Exception $e) {
            var_dump($e);
            die();
            return redirect()->back()->with('status', 'failed');
        }
    }

    // make function to update method post
    public function update()
    {
        try {
            $id_buku = $this->request->getVar('id_buku');
            $kode_buku = $this->request->getVar('kode_buku');
            $judul_buku = $this->request->getVar('judul_buku');
            $pengarang = $this->request->getVar('pengarang');
            $penerbit = $this->request->getVar('penerbit');
            $tahun_terbit = $this->request->getVar('tahun_terbit');
            $jumlah_buku = $this->request->getVar('jumlah_buku');
            $jenis_buku = $this->request->getVar('jenis_buku');
            $kode_klasifikasi = $this->request->getVar('kode_klasifikasi');
            $status_buku = $this->request->getVar('status_buku');
            if ($this->request->getFile('gambar')->getFilename() != '') {
                $gambar = $this->request->getFile('gambar');
                $name = $gambar->getRandomName();
                $data = [
                    'kode_buku' => $kode_buku,
                    'judul_buku' => $judul_buku,
                    'pengarang' => $pengarang,
                    'penerbit' => $penerbit,
                    'tahun_terbit' => $tahun_terbit,
                    'jumlah_buku' => $jumlah_buku,
                    'jenis_buku' => $jenis_buku,
                    'kode_klasifikasi' => $kode_klasifikasi,
                    'status_buku' => $status_buku,
                    'gambar' => $name,
                ];
                // $name_gambar = $this->request->getVar('gambar');
                // unlink('images/books/' . $name_gambar);
                $gambar->move('images/books', $name);
            } else {
                $data = [
                    'kode_buku' => $kode_buku,
                    'judul_buku' => $judul_buku,
                    'pengarang' => $pengarang,
                    'penerbit' => $penerbit,
                    'tahun_terbit' => $tahun_terbit,
                    'jumlah_buku' => $jumlah_buku,
                    'jenis_buku' => $jenis_buku,
                    'kode_klasifikasi' => $kode_klasifikasi,
                    'status_buku' => $status_buku,
                ];
            }
            $this->bookModel->update($id_buku, $data);
            return redirect()->back()->with('status', 'success');
        } catch (\Exception $e) {
            var_dump($e);
            die();
            return redirect()->back()->with('status', 'failed');
        }
    }

    // make function to delete method post
    public function delete()
    {
        try {
            $id_buku = $this->request->getVar('id_buku');
            // $name_gambar = $this->request->getVar('gambar');
            // unlink('images/books/' . $name_gambar);

            $this->bookModel->delete($id_buku);
            return redirect()->back()->with('status', 'success');
        } catch (\Exception $e) {
            return redirect()->back()->with('status', 'failed');
        }
    }
}
