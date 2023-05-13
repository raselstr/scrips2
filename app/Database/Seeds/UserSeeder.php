<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'user_nama'         => 'rahmad',
                'user_email'        => 'test2@gmail.com',
                'user_password'     => password_hash('rahmad', PASSWORD_BCRYPT),
            ],
            [
                'user_nama'         => 'rudi',
                'user_email'        => 'test1@gmail.com',
                'user_password'     => password_hash('rudi', PASSWORD_BCRYPT),
            ],
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
