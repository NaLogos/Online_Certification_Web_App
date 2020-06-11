<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;

use App\User;

class HomeController
{
    public function index()
    {
        $userName = Auth::user()->name;
        return view('home')->with('userName',$userName);
    }
}
