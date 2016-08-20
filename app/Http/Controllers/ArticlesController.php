<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;
use Auth;

use App\Http\Requests;
use App\Article;
use App\Category;
use App\Tag;
use App\ArticlesTag;
use App\Comment;
use Image;

class ArticlesController extends Controller
{
    public function index() {
        $tags = Tag::all();
        $user = Auth::user();
    	return view('articles/index', ['tags' => $tags]);
    }

    public function view($id) {
    	$article = Article::find($id);
        $top_articles = Article::where('status', 1)->orderBy('view_count', 'desc')->limit(5)->get();
        $value = Cookie::get('_id');
        if ($value != $id) {
            $article->view_count++;
            $article->save();
        }
        Cookie::queue('_id', $id, 1);
        $tags = Tag::all();
    	return view('articles/view', ['article' => $article, 'top_articles' => $top_articles, 'tags' => $tags]);
    }

    public function getAdd() {
        $user = Auth::user();
        if (!$user) return redirect('/admin-user/auth/login');

        return view('articles/add');
    }

    public function postAdd(Request $data) {
        $article = new Article();
        $result = $article->create([
            'title' => $data->title,
            'discription' => $data->discription,
            'body' => $data->body,
            'category_id' => $data->category,
        ]);
        $tags = explode(",", $data->tag);
        foreach ($tags as $name) {
            $id = $this->saveUnkownTag($name);
            $this->saveArticlesTags($result->id, $id);
        }
        return redirect('/');
    }

    public function getEdit($id) {
    	$user = Auth::user();
        if (!$user) return redirect('/admin-user/auth/login');

        $article = Article::find($id);

    	return view('articles/edit', ['article' => $article]);
    }

    public function postEdit(Request $data) {
        $article = new Article();
        $result = $article->create([
            'title' => $data->title,
            'discription' => $data->discription,
            'body' => $data->body,
            'category_id' => $data->category,
        ]);
        $tags = explode(",", $data->tag);
        foreach ($tags as $name) {
            $id = $this->saveUnkownTag($name);
            $this->saveArticlesTags($result->id, $id);
        }
    	return redirect('/');
    }

    public function getSearch(Request $data) {
        $articles = Article::where('title', 'like', '%'.$data->word.'%')->paginate(10);
        $top_articles = Article::orderBy('view_count', 'desc')->limit(5)->get();
        $tags = Tag::all();
        return view('articles/search', ['word' => $data->word, 'articles' => $articles, 'top_articles' => $top_articles, 'tags' => $tags]);
    }

    public function postSearch(Request $data) {
        $res = array('articles' => array(), 'tags' => array());
        $articles = Article::where('title', 'like', '%'.$data->word.'%')->limit(3)->get();
        foreach ($articles as $article) {
            array_push($res['articles'], array('id' => $article->id,'title' => $article->title));
        }
        $tags = Tag::where('name', 'like', '%'.$data->word.'%')->limit(20)->get();
        foreach ($tags as $tag) {
            array_push($res['tags'], array('id' => $tag->id,'name' => $tag->name));
        }
        return json_encode($res);
    }

    public function saveUnkownTag($name) {
        $tag = Tag::where('name', $name)->first();
        if ($tag) return $tag->id;
        $tag = new Tag();
        $result = $tag->create([
            'name' => $name
        ]);
        return $result->id;
    }

    public function saveArticlesTags($article_id, $tag_id) {
        $articlestag = new ArticlesTag();
        $articlestag->create([
            'article_id' => $article_id,
            'tag_id' => $tag_id
        ]);
        return true;
    }

    public function upload_image(Request $data) {
        if ($data->file->getSize() == 0) return json_encode(array('result' => 'error'));

        $fileName = $data->file->getClientOriginalName();
        $image = Image::make($data->file->getRealPath());
        $image->save(public_path() . '/img/upload/' . $fileName);
        return json_encode(array('result' => 'success'));
    }

    public function findImages(Request $data) {
        $files = scandir(public_path(). "/img/upload");

        return json_encode(array('files' => $files));
    }
}
