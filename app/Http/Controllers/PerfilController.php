<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('perfil.index');
    }

    public function store(Request $request)
    {

        // Modifica el request para eliminar espacios
        $request->request->add(['username' => Str::slug($request->username)]);


        $this->validate($request, [
            'username' => ['required', 'min:3', 'max:20', 'unique:users,username,' . auth()->user()->id, 'not_in:editar-perfil,twitter'],
            'email' => ['required', 'email','unique:users,email,' . auth()->user()->id ],
            'password' => ['required']
        ]);

        if(!auth()->attempt( ['email' => auth()->user()->email , 'password' => $request->password ],$request->remember )){
            return back()->with('mensaje', 'Credenciales incorrectas');
        }

        if ($request->imagen) {
            $imagen = $request->file('imagen');

            $nombreImagen = Str::uuid() . "." . $imagen->extension();
            $imagenServidor = Image::make($imagen);
            $imagenServidor->fit(1000, 1000);
            $imagenPath = public_path('perfiles') . '/' . $nombreImagen;
            $imagenServidor->save($imagenPath);
        }
        $usuario = User::find(auth()->user()->id);
        $usuario->username = $request->username;
        $usuario->email = $request->email;


        if ($request->new_password != "") {
            $this->validate($request, [
                'new_password' => ['required', 'min:6']
            ]);
            $usuario->password = Hash::make($request->new_password);
        }

        // * Verifica si existe una imagen para conservar la misma en caso de no elegir una diferente
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null;
        $usuario->save();

        return redirect()->route('posts.index', $usuario->username);
    }
}
