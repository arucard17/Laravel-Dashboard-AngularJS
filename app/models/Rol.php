<?php

// Model:'Rol' - Database Table: 'rol'

class Rol extends Eloquent
{

    protected $table='rol';

    public $timestamps = false;

    protected $fillable = array('descripcion');

    protected $guarded = array('id');

    public function usuario()
    {
        return $this->hasMany('User', 'idRol');
    }

    public function accesos()
    {
        return $this->hasMany('Access', 'idRol');
    }
}
