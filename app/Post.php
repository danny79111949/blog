<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','content','category_id'];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    
    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'post_tag', 'post_id', 'tag_id');
    }
    public function tagsString()
    {
        $tagsName=[];
        foreach($this->tags as $tag)
        {
            $tagsName[]=$tag->name;
        }
        return implode(',',$tagsName);
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
