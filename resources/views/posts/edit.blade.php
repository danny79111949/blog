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
        @include('posts.form')
    </div>
</div>
@endsection