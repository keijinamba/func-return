<?php

namespace App\Http\Controllers;

use \View;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

use App\Category;
use App\Tag;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    protected $discription = '当ブログは、PHP・CakePHP・Laravel・Ruby・Rails・HTML・CSS・Javascript・Java・インフラ・仮想マシン・AWS・Git・自然言語処理・機械学習などを中心に記事を書いています。';

    public function __construct() {
		  $categories = Category::all();

		  $data = array(
		  	'categories' => $categories,
		  	'discription' => '当ブログは、PHP・CakePHP・Laravel・Ruby・Rails・HTML・CSS・Javascript・Java・インフラ・仮想マシン・AWS・Git・自然言語処理・機械学習などを中心に記事を書いています。',
		  );

		  View::share('data', $data);
		}
}
