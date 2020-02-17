<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        return view('posts.index');
    }

    public function show(Post $post)
    {
        return view('posts.show')->with(compact('post'));
    }
}
