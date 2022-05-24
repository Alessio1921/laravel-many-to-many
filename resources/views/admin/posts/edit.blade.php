@extends('layouts.app')

@section('content')
    @if ( $errors->any() )
    <ul class="alert alert-danger">
        @foreach ( $errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <h1 class="text-center">
        Modifica il post
    </h1>
    <div class="container mt-5 w-50">
        <form class="row g-3" action="{{route("admin.posts.update",$post)}}" method="post">

        @csrf
        @method('PUT')
        <div class="col-12">
            <label for="title">Titolo</label>
            <input class="w-100" type="text" name="title" id="title" value="{{$post->title}}">
        </div>
        <div class="col-12">
            <label for="url">url della foto</label>
            <input class="w-100" type="text" name="url" id="url" value="{{$post->url}}">    
        </div>
        <div class="col-12">
            <label for="description">Descrizione</label>
            <textarea class="w-100" name="description" id="description" >{{$post->description}}</textarea>
        </div>
        <div class="col-12">
            <button class="btn btn-outline-primary">send</button>
        </div>
        </form>
    </div>
@endsection