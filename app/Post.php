<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = ['title','excerpt','state','slug','content','image_url','category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
