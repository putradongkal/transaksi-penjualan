<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Barang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kode_barang' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'unique'     => true
            ],
            'nama_barang' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'harga' => [
                'type'       => 'DOUBLE'
            ],
            'id_supplier' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'id_user' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'created_at' => [
                'type'    => 'TIMESTAMP',
                'null'    => true,
            ],
            'updated_at' => [
                'type'    => 'TIMESTAMP',
                'null'    => true,
            ],
            'deleted_at' => [
                'type'    => 'TIMESTAMP',
                'null'    => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('barang');
    }

    public function down()
    {
        $this->forge->dropTable('barang');
    }
}
