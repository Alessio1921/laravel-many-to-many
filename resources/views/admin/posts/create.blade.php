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
        creazione di un nuovo post
    </h1>
    <div class="container mt-5 w-50">
        <form class="row g-3" action="{{route("admin.posts.store")}}" method="post">
        @csrf
        <div class="col-12">
            <label for="title">Titolo</label>
            <input class="w-100" type="text" name="title" id="title">
        </div>
        <div class="col-12">
            <label for="url">url della foto</label>
            <input class="w-100" type="text" name="url" id="url">    
        </div>
        <div class="col-12">
            <label for="description">Descrizione</label>
            <textarea class="w-100" name="description" id="description">    
            </textarea>
        </div>
        <div class="col-12">
            <select class="form-select" aria-label="Default select example" name="category_id">
                <option selected disabled>Scegli una categoria</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12">
            <button class="btn btn-outline-primary" type="submit">send</button>
        </div>
        </form>
    </div>
@endsection