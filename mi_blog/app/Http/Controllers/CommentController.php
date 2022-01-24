<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    //Create comment
    public function create(Request $request,$postId){
        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->post_id = $postId;
        $comment->valoration = 5;
        $comment->user_id = auth()->user()->id;
        $comment->save();
        return redirect()->back();
    }
}
