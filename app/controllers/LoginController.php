<?php

use Underscore\Types\Arrays;

class LoginController extends BaseController {

    public function showLogin()
    {
        if(Auth::check())
            return Redirect::route('home');

        return View::make('login')
                ->with('title', 'Dashboard - Inicio de sesión');
    }

    public function login(){
        $inputs = Input::all();

        // Obtengo los datos del formulario
        $user = array(
            'username' => Input::get('username'),
            'password' => Input::get('password')
        );

        // Busco el usuario que está tratando de ingresar
        $_user = User::whereUsername($user['username'])->first();

        if(!$_user){
            return Redirect::route('login')
                ->with('error','<strong>Error!</strong> El usuario no existe.')
                ->withInput();
        }

        // Establezco las reglas para la validación de los campos
        $rules = array(
            'username' => 'required',
            'password' => 'required'
        );

        // Mensajes para los errores en la validación
        $messages = array(
            'required'    => 'El campo es obligatorio.',
        );

        // Valido la información pasando como parametro los datos, las reglas y los mensajes
        $validation = Validator::make($inputs,$rules, $messages);

        if($validation->fails()){

            return Redirect::route('login')
                ->with('error','<strong>Error!</strong> Verifique los campos antes de continuar.')
                ->withInput();
        }else{

            if (Auth::attempt($user)){
                return Redirect::intended('/');
            }else{
                return Redirect::route('login')
                    ->with('error','<strong>Error!</strong> el usuario y/o contraseña son incorrectas.')
                    ->withInput();
            }

        }
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::route('home');
    }

}