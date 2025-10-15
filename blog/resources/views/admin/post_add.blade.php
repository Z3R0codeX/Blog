@extends('admin.layouts.main')
@section('contenido')
<h1 class="h3 mb-4 text-gray-800">Agreagar Post</h1>

@if(session('success'))
<div class="alert alert-success">{{session('success')}}</div>
@endif

@if($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </ul>
</div>
@endif

<form action="/dashboard/post" method="POST" id="form" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="title">Titulo</label>
    <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}"> 
  </div>
  <div class="form-group">
    <label for="description">Descripcion</label>
    <input value="{{old('description')}}" type="text" class="form-control" id="description" name="description">
  </div>
  <div class="form-group">
    <label for="file">Imagen</label>
    <input type="file" class="form-control" id="file" name="image">
  </div>
  <div class="form-group">
    <label for="category_id">Categoria</label>
    <select class="form-control" id="category_id" name="category_id">
      @foreach($categories as $cate)
      <option value="{{$cate->id}}">{{$cate->name}}</option>
      @endforeach
    </select>
  </div>
  <input type="hidden" name="content" id="content">
<div id="editor">
  <p>Hello World!</p>
  <p>Some initial <strong>bold</strong> text</p>
  <p><br /></p>
</div>
<div class="form-group">
  <button class="btn btn-primary">Insertar</button>
</div>
</form>

@endsection
@section('script')
<script>
  const quill = new Quill('#editor', {
    theme: 'snow'
  });
  const form = document.getElementById('form');
  form.onsubmit = function() {
    // Populate hidden form on submit
    const content = document.querySelector('input[name=content]');
    content.value = quill.root.innerHTML;
  };
</script>
@endsection