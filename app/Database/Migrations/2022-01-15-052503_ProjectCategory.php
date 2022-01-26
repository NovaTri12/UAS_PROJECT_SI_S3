<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProjectCategory extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_project_category' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true
            ],
            'category_name' => [
                'type'          => 'VARCHAR',
                'constraint'    =>  '255'
            ]
        ]);
        $this->forge->addKey('id_project_category', true);
        $this->forge->createTable('project_category');
    }

    public function down()
    {
        $this->forge->dropTable('project_category');
    }
}
