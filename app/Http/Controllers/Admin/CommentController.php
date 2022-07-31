<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use Illuminate\Support\Facades\Auth;
use App\Mail\SendNewMail;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function index() {
        $user_id = Auth::id();

        $comments = Comment::whereHas('post', function($query) use($user_id) {
            $query->where('user_id', $user_id);
        })->get();

        Mail::to('account@mail.it')->send(new SendNewMail());

        return view('admin.comments.index', compact('comments'));
    }

    public function destroy(Comment $comment) {

        $comment->delete();
        return redirect()->route('admin.comments.index');
    }
}
