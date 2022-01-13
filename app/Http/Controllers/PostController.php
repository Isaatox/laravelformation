<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Video;
use App\Models\Comment;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // $post = Post::find(2);
        // $post->update([
        //     'title' => 'Titre édité'
        // ]);

        // dd('Edité');

        // $post = Post::find(12);
        // $post->delete();
        // dd('Supprimé');

        $posts = Post::orderBy('title')->get();
        $video = Video::find(1);

        // $posts = Post::all();
        // dd($posts);
        return view('articles', [ 
            'posts' => $posts,
            'video' => $video
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
    public function register()
    {
        $post =  Post::find(2);
        $video = Video::find(1);

        $comment1 = new Comment(['content'=>'Mon premier commentaire']);
        $comment2 = new Comment(['content'=>'Mon second commentaire']);
        $post->comments()->saveMany([
            $comment1,
            $comment2
        ]);

        $comment3 = new Comment(['content'=>'Mon troisième commentaire']);
        $video->comments()->save($comment3);
    }
}
