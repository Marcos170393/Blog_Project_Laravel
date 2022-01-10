<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catergory;
use App\Models\Post;

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
        $categories = Catergory::all();
        $posts = Post::all();
       
        return view('index')
        ->with("categories",$categories)
        ->with("posts",$posts);
    }

    public function post(){
        return view('post');
    }
}
