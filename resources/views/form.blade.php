@extends('layouts.app')

@section('content')
    <h1>Créer un nouveau post</h1>

    <form action="{{route('posts.store')}}" method="POST">
        @csrf
        <input type="text" name="title">
        <textarea name="content" cols="30" rows="10"></textarea>
        <button type="submit">Créer</button>
    </form>
@endsection