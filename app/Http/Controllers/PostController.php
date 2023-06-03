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
//        $post = Post::find(2);
//        dd($post->category->title);

//        $category = Category::find(1);
//        dd($category->posts);

//        $post = Post::findOrFail(1);
//        dd($post->tags);

//        $tag = Tag::find(1);
//        dd($tag->posts);

        $posts = Post::all();
        return view('posts/posts', compact('posts'));
    }

    function create()
    {
        return view('posts/create');
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
        ]);
        Post::create($data);
        return redirect()->route('posts');
    }

    function show($post_id)
    {
        return view('posts.post', ['post' => Post::findOrFail($post_id)]);
    }

    function edit($post_id)
    {
        return view('posts.edit', ['post' => Post::findOrFail($post_id)]);
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
        ]);
        if(!array_key_exists('is_published', $data)){
            $data['is_published'] = 0;
        }
        Post::findOrFail($post_id)->update($data);
        return redirect()->route('postShow', $data['id']);
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

    function updateOrCreate() {
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
