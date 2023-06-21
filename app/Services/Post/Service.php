<?php

namespace App\Services\Post;

use App\Models\Post;

class Service
{

    public function store($data): void
    {
        if (isset($data['tags'])) {
            $tags = $data['tags'];
        }
        unset($data['tags']);
        $post = Post::create($data);
        $post->tags()->attach($tags);
    }

    public function update($data, $post_id)
    {
        if (!array_key_exists('is_published', $data)) {
            $data['is_published'] = 0;
        }
        $tags = $data['tags'];
        unset($data['tags']);
        Post::findOrFail($post_id)->update($data);
        Post::findOrFail($post_id)->tags()->sync($tags);
    }
}
