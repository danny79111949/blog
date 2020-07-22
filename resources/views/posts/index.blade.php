@extends('layouts.frontend')

@section('page-title')
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-uppercase">
                    文章列表
                    @if (request()->category)
                        /{{request()->category->name}}
                    @endif
                    @if (request()->tag)
                        #{{request()->tag->name}}
                    @endif
                </h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">首頁</a>
                    </li>
                    <li class="breadcrumb-item active">文章列表</li>
                </ol>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @foreach ($posts as $post)
                <div class="blog-classic">

                    <div class="date">
                        {{$post->created_at->day}}
                        <span>{{$post->created_at->month}} {{$post->created_at->year}}</span>
                    </div>
                    <div class="blog-post">
                        <div class="full-width">
                            <img src="{{$post->thumbnail}}" alt="" />
                        </div>
                        <h4 class="text-uppercase"><a href="/posts/{{$post->id}}">{{$post->title}}</a></h4>
                        <ul class="post-meta">
                            <li><i class="fa fa-user"></i>作者: <a href="#">{{$post->user->name}}</a>
                            </li>
                            @if(isset($post->category))
                            <li><i class="fa fa-folder-open"></i>  
                                <a href="/posts/category/{{$post->category_id}}">
                                    {{$post->category->name}}
                                </a>
                            </li>
                            @endif
                            <li><i class="fa fa-comments"></i>  <a href="#">{{$post->comments->count()}} 篇留言</a>
                            </li>
                        </ul>
                        <p>{{str_limit($post->content,200)}}</p>
                        <a href="/posts/{{$post->id}}" class="btn btn-small btn-dark-solid  "> Continue Reading</a>
                    </div>
                </div>
                @endforeach

                <div class="text-center">
                    {{$posts->links()}}
                </div>
                
                
            </div>
            <div class="col-md-4">
                @include('posts.sidebar')
            </div>
        </div>
    </div>
</div>
@endsection