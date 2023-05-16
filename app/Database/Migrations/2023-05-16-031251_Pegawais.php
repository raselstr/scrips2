<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\RawSql;
use CodeIgniter\Database\Migration;

class Pegawais extends Migration
{
     public function up()
    {
        $this->forge->addField([
            'pegawai_id' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'pegawai_nip'       => [
                'type'          => 'VARCHAR',
                'constraint'    => '60',
                'unique'        => true,
            ],
            'pegawai_nama'      => [
                'type'          => 'VARCHAR',
                'constraint'    => '60',
            ],
            'pegawai_alamat'    => [
                'type'          => 'VARCHAR',
                'constraint'    => '60',
            ],
            'pegawai_info'      => [
                'type'          => 'TEXT',
            ],
            'opd_id'            => [
                'type'          => 'BIGINT',
                'constraint'    => '20',
                'unsigned'      => true,
            ],
            'created_at'        => [
                'type'          => 'TIMESTAMP',
                'default'       => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'updated_at'        => [
                'type'          => 'DATETIME',
                'null'          => true,
            ],
            'deleted_at'        => [
                'type'          => 'DATETIME',
                'null'          => true,
            ],
        ]);
        $this->forge->addKey('pegawai_id', true);
        $this->forge->addForeignKey('opd_id','opd','opd_id','', '', 'my_fk_opd');
        $this->forge->createTable('pegawais');
    }

    public function down()
    {
        $this->forge->dropForeignKey('pegawais','my_fk_opd');
        $this->forge->dropTable('pegawais');
    }
}
