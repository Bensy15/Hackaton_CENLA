<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('user.home');
        
    }

    public function post()
    {
        return view ('post.index');
    }
}