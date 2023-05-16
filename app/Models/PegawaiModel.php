<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pegawais';
    protected $primaryKey       = 'pegawai_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    // protected $protectFields    = true;
    protected $allowedFields    = ['pegawai_nip','pegawai_nama','pegawai_alamat','pegawai_info','opd_id'];

    // Dates
    protected $useTimestamps = true;
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

    function getAll()
    {
        $builder = $this->db->table('pegawais');
        $builder->join('opd','opd.opd_id = pegawais.opd_id');
        $query = $builder->getWhere(['pegawais.deleted_at' => null]);
        return $query->getResult();

    }
}
