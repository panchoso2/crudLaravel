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

    public function ajaxRut(Request $request)
    {
        // search Usuarios with the same Rut
       $rut = $request->rut;
       $user = Usuario::where('Rut', $rut)->first();
    
       return $user;
    }

    public function ajaxEmail(Request $request)
    {
        // search Usuarios with the same Email
       $email = $request->email;
       $user = Usuario::where('Email', $email)->first();
    
       return $user;
    }
    

    public function store(Request $request)
    {

        // create new Usuario and set attributes
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

    /*
    public function show($id)
    {
        $user = Usuario::find($id);
        return view('Usuario.show', compact('user'));
    }
    */
   
    public function edit($id)
    {
        $user = Usuario::find($id);
        return view('edit', compact('user'));
    }

   
    public function update(Request $request)
    {
        // find Usuario and update all attributes
        $id = $request->input('id');
        $user = Usuario::find($id);
        
        $user->Nombre = $request->input('nameInput');
        $user->Apellido = $request->input('lastNameInput');
        $user->Rut = $request->input('rutInput');
        $user->Email = $request->input('emailInput');
        $user->password = $request->input('passwordInput');

        $user->save();
        return redirect('index');
    }

    



    public function destroy($id)
    {
        $user = Usuario::findOrFail($id);
        $user->delete();
        return redirect('index');

    }
   
}
