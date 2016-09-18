<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model extends Model
{
    protected $fillable = [
        'name', 'models_category_id'
    ];
}
