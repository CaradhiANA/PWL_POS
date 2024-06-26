<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usermodel;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'nama' => 'required',
            'password' => 'required|min:5|confirmed',
            'level_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $request->image->store('public/posts');
        }
        
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        
        $user = UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => bcrypt($request->password),
            'level_id' => $request->level_id,
            'image' => $request->image->hashName(),
        ]);
        
        if ($user) {
            return response()->json([
                'success' => true,
                'data' => $user,
            ], 201);
        }
        
        return response()->json([
            'success' => false,
            'message' => 'Proses penambahan pengguna gagal.'
        ], 409);  
    }
}
