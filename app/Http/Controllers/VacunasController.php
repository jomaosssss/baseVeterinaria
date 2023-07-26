<?php

namespace App\Http\Controllers;

use App\Models\Vacunas;
use Illuminate\Http\Request;

class VacunasController extends Controller
{

    public function index()
    {
        return Vacunas::all();
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'lote' => 'required',
        ]);

        $vacunas = new Vacunas;
        $vacunas->nombre = $request->nombre;
        $vacunas->lote = $request->lote;
        $vacunas->save();

        return $vacunas;
    }


    public function show(Vacunas $vacunas)
    {
        return $vacunas;
    }


    public function update(Request $request, Vacunas $vacunas)
    {
        $request->validate([
            'nombre' => 'required',
            'lote' => 'required',
        ]);
        
        $vacunas->nombre = $request->nombre;
        $vacunas->lote = $request->lote;
        $vacunas->update();

        return $vacunas;
    }


    public function destroy($id)
    {
        $vacunas = Vacunas::find($id);
        if (is_null($vacunas)) {
            return response()->json('No se pudo realizar correctamente la operacion', 404);
        }
        $vacunas->delete();
        return response()->noContent();
    }
}