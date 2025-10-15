@extends('admin.layouts.main')
@section('contenido')
<div class="d-flex justify-content-between">
<h1 class="h3 mb-4 text-gray-800">Posts</h1>
<div>
    <a href="/dashboard/post/actions/add" class="btn btn-dark">Crear Post</a>
    </div>
</div>
<div class="row">
    @foreach ($posts as $post)
    <div class="col-md-4 mb-4">
        <div class="card">
            <img class="card-img-top" src="{{ asset('posts/' . $post->img) }}" alt="Imagen del post">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{$post->description }}</p>
                <a href="#" class="btn btn-primary">Ver más</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
       
@endsection