<?php

namespace App\Http\Controllers;

use App\Models\Usermodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function index()
    {
         $data = [
            'level_id' => 2,
             'username' => 'manajer-3',
             'nama' => 'Manajer 3',
             'password' => Hash::make('12345'),
        ];
        usermodel::create($data);


        $user = Usermodel::all();
        return view('user', ['data' => $user]);
    }
}