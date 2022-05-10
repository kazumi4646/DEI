<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCartsTable extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'int',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true,
			],
			'user_id' => [
				'type' => 'int',
				'constraint' => 11, 
				'unsigned' => true,
			],
			'product_id' => [
				'type' => 'int',
				'constraint' => 11, 
				'unsigned' => true,
			],
		]);

		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('product_id', 'products', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('carts');
	}

	public function down()
	{
        //
	}
}
