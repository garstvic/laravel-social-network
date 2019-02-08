<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

class PostController extends Controller
{
    public function postCreatePost(Request $request)
    {
        // Validation
        
        $post = new Post($request->input('body'));
        
        $request->user()->posts()->save($post);
        
        return redirect()->route('dashboard');
    }
}
