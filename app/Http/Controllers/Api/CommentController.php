<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function store(Request $request, $post_id) {

        $data = $request->all();

        $newComment = new Comment();
        $newComment->post_id = $post_id;
        $newComment->author = $data['author'];
        $newComment->content = $data['content'];
        $newComment->save();

        return $newComment;
    }
}
