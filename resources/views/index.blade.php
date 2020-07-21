<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Usuarios</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Rut</td>
          <td>Nombre</td>
          <td>Apellido</td>
          <td>Email</td>
          <td>Fecha de nacimiento</td>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->Rut}}</td>
            <td>{{$user->Nombre}}</td>
            <td>{{$user->Apellido}}</td>
            <td>{{$user->Email}}</td>
            <td>{{$user->FechaNacimiento}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>