<?php

use Underscore\Types\Arrays;

class MenuController extends BaseController {

    /*
    |--------------------------------------------------------------------------
    | Menú Controller
    |--------------------------------------------------------------------------
    |
    */

    public function all()
    {

        // $menu = $this->_toArray(Menu::all());
        $menu = Auth::user()->rol->accesos;

        $menus = array();

        $menu->load('menu');

        $menu=$this->_toArray($menu);
        // exit;

        foreach ($menu as $key => $m) {
            // var_dump($this->_toArray($m['menu']));
            array_push($menus, $m['menu']);
        }

        // var_dump($menus);

        // $menu = $this->_toArray($menu);
        $response = [];

        $parents = Arrays::filter($menus, function($m) {
            return !$m['parent'];
        });

        foreach ($parents as $key => $parent) {
            $idmenu = $parents[$key]['id'];

            $parents[$key]['submenus'] =  array_values(Arrays::filter($menus, function($m) use (&$idmenu){
                return $idmenu == $m['parent'];
            }));

            array_push($response, $parents[$key]);
        }

        return Response::json($response);
    }

    public function create()
    {
        # code...
    }


    public function update($id)
    {
        # code...
    }


    public function delete($id)
    {
        # code...
    }


}