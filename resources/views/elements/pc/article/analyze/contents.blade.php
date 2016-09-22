<div class="col-sm-12 col-md-12">
	<div class="w-auto">
		<div class="jumbotron col-sm-12 col-md-12 analyze-jumbutron" style="background-image: url('/img/thumb/thumbnail_special.jpg');">
			<div class="container">
		    <h1>形態素解析</h1>
		    <p>形態素解析エンジンMeCabを使って文章を単語レベルで分割し、自然言語処理の入り口に立つ。<br>MeCabの導入方法を紹介した記事は以下のボタンから飛べます。</p>
 				<p><a class="btn btn-primary btn-lg shadow2" href="/16" role="button">MeCabの導入</a></p>
		  </div>
		</div>
	</div>
</div>

<div class="jumbotron col-sm-12 col-md-12 analyze-main">
	<div class="container">
		<div class="bs-callout bs-callout-purple" id="callout-glyphicons-location">
			<h4>形態素解析を試す</h4>
			<p>形態素解析とは、自然言語のテキストデータ（文）から、対象言語の文法や、辞書と呼ばれる単語の品詞等の情報にもとづき、言語で意味を持つ最小単位の列に分割し、それぞれの形態素の品詞等を判別すること。<br><a href="https://ja.wikipedia.org/wiki/%E5%BD%A2%E6%85%8B%E7%B4%A0%E8%A7%A3%E6%9E%90">ー Wikipedia </a></p>
			<ul>
				<li>形態素解析エンジンとしてMeCabを使っています。</li>
				<li>今回使っている辞書はデフォルトのシステム辞書のみです。</li>
				<li>ユーザー辞書は使っていません。</li>
			</ul>
			<p>以下に、入力した単語を形態素解析し、単語レベルに分割した結果を返します。</p>
		</div>
		<div class="analyze-main-input-box">
      <button type="submit">
        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
      </button>
      <input class="analyze-main-input-text" type="text" name="word" placeholder="文章を入力" autocomplete="off">
    </div>
    <div class="analyze-main-results">
    	<h2>「？？？」を形態素解析した結果</h2>
    	<div class="panel panel-default">
			  <div class="panel-body">
			  </div>
			</div>
    </div>
	</div>
</div>