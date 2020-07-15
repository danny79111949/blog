@extends('layouts.app')

@section('page-title')
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-uppercase">標籤管理者頁面</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">首頁</a>
                    </li>
                    <li class="breadcrumb-item active">標籤管理者頁面</li>
                </ol>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<div class="page-content">
    <div class="container">
        <ul class="list-group">
            @foreach ($tags as $tag)
                <li  class="list-group-item clearfix">
                    <div class="float-left">
                        <div>{{$tag->name}}</div>
                    </div>
                    
                    <span class="float-right">
                        <button class="btn btn-danger" onclick="deleteTag({{$tag->id}})">刪除</button>
                    </span>
                </li>
                
            @endforeach
            </ul>
        
    </div>
</div>
@endsection
