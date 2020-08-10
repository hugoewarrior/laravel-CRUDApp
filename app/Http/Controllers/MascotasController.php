<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mascota; 

class MascotasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mascotas = Mascota::orderBy('created_at','desc')->paginate(10);
        return view('mascotas.index')->with('mascotas', $mascotas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('mascotas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);
        // Create Post
        $mascota = new Mascota();
        $mascota->name = $request->input('name');
        $mascota->description = $request->input('description');
        $mascota->owner = auth()->user()->email;
        //$post->cover_image = $fileNameToStore;
        $mascota->save();
        return redirect('/mascotas')->with('success', 'Tu Mascota ha sido creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $m = Mascota::find($id); 
        return view('mascotas.show')->with('m', $m);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $m = Mascota::find($id); 
        return view('mascotas.edit')->with('m', $m);
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

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);
        // Create Post
        $mascota = Mascota::find($id);
        $mascota->name = $request->input('name');
        $mascota->description = $request->input('description');
        $mascota->owner = auth()->user()->email;
        //$post->cover_image = $fileNameToStore;
        $mascota->save();
        return redirect('/mascotas')->with('success', 'Cambios efectuados con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mascota = Mascota::find($id);
        
        //Check if post exists before deleting
        if (!isset($mascota)){
            return redirect('/mascotas')->with('error', 'Lo sentimos, no se ha encontrado la mascota');
        }

        // Check for correct user
/*         if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        } */

/*         if($post->cover_image != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/cover_images/'.$post->cover_image);
        } */
        
        $mascota->delete();
        return redirect('/mascotas')->with('success', 'Mascota eliminada con éxito');
    }
}
