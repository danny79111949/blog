@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
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