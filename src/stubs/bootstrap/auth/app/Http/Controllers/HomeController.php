<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Logged user
     *
     * @return void
     */
    public function index()
    {
        return view('home');
    }
}

