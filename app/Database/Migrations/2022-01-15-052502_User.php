<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user'     => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true 
            ],
            'username'    => [
                'type'              => 'VARCHAR',
                'constraint'        => 255,      
            ],
            'password'    => [
                'type'              => 'VARCHAR',
                'constraint'        => 255,      
            ],
            'name'    => [
                'type'              => 'VARCHAR',
                'constraint'        => 255,      
            ],
            'email'    => [
                'type'              => 'VARCHAR',
                'constraint'        => 255,      
            ],
            'address'    => [
                'type'              => 'text',
                'null'              => true     
            ],
            'role'    => [
                'type'              => 'INT',
                'constraint'        => 1,      
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);

        $this->forge->addKey('id_user', true);
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
