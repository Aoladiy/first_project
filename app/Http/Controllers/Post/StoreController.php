<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class StoreController extends Controller
{
    public function __invoke()
    {
        $data = request()->validate([
            'id' => 'numeric|nullable',
            'title' => 'string',
            'content' => 'string',
            'image' => 'string|nullable',
            'likes' => 'numeric|nullable',
            'is_published' => 'boolean|nullable',
            'category_id' => 'numeric|nullable',
            'tags' => '',
        ]);
        if (isset($data['tags'])) {
            $tags = $data['tags'];
        }
        unset($data['tags']);
        $post = Post::create($data);
        $post->tags()->attach($tags);
        return redirect()->route('posts');
    }
}
