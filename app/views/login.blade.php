@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-5 form-login">
                <form action="/login" method="POST" role="form" class="form-horizontal">
                    <legend>Inicio de Sesión</legend>
                    @if (Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="username" class="col-sm-3 control-label">Usuario</label>
                        <div class="col-sm-9">
                            <input id="username" type="text" name="username" placeholder="Nombre de Usuario" value="{{ Input::old('username'); }}" class="form-control" autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-3 control-label">Contraseña</label>
                        <div class="col-sm-9">
                            <input id="password" type="password" name="password" placeholder="Contraseña" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-10">
                            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop