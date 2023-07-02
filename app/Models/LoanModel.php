<?php

namespace App\Models;

use CodeIgniter\Model;

class LoanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'loans';
    protected $primaryKey       = 'id_pinjam';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_pinjam', 'id_buku', 'id_staff', 'id_siswa', 'tanggal_pinjam', 'tanggal_harus_kembali', 'tanggal_kembali', 'status'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getLoan($id_user = null)
    {
        if ($id_user == null) {
            $builder = $this->db->table('loans');
            $builder->select('loans.id_pinjam, loans.id_buku, loans.id_staff, loans.id_siswa, loans.tanggal_pinjam, loans.tanggal_harus_kembali, loans.status, books.judul_buku, students.nama_siswa, staff.nama_staff');
            $builder->join('books', 'books.id_buku = loans.id_buku');
            $builder->join('students', 'students.id_siswa = loans.id_siswa');
            $builder->join('staff', 'staff.id_staff = loans.id_staff');
            $query = $builder->get();
            return $query->getResult();
        }
        $builder = $this->db->table('loans');
        $builder->select('loans.id_pinjam, loans.id_buku, loans.id_staff, loans.id_siswa, loans.tanggal_pinjam, loans.tanggal_harus_kembali, loans.status, books.judul_buku, students.nama_siswa, staff.nama_staff');
        $builder->join('books', 'books.id_buku = loans.id_buku');
        $builder->join('students', 'students.id_siswa = loans.id_siswa');
        $builder->join('staff', 'staff.id_staff = loans.id_staff');
        $builder->where('loans.id_siswa', $id_user);
        $query = $builder->get();
        return $query->getResult();
    }

    public function getReturn($id_user = null)
    {
        if ($id_user == null) {
            $builder = $this->db->table('loans');
            $builder->select('loans.id_pinjam, loans.id_buku, loans.id_staff, loans.id_siswa, loans.tanggal_pinjam, loans.tanggal_harus_kembali, loans.tanggal_kembali, loans.status, books.judul_buku, students.nama_siswa, registrations.nomor_anggota');
            $builder->join('books', 'books.id_buku = loans.id_buku');
            $builder->join('students', 'students.id_siswa = loans.id_siswa');
            $builder->join('registrations', 'registrations.id_siswa = students.id_siswa');
            $query = $builder->get();
            return $query->getResult();
        }
        $builder = $this->db->table('loans');
        $builder->select('loans.id_pinjam, loans.id_buku, loans.id_staff, loans.id_siswa, loans.tanggal_pinjam, loans.tanggal_harus_kembali, loans.tanggal_kembali, loans.status, books.judul_buku, students.nama_siswa, registrations.nomor_anggota');
        $builder->join('books', 'books.id_buku = loans.id_buku');
        $builder->join('students', 'students.id_siswa = loans.id_siswa');
        $builder->join('registrations', 'registrations.id_siswa = students.id_siswa');
        $builder->where('loans.id_siswa', $id_user);
        $query = $builder->get();
        return $query->getResult();
    }

    public function getLoanByDate($tahun)
    {
        $builder = $this->db->table('loans');
        $builder->select('loans.id_pinjam, loans.id_buku, loans.id_staff, loans.id_siswa, loans.tanggal_pinjam, loans.tanggal_harus_kembali, loans.status, books.judul_buku, students.nama_siswa, staff.nama_staff');
        $builder->join('books', 'books.id_buku = loans.id_buku');
        $builder->join('students', 'students.id_siswa = loans.id_siswa');
        $builder->join('staff', 'staff.id_staff = loans.id_staff');
        $builder->where('YEAR(loans.tanggal_pinjam)', $tahun);
        $query = $builder->get();
        return $query->getResult();
    }

    public function getReturnByDate($tahun)
    {
        $builder = $this->db->table('loans');
        $builder->select('loans.id_pinjam, loans.id_buku, loans.id_staff, loans.id_siswa, loans.tanggal_pinjam, loans.tanggal_harus_kembali, loans.tanggal_kembali, loans.status, books.judul_buku, students.nama_siswa, registrations.nomor_anggota');
        $builder->join('books', 'books.id_buku = loans.id_buku');
        $builder->join('students', 'students.id_siswa = loans.id_siswa');
        $builder->join('registrations', 'registrations.id_siswa = students.id_siswa');
        $builder->where('YEAR(loans.tanggal_kembali)', $tahun);
        $builder->where('status', 2);
        $query = $builder->get();
        return $query->getResult();
    }
}
