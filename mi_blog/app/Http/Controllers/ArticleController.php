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
        $latestPost = Post::orderBy('created_at', 'DESC')->take(3)->get();
        $related = Post::where('catergory_id',$post->catergory_id)->take(3)->get();
        return view('post')
        ->with("post",$post)
        ->with("latestPost",$latestPost)
        ->with("relatedPost",$related)
        ;
    }
}
