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
        $usuario = \Auth::user();
        //traemos los albumes para seleccionar al crear imagen
        $albumes = Image::traerALbumes($usuario);
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
        Image::crearImagen($request);
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
        $images = Image::traerImagenes($id);
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
        Image::editarImagen($request,$id);
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
        //no se permite el borrado de imagenes hasta donde esta entendido
        dd($image);
        return redirect()->route('admin.albumes.index');
        //$img_delete = album_image::where('id_image', '')->where('id_album', '')->where('ordenNumber', '')->get();
    }

    public function ChangeOrderNumber($id_album, $id_image)
    {
        $numeros = Image::traerNumeros($id_album);
        return view('admin.images.ordernumber', ['image' => $id_image, 'album' => $id_album, 'numeros' => $numeros]);
    }

    public function Number(Request $request)
    {
        $album = Image::cambiarOrden($request);
        return redirect()->route('admin.images.show', $album);
    }
}
