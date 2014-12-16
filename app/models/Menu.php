<?php

// Model:'Menu' - Database Table: 'menu'

class Menu extends Eloquent
{

    protected $table='menu';

    public $timestamps = false;

    protected $fillable = array('descripcion');

    protected $guarded = array('id');

    public function accesos()
    {
        return $this->hasMany('Acceso', 'idMenu');
    }
}
