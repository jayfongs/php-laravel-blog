<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'article';
    protected $fillable = ['title', 'content', 'article_img', 'author', 'tag', 'article_description'];
}