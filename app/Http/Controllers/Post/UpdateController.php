<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, $post_id)
    {
        $data = $request->validated();
        if (!array_key_exists('is_published', $data)) {
            $data['is_published'] = 0;
        }
        $tags = $data['tags'];
        unset($data['tags']);
        Post::findOrFail($post_id)->update($data);
        Post::findOrFail($post_id)->tags()->sync($tags);
        return redirect()->route('postShow', $post_id);
    }
}
