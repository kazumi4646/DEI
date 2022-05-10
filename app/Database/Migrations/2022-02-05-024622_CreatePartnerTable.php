<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePartnerTable extends Migration
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
			'username' => [
				'type' => 'varchar',
				'constraint' => 30,
			],
			'name' => [
				'type' => 'varchar',
				'constraint' => 255,
			],
			'no_ktp' => [
				'type' => 'int',
				'constraint' => 11,
			],
			'no_kk' => [
				'type' => 'int',
				'constraint' => 11,
			],
			'province' => [
				'type' => 'text',
			],
			'city' => [
				'type' => 'text',
			],
			'kecamatan' => [
				'type' => 'text',
			],
			'desa' => [
				'type' => 'text',
			],
			'komoditas' => [
				'type' => 'int',
				'constraint' => 11,
			],
			'populasi' => [
				'type' => 'int',
				'constraint' => 11,
			],
			'luas_lahan' => [
				'type' => 'int',
				'constraint' => 11,
			],
			'jumlah_panen' => [
				'type' => 'int',
				'constraint' => 11,
			],
		]);

		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('username', 'users', 'username', 'CASCADE', 'CASCADE');
		$this->forge->createTable('mitra');
	}

	public function down()
	{
        //
	}
}
