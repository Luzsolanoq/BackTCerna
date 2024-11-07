<?php

namespace App\Http\Controllers;

use App\Models\Permiso;
use Illuminate\Http\Request;

class PermisoController extends Controller
{
    public function index()
    {
        return Permiso::all();
    }

    public function store(Request $request)
    {
        try {
            $permiso = new Permiso();
            $permiso->nombre = $request->nombre;
            $permiso->descripcion = $request->descripcion;
            $permiso->save();
            
            $result = [
                'nombre' => $permiso->nombre,
                'descripcion' => $permiso->descripcion,
                'permiso_id' => $permiso->id,
                'created' => true
            ];
            return $result;
        } catch (\Exception $e) {
            return "Error fatal - " . $e->getMessage();
        }
    }

    public function show($id)
    {
        return Permiso::find($id);
    }

    public function update(Request $request, $id)
    {
        $permiso = Permiso::findOrFail($id);
        $permiso->update($request->all());
        return $permiso;
    }

    public function destroy($id)
    {
        $permiso = Permiso::findOrFail($id);
        $permiso->delete();
        return 204;
    }

    public function Listado()
    {
        $ListaPermisos = Permiso::all();
        return response()->json($ListaPermisos);
    }
}
