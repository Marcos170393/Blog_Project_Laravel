<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Catergory;
class PostsController extends Controller
{
     //Control de loguo
     public function __contruct(){
        $this->middleware('auth');
    }   
    
    public function index(){

        $p = Post::find(1);
        $posts = Post::all();
        $categories = Catergory::all();
        
        return view('admin.posts.index')
                ->with("posts",$posts)
                ->with("categories",$categories);
        
    }

    // // ####### Metodo para crear categorias #########
    public function store(Request $request){
           
              $post = new Post();
              $post->catergory_id = $request->category;
              $post->content = $request->content;
              $post->author = $request->author;
              $post->title = $request->title;
              $post->save();
              return redirect()->back();
    }

    public function update(Request $request, $id){
           
        $post = Post::find($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->update();
        return redirect()->back();
    }
   
    // public function delete(Request $request, $id){
       
    //     $post = Catergory::find($id);
    //     $post->delete();
    //     $post->save();
    //     return redirect()->back();
    // }
    
}