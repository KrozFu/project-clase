<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Exception;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(User::all(), 200);
    }

    public function show($id)
    {
        $the_User = User::find($id);
        if (is_null($the_User)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            $the_User->profile;
            // $the_User->role;
            // $the_User->permissions;
            return response()->json($the_User, 200);
        }
    }

    public function store(Request $request)
    {
        // $the_User = User::create($request->all());
        // return response($the_User, 201);
        try {
            $data = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'role_id' => 'required'
            ]);
            $data['password'] = bcrypt($request->password);
            $user = User::create($data);

            // Cada vez que se crea se crea un token
            $token = $user->createToken('API Token')->accessToken;
            return response(['user' => $user, 'token' => $token]); //Se guarda en la DB
        } catch (Exception $e) {
            return response(['data' => "Data incomplete "], 400);
        }
    }

    public function update(Request $request, $id)
    {
        $the_User = User::find($id);
        if (is_null($the_User)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            $the_User->update($request->all());
            return response()->json($the_User, 200);
        }
    }

    public function destroy(Request $request, $id)
    {
        $the_User = User::find($id);

        if (is_null($the_User)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            $the_User->delete();
            return response()->json(null, 204);
        }
    }
}
