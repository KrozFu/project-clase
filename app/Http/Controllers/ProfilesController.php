<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index()
    {
        return response()->json(Profile::all(), 200);
    }

    public function show($id)
    {
        $the_profile = Profile::find($id);
        if (is_null($the_profile)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            return response()->json($the_profile, 200);
        }
    }

    public function store(Request $request)
    {
        $url = "";
        if (
            $request->file('image') &&
            ($request->file('image')->getClientOriginalExtension() == "jpg" ||
                $request->file('image')->getClientOriginalExtension() == "jpg")
        ) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = $request->user_id . "-" . time() . '.' . $extension;
            $url = $file->move('avatars' . $filename);
        } else {
            return response(['message' => 'Se debe cargar una imagen'], 400);
        }

        $the_Profile = Profile::where('user_id', '=', $request->user_id)->first();
        if (is_null($the_Profile)) {
            $data = $request->all();
            // error_log('data perfil >' . $data["user_id"]);
            $data["url_avatar"] = $url;
            $the_Profile = Profile::create($data);
            return response($the_Profile, 201);
        } else {
            return response()->json(['message' => 'El usuario ya tiene un perfil']);
        }

        // $the_profile = Profile::create($request->all());
        // return response($the_profile, 201);
    }

    public function update(Request $request, $id)
    {
        $the_profile = Profile::find($id);
        if (is_null($the_profile)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            $the_profile->update($request->all());
            return response()->json($the_profile, 200);
        }
    }

    public function destroy(Request $request, $id)
    {
        $the_profile = Profile::find($id);

        if (is_null($the_profile)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            $the_profile->delete();
            return response()->json(null, 204);
        }
    }
}
