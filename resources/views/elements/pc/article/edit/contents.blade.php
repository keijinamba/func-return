<form class="form-horizontal col-sm-12 col-md-12 row" name="rtaform" id="rtaform" method="POST" action="/articles/edit">
  {!! csrf_field() !!}
	<div class="col-sm-12 col-md-8">
		<button class="btn btn-primary right mb20 mr5" type="button" onclick="submit();">公開</button>
		<button class="btn btn-primary right mb20 mr5" type="button">下書き保存</button>
		<input type="text" class="form-control mb20" placeholder="タイトル" name="title">
		<textarea type="text" rows="3" class="form-control mb20" placeholder="ディスクリプション" name="discription"></textarea>
		<div class="preview">{!! $article->body !!}</div>
		<textarea class="edit-textarea-body form-control" name="body">{{ $article->body }}</textarea>
		<!-- <input class="textarea-body" name="body" type="hidden" value="{{ $article->body }}"></input> -->
		<!-- <div class="panel panel-default">
		  <div class="panel-body">
		    <div class="btn-group" role="group" aria-label="button-group">
				  <button type="button" class="btn btn-default edit-button-rta">RTA</button>
				  <button type="button" class="btn btn-default edit-button-code">CODE</button>
				</div>
				<div class="btn-group right" role="group" aria-label="button-group">
				  <button type="button" class="btn btn-default edit-button-add">追加</button>
				</div>
		  </div>
		</div>
		<div class="code-textarea unvisible">
			<textarea rows="20" cols="60" class="code"></textarea>
		</div>
	  <div class="control-group unvisible">
	    <div class="controls">
	      <textarea style="width:100%;" rows="20" cols="60" class="rta" id="body" placeholder="本文"></textarea>
	    </div>
	  </div>
  </div> -->
  <div class="col-sm-12 col-md-4">
  	<div class="panel panel-default">
		  <div class="panel-heading">
		    <h3 class="panel-title">カテゴリー</h3>
		  </div>
		  <div class="panel-body">
		    <select class="form-control" name="category">
		    	@foreach($data['categories'] as $category)
          <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        </select>
		  </div>
		</div>
		<div class="panel panel-default">
		  <div class="panel-heading">
		    <h3 class="panel-title">タグ</h3>
		  </div>
		  <div class="panel-body">
		    <input type="text" name="tag" value="" data-role="tagsinput">
		  </div>
		</div>
  </div>
</form>