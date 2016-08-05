<div class="col-sm-3 col-md-2 sidebar">
  <ul class="nav nav-sidebar">
    <li class="active"><a href="">記事一覧</a></li>
    <li><a href="#">Reports</a></li>
    <li><a href="#">Analytics</a></li>
    <li><a href="#">Export</a></li>
  </ul>
  <ul class="nav nav-sidebar">
    <li><a href="/articles/add">新規記事作成</a></li>
    <li><a href="/users/logout">Logout</a></li>
  </ul>
</div>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">{{ $user_data['user']->display_name }}のダッシュボード</h1>
  <h2 class="sub-header">記事一覧</h2>
  <div class="btn-group mt50 mb20">
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      並び替え順 <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
      <li><a href="/users/dashboad?sort=updated_at&page=1">更新日</a></li>
      <li><a href="/users/dashboad?sort=created_at&page=1">作成日</a></li>
      <li><a href="/users/dashboad?sort=view_count&page=1">PV数</a></li>
      <li><a href="/users/dashboad?sort=category_id&page=1">カテゴリー</a></li>
    </ul>
  </div>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>id</th>
          <th>タイトル</th>
          <th>カテゴリー</th>
          <th>PV数</th>
          <th>作成日</th>
          <th>更新日</th>
          <th>action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($user_data['params']['articles'] as $article)
        <tr>
          <td>{{ $article->id }}</td>
          <td><a href="/{{ $article->id }}" class="color-333">{{ $article->title }}</a></td>
          <td>{{ $article->category->name }}</td>
          <td>{{ $article->view_count }}</td>
          <td>{{ $article->created_at }}</td>
          <td>{{ $article->updated_at }}</td>
          <td>
            <a type="button" class="btn btn-default">
              <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <!-- <div class="btn-group">
      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        並び替え方 <span class="caret"></span>
      </button>
      <ul class="dropdown-menu">
        <li><a href="/users/dashboad?sort=updated_at&page=1">降順</a></li>
        <li><a href="/users/dashboad?sort=created_at&page=1">昇順</a></li>
      </ul>
    </div> -->
    <div class="pagination-wrapper">{{ $user_data['params']['articles']->appends(['sort' => $user_data['params']['sort']])->render() }}</div>
  </div>
</div>