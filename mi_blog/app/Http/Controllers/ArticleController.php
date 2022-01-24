<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Catergory;
use App\Models\Comment;

class ArticleController extends Controller
{
     //Control de loguo
     public function __contruct(){
        $this->middleware('auth');
    }   

    public function index($postid){
        $post = Post::find($postid);
        $comments = Comment::where('post_id',$postid)
                            ->orderBy('created_at', 'DESC')->get();
        $latestPost = Post::orderBy('created_at', 'DESC')->take(3)->get();
        $related = Post::where('catergory_id',$post->catergory_id)->take(3)->get();
        return view('post')
        ->with("post",$post)
        ->with("latestPost",$latestPost)
        ->with("relatedPost",$related)
        ->with("commentaries",$comments)
        ;
    }
}
