@extends('layouts.app')

@section('content')
<div class="container text-center">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <a href="{{route("admin.posts.index")}}">
          <button class="btn btn-primary"> Posts</button>
        </a>
            
      </div>
      
    </div>
  </div>
@endsection