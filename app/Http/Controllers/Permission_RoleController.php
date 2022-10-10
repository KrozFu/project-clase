<?php

namespace App\Http\Controllers;

use App\Models\Permission_Role;
use Illuminate\Http\Request;

class Permission_RoleController extends Controller
{
    public function index()
    {
        return response()->json(Permission_Role::all(), 200);
    }

    public function show($id)
    {
        $the_PermiRole = Permission_Role::find($id);
        if (is_null($the_PermiRole)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            #$the_PermiRole->roles;
            return response()->json($the_PermiRole, 200);
        }
    }

    public function store(Request $request)
    {
        $the_PermiRole = Permission_Role::create($request->all());
        return response($the_PermiRole, 201);
    }

    public function update(Request $request, $id)
    {
        $the_PermiRole = Permission_Role::find($id);
        if (is_null($the_PermiRole)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            $the_PermiRole->update($request->all());
            return response()->json($the_PermiRole, 200);
        }
    }

    public function destroy(Request $request, $id)
    {
        $the_PermiRole = Permission_Role::find($id);

        if (is_null($the_PermiRole)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            $the_PermiRole->delete();
            return response()->json(null, 204);
        }
    }
}
