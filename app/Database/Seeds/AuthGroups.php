<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuthGroups extends Seeder
{
	public function run()
	{
		$data = [
			'name' => 'admin',
			'description' => 'Role Administrator',
		];

		$this->db->table('auth_groups')->insert($data);

		$data = [
			'name' => 'partner',
			'description' => 'Role Partner',
		];

		$this->db->table('auth_groups')->insert($data);

		$data = [
			'name' => 'user',
			'description' => 'Role User',
		];
		
		$this->db->table('auth_groups')->insert($data);
	}
}
