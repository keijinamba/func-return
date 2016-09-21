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

    private $ua;
    private $device;


    public function __construct() {
		  $categories = Category::all();

		  $data = array(
		  	'categories' => $categories,
		  	'discription' => '当ブログは、PHP・CakePHP・Laravel・Ruby・Rails・HTML・CSS・Javascript・Java・インフラ・仮想マシン・AWS・Git・自然言語処理・機械学習などを中心に記事を書いています。',
		  );

		  $isMobile = $this->getUserAgent() == 'mobile' or $this->getUserAgent() == 'tablet';

		  View::share('data', $data);
		  View::share('isMobile', $isMobile);
		  View::share('isProduct', $this->isProduct());
		  View::share('uncacheParam', $this->getUncacheParam());
		}

		public function isProduct() {
			$str = $this->getEnv();
			$array = explode(',', $str);
			$isProduct = (isset($array[0]) && $array[0] == 1) ? true : false;
			return $isProduct;
		}

		public function getUncacheParam() {
			$str = $this->getEnv();
			$array = explode(',', $str);
			$uncacheParam = (isset($array[1]) && $array[1]) ? $array[1] : null;
			return $uncacheParam;
		}

		public function getEnv() {
			$base_path = base_path();
    	$envconfig_path = $base_path."/../envconfig.txt";
    	$envconfig = file_get_contents($envconfig_path);
    	$trimmed_envconfig = trim($envconfig);
    	return $trimmed_envconfig;
		}

		public function getUserAgent(){
			$this->ua = mb_strtolower($_SERVER['HTTP_USER_AGENT']);
			if(strpos($this->ua,'iphone') !== false){
				$this->device = 'mobile';
			}elseif(strpos($this->ua,'ipod') !== false){
				$this->device = 'mobile';
			}elseif((strpos($this->ua,'android') !== false) && (strpos($this->ua, 'mobile') !== false)){
				$this->device = 'mobile';
			}elseif((strpos($this->ua,'windows') !== false) && (strpos($this->ua, 'phone') !== false)){
				$this->device = 'mobile';
			}elseif((strpos($this->ua,'firefox') !== false) && (strpos($this->ua, 'mobile') !== false)){
				$this->device = 'mobile';
			}elseif(strpos($this->ua,'blackberry') !== false){
				$this->device = 'mobile';
			}elseif(strpos($this->ua,'ipad') !== false){
				$this->device = 'tablet';
			}elseif((strpos($this->ua,'windows') !== false) && (strpos($this->ua, 'touch') !== false && (strpos($this->ua, 'tablet pc') == false))){
				$this->device = 'tablet';
			}elseif((strpos($this->ua,'android') !== false) && (strpos($this->ua, 'mobile') === false)){
				$this->device = 'tablet';
			}elseif((strpos($this->ua,'firefox') !== false) && (strpos($this->ua, 'tablet') !== false)){
				$this->device = 'tablet';
			}elseif((strpos($this->ua,'kindle') !== false) || (strpos($this->ua, 'silk') !== false)){
				$this->device = 'tablet';
			}elseif((strpos($this->ua,'playbook') !== false)){
				$this->device = 'tablet';
			}else{
				$this->device = 'others';
			}
			return $this->device;
		}
}
