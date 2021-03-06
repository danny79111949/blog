@extends('layouts.frontend')

@section('page-title')
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-uppercase">文章</h4>
                <ol class="breadcrumb">
                    <li><a href="/">首頁</a>
                    </li>
                    <li class="active"><a href="/posts">文章列表</a>
                    </li>
                    <li class="active">文章</li>
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
                <!--classic image post-->
                <div class="blog-classic">
                    <div class="blog-post">
                        <div class="full-width">
                            <img src="{{$post->thumbnail}}" alt="" />
                        </div>
                        <h4 class="text-uppercase"><a href="#">{{$post->title}}</a></h4>
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

                        <p>{{$post->content}}</p>

                        
                        <div class="inline-block">

                            @if ($post->tags->count()>0)
                                <div class="widget-tags">
                                    <h6 class="text-uppercase">標籤 </h6>

                                    @foreach ($post->tags as $tag)
                                        <a href="/posts/tag/{{$tag->id}}">{{$tag->name}}</a>
                                    @endforeach
                                </div>
                            @endif
                            
                        </div>

                        <div class="pagination-row">
                            <div class="pagination-post">
                                <div class="prev-post">
                                    <a href="@if($prevPostId)/posts/{{$prevPostId}}@else # @endif">
                                        <div class="arrow">
                                            <i class="fa fa-angle-double-left"></i>
                                        </div>
                                        <div class="pagination-txt">
                                            <span>上一篇</span>
                                        </div>
                                    </a>
                                </div>

                                <div class="post-list-link">
                                    <a href="/posts">
                                        <i class="fa fa-home"></i>
                                    </a>
                                </div>

                                <div class="next-post">
                                    <a href="@if($nextPostId)/posts/{{$nextPostId}} @else # @endif">
                                        <div class="arrow">
                                            <i class="fa fa-angle-double-right"></i>
                                        </div>
                                        <div class="pagination-txt">
                                            <span>下一篇</span>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        </div>

                        <div class="heading-title-alt text-left heading-border-bottom">
                            <h4 class="text-uppercase">{{$post->comments->count()}} 篇留言</h4>
                        </div>

                        <ul class="media-list comments-list m-bot-50 clearlist">

                            @foreach ($post->comments as $comment)
                                <li class="media">

                                    <a class="pull-left" href="#">
                                        <img class="media-object comment-avatar" src="/assets/img/post/a1.png" alt="" width="50" height="50">
                                    </a>

                                    <div class="media-body">

                                        <div class="comment-info">
                                            <div class="comment-author">
                                                <a href="#">{{$comment->name}}</a>
                                                @if (Auth::check() && Auth::id()==$comment->user_id)
                                                    <button class="btn btn-default" onclick="toggleCommentForm(event)">編輯</button>
                                                    <button class="btn btn-default" onclick="deleteComment(event)" data-action="/comments/{{$comment->id}}">刪除</button>
                                                @endif
                                                
                                            </div>
                                            {{$comment->created_at}}
                                            
                                        </div>

                                        <div class="comment-body">
                                            <p>
                                                {{$comment->comment}}
                                            </p>
                                            <form class="update-comment" action="/comments/{{$comment->id}}" method="POST">
                                                <input type="hidden" name="post_id" value="{{$comment->post_id}}"/>
                                                <input type="hidden" name="name" value="{{$comment->name}}"/>
                                                <input type="text" value="{{$comment->comment}}" name="comment"/>
                                                <button>更新</button>
                                            </form>
                                        </div>
                                    </div>

                                </li>
                            @endforeach
                        </ul>

                        
                        <div class="heading-title-alt text-left heading-border-bottom">
                            <h4 class="text-uppercase">留言區</h4>
                        </div>

                        <form method="post" action="/comments" id="form" role="form" class="blog-comments">
                            @csrf
                            <input type="hidden" name="post_id" value="{{$post->id}}">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <!-- Name -->
                                    @if (Auth::check())
                                        <input type="text" name="name" id="name" class=" form-control" placeholder="姓名" maxlength="100" required="" value="{{Auth::user()->name}}">
                                    @else
                                        <input type="text" name="name" id="name" class=" form-control" placeholder="姓名" maxlength="100" required="" >
                                    @endif
                                    
                                </div>

                                <!-- Comment -->
                                <div class="form-group col-md-12">
                                    <textarea name="comment" id="text" class=" form-control" rows="6" placeholder="留言...." maxlength="400" required=""></textarea>
                                </div>

                                <!-- Send Button -->
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-small btn-dark-solid ">
                                        留言
                                    </button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
                <!--classic image post-->

            </div>
            <div class="col-md-4">

                @include('posts.sidebar')

            </div>
        </div>
    </div>
</div>
@endsection