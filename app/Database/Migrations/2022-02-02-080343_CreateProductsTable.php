<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProductsTable extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true,
			],
			'name' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'price' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
			],
			'description' => [
				'type' => 'TEXT',
			],
			'image' => [
				'type' => 'TEXT',
			],	
			'status' => [
				'type' => 'ENUM',
				'constraint' => ['Pre Order', 'In Stock', 'Sold Out'],
			],
			'seller_id' => [
				'type' => 'INT',
				'constraint' => 11, 
				'unsigned' => true,
			],
		]);

		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('seller_id', 'users', 'id', 'CASCADE');
		$this->forge->createTable('products');
	}

	public function down()
	{
        //
	}
}
