<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Order extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_order'  => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true
            ],
            'membership_id'   => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true
            ],
            'project_id'  => [
                'type'          => 'INT',
                'constraint'    => 11,
                'unsigned'      => true
            ],
            'quantity' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255'
            ],
            'total_price' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255'
            ],
        ]);
        $this->forge->addKey('id_order', true);
        $this->forge->addForeignKey('membership_id', 'membership', 'id_membership');
        $this->forge->addForeignKey('project_id', 'project', 'id_project');
        $this->forge->createTable('order');
    }

    public function down()
    {
        $this->forge->dropTable('order');
    }
}
