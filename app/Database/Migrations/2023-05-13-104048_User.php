<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '60',
            ],
            'user_email' => [
                'type'       => 'VARCHAR',
                'constraint' => '60',
            ],
            'user_password' => [
                'type'       => 'VARCHAR',
                'constraint' => '60',
            ],
            'user_info' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('user_id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
