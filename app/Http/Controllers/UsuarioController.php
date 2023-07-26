<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{

    public function index()
    {
        return Usuario::all();
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'usuario' => 'required',
            'contrasenia' => 'required',
            'imagen' => 'required',
        ]);

        $usuario = new Usuario;
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->usuario = $request->usuario;
        $usuario->contrasenia = $request->contrasenia;
        $usuario->imagen = $request->imagen;
        $usuario->save();

        return $usuario;
    }


    public function show(Usuario $usuario)
    {
        return $usuario;
    }


    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'usuario' => 'required',
            'contrasenia' => 'required',
            'imagen' => 'required',
        ]);

        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->usuario = $request->usuario;
        $usuario->contrasenia = $request->contrasenia;
        $usuario->imagen = $request->imagen;
        $usuario->update();

        return $usuario;
    }


    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        if (is_null($usuario)) {
            return response()->json('No se pudo realizar correctamente la operacion', 404);
        }
        $usuario->delete();
        return response()->noContent();
    }
}