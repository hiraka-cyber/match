<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
  public function index()
  {
    $postList = Post::all();
    return view('post')->with('postList',$postList);
  }
  public function add()
  {
    if( Auth::check() ){
      $post = Post::where('userid',Auth::user()->id)->first();
      return view('findpost')->with('post',$post);
    }
    return view('findpost');
  }
  public function store(Request $request)
  {
    $postCheck = Post::where('userid',Auth::user()->id)->first();
    if($postCheck == null){
      $post = new Post;
    }else{
      $post = Post::find($postCheck->id);
    }
    $post->username = Auth::user()->name;
    $post->userid = $request->user()->id;
    $post->soft = $request->soft;
    $post->skill = $request->skill;
    $post->price = $request->price;
    $post->situation = $request->situation;
    $post->description = $request->description;

    $post->save();
    return redirect('tuber');
  }
}
