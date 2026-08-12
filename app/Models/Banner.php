<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = ['banner_id','title','description','assoc_image','links_to','linked_article_slug','linked_url'];
}
