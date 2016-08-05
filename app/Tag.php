<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name'
    ];

    public function articlestag() {
    	return $this->hasMany('App\ArticlesTag', 'tag_id');
    }
}
