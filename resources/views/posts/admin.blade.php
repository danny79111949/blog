@extends('layouts.app')

@section('page-title')
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-uppercase">文章管理者頁面</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">首頁</a>
                    </li>
                    <li class="breadcrumb-item active">文章管理者頁面</li>
                </ol>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<div class="page-content">
    <div class="container">
        <div class="clearfix toolbox">
            <a href="/posts/create" class="btn btn-primary pull-right">建立新文章</a>
        </div>
        
        <ul class="list-group">
            @foreach ($posts as $post)
                <li  class="list-group-item clearfix">
                    <div class="float-left">
                        <div>{{$post->title}}</div>
                        @if(isset($post->category))
                            <small class="d-block text-muted">{{$post->category->name}}</small>
                        @endif
                        <small class="d-block text-muted">{{$post->tagsString()}}</small>
                        <small>{{$post->user->name}}</small>
                    </div>
                    
                    
                    <span class="float-right">
                        <a href="/posts/show/{{$post->id}}" class="btn btn-secondary">查看</a>
                        <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">編輯</a>
                        <button class="btn btn-danger" onclick="deletePost({{$post->id}})">刪除</button>
                    </span>
                </li>
                
            @endforeach
            </ul>
        
    </div>
</div>
@endsection
