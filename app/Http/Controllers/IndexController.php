<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
//        dd(\mySuperFacade::getResult(999));
        $postsQuery = Post::query();
        $posts = $this->search($postsQuery, $request);

        return view('index', compact('posts'));

    }

    public function category(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $postsQuery = $category->posts();
        $posts = $this->search($postsQuery, $request);

        return view('category', compact('posts', 'category'));
    }

    public function showPost($cat_id, $post_id)
    {
        $post = Post::findOrFail($post_id);
        $post->view++;
        $post->save();
        return view('show-post', compact('post'));
    }

    public function search($query, $request)
    {
        if ($request->filled('search'))
            $query->where('title', 'LIKE', "%{$request->search}%")
                ->orWhere('preview', 'LIKE', "%{$request->search}%");

        return $query->orderBy('view', 'DESC')->paginate(6)->withPath("?" . $request->getQueryString());
    }

}
