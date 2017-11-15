<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Image;
use App\Album;
use App\Comment;
use DB;
use Laracasts\Flash\Flash;

class CommentsController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $com = new Comment();
        $com->comment = $request->comentario;
        $com->id_owner = \Auth::user()->id;
        $com->id_album = $request->album;
        $orden = DB::table('album_image')->select('orderNumber')->where('id_album',$request->album)->where('id_image',$request->image)->get();
        $com->orderNumber = $orden[0]->orderNumber;
        
        $com->save();
        Flash::success('La imagen ha sido comentada con exito!');
        return redirect()->route('admin.comments.comentarios', [$request->image, $request->album]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function comentarios($id_image, $id_album)
    {
        $album = Album::find($id_album);
        $image = Image::find($id_image);
        $orden = DB::table('album_image')->select('orderNumber')->where('id_album',$id_album)->where('id_image',$id_image)->get();
        //$comentarios = Comment::where('id_album', $album)->where('orderNumber',$orden[0]->orderNumber)->orderBy('id', 'ASC')->get()->lists('comment', 'id_owner');
        $comentarios = DB::table('comments')->join('users','comments.id_owner','=','users.id')->select('comments.*','users.*')->where('comments.id_album', $id_album)->where('comments.orderNumber',$orden[0]->orderNumber)->orderBy('comments.id', 'ASC')->get();
    

        
        return view('admin.comments.index', ['image' => $image, 'album' => $album,'comentarios' => $comentarios]);
    }
}
