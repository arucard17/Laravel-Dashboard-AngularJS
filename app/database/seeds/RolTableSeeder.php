<?php

class RolTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        // Roles
        $roles = array(
            array( 'id' => 1, 'description' => 'Administrador'),
            array( 'id' => 2, 'description' => 'Usuario')
        );

        foreach ($roles as $key => $rol) {
            Rol::create($rol);
        }

    }

}
