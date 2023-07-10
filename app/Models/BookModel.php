<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'books';
    protected $primaryKey       = 'id_buku';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_buku',
        'kode_buku',
        'judul_buku',
        'pengarang',
        'penerbit',
        'tahun_terbit',
        'jumlah_buku',
        'jenis_buku',
        'rak',
        'kode_klasifikasi', 
        'status_buku',
        'gambar',
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

    public function getBookByDate($tahun)
    {
        $builder = $this->db->table('books');
        $builder->select('books.id_buku, books.kode_buku, books.judul_buku, books.pengarang, books.penerbit, books.tahun_terbit, books.jumlah_buku, books.jenis_buku, books.rak, books.kode_klasifikasi, books.status_buku, books.gambar');
        $builder->where('YEAR(books.created_at)', $tahun);
        $query = $builder->get();
        return $query->getResult();
    }
}
