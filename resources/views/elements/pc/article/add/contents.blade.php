<form class="form-horizontal col-sm-12 col-md-12 row" name="rtaform" id="rtaform" method="POST" action="/articles/add">
  {!! csrf_field() !!}
	<div class="col-sm-12 col-md-8">
		<button class="btn btn-primary right mb20 mr5" type="button" onclick="submit();">公開</button>
		<button class="btn btn-primary right mb20 mr5" type="button">下書き保存</button>
		<input type="text" class="form-control mb20" placeholder="タイトル" name="title">
		<textarea type="text" rows="3" class="form-control mb20" placeholder="ディスクリプション" name="discription"></textarea>
		<div class="preview"></div>
		<input class="textarea-body" name="body" type="hidden"></input>
		<div class="panel panel-default">
		  <div class="panel-body">
		    <div class="btn-group" role="group" aria-label="button-group">
				  <button type="button" class="btn btn-default edit-button-rta">RTA</button>
				  <button type="button" class="btn btn-default edit-button-code">CODE</button>
				  <button type="button" class="btn btn-default edit-button-test">TEST</button>
				  <a href="#myModal" role="button" class="btn btn-default edit-button-image" data-toggle="modal">IMAGE</a>
				</div>
				<div class="btn-group right" role="group" aria-label="button-group">
				  <button type="button" class="btn btn-default edit-button-add">追加</button>
				</div>
		  </div>
		</div>
		<div class="test-textarea add-textarea unvisible">
			<textarea rows="20" cols="60" class="test form-control"></textarea>
		</div>
		<div class="code-textarea add-textarea unvisible">
			<textarea rows="20" cols="60" class="code form-control"></textarea>
		</div>
	  <div class="rta-textarea add-textarea control-group unvisible">
	    <div class="controls">
	      <textarea style="width:100%;" rows="20" cols="60" class="rta" id="body" placeholder="本文"></textarea>
	    </div>
	  </div>
	  <div class="rta-textarea add-textarea control-group unvisible">
	    <div class="controls">
	      <textarea style="width:100%;" rows="20" cols="60" class="rta" id="body" placeholder="本文"></textarea>
	    </div>
	  </div>
	  <div id="myModal" class="image-modal modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">画像選択</h3>
      </div>
      <div class="modal-body row">
      	
      </div>
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal">Close</button>
        <button class="btn btn-primary image_decide">Save changes</button>
      </div>
    </div>
  </div>
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
<form id="image_form">
  <input id="image_form_file" type="file" name="file">
  <input id="image_form_submit" type="button" value="ファイルをアップロードする">
</form>