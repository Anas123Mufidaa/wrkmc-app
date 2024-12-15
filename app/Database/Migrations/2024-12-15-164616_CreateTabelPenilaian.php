<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTabelPenilaian extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_penilaian' => [
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
            'id_sda' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],           
            'tanggal_penilaian' => [
                'type'       => 'DATE',
            ],  
            'nilai_kinerja' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],            
            'catatan_penilaian' => [
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
        $this->forge->addKey('id_penilaian', true);
        $this->forge->createTable('penilaian_sda');
    }

    public function down()
    {
        //
    }
}
