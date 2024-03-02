<?php

namespace App\Http\Controllers;

use App\Models\Usermodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function index()
    {
         //$data = [
             //'username' => 'customer-1',
             //'nama' => 'Pelanggan',
             //'password' => Hash::make('12345'),
             //'level_id' => 4,
        //];
        //usermodel::create($data);

        $data = [
            'nama' => 'Pelanggan Pertama',
        ];
        Usermodel::where('username', 'customer-1')->update($data);

        $user = Usermodel::all();
        return view('user', ['data' => $user]);
    }
}