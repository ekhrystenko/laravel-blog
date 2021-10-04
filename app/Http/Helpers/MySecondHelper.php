<?php

namespace App\Http\Helpers;

use App\Models\Post;

class MySecondHelper
{
    private $_number = 0;

    public function getResult(Post $post)
    {
        return "<h1>$post->title</h1>" . ++$this->_number;
    }
}
