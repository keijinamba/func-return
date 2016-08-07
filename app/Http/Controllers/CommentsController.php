<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Comment;

class CommentsController extends Controller
{
    public function add(Request $data) {
    	$comment = new Comment();
        $result = $comment->create([
            'name' => $data->name,
            'body' => $data->comment,
            'article_id' => $data->article_id,
        ]);
        return redirect($_SERVER['HTTP_REFERER']);
    }
}
