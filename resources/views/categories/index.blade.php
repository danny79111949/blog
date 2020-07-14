@extends('layouts.app')

@section('page-title')
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-uppercase">分類管理者頁面</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">首頁</a>
                    </li>
                    <li class="breadcrumb-item active">分類管理者頁面</li>
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
            <a href="/categories/create" class="btn btn-primary pull-right">建立新分類</a>
        </div>
        
        <ul class="list-group">
            @foreach ($categories as $categoriy)
                <li  class="list-group-item clearfix">
                    <div class="float-left">
                        <div>{{$categoriy->name}}</div>
                    </div>
                    
                    <span class="float-right">
                        <a href="/categories/{{$categoriy->id}}/edit" class="btn btn-primary">編輯</a>
                        <button class="btn btn-danger" onclick="deleteCategory({{$categoriy->id}})">刪除</button>
                    </span>
                </li>
                
            @endforeach
            </ul>
        
    </div>
</div>
@endsection
