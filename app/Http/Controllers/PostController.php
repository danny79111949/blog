<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Post;
use App\Category;
use App\Tag;
use App\Http\Requests\StoreBlogPost;


class PostController extends Controller
{
    public function admin()
    {
        $posts = Post::all();
        return view('posts.admin',['posts'=>$posts]);
    }
    private function categories()
    {
       return Category::all();
    }
    private function tags()
    {
       return Tag::has('posts')->withCount('posts')->orderBy('posts_count','desc')->get();
    }
    public function index()
    {
        $posts = Post::all();
        $categories = $this->categories();
        $tags = $this->tags();
        return view('posts.index',['posts'=>$posts,'categories'=>$categories,'tags'=>$tags]);
    }
    public function indexWithCategory(Category $category)
    {
        $posts = Post::where('category_id',$category->id)->get();
        $categories = $this->categories();
        $tags = $this->tags();
        return view('posts.index',['posts'=>$posts,'categories'=>$categories,'tags'=>$tags]);
    }
    public function indexWithTag(Tag $tag)
    {
        $categories = $this->categories();
        $tags = $this->tags();
        return view('posts.index',['posts'=>$tag->posts,'categories'=>$categories,'tags'=>$tags]);
    }
    
    public function create()
    {
        $post = new Post;
        $categories = Category::all();
        return view('posts.create',['post'=>$post,'categories'=>$categories]);
    }
    public function store(StoreBlogPost $request)
    {
        $path = $request->file('thumbnail')->store('public');
        $path = str_replace('public/','/storage/',$path);
        
        $post = new Post;
        $post->fill($request->all());
        $post->user_id = Auth::id();
        $post->thumbnail = $path;
        $post->save();

        $tags = explode(',',$request->tags);
        $this->addTagsToPost($tags,$post);
        
        return redirect('/posts/admin');
    }
    private function addTagsToPost( $tags, $post)
    {
        foreach($tags as $tag)
        {
            if($tag!="")
            {
                $model = Tag::firstOrCreate(['name'=>$tag]);
                $post->tags()->attach($model->id);
            }
        }
    }
    public function showByAdmin(Post $post)
    {
        return view('posts.showByAdmin',['post'=>$post]);
    }
    public function show(Post $post)
    {
        $categories = $this->categories();
        $tags = $this->tags();
        return view('posts.show',['post'=>$post,'categories'=>$categories,'tags'=>$tags]);
    }
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts.edit',['post'=>$post,'categories'=>$categories]);
    }

    public function update(StoreBlogPost $request,Post $post)
    {
        $path = $request->file('thumbnail')->store('public');
        $path = str_replace('public/','/storage/',$path);
        $post->thumbnail = $path;

        $post->fill($request->all());
        $post->save();

        $post->tags()->detach();

        $tags = explode(',',$request->tags);
        $this->addTagsToPost($tags,$post);
        
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
