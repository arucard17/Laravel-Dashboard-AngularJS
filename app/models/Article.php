<?php

// Model:'Article' - Database Table: 'Article'

class Article extends Eloquent
{

    protected $table='Articles';

    public $timestamps = false;

    protected $fillable = array('title', 'url', 'text');

    protected $guarded = array('id');

    public static $rules = array(
        'title'  => 'required',
        'url'    => 'required|url',
        'text'   => 'required'
    );

}
