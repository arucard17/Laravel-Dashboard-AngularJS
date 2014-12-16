<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		DB::table('access')->delete();
		DB::table('menu')->delete();
		DB::table('user')->delete();
		DB::table('rol')->delete();

		$this->call('RolTableSeeder');
		$this->command->info('Se han registrado los roles!');
		$this->call('UserTableSeeder');
		$this->command->info('Se ha registrado el usuario administrador !');
		$this->call('MenuTableSeeder');
		$this->command->info('Se han registrado algunos elementos del menú!');
	}

}
