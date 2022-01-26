<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Portfolio extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_portfolio' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'order_details_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'project_id'       => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true
            ],
            'description'      => [
                'type'           => 'TEXT',
            ],
        ]);

        $this->forge->addKey('id_portfolio', true);
        $this->forge->addForeignKey('order_details_id', 'order_details', 'id_order_details');
        $this->forge->addForeignKey('project_id', 'project', 'id_project');
        $this->forge->createTable('portfolio');
    }

    public function down()
    {
        $this->forge->dropTable('portfolio');
    }
}
