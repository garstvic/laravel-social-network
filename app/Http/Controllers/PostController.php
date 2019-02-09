<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Post;

class PostController extends Controller
{
    public function postCreatePost(Request $request)
    {
        $this->validate($request, [
            'body' => 'required|max:1000' 
        ]);
        
        $post = new Post(['body' => $request->input('body')]);
        $message = 'There was an error';
        
        if ($request->user()->posts()->save($post))
        {
            $message = 'Post successfully created!';
        }
        
        return redirect()->route('dashboard')->with(['message' => $message]);
    }

    public function getDashboard()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
            
        return view('dashboard', ['posts' => $posts]);
    }
    
    public function getDeletePost($post_id)
    {
        $post = Post::where('id', $post_id)->first();

        if (strpos(Auth::user()->getAttribute('name'), $post->user->getAttribute('name')) !== 0)
        {
            return redirect()->back();
        }
        
        $post->delete();
        
        return redirect()->route('dashboard')->with(['message' => 'Successfully deleted!']);
    }

    public function postEditPost(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);
        
        if (strpos(Auth::user()->getAttribute('name'), $post->user->getAttribute('name')) !== 0)
        {
            return redirect()->back();
        }
        
        $post = Post::where('id', $request->input('postId'))->first();
        $post->setAttribute('body', $request->input('body'));
        $post->update();
        
        return response()->json(['new_body' => $post->getAttribute('body')], 200);
    }
}
