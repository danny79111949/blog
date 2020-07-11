@extends('layouts.frontend')

@section('page-title')
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-uppercase">文章編輯</h4>
                <ol class="breadcrumb">
                    <li><a href="/">首頁</a>
                    </li>
                    <li ><a href="/posts/admin">文章管理者頁面</a>
                    </li>
                    <li class="active">文章編輯</li>
                </ol>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<div class="page-content">
    <div class="container">
        <form method="POST" action="/posts/{{$post->id}}">
            @csrf
            <input type="hidden" name="_method" value="put"/>
            <div class="from-group">
                <label>標題</label>
                <input type="text" name="title" class="form-control" value="{{$post->title}}"/>
            </div>
            <div class="from-group">
                <label>內文</label>
                <textarea class="form-control" name="content" rows="8" cols="80" >{{$post->content}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">儲存</button>
            <button type="button" class="btn btn-danger" onclick="window.history.back()">取消</button>
        </form>
    </div>
</div>
@endsection