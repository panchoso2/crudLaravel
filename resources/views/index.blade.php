@extends('layout')

@section('content')

<div class="row">

  <div class="col-sm-12" style="display: inline-block; align: center; max-width:60%; margin-left:20%">
    <h1 style="float: left">Usuarios</h1>
    <button class="btn btn-primary" type="button" onclick="window.location='{{ url("/create") }}'"> 
      Crear Usuario
    </button>
  </div>  
  <div class="col-sm-12">
    
    <table class="table table-striped">
    <thead>
        <tr>
          <td>Foto</td>
          <td>Rut</td>
          <td>Nombre</td>
          <td>Apellido</td>
          <td>Email</td>
          <td>Fecha de nacimiento</td>
          <td></td>
          <td></td>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
          <td>Foto</td>
          <td>{{$user->Rut}}</td>
          <td>{{$user->Nombre}}</td>
          <td>{{$user->Apellido}}</td>
          <td>{{$user->Email}}</td>
          <td>{{$user->FechaNacimiento}}</td>
          <td><a href="{{ url('/destroy/' . $user->id) }}" style="color:#FF0000;">Eliminar</a></td>
          <td><a href="{{ url('/edit/' . $user->id) }}">Editar</a></td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection