@extends('layouts.app')

@section('content')
    <h1> {{ $post->title }}</h1>
    <p>  {{ $post->content}}</p>
    <span>{{$post->image ? $post->image->path : "pas d'image"}}</span>
<br><hr><br>
    @forelse ($post->comments as $comment)
        <div>{{$comment->content}} | crée le {{$comment->created_at->format('d/m/Y')}}</div>
    @empty
        <div>Aucun commentaire sur ce post.</div>        
    @endforelse
    <hr>
    @forelse ($post->tags as $tag)
        <span>{{$tag->name}}</span>
    @empty
        <span>Pas de tag pour ce post</span>
    @endforelse
    <hr>
    <span>Nom de l'artiste de l'image : {{$post->imageArtist ? $post->imageArtist->name : "pas d'artiste"}}</span>
    <span>Commentaire le plus récent : {{$post->latestComment->content}}</span>
@endsection