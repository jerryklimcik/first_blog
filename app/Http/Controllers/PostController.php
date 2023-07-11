<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::query()->orderByDesc('created_at')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $categories = Category::all();
        return view('posts.create', compact('users', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'author' => 'required|exists:users,id',
            'category' => 'required|exists:categories,id',
        ]);

        $post = new Post();
        $post->title = $request->input('title');
        $post->slug = Str::slug($request->input('title'));
        $post->content = $request->input('content');
        $post->user_id = $request->input('author');
        $post->category_id = $request->input('category');
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Článek byl úspěšně vytvořen.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $users = User::all();
        $categories = Category::all();

        return view('posts.edit', compact('post', 'users', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'author_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
        ]);

        $post = Post::findOrFail($id);

        $post->title = $request->input('title');
        $post->slug = Str::slug($request->input('title'));
        $post->content = $request->input('content');
        $post->user_id = $request->input('author_id');
        $post->category_id = $request->input('category_id');
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Článek byl úspěšně upraven.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Článek byl úspěšně smazán.');
    }
}
