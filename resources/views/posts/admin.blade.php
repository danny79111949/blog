@extends('layouts.app')

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
        
        <div class="list-group">
            @foreach ($posts as $post)
                <a href="#" class="list-group-item">{{$post->title}}</a>
                
            @endforeach
        </div>
        
    </div>
</div>
@endsection