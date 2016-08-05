<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
use App\Tag;

class CategoriesController extends Controller
{
	public function detail($id) {
		$category = Category::find($id);
		$categories = Category::all();
        $tags = Tag::all();
		return view('categories/detail', ['category' => $category, 'categories' => $categories, 'tags' => $tags]);
	}

	public function index() {
		$categories = Category::all();
		return view('categories/index', ['categories' => $categories]);
	}

    public function getAdd() {
    	return view('categories/add');
    }

    public function postAdd(Request $data)  {
    	$category = new Category();
    	$category->create([
            'name' => $data->name
        ]);
    	return redirect('/');
    }
}
