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

    public function postByCategory($category){
        $categories = Catergory::all();
       $category =  Catergory::where('name',$category)->first();
       $categorySelected = $category->id;
       $posts = Post::where('catergory_id',$category->id)->get();
       return view('index')
       ->with("categories",$categories)
       ->with("posts",$posts)
       ->with("categorySelected",$categorySelected);
    }
}
