<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ArticlesTag;
use App\Category;
use App\Tag;

class TagsController extends Controller
{
    public function detail($id) {
		$tag = Tag::find($id);
		$categories = Category::all();
    $tags = Tag::all();
		return view('tags/detail', ['tag' => $tag, 'categories' => $categories, 'tags' => $tags]);
	}

	public function index() {
		$tags = Tag::all();
		$categories = Category::all();
		return view('tags/index', ['tags' => $tags, 'categories' => $categories]);
	}

}
