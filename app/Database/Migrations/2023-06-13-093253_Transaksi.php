<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transaksi extends Migration
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
            'nomor_transaksi' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'tanggal' => [
                'type'       => 'DATE',
            ],
            'id_user' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'qty' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'harga' => [
                'type'       => 'DOUBLE'
            ],
            'total' => [
                'type'       => 'DOUBLE'
            ],
            'id_supplier' => [
                'type'       => 'INT',
            ],
            'id_barang' => [
                'type'       => 'INT',
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
        $this->forge->createTable('transaksi');
    }

    public function down()
    {
        $this->forge->dropTable('transaksi');
    }
}
