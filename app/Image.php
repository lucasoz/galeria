<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'image';

    protected $filleable = ['id', 'id_owner', 'route', 'description', 'title', 'comments'];

    public function albums(){
    	return $this -> belongsToMany('App\Album')->withTimestamps();
    }
}

