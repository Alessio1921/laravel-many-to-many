@extends('layouts.app')

@section('content')

<div class="container text-center">
    <div class="row justify-content-center">
      <div class="col-md-8">   
        <div class="cardcontainer my-4">
          <p class="txt m-0">{{$post->user}}</p>
          <div class="photo w-75 mx-auto">
            <img class="w-100" src="{{ $post->url}}">
          </div>
          <div class="content border-bottom border-2 pb-4">
            <p>{{ ucfirst($post->title)}}</p>
            @foreach ($post->categories as $category)
              <p>{{$category->name }}</p>
            @endforeach
            <p>{{ $post->created_at}}</p>
            <p>{{$post->description}}</p>
            <a href="{{route("admin.posts.edit",$post)}}">
              <button class="btn btn-outline-primary mx-auto">Modifica</button>
            </a>
            <a href="{{route("admin.posts.index")}}">
              <button class="btn btn-outline-danger mx-auto">Back</button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection