<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
use App\Tag;
use Auth;

class CategoriesController extends Controller
{
	public function detail($id) {
		$category = Category::find($id);
        $tags = Tag::all();
		return view('categories/detail', ['category' => $category, 'tags' => $tags]);
	}

	public function index() {
		return view('categories/index');
	}

    public function getAdd() {
        $user = Auth::user();
        if (!$user) return redirect('/admin-user/auth/login');

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
