<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $categories = Category::factory(50)->create();
        $tags = Tag::factory(100)->create();
        $posts = Post::factory(1000)->create();

        foreach ($posts as $post) {
            $numberOfTags = random_int(0, 10);
            $tagIDs = $tags->random($numberOfTags)->pluck('id');
            $post->tags()->attach($tagIDs);
        }
    }
}
