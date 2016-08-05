<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title', 'discription', 'body', 'category_id',
    ];

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function articlestag() {
    	return $this->hasMany('App\ArticlesTag');
    }
}
