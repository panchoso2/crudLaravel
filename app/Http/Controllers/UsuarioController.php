<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class UsuarioController extends Controller
{
    

    public function index()
    {
        $users = Usuario::orderBy('id','DESC')->paginate(10);
        return view('index', compact('users'));
    }

  

    public function create()
    {
        return view('create');
    }

 

    public function store(Request $request)
    {
        $user = new Usuario;
        $user->Nombre = $request->input('nameInput');
        $user->Apellido = $request->input('lastNameInput');
        $user->Rut = $request->input('rutInput');
        $user->Email = $request->input('emailInput');
        $user->password = $request->input('passwordInput');

        // format date type to mysql format
        $newDate = date("Y-m-d", strtotime($request->input('dateInput')));
        $user->FechaNacimiento = $newDate;
        
        $user->save();
        return redirect('index');
    }

  



    public function show($id)
    {
        $user = Usuario::find($id);
        return view('Usuario.show', compact('user'));
    }

   
    public function edit($id)
    {
        $user = Usuario::find($id);
        return view('Usuario.edit', compact('user'));
    }

   


    public function update(Request $request, $id)
    {
        $updateData = $request->validate([
            'Rut' => 'required|max:255',
            'Nombre' => 'required|max:255',
            'Apellido' => 'required|max:255',
            'email' => 'required|max:255',
            'Fecha de nacimiento' => 'required|max:255',
            'Password' => 'required|max:255',
        ]);
        Usuario::whereId($id)->update($updateData);
        return redirect()->route('Usuario.index')->with('completed', 'Usuario actualizado');
    }

    



    public function destroy($id)
    {
        $user = Usuario::findOrFail($id);
        $user->delete();
        return redirect('index');

    }
   
}
