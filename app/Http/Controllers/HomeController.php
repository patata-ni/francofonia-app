<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $stands = \App\Models\Stand::all();
        return view('home', compact('stands'));
    }
}
