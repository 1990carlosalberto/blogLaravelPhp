<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;



class PostController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id']    = 1;
        $data['is_active']  = true;

        dd(Post::create($data));


    }

    public function index()
    {
        $posts = Post::paginate(15);
        return view('posts.index', compact('posts'));
    }

    public function show ($post)
    {
        $post = Post::findOrFail ($post);
        return view('posts.edit', compact('post'));
    }

    public function update ($post, Request $request)
    {
        //atualizando com mass assignmente
        $data = $request->all();

        $post = Post::findOrFail($post);

        dd($post->update($data));
    }

    public function destroy ($post)
    {
        $post = Post::findOrFail($post);

        dd($post->delete());
    }



}
