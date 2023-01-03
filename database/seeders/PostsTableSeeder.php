<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Post::factory(30)->create();
       //  DB::table('posts')->insert([
       //     'title'       => 'Primeira Postagem',
       //     'description' => 'Postagem teste com seeds',
       //     'content'     => 'Conteúdo da postagem',
       //     'is_active'   => 1,
       //     'slug'        => 'primeira-postagem',
       //     'user_id'     => 1
       //     ]);
    }
}
