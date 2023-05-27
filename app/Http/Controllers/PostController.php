<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class PostController extends Controller
{
    function showPosts()
    {
        $posts = Post::all();
        return view('posts', compact('posts'));
    }

    function create()
    {
        $posts_to_create = [
            [
                'title' => 'title from function create in PostController',
                'content' => 'content from function create in PostController',
                'image' => 'image from function create in PostController.png',
                'likes' => 12,
                'is_published' => 1,
            ],
            [
                'title' => 'second title from function create in PostController',
                'content' => 'second content from function create in PostController',
                'image' => 'second image from function create in PostController.png',
                'likes' => 122,
                'is_published' => 1,
            ]
        ];
        foreach ($posts_to_create as $post_to_create) {
            Post::create($post_to_create);
            dump($post_to_create);
        }
    }

    function update()
    {
        $post_to_update = Post::find(1);
        $post_to_update->update([
            'title' => 'updated title',
            'content' => 'updated content'
        ]);
        dump($post_to_update);
    }

    function delete()
    {
        $posts_to_delete = Post::where('id', 1);
        $posts_to_delete->delete();
        dump($posts_to_delete);
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
