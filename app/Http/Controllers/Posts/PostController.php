<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\StorePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        return view('back.posts.index', [
            'posts' => Post::all(),
            'category' => Category::all(),
        ]);
    }

    public function create()
    {
        return view('back.posts.create', [
            'category' => Category::latest()->get(),
        ]);
    }

    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();

        $fileName = null;
        if ($request->hasFile('image')) {
            $ext = $request->file('image')->extension();
            $fileName = date('YmdHis').'.'.$ext;
            $request->file('image')->move(public_path('back_auth/assets/posts'), $fileName);
        }

        $tags = explode(',', $request->tags);

        $post = Post::create([
            'image' => $fileName,
            'content' => $validated['content'],
            'status' => $request->status ?? 0,
            'category_id' => $validated['category_id'],
            'user_id' => Auth::id(), 
        ]);

        $post->tag($tags);

        return redirect()->route('posts.index')->with('status', 'Post créé avec succès !');
    }

    public function edit(Post $post)
    {
        return view('back.posts.create', [
            'post' => $post,
            'category' => Category::latest()->get(),
        ]);
    }

    public function update(StorePostRequest $request, Post $post)
    {
        $validated = $request->validated();

        $fileName = $post->image;
        if ($request->hasFile('image')) {
            $ext = $request->file('image')->extension();
            $fileName = date('YmdHis').'.'.$ext;
            $request->file('image')->move(public_path('back_auth/assets/posts'), $fileName);
        }

        $tags = explode(',', $request->tags);

        $post->update([
            'image' => $fileName,
            'content' => $validated['content'],
            'status' => $validated['status'] ?? 0,
            'category_id' => $validated['category_id'],
        ]);

        $post->retag($tags);

        return redirect()->route('posts.index')->with('success', 'Post mis à jour avec succès !');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post supprimé avec succès !');
    }
}
