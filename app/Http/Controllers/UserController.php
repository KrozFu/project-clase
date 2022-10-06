<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(User::all(), 200);
    }

    public function show($id)
    {
        $the_permission = User::find($id);
        if (is_null($the_permission)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            return response()->json($the_permission, 200);
        }
    }

    public function store(Request $request)
    {
        $the_permission = User::create($request->all());
        return response($the_permission, 201);
    }

    public function update(Request $request, $id)
    {
        $the_permission = User::find($id);
        if (is_null($the_permission)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            $the_permission->update($request->all());
            return response()->json($the_permission, 200);
        }
    }

    public function destroy(Request $request, $id)
    {
        $the_permission = User::find($id);

        if (is_null($the_permission)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            $the_permission->delete();
            return response()->json(null, 204);
        }
    }
}
