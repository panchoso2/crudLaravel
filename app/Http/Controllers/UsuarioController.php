<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use Image;

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

    
    public function ajaxAvatar(Request $request)
    {
        $image = $request->file('avatarInput');

        // check if image is uploaded, if not, default image is used
        if ( $image == null ){
            return response()->json([
                'message' => 'null',
            ]);
        }

        // check if file is image
        if ( exif_imagetype($image) ){
            $new_name = rand() . '.' . $image->getClientOriginalExtension();

            // resize image and keep aspect ratio
            $new_image = Image::make( $image->path() );
            $new_image->resize(200, 200, function( $constraint ){
                $constraint->aspectRatio();
            })->save(public_path('images' . '/' . $new_name));


            // $image->move(public_path('images'), 'segunda.jpg');
            return response()->json([
                'message' => $new_name,
            ]);
        } else {
            return response()->json([
                'message' => 'false',
            ]);
        }
    }


    public function store(Request $request)
    {
        
        // create new Usuario and set attributes
        $user = new Usuario;

        $user->Nombre = $request->input('nameInput');
        $user->Apellido = $request->input('lastNameInput');
        $user->Rut = $request->input('rutInput');
        $user->Email = $request->input('emailInput');
        $user->Password = $request->input('passwordInput');
        $user->Avatar = $request->input('avatarName');

        // format date type to mysql format
        $newDate = date("Y-m-d", strtotime($request->input('dateInput')));
        $user->FechaNacimiento = $newDate;
        
        $user->save();

        return redirect('index');
    }

   
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
        $user->Password = $request->input('passwordInput');
        $user->Avatar = $request->input('avatarName');

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
