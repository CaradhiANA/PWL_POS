<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Welcomecontroller extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'selamat datang',
            'list' => ['home'],['welcome']
        ];

        $activeMenu = 'dashboard';

        return view('welcome', ['breadcrumb'=>$breadcrumb,'activeMenu'=>$activeMenu]);
        }
    }

