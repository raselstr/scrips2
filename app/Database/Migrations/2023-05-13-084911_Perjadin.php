<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\RawSql;
use CodeIgniter\Database\Migration;

class Perjadin extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_perjadin' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'tgl_berangkat' => [
                'type'    => 'date',
            ],
            'lama_perjadin' => [
                'type'    => 'INT',
            ],
            'tujuan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'kab_kota_tujuan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'keperluan' => [
                'type' => 'TEXT',
            ],
            'info_tambahan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'update_at' => [
                'type'    => 'DATETIME',
             ],
            'delete_at' => [
                'type'    => 'DATETIME',
            ],
        ]);
        $this->forge->addKey('id_perjadin', true);
        $this->forge->createTable('perjadin');
    }

    public function down()
    {
        $this->forge->dropTable('perjadin');
    }
}
