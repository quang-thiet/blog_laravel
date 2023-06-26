<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;


class CommentController extends Controller
{
    public function index(){
        $comments = Comment::all();
        return view('screen.admin.comment-list',compact('comments'));
    }
    public function store(CommentRequest $request){


        $data = $request->all();
        Comment::create($data);
        return redirect()->back();
    }
}
