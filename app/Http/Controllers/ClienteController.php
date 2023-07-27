<?php

namespace App\Http\Controllers;

use App\Mail\ClienteMail;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ClienteController extends Controller
{

    public function index()
    {
        return Cliente::all();
    }


    public function store(Request $request)
    {

        $request->validate([
            'nombre' => 'required',
            'usuarios_id' => 'required',
            'apellido' => 'required',
            'direccion' => 'required',
        ]);

        $cliente = new Cliente;
        $cliente->nombre = $request->nombre;
        $cliente->usuarios_id = $request->usuarios_id;
        $cliente->apellido = $request->apellido;
        $cliente->direccion = $request->direccion;
        $cliente->save();

        foreach (['joma.ostgo@gmail.com'] as $recipient) {
            Mail::to($recipient)->send(new ClienteMail());
        }

        return $cliente;
    }


    public function show(Cliente $cliente)
    {
        return $cliente;
    }


    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nombre' => 'required',
            'usuarios_id' => 'required',
            'apellido' => 'required',
            'direccion' => 'required',
        ]);

        $cliente->nombre = $request->nombre;
        $cliente->usuarios_id = $request->usuarios_id;
        $cliente->apellido = $request->apellido;
        $cliente->direccion = $request->direccion;
        $cliente->update();

        return $cliente;
    }


    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        if (is_null($cliente)) {
            return response()->json('No se pudo realizar correctamente la operacion', 404);
        }
        $cliente->delete();
        return response()->noContent();
    }
}