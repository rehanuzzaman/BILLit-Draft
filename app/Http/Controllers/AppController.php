<?php
// app/Http/Controllers/AppController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    /**
     * Show the application dashboard.
     */
    public function index()
    {
        return view("dashboard");
    }
}