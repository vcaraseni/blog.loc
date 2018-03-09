<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'title' => str_random('7'),
                'body' => str_random('20'),
                'like' => rand(1,15),
                'dislike' => rand(1,7),
                'author' => '1'
            ],
            [
                'title' => str_random('7'),
                'body' => str_random('20'),
                'like' => rand(1,15),
                'dislike' => rand(1,7),
                'author' => '2'
            ],
            [
                'title' => str_random('7'),
                'body' => str_random('20'),
                'like' => rand(1,15),
                'dislike' => rand(1,7),
                'author' => '3'
            ],

        ]);
    }
}
