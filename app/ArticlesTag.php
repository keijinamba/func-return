<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticlesTag extends Model
{
    protected $fillable = [
        'article_id', 'tag_id'
    ];

    public function tags() {
    	return $this->belongsTo('App\Tag', 'tag_id');
    }

    public function articles() {
    	return $this->belongsTo('App\Article', 'article_id');
    }
}
