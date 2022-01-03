<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
class PostsController extends Controller
{
     //Control de loguo
     public function __contruct(){
        $this->middleware('auth');
    }   
    
    public function index(){

        $list = Post::all();
        return view('admin.posts.index')
                ->with("posts",$list);
        
    }

    // // ####### Metodo para crear categorias #########
    // public function store(Request $request){
           
    //           $category = new Catergory();
    //           $category->name = $request->category;
    //           $category->description = $request->description;
    //           $category->save();
    //           return redirect()->back();
    // }

    // public function update(Request $request, $id){
           
    //     $category = Catergory::find($id);
    //     $category->name = $request->category;
    //     $category->description = $request->description;
    //     $category->save();
    //     return redirect()->back();
    // }
   
    // public function delete(Request $request, $id){
       
    //     $category = Catergory::find($id);
    //     $category->delete();
    //     $category->save();
    //     return redirect()->back();
    // }
    
}