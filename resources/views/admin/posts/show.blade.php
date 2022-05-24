@extends('layouts.app')

@section('content')
<div class="container text-center">
    <div class="row justify-content-center">
      <div class="col-md-8">   
        <div class="cardcontainer my-4">
          <p class="txt m-0">{{$post->user}}</p>
          <div class="photo">
            <img src="{{ $post->url}}">
          </div>
          <div class="content border-bottom border-2 pb-4">
            <p>{{ ucfirst($post->title)}}</p>
            <p>{{ $post->created_at}}</p>
            <p>{{$post->description}}</p>
            <a href="{{route("admin.posts.index")}}">
              <button class="btn btn-outline-primary mx-auto">Back</button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection