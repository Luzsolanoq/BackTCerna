<?php

namespace App\Http\Controllers;

use App\Models\RolePermiso;
use Illuminate\Http\Request;

class RolPermisoController extends Controller
{
    public function index()
    {
        return RolePermiso::with('rol', 'permiso')->get();
    }

    public function store(Request $request)
    {
        try {
            $rolPermiso = new RolePermiso();
            $rolPermiso->id_rol = $request->id_rol;
            $rolPermiso->id_permiso = $request->id_permiso;
            $rolPermiso->save();

            // Devuelve el nuevo registro con las relaciones cargadas
            return response()->json($rolPermiso->load('rol', 'permiso'));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error fatal - ' . $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        // Obtiene un registro específico junto con los datos de rol y permiso relacionados
        $rolPermiso = RolePermiso::with('rol', 'permiso')->find($id);

        if (!$rolPermiso) {
            return response()->json(['error' => 'Registro no encontrado'], 404);
        }

        return response()->json($rolPermiso);
    }

    public function update(Request $request, $id)
    {
        $rolPermiso = RolePermiso::findOrFail($id);
        $rolPermiso->update($request->all());

        // Devuelve el registro actualizado con las relaciones cargadas
        return response()->json($rolPermiso->load('rol', 'permiso'));
    }

    public function destroy($id)
    {
        $rolPermiso = RolePermiso::findOrFail($id);
        $rolPermiso->delete();
        return response()->json(null, 204);
    }

}
