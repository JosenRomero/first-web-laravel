<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;

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

    public function save(SavePostRequest $request)
    {

        $post = Post::create([
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('blog', $post);
    }

    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('posts.edit', [
            'post' => $post,
            'categories' => $categories,
        ]);
    }

    public function update(UpdatePostRequest $request, Post $post)
    {

        $post->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('posts.show', $post);
    }
}
