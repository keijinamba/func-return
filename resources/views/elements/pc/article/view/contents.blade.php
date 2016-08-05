<div style="overflow:hidden;">
@include('elements/pc/article/view/main')
@include('elements/pc/base/side_list', array('title' => 'アクセスランキング', 'list_articles' => $top_articles))
@include('elements/pc/base/side')
</div>