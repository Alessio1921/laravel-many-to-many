@extends('layouts.app')

@section('content')
<div class="container text-center">
    <div class="row justify-content-center">
      <div class="col-12">
        @if (session("message"))
          <div class="alert alert-success">
              {{session("message")}}
          </div>
        @endif
      </div>
      <div class="col-12">
        <a href="{{route("admin.posts.create")}}">
          <button class="btn btn-outline-primary">
            Crea un nuovo Post
          </button>
        </a>
      @foreach ($posts as $post)
        <div class="cardcontainer my-4">
          <p class="txt m-0">{{$post->user}}</p>
          <div class="photo w-50 mx-auto">
            <img class="w-100" src="{{ $post->url}}">
          </div>
          <div class="content border-bottom border-2 pb-4">
            <p>{{ ucfirst($post->title)}}</p>
            <p>{{ ucfirst($post->created_at)}}</p>
            <a href="{{route("admin.posts.show", $post)}}">
              <button class="btn btn-outline-primary mx-auto">Read More</button>
            </a>
            <form action="{{route("admin.posts.destroy", $post)}}" method="POST">
              @csrf
              @method("DELETE")
              <button class="btn btn-outline-danger mx-auto mt-2" type="submit">Elimina</button>
            </form>
          </div>
        </div>
      @endforeach
      <div class="col-12 d-flex justify-content-center">
        {{ $posts->links() }}
      </div>
    </div>
  </div>
@endsection