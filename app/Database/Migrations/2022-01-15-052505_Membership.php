<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Membership extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_membership' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true
            ],
            'customer_id' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true
            ],
            'membership_name'   =>  [
                'type'              => 'VARCHAR',
                'constraint'        => 255
            ],
            'price'             => [
                'type'              => 'VARCHAR',
                'constraint'        => 255
            ],
            'duration'          =>  [
                'type'              => 'VARCHAR',
                'constraint'        => 255
            ],
            'delivery_time'     => [
                'type'              => 'VARCHAR',
                'constraint'        => 255
            ]
        ]);
        
        $this->forge->addKey('id_membership', true);
        $this->forge->addForeignKey('customer_id', 'customer', 'id_customer');
        $this->forge->createTable('membership');
    }

    public function down()
    {
        $this->forge->dropTable('membership');
    }
}
