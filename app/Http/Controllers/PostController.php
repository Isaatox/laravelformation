<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // $post = Post::find(1);
        // $post->update([
        //     'title' => 'Titre édité'
        // ]);

        // dd('Edité');

        // $post = Post::find(12);
        // $post->delete();
        // dd('Supprimé');

        $posts = Post::orderBy('title')->get();
        // $posts = Post::all();
        // dd($posts);
        return view('articles', [ 
            'posts' => $posts
        ]);
    }

    public function show($id)
    {
        $post = Post::findorfail($id);
        // dd($post);

        // $post = Post::where('title', '=', 'Voluptatem quia molestias sunt optio non quo.')->first();
        // dd($post);

        // $posts = [
        //     1 => ' Mon titre n°1',
        //     2 => ' Mon titre n°2'
        // ];
        
        // $post= $posts[$id]  ?? 'pas de TITRE';

    
    return view('article', [ 
        'post' => $post
    ]);
    }

    public function contact()
    {
        return view('contact');
    }
    
    public function create()
    {
        return view('form');
    }
    public function store(Request $request)
    {
        // $post = new Post();
        // $post->title = $request->title;
        // $post->content = $request->content;
        // $post->save();
        // dd($request->content);
    
            Post::create([
                'title' => $request->title,
                'content' => $request->content
            ]);
            dd('Post créée');
    }
}
