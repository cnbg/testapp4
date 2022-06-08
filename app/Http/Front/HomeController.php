<?php

namespace App\Http\Front;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        return view('home');
    }
}
