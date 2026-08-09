<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['slug','title','excerpt','content','assoc_image','post_type','published','published_at'];
}
