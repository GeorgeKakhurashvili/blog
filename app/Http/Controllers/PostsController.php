<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Repositories\Posts;
use Auth;
use Carbon\Carbon;
class PostsController extends Controller
{
    public function index(Request $request, Posts $posts)
    {
      //$posts = $posts->all();
      //
      // dd($posts);
      // Request klasi get gzavnilsac ichers chveulebriv
      // latest() igivea rac orderBy(created_at,DESC), shegvidzlia dagvilagos sxva svetis mixedvit tu gadavcem mag latest("id")
      // arsebobs aseve oldest() romelic igivea im gansxvavebit ro alagebs ASC-it
      $pageTitle = 'Posts';
      $posts = Post::latest();
      if ($request->month) {
        $posts -> whereMonth('created_at',Carbon::parse($request->month)->month);
      }

      if ($request->year) {
        $posts -> whereYear('created_at',Carbon::parse($request->year)->year);
      }
      $posts = $posts->get();

      return view('posts.index',compact('posts','pageTitle'));
    }
    public function create()
    {
      return view('posts.create');
    }
    public function show(Post $post)
    {
      $pageTitle = 'Current Post';
      return view('posts.show',compact('post','pageTitle'));
    }
    public function store(Request $request)
    {
      $this->validate($request, [
          'title' => 'required|string',
          'body' => 'required|string',
      ]);
      $user = Auth::user();
      $post = $user->posts()->create($request->all());

      $tags = explode(",",$request->tags);
      foreach ($tags as $tag) {
        $post_tag = Tag::create([
          'name'=>$tag
        ]);
        $post->tags()->attach($post_tag);
      }

      return redirect()->back()->with(['success'=>'Post published successfully']);


    }
    public function tags(Tag $tag)
    {
      $posts = $tag->posts;
      $pageTitle = 'Posts by tag';
      return view('posts.index',compact('posts','pageTitle'));
    }
}
