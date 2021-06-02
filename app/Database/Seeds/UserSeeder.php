<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
	public function run()
	{
		// //mengisi satu data
		// $data = [
		// 	'name_user' 	=> 'aditya',
		// 	'email_user' 	=> 'm.aditya3232@gmail.com',
		// 	'password_user' => password_hash('12345', PASSWORD_BCRYPT), //generate password dgn BCRYPT

		// ];

		// mengisi banyak data
		$data = [
			[
				'name_user' 	=> 'aditya',
				'email_user' 	=> 'm.aditya3232@gmail.com',
				'password_user' => password_hash('12345', PASSWORD_BCRYPT), 
			],
			[
				'name_user' 	=> 'diqi',
				'email_user' 	=> 'iashiddiqi13@gmail.com',
				'password_user' => password_hash('323232', PASSWORD_BCRYPT), 
			],
		];

		// jalankan query builder ini untuk memasukkan 1 data
		// $this->db->table('users')->insert($data);

		// jalankan query builder ini untuk memasukkan banyak data
		$this->db->table('users')->insertBatch($data);
	}
}