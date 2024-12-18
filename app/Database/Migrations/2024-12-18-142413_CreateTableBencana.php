<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateTableBencana extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_bencana' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_created' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],         
            'jenis_kejadian' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],           
            'hari_kejadian' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'tanggal_kejadian' => [
                'type'       => 'DATE',
            ],       
            'waktu_kejadian' => [
                'type'       => 'TIME',
                'null'       => true,
            ], 
            'hari_kejadian' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],    
            'penyebab_kronologis' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'curahHujan_PosAir' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => true,
            ],  
            'dampak_bencana' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'lama_bahaya' => [
                'type'       => 'VARCHAR',
                'constraint' => '50', 
                'null'       => true,
            ],  
            'tindakan' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'kondisi' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'usulan' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],  
            'tebusan' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],          
            'created_at' => [
                'type'      => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP')
            ],
            'updated_at' => [
                'type'      => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP')
            ]
        ]);
        $this->forge->addKey('id_bencana', true);
        $this->forge->createTable('bencana');
    }

    public function down()
    {
        //
    }
}
