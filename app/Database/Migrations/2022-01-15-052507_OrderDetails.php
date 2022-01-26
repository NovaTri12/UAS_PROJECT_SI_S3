<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OrderDetails extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_order_details'  => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true
            ],
            'customer_id'   => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true
            ],
            'order_id'  => [
                'type'          => 'INT',
                'constraint'    => 11,
                'unsigned'      => true
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'status'    => [
                'type'          => 'INT',
                'constraint'    => 1
            ],
        ]);
        $this->forge->addKey('id_order_details', true);
        $this->forge->addForeignKey('customer_id', 'customer', 'id_customer');
        $this->forge->addForeignKey('order_id', 'order', 'id_order');
        $this->forge->createTable('order_details');
    }

    public function down()
    {
        $this->forge->dropTable('order_details');
    }
}
