<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);

        // Jika validasi gagal, kembalikan error
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Ambil kredensial dari permintaan
        $credentials = $request->only('username', 'password');

        // Coba autentikasi pengguna
        if (!$token = auth()->guard('api')->attempt($credentials)) {
            // Autentikasi gagal
            return response()->json([
                'success' => false,
                'message' => 'Username atau Password Anda salah'
            ], 401);
        }

        // Autentikasi berhasil
        return response()->json([
            'success' => true,
            'user' => auth()->guard('api')->user(),
            'token' => $token
        ], 200);
    }
}
