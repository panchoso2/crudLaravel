<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class UsuarioController extends Controller
{
    

    public function index()
    {
        $users = Usuario::orderBy('id','DESC')->paginate(3);
        return view('Usuario.index', compact('users'));
    }

  

    public function create()
    {
        return view('usuarios.create');
    }

 

    public function store(Request $request)
    {
        $storeData = $request->validate([
            'Rut' => 'required|max:255',
            'Nombre' => 'required|max:255',
            'Apellido' => 'required|max:255',
            'email' => 'required|max:255',
            'Fecha de nacimiento' => 'required|max:255',
            'Password' => 'required|max:255',
        ]);

        $user = Usuario::create($storeData);

        return redirect('/usuarios')->with('sucess','Usuario guardado');
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
        return redirect()->route('Usuario.index')->with('completed', 'Usuario eliminado');
    }
}
