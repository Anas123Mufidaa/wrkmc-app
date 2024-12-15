<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTabelSda extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_sda' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_created' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],            
            'user_updated' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],            
            'nama_sda' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],           
            'jenis_sda' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],  
            'alamat' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],            
            'gambar_sda' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],            
            'deskripsi_sda' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],  
            'created_at' => [
                'type'      => 'DATETIME',
            ],
            'updated_at' => [
                'type'      => 'DATETIME',
            ]
        ]);
        $this->forge->addKey('id_sda', true);
        $this->forge->createTable('sda');
    }

    public function down()
    {
        //
    }
}
