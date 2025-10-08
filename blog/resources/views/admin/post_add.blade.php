@extends('admin.layouts.main')
@section('contenido')
<h1 class="h3 mb-4 text-gray-800">Agreagar Post</h1>

<div id="editor">
  <p>Hello World!</p>
  <p>Some initial <strong>bold</strong> text</p>
  <p><br /></p>
</div>

@endsection
@section('script')
<script>
  const quill = new Quill('#editor', {
    theme: 'snow'
  });
</script>
@endsection