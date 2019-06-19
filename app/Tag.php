<?php

namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    function posts()
    {
        return $this->hasMany(Post::class);
    }
}
