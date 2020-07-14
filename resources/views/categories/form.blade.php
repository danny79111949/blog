@php
$isCreate = !$category->exists;
$actionUrl = $isCreate ? '/categories' : '/categories/'.$category->id;
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
<form method="POST" action="{{$actionUrl}}">
    @csrf
    @if(!$isCreate)
    <input type="hidden" name="_method" value="put"/>
    @endif
    <div class="from-group">
        <label>分類</label>
        <input type="text" name="name" class="form-control" value="{{$category->name}}"/>
    </div>
   
    <button type="submit" class="btn btn-primary">儲存</button>
    <button type="button" class="btn btn-danger" onclick="window.history.back()">取消</button>
</form>