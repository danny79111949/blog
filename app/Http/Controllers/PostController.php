<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;

class PostController extends Controller
{
    public function admin()
    {
        $posts = Post::all();
        return view('posts.admin',['posts'=>$posts]);
    }
    public function index()
    {
        $posts = Post::all();
        return view('posts.index',['posts'=>$posts]);
    }
    public function create()
    {
        return view('posts.create');
    }
    public function store(Request $request)
    {
        $post = new Post;
        $post->fill($request->all());
        $post->user_id = Auth::id();
        $post->save();
        return redirect('/posts/admin');
    }
    public function show(Post $post)
    {
        return view('posts.showByAdmin',['post'=>$post]);
    }
    public function edit(Post $post)
    {
        return view('posts.edit',['post'=>$post]);
    }

    public function update(Request $request,Post $post)
    {
        $post->fill($request->all());
        $post->save();
        return redirect('/posts/admin');
    }
    public function destory(Post $post)
    {
        $post->delete();
    }
}
