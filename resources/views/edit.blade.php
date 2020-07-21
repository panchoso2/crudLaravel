@extends('layout')


<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $( function() {
    $( "#dateInput" ).datepicker();
  } );
</script>


@section('content')
    <h1>Crear Usuario</h1> 
    <form action="/update" method="POST" role="form">
        @csrf
        <div class="form-group">
            <label for="nameInput">Nombres</label>
            <input type="text" class="form-control" id="nameInput"  placeholder="Ingrese sus nombres" name="nameInput" value="{{ $user->Nombre }}">
        </div>
        <div class="form-group">
            <label for="lastNameInput">Apellidos</label>
            <input type="text" class="form-control" id="nameInput"  placeholder="Ingrese sus apellidos" name="lastNameInput" value="{{ $user->Apellido }}">
        </div>
        <div style="display: inline-block; width:45%; margin: 0px 0px 16px">
            <label for="rutInput">Rut</label>
            <input type="number" class="form-control" id="rutInput"  placeholder="Ingrese su Rut" name="rutInput" value="{{ $user->Rut }}">
        </div>
        <div style="display: inline-block; float: right; width:45%; margin: 0px 0px 16px">
            <label for="dateInput">Fecha de nacimiento</label>
            <input type="text" class="form-control" id="dateInput" placeholder="Seleccione su fecha de nacimiento" name="dateInput" value="{{ $user->FechaNacimiento }}">
        </div>
        <div class="form-group">
            <label for="emailInput">Email</label>
            <input type="email" class="form-control" id="emailInput" placeholder="Ingrese su Email" name="emailInput" value="{{ $user->Email }}">
        </div>
        <div class="form-group">
            <label for="passwordInput">Contraseña</label>
            <input type="password" class="form-control" id="passwordInput" placeholder="Ingrese su Contraseña" name="passwordInput" value="{{ $user->Password }}">
        </div>
        <input type="hidden" id="userId" name="id" value="{{ $user->id }}">
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection