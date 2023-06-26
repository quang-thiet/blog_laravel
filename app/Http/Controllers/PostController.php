<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    
    public function show($slug, $id,$id_comment = null){
        $post = Post::find($id);
        return view('screen.single-post', compact('post','id_comment'));
    }

   

}
