@php
$isCreate = !$post->exists;
$actionUrl = $isCreate ? '/posts' : '/posts/'.$post->id;
@endphp

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{$actionUrl}}" enctype="multipart/form-data">
    @csrf
    @if(!$isCreate)
    <input type="hidden" name="_method" value="put"/>
    @endif
    <div class="from-group ">
        <label>標題</label>
        <input type="text" name="title" class="form-control" value="{{$post->title}}"/>
    </div>

    <div class="form-group">
        <label>圖片</label>
        <div class="custom-file">
            <input type="file" name="thumbnail" class="custom-file-input" id="customFile" />
            <label class="custom-file-label" for="customFIle">請選擇檔案</label>
        </div>
    </div>
    

    <div class="from-group">
        <label>分類</label>
        <select class="form-control" name="category_id">
            <option selected value>請選擇分類</option>
            @foreach ($categories as $category)
                <option value="{{$category->id}}" @if(isset($post->category_id) && $post->category_id == $category->id) selected @endif>
                    {{$category->name}}
                </option>
            @endforeach

        </select>
    </div>

    <div class="from-group">
        <label>標籤</label>
        <input type="text" name="tags" class="form-control" value="{{$post->tagsString()}}"/>
    </div>
    
    <div class="from-group">
        <label>內文</label>
        <textarea class="form-control" name="content" rows="8" cols="80" >{{$post->content}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">儲存</button>
    <button type="button" class="btn btn-secondary" onclick="window.history.back()">取消</button>
</form>