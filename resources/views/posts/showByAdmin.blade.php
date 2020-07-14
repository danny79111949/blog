@extends('layouts.app')

@section('page-title')
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-uppercase">文章管理</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">首頁</a>
                    </li>
                    <li class="breadcrumb-item"><a href="/posts/admin">文章管理者頁面</a>
                    </li>
                    <li class="breadcrumb-item active">文章管理</li>
                </ol>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<div class="page-content">
    <div class="container">
        <h1>{{$post->title}}</h1>
        <small>{{$post->user->name}}</small>
        <div class="toolbox">
            <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">修改</a>
            <button class="btn btn-danger" onclick="deletePost({{$post->id}})">刪除</button>
        </div>
        <div class="content">{{$post->content}}</div>
    </div>
</div>
@endsection