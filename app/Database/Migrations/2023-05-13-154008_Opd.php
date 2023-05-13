<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\RawSql;
use CodeIgniter\Database\Migration;

class Opd extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'opd_id' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'opd_kode' => [
                'type'       => 'VARCHAR',
                'constraint' => '60',
                'unique'     => true,
            ],
            'opd_nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '60',
            ],
            'created_at' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'updated_at' => [
                'type'      => 'DATETIME',
                'null'      => true,
            ],
            'deleted_at' => [
                'type'    => 'DATETIME',
                'null'      => true,
            ],
        ]);
        $this->forge->addKey('opd_id', true);
        $this->forge->createTable('opd');
    }

    public function down()
    {
        $this->forge->dropTable('opd');
    }
}
