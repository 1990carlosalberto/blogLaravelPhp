<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;



class PostController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['is_active']  = true;

        $user = User::find(1);

        //Continuamos a salvar com mass assignment mas por meio do usuário
        dd($user->posts()->create($data));


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
