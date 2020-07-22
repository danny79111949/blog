@php
use App\Post;
use App\Comment;
$lastestPosts = Post::orderBy('created_at','desc')->take(3)->get();  
$lastestComments = Comment::orderBy('created_at','desc')->take(4)->get();
@endphp


<!--latest post widget-->
<div class="widget">
    <div class="heading-title-alt text-left heading-border-bottom">
        <h6 class="text-uppercase">最新文章</h6>
    </div>
    <ul class="widget-latest-post">
        @foreach ($lastestPosts as $post)
            <li>
                <div class="thumb">
                    <a href="/posts/{{$post->id}}">
                        @if ($post->thumbnail)
                            <img src="{{$post->thumbnail}}" alt="" />
                        @endif
                        
                    </a>
                </div>
                <div class="w-desk">
                    <a href="/posts/{{$post->id}}">{{$post->title}}</a>
                    {{$post->created_at}}
                </div>
            </li>
        @endforeach
        

    </ul>
</div>
<!--latest post widget-->

<!--category widget-->
<div class="widget">
    <div class="heading-title-alt text-left heading-border-bottom">
        <h6 class="text-uppercase">分類</h6>
    </div>
    <ul class="widget-category">
        @foreach ($categories as $category)
            <li><a href="/posts/category/{{$category->id}}">{{$category->name}}</a></li>
        @endforeach
    </ul>
</div>
<!--category widget-->

<!--comments widget-->
<div class="widget">
    <div class="heading-title-alt text-left heading-border-bottom">
        <h6 class="text-uppercase">最新留言 </h6>
    </div>
    <ul class="widget-comments">

        @foreach ($lastestComments as $Comment)
        <li>
            {{$Comment->name}} 
            <a href="/posts/{{$Comment->post->id}}">{{$Comment->post->title}} </a>
        </li>
        @endforeach
        

    </ul>
</div>
<!--comments widget-->

<!--tags widget-->
<div class="widget">
    <div class="heading-title-alt text-left heading-border-bottom">
        <h6 class="text-uppercase">標籤</h6>
    </div>
    <div class="widget-tags">
        @foreach ($tags as $tag)
            <a href="/posts/tag/{{$tag->id}}">{{$tag->name}}</a>
        @endforeach
        
    </div>
</div>
<!--tags widget-->