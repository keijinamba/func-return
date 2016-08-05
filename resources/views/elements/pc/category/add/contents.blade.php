<form class="w-auto50" role="search" method="POST" action="/categories/add">
	{!! csrf_field() !!}
  <div class="form-group">
    <input type="text" class="form-control" name="name" placeholder="Category Name">
  </div>
  <button type="submit" class="btn btn-info">追加</button>
</form>