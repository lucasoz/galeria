<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = "album";

    protected $fillable = ['name','description','user_id'];
    //fillable son los campos que quiero que traiga de la BD

    public function user(){
    	return $this -> belongsTo('App\User');//relacion uno a muchos con usuarios
    }

    public function images(){
    	return $this -> belongsToMany('App\Image')->withTimestamps();//relacion muchos a muchos con imagenes
    }
}
