@extends('layouts.frontend')

@section('page-title')
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-uppercase">文章管理者頁面</h4>
                <ol class="breadcrumb">
                    <li><a href="/">首頁</a>
                    </li>
                    <li class="active">文章管理者頁面</li>
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
                    <div class="pull-left">
                        <div>{{$post->title}}</div>
                        <small>{{$post->user->name}}</small>
                    </div>
                    
                    
                    <span class="pull-right">
                        <a href="/posts/show/{{$post->id}}" class="btn btn-default">查看</a>
                        <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">編輯</a>
                        <button class="btn btn-danger" onclick="deletePost({{$post->id}})">刪除</button>
                    </span>
                </li>
                
            @endforeach
            </ul>
        
    </div>
</div>
@endsection
