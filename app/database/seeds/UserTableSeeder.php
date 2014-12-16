<?php

class UserTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Admin
        $user = new User();

        $user->id       = 1;
        $user->name   = 'Admin';
        $user->last = 'istrador';
        $user->username     = 'admin';
        $user->password = Hash::make('123456');
        $user->idRol   = 1;

        $user->save();

    }

}
