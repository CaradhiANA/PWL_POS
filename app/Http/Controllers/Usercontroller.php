<?php

namespace App\Http\Controllers;

use App\Models\Usermodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function index()
    {
        // $data = [
         //   'level_id' => 2,
        //     'username' => 'manajer-6',
        //     'nama' => 'Manajer 6',
         //    'password' => Hash::make('12345'),
        //];
        //usermodel::create($data);

        $user = Usermodel::findOr(20, ['username', 'nama'], function(){
        abort(404);
        });

        $user = Usermodel::firstWhere('level_id',1);
        return view('user', ['data' => $user]);

    }
}