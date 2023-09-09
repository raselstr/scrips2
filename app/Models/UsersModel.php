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
    protected $allowedFields    = ['user_nama','user_email','user_password','user_info','user_active'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'user_nama'         => 'required|alpha_numeric_space',
        'user_email'        => 'required|valid_email|is_unique[users.user_email]',
        'user_password'     => 'required|min_length[3]',
        // 'pass_confirm'      => 'required_with[user_password]|matches[user_password]',
    ];
    protected $validationMessages   = [
        'user_nama'    => [
            'required'              => 'Nama tidak Boleh Kosong',
            'alpha_numeric_space'   => 'Tanpa menggunakan spesial karakter',
        ],
        'user_email' => [
            'required'              => 'Email harus diisi dengan format email menggunakan @',
            'is_unique'             => 'Sorry. That email has already been taken. Please choose another.',
        ],
        'user_password' => [
            'required'              => 'Password tidak boleh kosong',
            // 'min_length[3]'         => 'Panjang Password tidak boleh lebih dari 3',
        ],
        // 'pass_confirm' => [
        //     'required_with[user_password]' => 'Password Tidak sama',
        // ],

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
