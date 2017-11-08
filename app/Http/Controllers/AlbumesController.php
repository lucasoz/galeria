<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Album;
use App\User;
use DB;
use Laracasts\Flash\Flash;

class AlbumesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        /*$albumes = Album::orderBy('id', 'DESC')->paginate(5);
        $albumes->each(function($albumes){
            $albumes->user;
        });*/
        //dd($albumes);
        if(\Auth::user()->type == "admin"){
            $albumes = DB::table('users')->join('album' , 'users.id', '=', 'album.user_id')->select('users.*', 'users.name as nameuser', 'album.*')->paginate(5);
        }
        elseif(\Auth::user()->type == "premium"){
            $albumes = DB::table('users')->join('album' , 'users.id', '=', 'album.user_id')->select('users.*', 'users.name as nameuser', 'album.*')->where('type', '=', 'member')->orWhere('type', '=', 'premium')->paginate(5);
        }
        else{
            $user_id = \Auth::user()->id;
            //$albumes = Album::where('user_id', $user_id)->orderBy('id', 'ASC')->get()->lists('name', 'id');
            $albumes = DB::table('users')->join('album' , 'users.id', '=', 'album.user_id')->select('users.*', 'album.*')->where('type', '=', 'member')->paginate(5);
        }
        return view('admin.albumes.index', ['albumes' => $albumes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.albumes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $album = new Album($request->all());
        $album->user_id = \Auth::user()->id;
        $album->save();

        Flash::success('El album ' . $album->name . ' ha sido creado con exito!');
        return redirect()->route('admin.albumes.index');
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
        $album = Album::find($id);
        return view('admin.albumes.edit')->with('album',$album);
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
        $album = Album::find($id);
        $album->name = $request->name;
        $album->description = $request->description;
        $album->save();
        Flash::warning('El album '.$album->name.' ha sido editado con exito!');
        return redirect()->route('admin.albumes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = Album::find($id);
        $album->delete();
        Flash::error('El album '.$album->name.' se borro de forma exitosa');
        return redirect()->route('admin.albumes.index');
    }
}
