<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{

    public function dashboard()
    {
        return view('layouts.admin.dashboard');
    }
}
