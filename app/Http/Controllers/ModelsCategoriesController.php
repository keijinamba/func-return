<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ModelsCategoriesController extends Controller
{
    public function category($id) {
    	return view('models_categories/category');
    }
}
