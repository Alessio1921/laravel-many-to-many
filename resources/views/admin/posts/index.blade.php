@extends('layouts.app')

@section('content')
<div class="container text-center">
    <div class="row justify-content-center">
      @foreach ($posts as $post)
        <div class="cardcontainer my-4">
          <p class="txt m-0">{{$post->user}}</p>
          <div class="photo">
            <img src="{{ $post->url}}">
          </div>
          <div class="content border-bottom border-2 pb-4">
            <p>{{ ucfirst($post->title)}}</p>
            <p>{{ ucfirst($post->created_at)}}</p>
            <a href="{{route("admin.posts.show", $post)}}">
              <button class="btn btn-outline-primary mx-auto">Read More</button>
            </a>
          </div>
        </div>
      @endforeach
      <div class="col-12 d-flex justify-content-center">
        {{ $posts->links() }}
      </div>
    </div>
  </div>
@endsection