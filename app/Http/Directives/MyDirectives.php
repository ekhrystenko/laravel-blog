<?php

namespace App\Http\Directives;

use App\Http\Interfaces\MyDirectivesInterface;
use App\Models\Post;

class MyDirectives implements MyDirectivesInterface
{
    public function execute()
    {
        $posts = Post::paginate(6);
        return view('posts', compact('posts'));
    }
}
