@extends('layout')

@section('content')

<div class="row">
<div class="col-sm-12">
    <h1>Usuarios</h1>    
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
          <td>Eliminar</td>
          <td>Editar</td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection