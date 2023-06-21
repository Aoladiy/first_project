<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class DestroyController extends BaseController
{
    public function __invoke($post_id)
    {
        Post::findOrFail($post_id)->delete();
        return redirect()->route('posts');
    }
}
