<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $filleable = ['id', 'comment', 'id_owner', 'id_album', 'orderNumber'];

	public function album_image(){
    	return $this -> belongsTo('App\album_image')->withTimestamps();
    }   

    public function user(){
    	return $this -> belongsTo('App\User');//relacion uno a muchos con usuarios
    }
}