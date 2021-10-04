<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostsRequest;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.posts.posts-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostsRequest $request
     * @return RedirectResponse
     */
    public function store(PostsRequest $request): RedirectResponse
    {
        $path = $request->file('image')->store('posts');

        Post::create([
            'title' => $request['title'],
            'preview' => $request['preview'],
            'description' => $request['description'],
            'view' => $request['view'],
            'category_id' => $request['category'],
            'image' => mb_substr($path, 6),
        ]);

        return redirect()->route('posts.index')->with('created', 'Пост '.$request->title.' создан!');
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return Application|Factory|View
     */
    public function show(Post $post)
    {
        return view('admin.posts.show-post', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return Application|Factory|View
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.posts-form', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostsRequest $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function update(PostsRequest $request, Post $post): RedirectResponse
    {
        if ($request->file(['image'])){
            $path = $request->file('image')->store('posts');

            $post->update([
                'title' => $request['title'],
                'preview' => $request['preview'],
                'description' => $request['description'],
                'view' => $request['view'],
                'category_id' => $request['category'],
                'image' => mb_substr($path, 6),
            ]);
        }

        $post->update($request->except('image'));

        return redirect()->route('posts.index')->with('updated', 'Пост '.$request->title.' изменен!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return RedirectResponse
     */
    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();
        return redirect()->route('posts.index')->with('deleted', 'Пост '.$post->title.' удален!');
    }
}
