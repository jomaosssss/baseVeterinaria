<?php

namespace App\Http\Controllers;

use App\Models\tipoMascota;
use Illuminate\Http\Request;

class TipoMascotaController extends Controller
{

    public function index()
    {
        return tipoMascota::all();
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
        ]);

        $tipoMascota = new tipoMascota;
        $tipoMascota->nombre = $request->nombre;
        $tipoMascota->save();

        return $tipoMascota;
    }


    public function show(tipoMascota $tipoMascota)
    {
        return $tipoMascota;
    }


    public function update(Request $request, tipoMascota $tipoMascota)
    {
        $request->validate([
            'nombre' => 'required',
        ]);

        $tipoMascota->nombre = $request->nombre;
        $tipoMascota->update();

        return $tipoMascota;
    }


    public function destroy($id)
    {
        $tipoMascota = tipoMascota::find($id);
        if (is_null($tipoMascota)) {
            return response()->json('No se pudo realizar correctamente la operacion', 404);
        }
        $tipoMascota->delete();
        return response()->noContent();
    }
}