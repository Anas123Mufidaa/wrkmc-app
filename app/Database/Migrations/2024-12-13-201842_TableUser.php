<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableUser extends Migration
{
    // public function up()
    // {
    //     $this->forge->addField([
    //         'id_user' => [
    //             'type'           => 'INT',
    //             'constraint'     => 11,
    //             'unsigned'       => true,
    //             'auto_increment' => true,
    //         ],
    //         'nama_user' => [
    //             'type'       => 'VARCHAR',
    //             'constraint' => '100',
    //             'null' => true,
    //         ],      
    //         'username' => [
    //             'type'       => 'VARCHAR',
    //             'constraint' => '100',
    //         ],      
    //         'password' => [
    //             'type'       => 'VARCHAR',
    //             'constraint' => '100',
    //         ],      
    //         'foto_user' => [
    //             'type'       => 'VARCHAR',
    //             'constraint' => '255',
    //         ],
    //         'created_at' => [
    //             'type' => 'DATETIME',
    //         ],
    //         'updated_at' => [
    //             'type' => 'DATETIME'
    //         ]
    //     ]);
    //     $this->forge->addKey('id_user', true);
    //     $this->forge->createTable('user');
    // }

    public function down()
    {
        //
    }
}
