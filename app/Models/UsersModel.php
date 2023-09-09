<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'user_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_nama','user_email','user_password','user_info'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'user_nama'         => 'required|max_length[30]|alpha_numeric_space|min_length[3]',
        'user_email'        => 'required|max_length[254]|valid_email|is_unique[users.user_email]',
        'user_password'     => 'required|max_length[255]|min_length[8]',
        // 'pass_confirm'      => 'required_with[user_password]|max_length[255]|matches[user_password]',
    ];
    protected $validationMessages   = [
        'user_nama'    => [
            'required'      => 'Nama tidak Boleh Kosong',
        ],
        'user_email' => [
            'is_unique' => 'Sorry. That email has already been taken. Please choose another.',
        ],
    ];
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
}
