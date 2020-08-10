<?php

namespace App\Http\Controllers;
use App\Mascota; 

use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display the specified resource.
     */
    public function index()
    {
        $email = auth()->user()->email;
        $m = Mascota::where('owner', $email)->get(); 

        return view('clientes.index')->with('mascotas', $m);
    }
}
