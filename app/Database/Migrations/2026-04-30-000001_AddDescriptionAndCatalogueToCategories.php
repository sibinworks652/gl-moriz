<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDescriptionAndCatalogueToCategories extends Migration
{
    public function up()
    {
        $this->forge->addColumn('categories', [
            'description' => [
                'type' => 'TEXT',
                'null' => true,
                'after' => 'thumbnail',
            ],
            'catalogue_file' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'after' => 'description',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('categories', ['description', 'catalogue_file']);
    }
}
