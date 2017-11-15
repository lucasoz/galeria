<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Image;
use App\Album;
use App\Comment;
use DB;
use Laracasts\Flash\Flash;

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
    public static function crearComentario($request){
    	$com = new Comment();
        $com->comment = $request->comentario;
        $com->id_owner = \Auth::user()->id;
        $com->id_album = $request->album;
        $orden = DB::table('album_image')->select('orderNumber')->where('id_album',$request->album)->where('id_image',$request->image)->get();
        $com->orderNumber = $orden[0]->orderNumber;
        
        $com->save();
        Flash::success('La imagen ha sido comentada con exito!');
    }

    public static function traerComentarios($id_album,$id_image){
    	
        $orden = DB::table('album_image')->select('orderNumber')->where('id_album',$id_album)->where('id_image',$id_image)->get();
        //$comentarios = Comment::where('id_album', $album)->where('orderNumber',$orden[0]->orderNumber)->orderBy('id', 'ASC')->get()->lists('comment', 'id_owner');
        $comentarios = DB::table('comments')->join('users','comments.id_owner','=','users.id')->select('comments.*','users.*')->where('comments.id_album', $id_album)->where('comments.orderNumber',$orden[0]->orderNumber)->orderBy('comments.id', 'ASC')->get();
        return $comentarios;
    }
}