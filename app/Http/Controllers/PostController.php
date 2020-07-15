<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Post;
use App\Category;
use App\Http\Requests\StoreBlogPost;


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
        $post = new Post;
        $categories = Category::all();
        return view('posts.create',['post'=>$post,'categories'=>$categories]);
    }
    public function store(StoreBlogPost $request)
    {
        $post = new Post;
        $post->fill($request->all());
        $post->user_id = Auth::id();
        $post->save();
        return redirect('/posts/admin');
    }
    public function showByAdmin(Post $post)
    {
        return view('posts.showByAdmin',['post'=>$post]);
    }
    public function show(Post $post)
    {
        return view('posts.show',['post'=>$post]);
    }
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts.edit',['post'=>$post,'categories'=>$categories]);
    }

    public function update(StoreBlogPost $request,Post $post)
    {
        $post->fill($request->all());
        $post->save();
        return redirect('/posts/admin');
    }
    public function destroy(Post $post)
    {
        $post->delete();
    }

    public function postListByUser($id)
    {
        $posts = Post::where('user_id',$id)->get();
        return json_encode($posts,JSON_UNESCAPED_UNICODE);
    }
    public function postList()
    {
        $posts = Post::all();
        return json_encode($posts,JSON_UNESCAPED_UNICODE);
    }
}
