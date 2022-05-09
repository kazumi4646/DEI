<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProductsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'product_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'product_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'product_price' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'product_description' => [
                'type' => 'TEXT',
            ],
            'product_image' => [
                'type' => 'TEXT',
            ],
            'product_status' => [
                'type' => 'ENUM',
                'constraint' => "'Active','Inactive'",
                'default' => 'Active',
            ],
            'product_category' => [
                'type' => 'ENUM',
                'constraint' => "'Pre Order','Regular'",
                'default' => 'Regular',
            ],
            'product_by' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);
        $this->forge->addKey('product_id',TRUE);        
        $this->forge->createTable('products');
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}
