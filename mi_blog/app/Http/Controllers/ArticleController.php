<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Catergory;

class ArticleController extends Controller
{
     //Control de loguo
     public function __contruct(){
        $this->middleware('auth');
    }   

    public function index($postid){
        $post = Post::find($postid);

        return view('post')->with("post",$post);
    }
}
