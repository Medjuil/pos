<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test() {
        return Address::first();
    }
}
