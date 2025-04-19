<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('volunteer.home');
    }
}