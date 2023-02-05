<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;



class PostController extends Controller
{
    /**
     * @var Post
    */
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }



    public function create(Category $category)
    {
        $categories = $category->all(['id', 'name']);

        return view('posts.create', compact('categories'));
    }




    public function store(Request $request)
    {
        $data = $request->all();
        try{
            $data['is_active'] = true;

                $user = auth()->user();

                if($request->hasFile('thumb')) {
                    $data['thumb'] = $request->file('thumb')->store('thumbs', 'public');
                } else {
                    unset($data['thumb']);
                }

                $post = $user->posts()->create($data); //Retornará o Post inserido, atribuímos ele a variável post para usarmos abaixo no sync
                $post->categories()->sync($data['categories']); //aqui

                    flash('Postagem inserida com sucesso!')->success();
                    return redirect()->route('posts.index');
        } catch (\Exception $e) {
                $message = 'Erro ao remover categoria!';

                if(env('APP_DEBUG')) {
                    $message = $e->getMessage();
                }

            flash($message)->warning();
            return redirect()->back();
        }
}




    public function index()
    {
        $posts = $this->post->paginate(15);

        return view('posts.index', compact('posts'));
    }



    public function show (Post $post, Category $category)
    {
        $categories = $category->all('id', 'name');

        return view('posts.edit', compact('post', 'categories'));
    }




    public function update (Post $post, Request $request)
    {

        $data = $request->all();

            try{
                if($request->hasFile('thumb')) {

                    //Remove a imagem atual
                    Storage::disk('public')->delete($post->thumb);

                    $data['thumb'] = $request->file('thumb')->store('thumbs', 'public');

                } else {
                    unset($data['thumb']);
                }

                    $post->update($data);
                    $post->categories()->sync($data['categories']); //aqui

                flash('Postagem atualizada com sucesso !')->success();
                return redirect()->route('posts.show',['post'=>$post->id]);

        } catch (\Exception $e) {
                    $message = 'Erro ao remover categoria!';

                    if(env('APP_DEBUG')) {
                            $message = $e->getMessage();
                    }

                 flash($message)->warning();
                 return redirect()->back();
        }
    }



    public function destroy (Post $post)
    {
        try {

                $post->delete($post);

                flash('Postagem removida com sucesso!')->success();
                return redirect()->route('posts.index');

        } catch (\Exception $e) {
                $message = 'Erro ao remover categoria!';

                if(env('APP_DEBUG')) {
                        $message = $e->getMessage();
                }

                flash($message)->warning();
                return redirect()->back();
        }
    }
}




