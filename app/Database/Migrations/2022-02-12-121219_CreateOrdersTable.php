<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOrdersTable extends Migration
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
			'trx_id' => [
				'type' => 'varchar',
				'constraint' => 255,
			],
			'total_price' => [
				'type' => 'bigint',
			],
			'order_date' => [
				'type' => 'datetime',
			],
			'payment_date' => [
				'type' => 'datetime',
			],
			'status' => [
				'type' => 'enum',
				'constraint' => ['Waiting for Payment', 'Paid', 'Proceed', 'Delivered', 'Success', 'Canceled'],
				'default' => 'Waiting for Payment',
			],
		]);

		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE');
		$this->forge->createTable('orders');
	}

	public function down()
	{
        //
	}
}
