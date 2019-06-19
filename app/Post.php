<?php

namespace App;

use App\Tag;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
