<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Customer extends Migration
{
    public function up()
    {
        // $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            'id_customer'    => [
                'type'              => 'INT',
                'constraint'        => 255,
                'unsigned'          => true,
                'auto_increment'    => true
            ],
            'email'         => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'password'      => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
            ],
            'name'          => [
                'type'          => 'VARCHAR',
                'constraint'    => '255'
            ],
            'address'       => [
                'type'          => 'TEXT',
                'null'          => true,
            ],
            'phone_number'  => [
                'type'          => 'VARCHAR',
                'constraint'    => '255'
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP'
    ]);

    $this->forge->addKey('id_customer', true);

    $this->forge->createTable('customer');
    // $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('customer');
    }
}
