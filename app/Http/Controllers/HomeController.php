<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return "Hello from Controller";
    }

    public function test($id, $number)
    {
        return view('home.test', compact('id', 'number'));
    }

    public function save(Request $request)
    {
        return $request->all();
    }
}
