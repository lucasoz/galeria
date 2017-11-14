<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Album;
use App\User;
use Laracasts\Flash\Flash;


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

    public static function traerAlbumes($usuario){
    	
    	if($usuario->type == "admin"){
            return DB::table('users')->join('album' , 'users.id', '=', 'album.user_id')->select('users.*', 'users.name as nameuser', 'album.*')->paginate(5);
        }
        elseif($usuario->type == "premium"){
            return DB::table('users')->join('album' , 'users.id', '=', 'album.user_id')->select('users.*', 'users.name as nameuser', 'album.*')->where('type', '=', 'member')->orWhere('type', '=', 'premium')->paginate(5);
        }
        else{
            $user_id = $usuario->id;
            //$albumes = Album::where('user_id', $user_id)->orderBy('id', 'ASC')->get()->lists('name', 'id');
            return DB::table('users')->join('album' , 'users.id', '=', 'album.user_id')->select('users.*','users.name as nameuser','album.*')->where('type', '=', 'member')->paginate(5);
        }
        
    }

    public static function crearAlbum($request){
    	$album = new Album($request->all());
        $album->user_id = \Auth::user()->id;
        $album->save();
        Flash::success('El album ' . $album->name . ' ha sido creado con exito!');
        
    }

    public static function actualizarAlbum($request,$id){
    	$album = Album::find($id);
        $album->name = $request->name;
        $album->description = $request->description;
        $album->save();
        Flash::warning('El album '.$album->name.' ha sido editado con exito!');
    }

    public static function eliminarAlbum($id){
    	$album = Album::find($id);
        $album->delete();
        Flash::error('El album '.$album->name.' se borro de forma exitosa');
    }

   
}
