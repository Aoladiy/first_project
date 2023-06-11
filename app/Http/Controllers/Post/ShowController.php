<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class ShowController extends Controller
{
    public function __invoke($post_id)
    {
        return view('posts.post', ['post' => Post::findOrFail($post_id)]);
    }
}
