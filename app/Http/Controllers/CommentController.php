<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Auth;
class CommentController extends Controller
{
    public function comment(Request $request,Post $post)
    {
      $user = Auth::user();
      $comment = $post->comments()->create($request->except('user_id')+['user_id'=>$user->id]);
      return redirect()->back();
    }
}
