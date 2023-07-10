<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'students';
    protected $primaryKey       = 'id_siswa';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_siswa', 'nama_siswa', 'username', 'password', 'created_at', 'updated_at'
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

    // make relation with registration table
    public function getRegistration()
    {
        return $this->db->table('registrations')
            ->join('students', 'registrations.id_siswa = students.id_siswa')
            ->orderBy('registrations.created_at', 'DESC')
            ->get()->getResult();
    }

    public function getStudentRegistrationById($id)
    {
        return $this->db->table('registrations')
            ->join('students', 'registrations.id_siswa = students.id_siswa')
            ->where('registrations.id_siswa', $id)
            ->orderBy('registrations.created_at', 'DESC')
            ->get()->getRow();
    }
}
