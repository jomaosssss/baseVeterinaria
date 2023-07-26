<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use Illuminate\Http\Request;

class MascotaController extends Controller
{

    public function index()
    {
        return Mascota::all();
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'tipoMascota_id' => 'required',
            'cliente_id' => 'required',
            'color' => 'required',
        ]);

        $mascota = new Mascota;
        $mascota->nombre = $request->nombre;
        $mascota->tipoMascota_id = $request->tipoMascota_id;
        $mascota->clientes_id = $request->clientes_id;
        $mascota->color = $request->color;
        $mascota->save();

        return $mascota;
    }


    public function show(Mascota $mascota)
    {
        return $mascota;
    }


    public function update(Request $request, Mascota $mascota)
    {
        $request->validate([
            'nombre' => 'required',
            'tipoMascota_id' => 'required',
            'cliente_id' => 'required',
            'color' => 'required',
        ]);

        $mascota->nombre = $request->nombre;
        $mascota->tipoMascota_id = $request->tipoMascota_id;
        $mascota->clientes_id = $request->clientes_id;
        $mascota->color = $request->color;
        $mascota->update();

        return $mascota;
    }


    public function destroy($id)
    {
        $mascota = Mascota::find($id);
        if (is_null($mascota)) {
            return response()->json('No se pudo realizar correctamente la operacion', 404);
        }
        $mascota->delete();
        return response()->noContent();
    }
}