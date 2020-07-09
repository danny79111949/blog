@extends('layouts.app')

@section('page-title')
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-uppercase">Create Post</h4>
                <ol class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li class="active"><a href="#">Blog</a>
                    </li>
                    <li class="active">Blog Listing</li>
                </ol>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<div class="page-content">
    <div class="container">
        <form method="POST" action="/posts">
            @csrf
            <div class="from-group">
                <label>title</label>
                <input type="text" name="title" class="form-control"/>
            </div>
            <div class="from-group">
                <label>content</label>
                <textarea class="form-control" name="content" rows="8" cols="80"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">submit</button>
        </form>
    </div>
</div>
@endsection