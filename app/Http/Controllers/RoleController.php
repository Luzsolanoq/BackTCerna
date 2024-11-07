<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return Role::all();
    }

    public function store(Request $request)
    {
        try {
            $role = new Role();
            $role->nombre = $request->nombre;
            $role->save();
            
            $result = [
                'nombre' => $role->nombre,
                'role_id' => $role->id,
                'created' => true
            ];
            return $result;
        } catch (\Exception $e) {
            return "Error fatal - " . $e->getMessage();
        }
    }

    public function show($id)
    {
        return Role::find($id);
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->update($request->all());
        return $role;
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return 204;
    }

    public function Listado()
    {
        $ListaRoles = Role::all();
        return response()->json($ListaRoles);
    }
}
