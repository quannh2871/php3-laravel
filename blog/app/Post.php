<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        'title',
        'content',
        'cate_id',
        'create_by'
    ];

    public function postImage()
    {
        $this->hasMany(PostImage::class, 'post_id');
    }
}
