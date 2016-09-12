<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
    ];

    public function articles_five() {
        return $this->hasMany('App\Article')->where('status', 1)->orderBy('created_at', 'DESC')->limit(5);
    }

    public function articles() {
        return $this->hasMany('App\Article');
    }
}
