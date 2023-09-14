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

    // // Validation
    // protected $validationRules      = [
    //     'user_nama'         => 'required|alpha_numeric_space',
    //     'user_email'        => 'required|valid_email|is_unique[users.user_email]',
    //     'user_password'     => 'required|min_length[3]|max_length[60]',
    //     'pass_confirm'      => 'required_with[user_password]|matches[user_password]',
    // ];
    // protected $validationMessages   = [
    //     'user_nama'    => [
    //         'required'              => 'Nama tidak Boleh Kosong',
    //         'alpha_numeric_space'   => 'Tanpa menggunakan spesial karakter',
    //     ],
    //     'user_email' => [
    //         'required'              => 'Email harus diisi dengan format email menggunakan @',
    //         'valid_email'           => 'Email tidak Valid',
    //         'is_unique'             => 'Maaf. Email sudah digunakan. Silahkan gunakan email lainnya.',
    //     ],
    //     'user_password' => [
    //         'required'              => 'Password tidak boleh kosong',
    //         'min_length'            => '{field} minimal {param} karakter',
    //         'max_length'            => 'Panjang {field} tidak boleh melebihi {param}',
    //     ],
    //     'pass_confirm' => [
    //         'required_with'         => 'Kompirmasi {field} harus diisi',
    //         'matches'               => 'Password Tidak sama dengan {param}',
    //     ],

    // ];
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

    // public function validateData($data)
    // {
    //     if (!$this->validate($this->validationRules, $this->validationMessages)) {
    //         return $this->validation->getErrors();
    //     } else {
    //         return null; // Data valid
    //     }
    // }

    // public function saveUser($data)
    // {
    //     $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
    //     return $this->save($data);
    // }

    // protected function hashPassword(array $data)
    // {
    //     if (isset($data['data']['password'])) {
    //         $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
    //     }
    //     return $data;
    // }
    // // protected function hashPassword(array $data)
    // // {
    // //     if (isset($data['data']['password'])) {
    // //         $data['data']['password_hash'] = password_hash($data['data']['password'], PASSWORD_BCRYPT);
    // //         unset($data['data']['password']);
    // //         unset($data['data']['password_confirm']);
    // //     }

    // //     return $data;
    // }
}
