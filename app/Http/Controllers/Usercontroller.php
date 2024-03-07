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

        //$user = Usermodel::findOr(20, ['username', 'nama'], function(){
        //abort(404);
        //});

        //$user = Usermodel::firstWhere('level_id',1);
        //$user = Usermodel::findOrFail(1);
        //$user = Usermodel::where('username', 'manager9')->FirstOrFail();
        //$user = UserModel::where('level_id', 2)->count();
        
        //$user = UserModel::create([
        //    'username' => 'manage44',
        //    'nama' => 'Manager44',
        //    'password' => Hash::make('12345'),
        //    'level_id' => 2,
        //]);

        //$user->username = 'manager45';

        //$user->isDirty(); // true
        //$user->isDirty('username'); // true
        //$user->isDirty('nama'); // false
        //$user->isDirty(['nama', 'username']); // true

        //$user->isClean(); // false
        //$user->isClean('username'); // false
        //$user->isClean('nama'); // true
        //$user->isClean(['nama', 'username']); // false

        //$user->save();

        //$user->isDirty(); // false
        //$user->isClean(); // true
        //dd($user->isDirty());

        $user = UserModel::create([
            'username' => 'manager11',
            'nama' => 'Manager11',
            'password' => Hash::make('12345'),
            'level_id' => 2,
        ]);

        $user->username = 'manager12';

        $user->save();

        $user->wasChanged(); // true
        $user->wasChanged('username'); // true
        $user->wasChanged(['username', 'level_id']); // true
        $user->wasChanged('nama'); // false
        dd($user->wasChanged(['nama', 'username'])); // true



    }
}