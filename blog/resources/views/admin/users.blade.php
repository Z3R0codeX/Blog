
@extends('admin.layouts.main')

@section('contenido')

    <h1>Usuarios</h1>
    <div class="p-4">
        <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Imagen</th>
      <th scope="col">Nombre</th>
      <th scope="col">Nickname</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
   @foreach($usuarios as $item)

        <tr>

            <td>{{$item->id}}</td>
            <td>{{$item->img}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->nickname}}</td>
            <td>{{$item->email}}</td>
            <td>******************</td>
            <td>

                <button class="btn btn-danger">X</button>

            </td>

        </tr>

   @endforeach
  </tbody>
</table>
    </div>
    
@endsection

@section('script')
    <script>
       // alert("HOLA")
    </script>
