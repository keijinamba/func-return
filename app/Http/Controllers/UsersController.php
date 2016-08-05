<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Article;
use Log;
use Auth;

use App\Category;

class UsersController extends Controller
{
    public function getSignup() {
    	return view('users/signup');
    }

    public function postSignup(Request $data) {
    	$user = new User();
    	$user->create([
            'username' => $data->username,
            'password' => bcrypt($data->password),
        ]);
    	return redirect('/');
    }

    public function getLogout() {
        Auth::logout();
        return redirect('/');
    }

    public function about() {
        $user = User::find(1);
        return view('users/about', ['user' => $user]);
    }

    public function good(Request $data) {
        $user = User::find($data->id);
        $user->good = $user->good + $data->point;
        $user->save();
        return json_encode($user->good);
    }

    public function bad(Request $data) {
        $user = User::find($data->id);
        $user->bad = $user->bad + $data->point;
        $user->save();
        return json_encode($user->bad);
    }

    public function dashboad(Request $req, $type = null) {
        $user = Auth::user();
        if (!$user) return redirect('/admin-user/auth/login');

        $user_data = array('user' => $user, 'params' => array());
        if ($type == "articles" || $type == null) {
            $sort = ($req->sort) ? $req->sort : 'updated_at';
            $articles = Article::orderBy($sort, 'desc')->paginate(15);
            $user_data['params']['articles'] = $articles;
            $user_data['params']['sort'] = $sort;
        }

        $categories = Category::all();
        return view('users/dashboad', ['categories' => $categories, 'user_data' => $user_data]);
    }
}
