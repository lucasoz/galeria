<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ImageRequest;
use App\Album;
use App\User;
use App\Image;
use App\album_image;
use DB;
use Laracasts\Flash\Flash;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(\Auth::user()->type == "admin"){
            $albumes = Album::orderBy('id', 'ASC')->lists('name', 'id');
        }
        else{
            $user_id = \Auth::user()->id;
            $albumes = Album::where('user_id', $user_id)->orderBy('id', 'ASC')->get()->lists('name', 'id');
        }
        return view('admin.images.create')->with('albumes',$albumes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        
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
        $image->comments = $request->comments;
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
        return redirect()->route('admin.albumes.index');     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)//aqui se muestran las imagenes
    {
        $images = DB::table('image')->join('album_image' , 'image.id', '=', 'album_image.id_image')->select('image.*', 'album_image.*')->where('id_album', $id)->get();
        $album = Album::find($id);
        return view('admin.images.show', ['images' => $images, 'album' => $album]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $image = Image::find($id);
        return view('admin.images.edit')->with('image',$image);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image = Image::find($id);
        //también se puede usar $user->fill($request->all());
        $image->description = $request->description;
        $image->title = $request->title;
        $image->comments = $request->comments;
        $image->save();
        Flash::warning('La imagen '.$image->title.' ha sido editada con exito!');
        return redirect()->route('admin.albumes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($image)
    {
        dd($image);
        return redirect()->route('admin.albumes.index');
        //$img_delete = album_image::where('id_image', '')->where('id_album', '')->where('ordenNumber', '')->get();
    }
}
