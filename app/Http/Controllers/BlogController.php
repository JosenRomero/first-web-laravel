<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function getPosts() {

        $posts = Post::with('user')->latest()->get();

        return view('pages.blog', [
            'posts' => $posts,
        ]);
        
    }
}
