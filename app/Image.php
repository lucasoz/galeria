<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Album;
use App\User;
use Laracasts\Flash\Flash;

class Image extends Model
{
    protected $table = 'image';

    protected $filleable = ['id', 'id_owner', 'route', 'description', 'title'];

    public function albums(){
    	return $this -> belongsToMany('App\Album')->withTimestamps();
    }

    public static function traerAlbumes($usuario){
    	if($usuario->type == "admin"){
            $albumes = Album::orderBy('id', 'ASC')->lists('name', 'id');
        }
        else{
            $user_id = \Auth::user()->id;
            $albumes = Album::where('user_id', $user_id)->orderBy('id', 'ASC')->get()->lists('name', 'id');
        }
        return $albumes;
    }

    public static function crearImagen($request){
    	$file = $request->file('image');
        $name = 'imagen_' . time() . '.' . $file->getClientOriginalExtension();
        $path = public_path() . '\images';
        $file->move($path, $name);
        
        $image = new Image();
        $image->route = $name;
        $id_owner = \Auth::user()->id;
        $image->id_owner = $id_owner; 
        $image->description = $request->description;
        $image->title = $request->title;
        $image->save();
        
        //hacer aquí el foreach
        $albumes = $request->albumes_id;
        foreach ($albumes as $album) {
            $relacion = new album_image();
            $numero = DB::table('album_image')->where('id_album',$album)->count();
            $relacion->orderNumber = $numero + 1;
            $relacion->id_image = $image->id;
            $relacion->id_album = $album;
            $relacion->save();
        }

        Flash::success("Se ha creado la imagen ".$image->title. " de forma exitosa");
    }

    public static function traerImagenes($id){
    	return DB::table('image')->join('album_image' , 'image.id', '=', 'album_image.id_image')->select('image.*', 'album_image.*')->where('id_album', $id)->orderBy('orderNumber')->get();
    }

    public static function editarImagen($request,$id){
    	$image = Image::find($id);
        //también se puede usar $user->fill($request->all());
        $image->description = $request->description;
        $image->title = $request->title;
        $image->save();
        Flash::warning('La imagen '.$image->title.' ha sido editada con exito!');
    }

    public static function traerNumeros($id_album){
    	return DB::table('album_image')->where('id_album',$id_album)->orderBy('orderNumber', 'ASC')->lists('orderNumber', 'orderNumber', 'id_album');
    }

    public static function cambiarOrden($request){
    	$image = $request->idi;//id imagen
        $album = $request->ida;//id album
        $numeron = $request->numeros_disponibles;//numero nuevo
        $numerov = DB::table('album_image')->select('orderNumber')->where('id_album',$album)->where('id_image',$image)->get();//numero viejo
        //hasta aquí está bueno
        $cantidad = DB::table('album_image')->where('id_album',$album)->count();
        
        

        DB::table('album_image')->where('id_album', $album)->where('orderNumber',$numeron[0])->update(['orderNumber' => $numerov[0]->orderNumber + $cantidad]);

        DB::table('album_image')->where('id_album', $album)->where('orderNumber',$numerov[0]->orderNumber)->update(['orderNumber' => $numeron[0] + $cantidad]);

        DB::table('album_image')->where('id_album', $album)->where('orderNumber',$numeron[0] + $cantidad)->update(['orderNumber' => $numeron[0]]);

        DB::table('album_image')->where('id_album', $album)->where('orderNumber',$numerov[0]->orderNumber + $cantidad)->update(['orderNumber' => $numerov[0]->orderNumber]);
        
        $image1 = Image::find($image);
        Flash::warning('La imagen '.$image1->title.' ha sido modificada con exito!');
        return $album;
    }

}


