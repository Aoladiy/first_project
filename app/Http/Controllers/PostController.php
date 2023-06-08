<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class PostController extends Controller
{
    function index()
    {
        $posts = Post::all();
        $categories = Category::all();
        return view('posts/posts', compact('posts', 'categories'));
    }

    function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts/create', compact('categories', 'tags'));
    }

    function store()
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

    function show($post_id)
    {
        return view('posts.post', ['post' => Post::findOrFail($post_id)]);
    }

    function edit($post_id)
    {
        $post = Post::findOrFail($post_id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.edit', compact('post', 'categories', 'tags'));
    }

    function update($post_id)
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
        if (!array_key_exists('is_published', $data)) {
            $data['is_published'] = 0;
        }
        $tags = $data['tags'];
        unset($data['tags']);
        Post::findOrFail($post_id)->update($data);
        Post::findOrFail($post_id)->tags()->sync($tags);
        return redirect()->route('postShow', $post_id);
    }

    function destroy($post_id)
    {
        Post::findOrFail($post_id)->delete();
        return redirect()->route('posts');
    }

    function restore()
    {
        $posts_to_restore = Post::where('id', 1);
        $posts_to_restore->restore();
        dump($posts_to_restore);
    }

    function firstOrCreate()
    {
        $post_to_first_or_create = [
            'title' => 'title from function firstOrCreate in PostController',
            'content' => 'content from function firstOrCreate in PostController',
            'image' => 'image from function firstOrCreate in PostController.png',
            'likes' => 12,
            'is_published' => 1,
        ];
        $post_to_first_or_create = Post::firstOrCreate(['title' => 'title from function create in PostController'], $post_to_first_or_create);
        dump($post_to_first_or_create->content);
    }

    function updateOrCreate()
    {
        $post_to_update_or_create = [
            'title' => 'title from function updateOrCreate in PostController',
            'content' => 'content from function updateOrCreate in PostController',
            'image' => 'image from function updateOrCreate in PostController.png',
            'likes' => 12,
            'is_published' => 1,
        ];
        $post_to_update_or_create = Post::updateOrCreate(['title' => 'title from function firstOrCreate in PostController'], $post_to_update_or_create);
        dump($post_to_update_or_create->content);
    }
}
