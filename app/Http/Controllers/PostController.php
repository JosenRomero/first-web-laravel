<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(Post $post)
    {

        $post->load('user');

        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('blog');
    }

    public function create()
    {
        $categories = Category::all();

        return view('posts.create', [
            'categories' => $categories,
        ]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = Post::create([
            'user_id' => 20,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('blog', $post);
    }
}
