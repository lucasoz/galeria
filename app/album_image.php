<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class album_image extends Model
{
    protected $table = "album_image";

    protected $fillable = ['orderNumber','id_image','id_album'];
    //fillable son los campos que quiero que traiga de la BD
}
