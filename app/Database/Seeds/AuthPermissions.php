<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuthPermissions extends Seeder
{
	public function run()
	{
		$data = [
			'name' => 'edit-profile',
			'description' => 'Permission to edit profile',
		];
		
		$this->db->table('auth_permissions')->insert($data);
	}
}
