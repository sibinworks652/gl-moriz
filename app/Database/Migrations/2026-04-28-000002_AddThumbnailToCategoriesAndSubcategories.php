<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddThumbnailToCategoriesAndSubcategories extends Migration
{
    public function up()
    {
        $this->forge->addColumn('categories', [
            'thumbnail' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'after'      => 'slug',
            ],
        ]);

        $this->forge->addColumn('subcategories', [
            'thumbnail' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'after'      => 'slug',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('categories', 'thumbnail');
        $this->forge->dropColumn('subcategories', 'thumbnail');
    }
}
