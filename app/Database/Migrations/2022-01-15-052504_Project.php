<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Project extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_project'    =>  [
                'type'  => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true
            ],
            'project_category_id'   =>  [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true
            ],
            'customer_id'   =>  [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true
            ],
            'project_name'  =>  [
                'type'              => 'VARCHAR',
                'constraint'        =>  255,
            ],
            'requirements'  =>  [
                'type'              => 'TEXT',
            ]
        ]);
        $this->forge->addKey('id_project', true);
        $this->forge->addForeignKey('project_category_id', 'project_category', 'id_project_category');
        $this->forge->addForeignKey('customer_id', 'customer', 'id_customer');
        $this->forge->createTable('project');
    }

    public function down()
    {
        $this->forge->dropTable('project');
    }
}
