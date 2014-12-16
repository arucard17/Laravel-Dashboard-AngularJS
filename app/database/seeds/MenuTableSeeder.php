<?php

class MenuTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        // Menu
        $menus = array(
            array(
                'name'      => 'Navigation',
                'shortcut'  => '',
                'icon'      => '',
                'parent'    => null,
                'rol'       => 1,
                'sub'       => array(
                                    array(
                                        'name'      => 'Dashboard',
                                        'shortcut'  => '',
                                        'icon'      => 'fa fa-tachometer'
                                    ),
                                    array(
                                        'name'      => 'Pais',
                                        'shortcut'  => 'pais',
                                        'icon'      => 'fa fa-flag'
                                    )
                                )
            ),
            array(
                'name'      => 'Quick Links',
                'shortcut'  => '',
                'icon'      => '',
                'parent'    => null,
                'rol'       => 1,
                'sub'       => array(
                                    array(
                                        'name'      => 'Forums',
                                        'shortcut'  => '',
                                        'icon'      => 'fa fa-external-link'
                                    )
                                )
            ),
            array(
                'name'      => 'Administrador',
                'shortcut'  => '',
                'icon'      => '',
                'parent'    => null,
                'rol'       => 1,
                'sub'       => array(
                                    array(
                                        'name'      => 'Menú',
                                        'shortcut'  => 'menu',
                                        'icon'      => 'fa fa-reorder'
                                    ),
                                    array(
                                        'name'      => 'Roles',
                                        'shortcut'  => 'roles',
                                        'icon'      => ''
                                    )
                                )
            ),
        );

        foreach ($menus as $key => $menu) {

            $_menu = new Menu();

            $_menu->name = $menu['name'];
            $_menu->shortcut = $menu['shortcut'];
            $_menu->icon = $menu['icon'];
            $_menu->parent = $menu['parent'];
            $_menu->order = $key+1;

            $_menu->save();

            if($_menu){

                $this->createAccess($_menu);

                foreach ($menu['sub'] as $keysub => $_submenu) {

                    $_newSubMenu = new Menu();

                    $_newSubMenu->name = $_submenu['name'];
                    $_newSubMenu->shortcut = $_submenu['shortcut'];
                    $_newSubMenu->icon = $_submenu['icon'];
                    $_newSubMenu->parent = $_menu->id;
                    $_newSubMenu->order = $keysub+1;

                    $_newSubMenu->save();

                    if($_newSubMenu)
                        $this->createAccess($_newSubMenu);
                }
            }

        }

    }

    public function createAccess($menu)
    {
        $access = new Access();

        $access->idMenu = $menu->id;
        $access->idRol = 1;

        $access->save();

    }

}
