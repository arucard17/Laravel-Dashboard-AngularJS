<?php

// Model:'Access' - Database Table: 'access'

class Access extends Eloquent
{

    protected $table='access';

    public $timestamps = false;

    protected $fillable = array('idRol', 'idMenu');

    protected $guarded = array('id');

    /**
     * Relation Rol
     * @return Query
     */
    public function rol()
    {
        return $this->belongsTo('Rol', 'idRol');
    }

    /**
     * Relation Menu
     * @return Query
     */
    public function menu()
    {
        return $this->belongsTo('Menu', 'idMenu');
    }
}
