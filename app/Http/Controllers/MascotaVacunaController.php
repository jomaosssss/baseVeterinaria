<?php

namespace App\Http\Controllers;

use App\Models\MascotaVacuna;
use Illuminate\Http\Request;

class MascotaVacunaController extends Controller
{

    public function index()
    {
        return MascotaVacuna::all();
    }


    public function store(Request $request)
    {
        $request->validate([
            'clientes_id' => 'required',
            'tipoMascota_id' => 'required',
        ]);

        $mascotaVacuna = new MascotaVacuna;
        $mascotaVacuna->clientes_id = $request->clientes_id;
        $mascotaVacuna->tipoMascota_id = $request->tipoMascota_id;
        $mascotaVacuna->save();

        return $mascotaVacuna;
    }


    public function show(MascotaVacuna $mascotaVacuna)
    {
        return $mascotaVacuna;
    }


    public function update(Request $request, MascotaVacuna $mascotaVacuna)
    {
        $request->validate([
            'clientes_id' => 'required',
            'tipoMascota_id' => 'required',
        ]);

        $mascotaVacuna->clientes_id = $request->clientes_id;
        $mascotaVacuna->tipoMascota_id = $request->tipoMascota_id;
        $mascotaVacuna->update();

        return $mascotaVacuna;
    }


    public function destroy($id)
    {
        $mascotaVacuna = MascotaVacuna::find($id);
        if (is_null($mascotaVacuna)) {
            return response()->json('No se pudo realizar correctamente la operacion', 404);
        }
        $mascotaVacuna->delete();
        return response()->noContent();
    }
}