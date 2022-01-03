<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catergory;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *  Este metodo hace que todas las vistas que se llamen desde este controlador, sean accedidas por personas autenticadas
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cat = Catergory::find(3);
        dd($cat->posts);
        return view('index');
    }

    public function post(){
        return view('post');
    }
}
