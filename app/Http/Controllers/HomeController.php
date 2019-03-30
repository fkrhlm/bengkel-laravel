<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; //= #include in C 

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() //nama method yg akan dipanggil
    {
        return view('home');
    }
}
